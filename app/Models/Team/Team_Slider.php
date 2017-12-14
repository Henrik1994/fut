<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class Team_Slider extends Model
{
    protected $table = 'team__sliders';
    protected $fillable = [
        'team_id','image'
    ];


    public function Team()
    {
        return $this->belongsTo('App\Models\Team\Team');
    }
}
