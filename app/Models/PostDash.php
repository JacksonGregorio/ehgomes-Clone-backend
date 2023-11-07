<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDash extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'title',
        'image',
        'text',
        'link'
    ];
}
