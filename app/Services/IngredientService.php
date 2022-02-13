<?php

namespace App\Services;
use App\Helpers\SlugHelper;
use App\Models\Ingredient;

class IngredientService {

	private $slugHelper;
	public function __construct(SlugHelper $slugHelper)
	{
		$this->slugHelper = $slugHelper;
	}

	public function getAllIngredient(){
		return Ingredient::all();
	}
	
	public function ingredientHandling($data){
		$ingredientArrayId = [];
		foreach($data as $item){
			$ingredientSlug = $this->slugHelper->slugName($item);
			$ingredientExist = $this->checkIngredientExist($ingredientSlug);
			if($ingredientExist){
				array_push($ingredientArrayId, $ingredientExist->id);
			} else {
				$fields = [
					'name' => $item,
					'slug' => $ingredientSlug
				];
				$newIngredient = $this->createTag($fields);
				array_push($ingredientArrayId, $newIngredient->id);
			}
		}
		return $ingredientArrayId;
	}
	
	private function checkIngredientExist($slug){
		return Ingredient::where('slug', $slug)->first();
	}

	private function createTag($fields){
		return Ingredient::create($fields);
	}
}