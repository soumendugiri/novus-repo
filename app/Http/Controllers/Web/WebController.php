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
		
	}

	public function products(){

		$data['products'] = Product::with(['category','images'])->get();
		return view('web.products',$data);
	}

	public function product_desc($pid){
		
		$pid=base64_decode($pid);
		$product = Product::where('id', $pid)->first();
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


}
