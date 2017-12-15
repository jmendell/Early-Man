<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StorageController;

class PagesController extends Controller
{
    public function home () {
    
    	return view('home');
    
    }

    public function choose () {
    
    	return view('components.choose');
    
    }

    public function create () {
    
    	return view('components.create');
    
    }

    public function presentation (Request $request) {

        $imageData = $request->data;
        $storage = New StorageController;
        $url = $storage::store($imageData);

        setcookie("card", $url);

        return view('components.presentation', compact('url'));
    
    }
}
