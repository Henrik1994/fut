<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
      'team','image','link'
    ];

    public function Team_set()
    {
        return $this->hasMany('App\Models\Team\Team_Slider');
    }
}
