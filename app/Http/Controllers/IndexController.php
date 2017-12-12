<?php

namespace App\Http\Controllers;

use App\Models\UEFA\Important;
use App\Models\UEFA\Matches;
use App\Models\UEFA\News;
use App\Models\UEFA\Results;
use App\Models\UEFA\Video;
use App\Models\UEFA\GroupSelect;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public  function index()
    {
        $importants =  Important::OrderBy('id','desc')->take(3)->get();
        $videos =  Video::OrderBy('id','desc')->take(1)->get();
        $news = News::OrderBy('id','desc')->get();
        $results = Results::OrderBy('id','desc')->take(15)->get();
        $matches = Matches::OrderBy('id','desc')->get();
        $groups = GroupSelect::with('Groups')->get();

        return view('index',compact('news','videos','importants','results','matches','groups'));
    }
}