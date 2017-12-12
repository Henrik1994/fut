<?php

namespace App\Models\UEFA;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected  $table = 'news';
    protected $fillable = [
        'title','description','image','video','created_at'
    ];
}
