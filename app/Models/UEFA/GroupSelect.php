<?php

namespace App\Models\UEFA;

use Illuminate\Database\Eloquent\Model;

    class GroupSelect extends Model
{
    protected $table = 'groupselects';
    protected $fillable = ['group'];

    public function Groups()
    {
        return $this->hasMany('App\Models\UEFA\Grups', 'groupselect_id', 'id');
    }
}
