<?php
namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Ingredient;

class IngredientRepository implements RepositoryInterface{
	public function getAll()
	{
		return Ingredient::all();
	}

	public function getById($ingredientId)
	{
		return Ingredient::findOrFail($ingredientId);
	}

	public function create(array $ingredientDetail)
	{
		return Ingredient::create($ingredientDetail);
	}

	public function destroy($ingredientId)
	{
		return Ingredient::destroy($ingredientId);
	}

	public function update($ingredientId, array $ingredientDetail)
	{
		return Ingredient::whereId($ingredientId)->update($ingredientDetail);
	}
}