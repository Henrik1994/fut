<?php

namespace App\Models\UEFA;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = [
        'title','description','video','created_at'
    ];
}
