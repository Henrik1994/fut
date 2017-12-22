<?php

namespace App\Http\Controllers;

use App\Models\Team\Team;
use App\Models\Team\TeamImportant;
use App\Models\Team\TeamNews;
use App\Models\UEFA\Important;
use App\Models\UEFA\News;
use App\Models\UEFA\Video;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function video($id)
    {

        $videos = Video::find($id);
        $teams = Team::all();


        return view('single.vid_single', compact('teams', 'videos'));
    }
    public function news($id)
    {

        $news = News::find($id);
        $teams = Team::all();


        return view('single.news_single', compact('teams', 'news'));
    }
    public function important($id)
    {

        $important = Important::find($id);
        $teams = Team::all();


        return view('single.important_single', compact('teams', 'important'));
    }
    public function team_news($id)
    {

        $news = TeamNews::find($id);
        $teams = Team::all();


        return view('single.team_news', compact('teams', 'news'));
    }
    public function team_important($id)
    {

        $team_important = TeamImportant::find($id);
        $teams = Team::all();


        return view('single.team_important', compact('teams', 'team_important'));
    }
}
