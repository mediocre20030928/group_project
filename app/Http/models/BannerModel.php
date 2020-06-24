<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
