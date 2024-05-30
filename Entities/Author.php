<?php

namespace Modules\Author\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'author';
    protected $connection = 'author';

    protected $fillable = [
        'name',
        'birthday',
        'avatar_path'
    ];

}
