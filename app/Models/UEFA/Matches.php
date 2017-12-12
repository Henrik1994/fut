<?php

namespace App\Models\UEFA;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    protected $table = 'matches';
    protected $fillable = [
        'date','team1','team2'
    ];
}
