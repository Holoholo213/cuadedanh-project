<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory;
    use SoftDeletes;
        
    protected $fillable = [
        'name',
        'slug'
    ];

    protected $hidden = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function amount(){
        return $this->belongsToMany(Post::class)->withPivot('values');
    }
}