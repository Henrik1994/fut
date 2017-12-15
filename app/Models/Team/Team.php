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
    public function Team_news()
    {
        return $this->hasMany('App\Models\Team\TeamNews');
    }
    public function Team_next()
    {
        return $this->hasMany('App\Models\Team\TeamNext');
    }
    public function Team_results()
    {
        return $this->hasMany('App\Models\Team\TeamResults');
    }
    public function Team_player()
    {
        return $this->hasMany('App\Models\Team\TeamPlayers');
    }
}
