<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team\TeamImportant;
use App\Models\Team\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamImportantController extends Controller
{
    public function index($id)
    {
        $importants = TeamImportant::OrderBy('id','desc')->get();
        $teams = Team::all();
        $teams_id = Team::find($id);
        return view('admin.Team.team_important',compact('importants','teams','teams_id'));
    }
    public function team_important_set(Request $request)
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

        TeamImportant::create($alldata);
        return redirect()->back();
    }

    public function  team_important_edit(Request $request)
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
        $important_update = TeamImportant::find($request['important_id']);
        $important_update->team_id =$request['team_id'];
        $important_update->title =$request['title'];
        $important_update->description =$request['description'];
        $important_update->image = $filename;
        $important_update->video = $video;
        $important_update->save();

        return redirect()->back();
    }


    public function team_important_del($id){

        $delete = TeamImportant::find($id);
        $delete->delete();

        return redirect()->back();

    }
}
