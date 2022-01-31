<?php
namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Tag;

class TagRepository implements RepositoryInterface{
	public function getAll()
	{
		return Tag::all();
	}

	public function getById($tagId)
	{
		return Tag::findOrFail($tagId);
	}

	public function create(array $tagDetail)
	{
		return Tag::create($tagDetail);
	}

	public function destroy($tagId)
	{
		return Tag::destroy($tagId);
	}

	public function update($tagId, array $tagDetail)
	{
		return Tag::whereId($tagId)->update($tagDetail);
	}
}