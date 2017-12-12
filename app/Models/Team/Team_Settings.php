<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class Team_Settings extends Model
{
        protected $table = 'team__settings';
        protected $fillable = [
            'team_id','categories'
        ];
}
