<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public $fillable=[
        'name_subcategory'
        ,'category_id'
    ];

}
