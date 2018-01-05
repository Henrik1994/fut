<?php

namespace App\Models\UEFA;

use Illuminate\Database\Eloquent\Model;

class Important extends Model
{
    protected $table = 'importants';
    protected $fillable = [
        'title','description','image','video','view','created_at'
    ];
}
