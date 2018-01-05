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
        $videos->view = $videos['view'] + 1;
        $videos->save();
        $important_all = Important::OrderBy('id','desc')->get()->take(3);
        $news_all = News::OrderBy('id','desc')->get()->take(4);
        $video_all= Video::all();
        $team_important_all = TeamImportant::all();
        $team_news_all = TeamNews::all();
        $data = ['important' => $important_all,'news' => $news_all,'video' => $video_all,'team_important' => $team_important_all,'team_news' => $team_news_all ];
        $teams = Team::all();


        return view('single.vid_single', compact('teams', 'videos','data','news_all','important_all'));
    }
    public function news($id)
    {

        $news = News::find($id);
        $news->view = $news['view'] + 1;
        $news->save();
        $teams = Team::all();
        $important_all = Important::OrderBy('id','desc')->get()->take(3);
        $news_all = News::OrderBy('id','desc')->get()->take(4);
        $video_all= Video::all();
        $team_important_all = TeamImportant::all();
        $team_news_all = TeamNews::all();
        $data = ['important' => $important_all,'news' => $news_all,'video' => $video_all,'team_important' => $team_important_all,'team_news' => $team_news_all ];


        return view('single.news_single', compact('teams', 'news','data','news_all','important_all'));
    }
    public function important($id)
    {

        $important = Important::find($id);
        $important->view = $important['view'] + 1;
        $important->save();
        $teams = Team::all();
        $important_all = Important::OrderBy('id','desc')->get()->take(3);
        $news_all = News::OrderBy('id','desc')->get()->take(4);
        $video_all= Video::all();
        $team_important_all = TeamImportant::all();
        $team_news_all = TeamNews::all();
        $data = ['important' => $important_all,'news' => $news_all,'video' => $video_all,'team_important' => $team_important_all,'team_news' => $team_news_all ];


        return view('single.important_single', compact('teams', 'important','data','news_all','important_all'));
    }
    public function team_news($id)
    {

        $news = TeamNews::find($id);
        $news->view = $news['view'] + 1;
        $news->save();
        $teams = Team::all();
        $important_all = Important::OrderBy('id','desc')->get()->take(3);
        $news_all = News::OrderBy('id','desc')->get()->take(4);
        $video_all= Video::all();
        $team_important_all = TeamImportant::all();
        $team_news_all = TeamNews::all();
        $data = ['important' => $important_all,'news' => $news_all,'video' => $video_all,'team_important' => $team_important_all,'team_news' => $team_news_all ];


        return view('single.team_news', compact('teams', 'news','data','news_all','important_all'));
    }
    public function team_important($id)
    {

        $team_important = TeamImportant::find($id);
        $team_important->view = $team_important['view'] + 1;
        $team_important->save();
        $teams = Team::all();
        $important_all = Important::OrderBy('id','desc')->get()->take(3);
        $news_all = News::OrderBy('id','desc')->get()->take(4);
        $video_all= Video::all();
        $team_important_all = TeamImportant::all();
        $team_news_all = TeamNews::all();
        $data = ['important' => $important_all,'news' => $news_all,'video' => $video_all,'team_important' => $team_important_all,'team_news' => $team_news_all ];


        return view('single.team_important', compact('teams', 'team_important','data','news_all','important_all'));
    }
}
