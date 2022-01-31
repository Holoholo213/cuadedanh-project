<?php

namespace App\Services;
use App\Repositories\IngredientRepository;
use App\Helpers\SlugHelper;

class IngredientService {

	private $ingredientRepository;
	private $slugHelper;
	public function __construct(IngredientRepository $ingredientRepository, SlugHelper $slugHelper)
	{
		$this->ingredientRepository = $ingredientRepository;
		$this->slugHelper = $slugHelper;
	}

	public function getAllIngredient(){
		return $this->ingredientRepository->getAll();
	}

	public function createTag(array $data){
		$slug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			"name" => $data["name"],
			"slug" => $slug
		];
		return $this->ingredientRepository->create($fields);
	}

	public function updateTag($tagId, array $data){
		$slug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			"name" => $data["name"],
			"slug" => $slug
		];
		return $this->ingredientRepository->update($tagId, $fields);
	}

	public function destroyTag($tagId){
		return $this->ingredientRepository->destroy($tagId);
	}
}