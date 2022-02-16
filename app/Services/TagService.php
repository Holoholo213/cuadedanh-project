<?php

namespace App\Services;
use App\Helpers\SlugHelper;
use App\Models\Tag;

class TagService {

	private $slugHelper;
	public function __construct(SlugHelper $slugHelper)
	{
		$this->slugHelper = $slugHelper;
	}

	public function getAllTag(){
		return Tag::all();
	}

	public function tagHandling($data){
		$tagIdArray = [];
		foreach($data as $item){
			$tagSlug = $this->slugHelper->slugName($item);
			$tagExist = $this->checkTagExist($tagSlug);
			if($tagExist){
				array_push($tagIdArray, $tagExist->id);
			} else {
				$fields = [
					'name' => $item,
					'slug' => $tagSlug
				];
				$newTag = $this->createTag($fields);
				array_push($tagIdArray, $newTag->id);
			}
		}
		return $tagIdArray;
	}
	
	private function checkTagExist($slug){
		return Tag::where('slug', $slug)->first();
	}

	public function createTag($fields){
		$tagSlug = $this->slugHelper->slugName($fields["name"]);
		$data = [
			"name" => $fields["name"],
			"slug" => $tagSlug
		];
		return Tag::create($data);
	}

	public function updateTag($tagId, $data){
		$tagSlug = $this->slugHelper->slugName($data["name"]);
		$fields = [
			"name" => $data["name"],
			"slug" => $tagSlug
		];
		return Tag::whereId($tagId)->update($fields);
	}

	public function destroyTag($tagId){
		return Tag::destroy($tagId);
	}
}