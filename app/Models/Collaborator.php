<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;


class Collaborator extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;

    public $fillable = [
        'name',
        'email',
        'password',
        'position',
    ];

    protected $table = 'collaborators';

    protected $guard = 'collaborators';
}
