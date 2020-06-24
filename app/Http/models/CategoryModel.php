<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    //
    protected $table = 'category';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
