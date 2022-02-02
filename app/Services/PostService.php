<?php

namespace App\Services;
use App\Repositories\PostRepository;
use App\Helpers\SlugHelper;
use App\Helpers\ImageHelper;

class PostService {

	private $postRepository;
	private $slugHelper;
	private $imageHelper;
	public function __construct(PostRepository $postRepository, SlugHelper $slugHelper, ImageHelper $imageHelper)
	{
		$this->postRepository = $postRepository;
		$this->slugHelper = $slugHelper;
		$this->imageHelper = $imageHelper;
	}

	public function getAllPost(){
		return $this->postRepository->getAll();
	}

	public function getById($postId){
		return $this->postRepository->getById($postId);
	}

	public function createPost(array $data){
		$slug = $this->slugHelper->slugName($data["title"]);

		if(isset($data["publish"])){
			$data["publish"] = "1";
		} else {
			$data["publish"] = "0";
		}
		if(isset($data["favorite"])){
			$data["favorite"] = "1";
		} else {
			$data["favorite"] = "0";
		}
		$fields = [
			"title" => $data["title"],
			"slug" => $slug,
			"category_id" => $data["category_id"],
			"description" => $data["description"],
			"published_at" => $data["published_at"],
			"content" => $data["content"],
			"publish" => $data["publish"],
			"favorite" => $data["favorite"],
		];
		
		if(isset($data["thumb_img"])){
			$fileName = $this->imageHelper->storeImage($data["thumb_img"], "posts/image");
			$fields["thumb_img"] = $fileName;
		}
		return $this->postRepository->create($fields);
	}

	public function updatePost($postId, array $data){
		$slug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			"name" => $data["name"],
			"slug" => $slug
		];
		return $this->postRepository->update($postId, $data);
	}

	public function destroyPost($postId){
		return $this->postRepository->destroy($postId);
	}
}