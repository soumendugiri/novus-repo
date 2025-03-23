<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Image;

class CompanyController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('admin.company.index');
	}

	public function featured_image_thumbnail($id, $image) {
		$filename = $id . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
		$location = get_featured_image_thumbnail_path($filename);
		// create new image with transparent background color
		$background = Image::canvas(370, 235);
		// read image file and resize it to 200x200
		$img = Image::make($image);
		// Image Height
		$height = $img->height();
		// Image Width
		$width = $img->width();
		$x = NULL;
		$y = NULL;
		if ($width > $height) {
			$y = 370;
		} else {
			$x = 235;
		}
		//Resize Image
		$img->resize($x, $y, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		// insert resized image centered into background
		$background->insert($img, 'center');
		// save
		$background->save($location);
		return $filename;
	}

	public function get() {
		$companies = Company::all();

		return datatables()->of($companies)
			->editColumn('created_at', '{{ date("d F Y", strtotime($created_at)) }}')
			->editColumn('updated_at', '{{ date("d F Y", strtotime($updated_at)) }}')
			->addColumn('username', function ($companies) {
				return '<a class="user-view-button" role="button" tabindex="0" data-id="' . $companies->user->id . '">' . $companies->user->name . '</a>';})
			->addColumn('publication_status', function ($companies) {
				if ($companies->publication_status == 1) {
					return '<a href="' . route('admin.unpublishedCompaniesRoute', $companies->id) . '" class="btn btn-success btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Click to Unpublished"><i class="icon fa fa-arrow-down"></i>Published</a>';
				}
				return '<a href="' . route('admin.publishedCompaniesRoute', $companies->id) . '" class="btn btn-warning btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Click to Published"><i class="icon fa fa-arrow-up"></i> Unpublished</a>';})
			->addColumn('action', function ($companies) {
				return '<button class="btn btn-info btn-xs view-button" data-id="' . $companies->id . '" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></button> <button class="btn btn-primary btn-xs edit-button" data-id="' . $companies->id . '" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs delete-button" data-id="' . $companies->id . '"data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></button>';})
			->addColumn('company_logo', function ($companies) {
				return '<img src="' . get_featured_image_thumbnail_url($companies->company_logo) . '" width="60" class="img img-thumbnail img-responsive">';})
			->rawColumns(['username', 'publication_status','company_logo', 'action'])
			->setRowId('id')
			->make(true);
	}

	public function store(Request $request) {
		$validator = $validator = Validator::make($request->all(), [
			'company_name' => 'required|max:250',
			'company_slug' => 'required|alpha_dash|min:5|max:150|unique:companies',
			'company_desc' => 'required|max:550',
			'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:max_width=10000,max_height=10000',
			'publication_status' => 'required',
			'meta_title' => 'required|max:250',
			'meta_keywords' => 'required|max:250',
			'meta_description' => 'required|max:400',
		], [
			'company_name.required' => 'Category name is required.',
		]);

		if ($validator->passes()) {
			$company = Company::create([
				'user_id' => Auth::user()->id,
				'company_name' => $request->input('company_name'),
				'company_slug' => $request->input('company_slug'),
				'company_desc' => $request->input('company_desc'),
				'publication_status' => $request->input('publication_status'),
				'meta_title' => $request->input('meta_title'),
				'meta_keywords' => $request->input('meta_keywords'),
				'meta_description' => $request->input('meta_description'),
			]);
			$company_id = $company->id;
			
			if ($request->hasFile('company_logo')) {
				$image = $request->file('company_logo');
				$file_name = $this->featured_image_thumbnail($company_id, $image);
				$company->update(['company_logo' => $file_name]);
			}

			if (!empty($company_id)) {
				$request->session()->flash('message', 'Company add successfully.');
			} else {
				$request->session()->flash('exception', 'Operation failed !');
			}

			return Response::json(['success' => '1']);
		}
		return Response::json(['errors' => $validator->errors()]);
	}

	public function show($id) {
		$company = Company::where('id', $id)
			->first();
		return json_encode($company);
	}

	public function update(Request $request, $id) {
		$company = Company::find($id);

		if ($company->company_slug == $request->company_slug) {
			$company_slug = "required|alpha_dash|min:5|max:150";
		} else {
			$company_slug = "required|alpha_dash|min:5|max:150|unique:companies";
		}

		$validator = $validator = Validator::make($request->all(), [
			'company_name' => 'required|max:250',
			'company_slug' => $company_slug,
			'company_desc' => 'required|max:550',
			'publication_status' => 'required',
			'meta_title' => 'required|max:250',
			'meta_keywords' => 'required|max:250',
			'meta_description' => 'required|max:400',
			'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:max_width=10000,max_height=10000',
		], [
			'company_name.required' => 'Category name is required.',
		]);

		if ($validator->passes()) {
			$company->company_name = $request->get('company_name');
			$company->company_slug = $request->get('company_slug');
			$company->company_desc = $request->get('company_desc');
			$company->publication_status = $request->get('publication_status');
			$company->meta_title = $request->get('meta_title');
			$company->meta_keywords = $request->get('meta_keywords');
			$company->meta_description = $request->get('meta_description');

			if ($request->hasFile('company_logo')) {
				$image = $request->file('company_logo');
				$filename = $this->featured_image_thumbnail($company->id, $image);
	
				if ($company->company_logo) {
					@unlink(get_featured_image_thumbnail_path($company->company_logo));
				}
				$company->update(['company_logo' => $filename]);
			}

			$affected_row = $company->save();

			if (!empty($affected_row)) {
				$request->session()->flash('message', 'Company update successfully.');
			} else {
				$request->session()->flash('exception', 'Operation failed !');
			}
			return Response::json(['success' => '1']);
		}
		return Response::json(['errors' => $validator->errors()]);
	}

	public function published($id) {
		$affected_row = Company::where('id', $id)
			->update(['publication_status' => 1]);

		if (!empty($affected_row)) {
			return redirect()->back()->with('message', 'Published successfully.');
		}
		return redirect()->back()->with('exception', 'Operation failed !');
	}

	public function unpublished($id) {
		$affected_row = Company::where('id', $id)
			->update(['publication_status' => 0]);

		if (!empty($affected_row)) {
			return redirect()->back()->with('message', 'Unpublished successfully.');
		}
		return redirect()->back()->with('exception', 'Operation failed !');
	}

	public function destroy($id) {
		$company = Company::find($id);
		if ($company) {
			$company->delete();
			return redirect()->back()->with('message', 'Company delete successfully.');
		} else {
			return redirect()->back()->with('exception', 'Company not found !');
		}
	}
}
