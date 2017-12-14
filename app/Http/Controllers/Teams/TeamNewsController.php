<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team\Team;
use App\Models\Team\TeamNews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class TeamNewsController extends Controller
{
    public function index(){
        $news = TeamNews::OrderBy('id','desc')->get();
        $teams = Team::all();
        return view('admin.Team.team_news',compact('news','teams'));
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

        $update = Input::all();
        $news_update = TeamNews::find($update['news_id']);
        $news_update->title =$update['title'];
        $news_update->description =$update['description'];
        $news_update->image = $filename;
        $news_update->video = $video;
        $news_update->save();



        return redirect()->back();
    }


    public function team_news_del($id){

        $delete = TeamNews::find($id);
        $delete->delete();

        return redirect()->back();

    }
}
