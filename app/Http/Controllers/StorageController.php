<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Response;

class StorageController extends Controller
{

	public static function store ($imageData) {
		
		// $imageData = $request->data;

		if (!preg_match('/data:([^;]*);base64,(.*)/', $imageData, $matches)) {
			die("error");
		}

		$fileExtension = explode('/', $matches[1])[1];

		$content = base64_decode($matches[2]);

		$imageFileName = time() . '.' . $fileExtension;

		Storage::put($imageFileName, $content, 'public');

		return Storage::url($imageFileName);
	
	}

	public static function show (Request $request, $fileName) {

		$file_exists = Storage::has($fileName);

		if ($file_exists) {
			$image = Storage::url($fileName);
			return view('single-image', compact('image'));
		}
	
	}

}