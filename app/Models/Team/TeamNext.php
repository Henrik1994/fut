<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamNext extends Model
{
    protected $table = 'team_nexts';
    protected $fillable = [
        'team_id','date','team1','team2'
    ];
}
