<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Purifier;

class ProductController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('admin.product.index');
	}

	public function get() {
		$products = Product::all();

		return datatables()->of($products)
			->editColumn('created_at', '{{ date("d F Y", strtotime($created_at)) }}')
			->editColumn('updated_at', '{{ date("d F Y", strtotime($updated_at)) }}')
			->editColumn('product_name', '{{ str_limit($product_name, 30) }}')
			->addColumn('username', function ($products) {
				return '<a class="user-view-button" role="button" tabindex="0" data-id="' . $products->user->id . '">' . $products->user->name . '</a>';})
			->addColumn('publication_status', function ($products) {
				if ($products->publication_status == 1) {
					return '<a href="' . route('admin.unpublishedProductsRoute', $products->id) . '" class="btn btn-success btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Click to Unpublished"><i class="icon fa fa-arrow-down"></i>Published</a>';
				}
				return '<a href="' . route('admin.publishedProductsRoute', $products->id) . '" class="btn btn-warning btn-xs btn-flat btn-block" data-toggle="tooltip" data-original-title="Click to Published"><i class="icon fa fa-arrow-up"></i> Unpublished</a>';})
			->addColumn('action', function ($products) {
				return '<button class="btn btn-info btn-xs view-button" data-id="' . $products->id . '" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></button> <a href="' . route('admin.products.edit', $products->id) . '" class="btn btn-primary btn-xs" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a> <button class="btn btn-danger btn-xs delete-button" data-id="' . $products->id . '"data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></button>';})
			->addColumn('featured_image', function ($products) {
				return '<img src="' . get_featured_image_thumbnail_url($products->featured_image) . '" width="60" class="img img-thumbnail img-responsive">';})
			->rawColumns(['username', 'publication_status', 'action', 'featured_image'])
			->setRowId('id')
			->make(true);
	}

	public function create() {
		$categories = Category::where('publication_status', 1)->get(['id', 'category_name']);
		$tags = Tag::where('publication_status', 1)->get(['id', 'tag_name']);
		return view('admin.product.create', compact('categories', 'tags'));
	}

	public function store(Request $request) {
		$request->validate([
			'category_id' => 'required',
			'product_name' => 'required|string|max:255',
			'product_sku' => 'required|alpha_dash|min:5|max:150|unique:products',
			'price' => 'required|numeric',
			'stock' => 'required|integer',
			'product_details' => 'required|string',
			'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:max_width=10000,max_height=10000',
			'publication_status' => 'required',
			'is_featured' => 'required',
			'meta_title' => 'required|max:250',
			'meta_keywords' => 'required|max:250',
			'meta_description' => 'required|max:400',
		], [
			'featured_image.dimensions' => 'Max dimensions 10000x10000',
			'category_id.required' => 'The category field is required.',
		]);

		$product = Product::create([
			'user_id' => Auth::user()->id,
			'product_name' => $request->input('product_name'),
			'product_sku' => $request->input('product_sku'),
			'category_id' => $request->input('category_id'),
			'price' => $request->input('price'),
			'stock' => $request->input('stock'),
			'publication_status' => $request->input('publication_status'),
			'is_featured' => $request->input('is_featured'),
			'youtube_video_url' => $request->input('youtube_video_url'),
			'product_details' => Purifier::clean($request->input('product_details')),
			'meta_title' => $request->input('meta_title'),
			'meta_keywords' => $request->input('meta_keywords'),
			'meta_description' => Purifier::clean($request->input('meta_description')),
		]);

		if ($request->hasFile('featured_image')) {
			$image = $request->file('featured_image');
			$file_name = $this->featured_image_thumbnail($product->id, $image);
			$product->update(['featured_image' => $file_name]);
		}

		if ($request->hasFile('product_images')) {
			foreach ($request->file('product_images') as $image) {
				$file_name = $this->featured_image($product->id, $image);
				ProductImage::create([
					'product_id' => $product->id,
					'image' => $file_name,
				]);
			}
		}

		if (!empty($product->id)) {
			return redirect()->back()->with('message', 'Product added successfully.');
		} else {
			return redirect()->back()->with('exception', 'Operation failed !');
		}
	}

	public function featured_image($id, $image) {
		$filename = $id . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
		$location = get_featured_image_path($filename);
		// create new image with transparent background color
		$background = Image::canvas(688, 387);
		// read image file and resize it to 200x200
		$img = Image::make($image);
		// Image Height
		$height = $img->height();
		// Image Width
		$width = $img->width();
		$x = NULL;
		$y = NULL;
		if ($width > $height) {
			$y = 688;
		} else {
			$x = 387;
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

	public function show($id) {
		$Product = Product::with(['category:id,category_name', 'user:id,name'])->where('id', $id)
			->first();
		return json_encode($Product);
	}

	public function edit($id) {
		$product = Product::where('id', $id)->first();
		$categories = Category::where('publication_status', 1)->get(['id', 'category_name']);

		return view('admin.product.edit', compact('product', 'categories'));
	}

	public function update(Request $request, $id) {
		$product = Product::find($id);

		if ($product->product_sku == $request->product_sku) {
			$product_sku = "required|alpha_dash|min:5|max:150";
		} 
		else {
			$product_sku = "required|alpha_dash|min:5|max:150|unique:products";
		}

		$request->validate([
			'category_id' => 'required',
			'product_name' => 'required|string|max:255',
			'product_sku' => $product_sku,
			'price' => 'required|numeric',
			'stock' => 'required|integer',
			'product_details' => 'required|string',
			'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240|dimensions:max_width=10000,max_height=10000',
			'publication_status' => 'required',
			'is_featured' => 'required',
			'meta_title' => 'required|max:250',
			'meta_keywords' => 'required|max:250',
			'meta_description' => 'required|max:400',
		], [
			'featured_image.dimensions' => 'Max dimensions 10000x10000',
			'category_id.required' => 'The category field is required.',
		]);

		$product->product_name = $request->input('product_name');
		$product->product_sku = $request->input('product_sku');
		$product->category_id = $request->input('category_id');
		$product->price = $request->input('price');
		$product->stock = $request->input('stock');
		$product->publication_status = $request->input('publication_status');
		$product->is_featured = $request->input('is_featured');
		$product->youtube_video_url = $request->input('youtube_video_url');
		$product->product_details = Purifier::clean($request->input('product_details'));
		$product->meta_title = $request->input('meta_title');
		$product->meta_keywords = $request->input('meta_keywords');
		$product->meta_description = Purifier::clean($request->input('meta_description'));

		if ($request->hasFile('featured_image')) {
			$image = $request->file('featured_image');
			$filename = $this->featured_image_thumbnail($product->id, $image);
			if ($product->featured_image) {
				@unlink(get_featured_image_path($product->featured_image));
				@unlink(get_featured_image_thumbnail_path($product->featured_image));
			}
			$product->update(['featured_image' => $filename]);
		}

		if ($request->hasFile('product_images')) {
			
			$productImages = ProductImage::where('product_id', $product->id)->get();
			foreach ($productImages as $image) {
				@unlink(get_featured_image_path($image->image));
				$image->delete();
			}

			foreach ($request->file('product_images') as $image) {
				$file_name = $this->featured_image($product->id, $image);
				ProductImage::create([
					'product_id' => $product->id,
					'image' => $file_name,
				]);
			}
		}
		$affected_row = $product->save();

		
		if (!empty($affected_row)) {
			return redirect()->back()->with('message', 'Product update successfully.');
		} else {
			return redirect()->back()->with('exception', 'Operation failed !');
		}
	}

	public function published($id) {
		$affected_row = Product::where('id', $id)
			->update(['publication_status' => 1]);

		if (!empty($affected_row)) {
			return redirect()->back()->with('message', 'Published successfully.');
		}
		return redirect()->back()->with('exception', 'Operation failed !');
	}

	public function unpublished($id) {
		$affected_row = Product::where('id', $id)
			->update(['publication_status' => 0]);

		if (!empty($affected_row)) {
			return redirect()->back()->with('message', 'Unpublished successfully.');
		}
		return redirect()->back()->with('exception', 'Operation failed !');
	}

	public function destroy($id) {
		$product = Product::find($id);
		if ($product) {
			//$product->tags()->detach();
			if ($product->featured_image) {
				@unlink(get_featured_image_path($product->featured_image));
				@unlink(get_featured_image_thumbnail_path($product->featured_image));
			}

			$productImages = ProductImage::where('product_id', $product->id)->get();
			foreach ($productImages as $image) {
				@unlink(get_featured_image_path($image->image));
				@unlink(get_featured_image_thumbnail_path($image->image));
				$image->delete();
			}

			$product->delete();
			return redirect()->back()->with('message', 'Product deleted successfully.');
		} else {
			return redirect()->back()->with('exception', 'Product not found!');
		}
	}
}