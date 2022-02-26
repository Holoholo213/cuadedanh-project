<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        "message",
        "file_name",
        "line",
        "fixed",
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at"
    ];
}
