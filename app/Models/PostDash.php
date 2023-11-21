<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDash extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'image',
        'text',
        'link'
    ];

    protected $table = 'post_dashes';
}
