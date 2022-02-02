<?php

namespace App\Helpers;

class ImageHelper{
	public function storeImage($file, $path){
		$imgName = time().".".$file->extension();
		$filePath = $path."/".$imgName;
		$file->move(public_path($path), $imgName);
		return $filePath;
	}
} 