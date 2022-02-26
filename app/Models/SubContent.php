<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubContent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'post_id',
        'content',
        'image_dir',
        'img_descrip',
    ];

    protected $hidden = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}