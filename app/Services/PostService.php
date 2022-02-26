<?php

namespace App\Services;
use App\Repositories\PostRepository;
use App\Helpers\SlugHelper;
use App\Helpers\ImageHelper;
use App\Models\Post;
use App\QueryFilter\Title;
use DOMDocument;
use Illuminate\Pipeline\Pipeline;
use Intervention\Image\ImageManagerStatic as Image;
use PhpParser\Node\Stmt\TryCatch;

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
		$posts = $this->postRepository->getAll();
		$posts = $this->filters();
		return $posts;
	}

	public function getById($postId){
		return $this->postRepository->getById($postId);
	}

	public function createPost(array $data){

		$slug = $this->slugHelper->slugName($data["title"]);

		$fields = [
			"title" => $data["title"],
			"slug" => $slug,
			"category_id" => $data["category_id"],
			"description" => $data["description"],
			"published_at" => $data["published_at"],
			"keywords" => $data["keyword"]
		];

		if(isset($data["publish"])){
			$fields["publish"] = "1";
		} 
		if(isset($data["favorite"])){
			$fields["favorite"] = "1";
		} 

		if(isset($data["thumb_img"])){
			$fileName = $this->imageHelper->storeImage($data["thumb_img"], "posts/thumb");
			$fields["thumb_img"] = $fileName;
		}

		return $this->postRepository->create($fields);
	}

	public function updatePost($postId, array $data){

		$slug = $this->slugHelper->slugName($data["title"]);

		$fields = [
			"title" => $data["title"],
			"slug" => $slug,
			"category_id" => $data["category_id"],
			"description" => $data["description"],
			"published_at" => $data["published_at"],
			"keyword" => $data["keyword"]
		];

		if(isset($data["publish"])){
			$fields["publish"] = $data["publish"];
		} 
		if(isset($data["favorite"])){
			$fields["favorite"] = $data["favorite"];
		}

		if(isset($data["thumb_img"])){
			$currentPost = Post::find($postId);
			if(isset($currentPost->thumb_img)){
				unlink($currentPost->thumb_img);
			}
			$fileName = $this->imageHelper->storeImage($data["thumb_img"], "posts/thumb");
			$fields["thumb_img"] = $fileName;
		}
		return $this->postRepository->update($postId, $fields);
	}

	public function destroyPost($postId){
		return $this->postRepository->destroy($postId);
	}

	public static function filters(){
		return app(Pipeline::class)->send(Post::query())->through([Title::class])->thenReturn()->get();
	}

	private static function imageHandle($data){
		$dom = new DOMDocument();
		@$dom->loadHtml(mb_convert_encoding($data, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
		foreach($imageFile as $item => $img){
            $src = $img->getAttribute('src');
            if(preg_match("/data:image/", $src)){
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $filename = uniqid();
				$filepath = "/posts/images/".$filename.".".$mimetype;
				try {
					$image = Image::make($src)
										->resize(300, null, function ($constraint) {
											$constraint->aspectRatio();
										})
										->encode($mimetype, 100)
										->save(public_path($filepath));
				} catch (\Throwable $th) {
					dd($th);
				}
				
				$new_src = asset($filepath);
				$img->removeAttribute('src');
				$img->setAttribute('src', $new_src);
            }
		}
		return $dom->saveHTML();
	}
}