<?php

namespace App\Models\UEFA;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $table = 'results';
    protected $fillable = [
        'team1','res1','res2','team2'
    ];
}
