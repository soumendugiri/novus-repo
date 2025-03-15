<?php

namespace App\Http\Controllers;
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


}
