<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamNews extends Model
{
    protected  $table = 'team_news';
    protected $fillable = [
        'team_id','title','description','image','video','view','created_at'
    ];

}
