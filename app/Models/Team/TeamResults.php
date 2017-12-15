<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamResults extends Model
{
    protected $table = 'team_results';
    protected $fillable = [
       'team_id','team1','res1','res2','team2'
    ];
}
