<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Product;

class WebController extends Controller {

	public function index() {
		
		$data['products'] = Product::with(['category', 'images'])
			->where('publication_status', 1)
			->inRandomOrder()
			->limit(20)
			->get();


		return view('web.index',compact('data'));
	}

	public function products(){

		$data['products'] = Product::with(['category','images'])->where('publication_status', 1)->get();
		return view('web.products',$data);
	}

	public function product_desc($pid){
		
		$pid=base64_decode($pid);
		
		$productData = Product::with(['category','images'])->where('id', $pid)->first();
		
		$randomNextProduct = Product::where('id', '!=', $pid)
			->inRandomOrder()
			->first();
		$product['product']=$productData;
		$product['next_product']=$randomNextProduct;
		
		return view('web.product_desc',compact('product'));
	}

	function collaborators(){
    
		$filePath = storage_path('app/collab-logo-url.txt'); 
		$images = [];
	
		if (file_exists($filePath)) {
			$lines = file($filePath, FILE_IGNORE_NEW_LINES); // Read each line
	
			foreach ($lines as $line) {
				$parts = explode(',', $line); // Split by comma
				if (count($parts) > 0) {
					$images[] = [
						'name'        => !empty($parts[0]) ? trim($parts[0]) : 'Unnamed Image',
						'link'        => !empty($parts[1]) ? trim($parts[1]) : '#',
						'main_info'   => !empty($parts[2]) ? trim($parts[2]) : 'Some text',
						'second_info' => !empty($parts[3]) ? trim($parts[3]) : 'Some text'
					];            }
			}
		}
	   
		return view('web.collaborators',compact('images'));
	}

	function clients(){
    
		$filePath = storage_path('app/client-logo.txt'); 
		$images = [];
	
		if (file_exists($filePath)) {
			$lines = file($filePath, FILE_IGNORE_NEW_LINES); // Read each line
	
			foreach ($lines as $line) {
				$parts = explode(',', $line); // Split by comma
				if (count($parts) > 0) {
					$images[] = [
						'name'        => !empty($parts[0]) ? trim($parts[0]) : 'Unnamed Image',
						'link'        => !empty($parts[1]) ? trim($parts[1]) : '#',
						'main_info'   => !empty($parts[2]) ? trim($parts[2]) : 'Some text',
						'second_info' => !empty($parts[3]) ? trim($parts[3]) : 'Some text'
					];            }
			}
		}
	   
		return view('web.clients',compact('images'));
	}


}
