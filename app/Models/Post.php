<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'description',
        'thumb_img',
        'content',
        'publish',
        'favorite',
        'published_at'
    ];

    protected $hidden = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function format(){
        return[
            "title" => $this->title,
            "tag" => $this->tags,
            "category" => $this->category->name,
            "description" => $this->description,
            "thumb_img" => $this->thumb_img,
            "content" => $this->content,
            "publish" => $this->publish,
            "favorite" => $this->favorite,
            "published_at" => $this->published_at,
            "subContent" => $this->subContent,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }

    public function dashboardFormat(){
        return [
            "id" => $this->id,
            "title" => $this->title,
        ];
    }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }

    public function subContent(){
        return $this->hasMany(SubContent::class, 'post_id', 'id')->select("description", "image_dir");
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}