<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
  
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
