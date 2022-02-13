<?php

namespace App\Services;

use App\Helpers\ImageHelper;
use App\Repositories\SubContentRepository;

class SubContentService{

	private $imageHelper;
	private $subContentRepository;
	public function __construct(ImageHelper $imageHelper,SubContentRepository $subContentRepository){
		$this->imageHelper = $imageHelper;
		$this->subContentRepository = $subContentRepository;
	}

	public function create($id, $data) {
		foreach($data["content"] as $key => $item) {
			$fileds = [
				'post_id' => $id,
				'description' => $data["description"][$key],
			];
			if(isset($data["img"][$key])){
				$fileName = $this->imageHelper->storeImage($data["img"][$key], "posts/image");
				$fileds["image_dir"] = $fileName;
			}
			$this->subContentRepository->create($fileds);
		}
	}
}