<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rdvs extends Model
{
    public $fillable=[
        'user_id'
        ,'professional_id'
        ,'rdv_type_id'
        ,'date'
        ,'description'
        ,'status'
    ];
}
