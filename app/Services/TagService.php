<?php

namespace App\Services;
use App\Repositories\TagRepository;
use App\Helpers\SlugHelper;

class TagService {

	private $tagRepository;
	private $slugHelper;
	public function __construct(TagRepository $tagRepository, SlugHelper $slugHelper)
	{
		$this->tagRepository = $tagRepository;
		$this->slugHelper = $slugHelper;
	}

	public function getAllTag(){
		return $this->tagRepository->getAll();
	}

	public function createTag(array $data){
		$slug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			"name" => $data["name"],
			"slug" => $slug
		];
		return $this->tagRepository->create($fields);
	}

	public function updateTag($tagId, array $data){
		$slug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			"name" => $data["name"],
			"slug" => $slug
		];
		return $this->tagRepository->update($tagId, $data);
	}

	public function destroyTag($tagId){
		return $this->tagRepository->destroy($tagId);
	}
}