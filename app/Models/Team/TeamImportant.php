<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamImportant extends Model
{
    protected $table = 'team_importants';
    protected $fillable = [
       'team_id','title','description','image','video','created_at'
    ];
}
