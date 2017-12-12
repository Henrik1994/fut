<?php

namespace App\Models\UEFA;

use Illuminate\Database\Eloquent\Model;

class Grups extends Model
{
    protected $table = 'grups';
    protected  $fillable = [
       'groupselect_id','image','name','p','pts'
    ];

    public function GroupSelect()
    {
        return $this->belongsTo('App\Models\UEFA\GroupSelect','id','groupselect_id');
    }

}
