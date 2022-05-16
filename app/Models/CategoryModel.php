<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    //model category
    protected $table = 'category';
    protected $guarded = ['id'];

    public $timestamps = false;
}
