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
		foreach($data['img'] as $key => $item) {
			$fileName = $this->imageHelper->storeImage($item, "posts/image");
			$fileds = [
				'post_id' => $id,
				'description' => $data["description"][$key],
				'image_dir' => $fileName
			];
			$this->subContentRepository->create($fileds);
		}
	}
}