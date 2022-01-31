<?php

namespace App\Services;
use App\Repositories\CategoryRepository;
use App\Helpers\SlugHelper;

class CategoryService {

	private $slugHelper;
	private $categoryRepository;
	public function __construct(CategoryRepository $categoryRepository,SlugHelper $slugHelper)
	{
		$this->categoryRepository = $categoryRepository;
		$this->slugHelper = $slugHelper;
	}

	public function getAllCategory(){
		return $this->categoryRepository->getAll();
	}

	public function createCategory(array $data){
		$slug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			'name' => $data['name'],
			'slug' => $slug
		];
		return $this->categoryRepository->create($fields);
	}

	public function updateCategory($categoryId, array $data){
		$slug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			'name' => $data['name'],
			'slug' => $slug
		];
		return $this->categoryRepository->update($categoryId, $fields);
	}

	public function destroyCategory($categoryId){
		return $this->categoryRepository->destroy($categoryId);
	}

}