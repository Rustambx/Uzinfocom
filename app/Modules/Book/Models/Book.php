<?php

namespace App\Modules\Book\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Book\Traits\Translate;

class Book extends Model
{
    use Translate;

    protected $fillable = ['name', 'price', 'description', 'author', 'release_year', 'text', 'name_en', 'description_en', 'author_en', 'text_en'];
}
