<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team\Team;
use App\Models\Team\TeamNews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class TeamNewsController extends Controller
{
    public function index($id)
    {
        $news = TeamNews::OrderBy('id','desc')->get();
        $teams = Team::all();
        $team_ids = Team::find($id);

        return view('admin.Team.team_news',compact('news','teams','team_ids'));
    }

    public function team_news_set( Request $request)
    {
        $destinationPath = 'image';
        $file = $request->file('file');
        $file->move($destinationPath, $file->getClientOriginalName());
        $filename = $file->getClientOriginalName();

        if(!$request['video'] == "") {
            $cat = $request->video;
            $exp = explode(" ", $cat);
            $video = substr($exp[3], 5, -1);
        }else{
            $video = null;
        }
        $alldata = [
            'team_id'=>$request['team_id'],
            'title'=>$request['title'],
            'description'=>$request['description'],
            'image'=> $filename,
            'video'=>$video
        ];

        TeamNews::create($alldata);
        return redirect()->back();

    }
    public function  team_news_edit(Request $request)
    {
        $destinationPath = 'image';
        $file = $request->file('file');
        $file->move($destinationPath, $file->getClientOriginalName());
        $filename = $file->getClientOriginalName();

        if(!$request['video'] == "") {
            $cat = $request->video;
            $exp = explode(" ", $cat);
            $video = substr($exp[3], 5, -1);
        }else{
            $video = null;
        }

        $news_update = TeamNews::find($request['news_id']);
        $news_update->team_id =$request['team_id'];
        $news_update->title =$request['title'];
        $news_update->description =$request['description'];
        $news_update->image = $filename;
        $news_update->video = $video;
        $news_update->save();

        return redirect()->back();
    }


    public function team_news_del($id)
    {
        $derectory = public_path('image/');
        $delete = TeamNews::find($id);
        unlink($derectory.$delete->image);
        $delete->delete();

        return redirect()->back();

    }
}
