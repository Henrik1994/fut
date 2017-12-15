<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team\Team;
use Illuminate\Http\Request;
use App\Models\Team\TeamNext;
use App\Http\Controllers\Controller;

class TeamNextController extends Controller
{
    public function index($id)
    {
        $matches = TeamNext::OrderBy('id','desc')->get();
        $teams = Team::all();
        $team_id = Team::find($id);
        return view('admin.Team.team_next',compact('matches','teams','team_id'));
    }
    public function team_next_set(Request $request)
    {
        $alldata = [
            'team_id'=>$request['team_id'],
            'date'=>$request['date'],
            'team1'=>$request['team1'],
            'team2'=>$request['team2']
        ];
        TeamNext::create($alldata);
        return redirect()->back();
    }
    public function  team_next_edit(Request $request)
    {
        $matches_update = TeamNext::find($request['matches_id_hid']);
        $matches_update->team_id =$request['team_id'];
        $matches_update->date =$request['date'];
        $matches_update->team1 =$request['team1'];
        $matches_update->team2 =$request['team2'];
        $matches_update->save();

        return redirect()->back();
    }

    public function team_next_del($id){

        $delete = TeamNext::find($id);
        $delete->delete();

        return redirect()->back();

    }
}
