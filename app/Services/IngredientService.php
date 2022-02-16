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
				$newIngredient = $this->createIngredient($fields);
				array_push($ingredientArrayId, $newIngredient->id);
			}
		}
		return $ingredientArrayId;
	}

	public function createIngredient($fields){
		$tagSlug = $this->slugHelper->slugName($fields["name"]);
		$data = [
			"name" => $fields["name"],
			"slug" => $tagSlug
		];
		return Ingredient::create($data);
	}

	public function updateIngredient($ingredientId, $data){
		$tagSlug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			"name" => $data["name"],
			"slug" => $tagSlug
		];
		return Ingredient::whereId($ingredientId)->update($fields);
	}

	public function destroyIngredient($ingredientId){
		return Ingredient::destroy($ingredientId);
	}
	
	private function checkIngredientExist($slug){
		return Ingredient::where('slug', $slug)->first();
	}

}