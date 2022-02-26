<?php

namespace App\Services;

use App\Helpers\ImageHelper;
use App\Models\SubContent;
use App\Repositories\SubContentRepository;

class SubContentService{

	private $imageHelper;
	private $subContentRepository;
	public function __construct(ImageHelper $imageHelper,SubContentRepository $subContentRepository){
		$this->imageHelper = $imageHelper;
		$this->subContentRepository = $subContentRepository;
	}

	public function create($id, $data) {
		$fileds = [
			'post_id' => $id,
			'content' => $data["content"],
		];
		if(isset($data["img_dir"])){
			$fileName = $this->imageHelper->storeImage($data["img_dir"], "posts/image");
			$fileds["image_dir"] = $fileName;
			if(isset($data["img_descrip"])){
				$fileds["img_descrip"] = $data["img_descrip"];
			}
		}
		$this->subContentRepository->create($fileds);
	}

	public function update($id, $data){
		$fileds = [
			'content' => $data["content"],
		];
		if(isset($data["img_dir"])){
			$old_img = SubContent::find($id);
			if($old_img){
				unlink($old_img->image_dir);
			}
			$fileName = $this->imageHelper->storeImage($data["img_dir"], "posts/image");
			$fileds["image_dir"] = $fileName;
			if(isset($data["img_descrip"])){
				$fileds["img_descrip"] = $data["img_descrip"];
			}
		}
		$this->subContentRepository->update($id, $fileds);
	}
}