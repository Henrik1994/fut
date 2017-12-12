<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
      'team','image','link'
    ];
}
