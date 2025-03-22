<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('admin.company.index');
	}

	public function get() {
		$categories = Company::all();

		return datatables()->of($categories)
			->editColumn('created_at', '{{ date("d F Y", strtotime($created_at)) }}')
			->editColumn('updated_at', '{{ date("d F Y", strtotime($updated_at)) }}')
			->addColumn('username', function ($categories) {
				return '<a class="user-view-button" role="button" tabindex="0" data-id="' . $categories->user->id . '">' . $categories->user->name . '</a>';})
			->addColumn('publication_status', function ($categories) {
				if ($categories->publication_status == 1) {
					return '<a href="' . route('admin.unpublishedCompaniesRoute', $categories->id) . '" class="btn btn-success btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Click to Unpublished"><i class="icon fa fa-arrow-down"></i>Published</a>';
				}
				return '<a href="' . route('admin.publishedCompaniesRoute', $categories->id) . '" class="btn btn-warning btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Click to Published"><i class="icon fa fa-arrow-up"></i> Unpublished</a>';})
			->addColumn('action', function ($categories) {
				return '<button class="btn btn-info btn-xs view-button" data-id="' . $categories->id . '" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></button> <button class="btn btn-primary btn-xs edit-button" data-id="' . $categories->id . '" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs delete-button" data-id="' . $categories->id . '"data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></button>';})
			->rawColumns(['username', 'publication_status', 'action'])
			->setRowId('id')
			->make(true);
	}

	public function store(Request $request) {
		$validator = $validator = Validator::make($request->all(), [
			'company_name' => 'required|max:250',
			'company_slug' => 'required|alpha_dash|min:5|max:150|unique:companies',
			'company_desc' => 'required|max:550',
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
