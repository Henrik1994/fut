<?php

namespace App\Http\Controllers;

use App\Models\Team\TeamImportant;
use App\Models\Team\TeamNews;
use App\Models\UEFA\Important;
use App\Models\UEFA\News;
use App\Models\UEFA\Video;
use App\User;
use Illuminate\Http\Request;
use App\Models\Team\Team;

class LayoutController extends Controller
{

    public function index()
    {
        $teams = Team::OrderBy('id','asc')->get();
        return  view('layouts.admin',compact('teams'));
    }
    public function single()
    {
       $important_all = Important::OrderBy('id','desc')->get()->take(3);
       $news_all = News::OrderBy('id','desc')->get()->take(4);
       $video_all= Video::all();
       $team_important_all = TeamImportant::all();
       $team_news_all = TeamNews::all();

       $data = ['important' => $important_all,'news' => $news_all,'video' => $video_all,'team_important' => $team_important_all,'team_news' => $team_news_all ];

       return view('layouts.single',compact('data','news_all','important_all'));

    }
    public function information()
    {
        $teams = Team::OrderBy('id','asc')->get();
        return  view('admin.information',compact('teams'));
    }
    public function role()
    {
        $teams = Team::OrderBy('id','asc')->get();
        $users  = User::all();
        return  view('admin.warning_role',compact('teams','users'));
    }
    public function role_set($id)
    {
        $users  = User::find($id);
        ($users->role == 0)?$users->role = 1:$users->role = 0;
        $users->save();
        return  redirect()->back();
    }


}
