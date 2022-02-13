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

	private function createTag($fields){
		return Tag::create($fields);
	}
}