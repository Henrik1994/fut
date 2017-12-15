<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamPlayers extends Model
{
    protected $table = 'team_players';
    protected $fillable = [
        'team_id','name','nationality','position'
    ];
}
