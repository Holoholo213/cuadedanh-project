<?php
namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Category;

class CategoryRepository implements RepositoryInterface{

	public function getAll()
	{
		return Category::all();
	}

	public function getById($categoryId)
	{
		return Category::findOrFail($categoryId);
	}

	public function create(array $categoryDetail)
	{
		return Category::create($categoryDetail);
	}

	public function destroy($categoryId)
	{
		return Category::destroy($categoryId);
	}

	public function update($categoryId, array $categoryDetail)
	{
		return Category::whereId($categoryId)->update($categoryDetail);
	}
}