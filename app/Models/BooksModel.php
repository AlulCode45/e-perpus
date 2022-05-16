<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksModel extends Model
{
    use HasFactory;
    //model for books
    protected $table = 'books';
    public $guarded = [];
    public $timestamps = false;
}
