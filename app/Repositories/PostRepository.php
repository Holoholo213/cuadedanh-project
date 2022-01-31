<?php
namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Post;

class PostRepository implements RepositoryInterface{
	public function getAll()
	{
		return Post::all();
	}

	public function getById($postId)
	{
		return Post::findOrFail($postId);
	}

	public function create(array $postDetail)
	{
		return Post::create($postDetail);
	}

	public function destroy($postId)
	{
		return Post::destroy($postId);
	}

	public function update($postId, array $postDetail)
	{
		return Post::whereId($postId)->update($postDetail);
	}
}