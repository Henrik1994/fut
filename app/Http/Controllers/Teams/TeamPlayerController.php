<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team\TeamPlayers;
use App\Models\Team\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamPlayerController extends Controller
{
    public function index($id)
    {
        $results = TeamPlayers::all();
        $teams = Team::all();
        $team_id = Team::find($id);
        return view('admin.Team.team_player',compact('results','teams','team_id'));
    }
    public function team_pleyers_set(Request $request)
    {
        $alldata = [
            'team_id'=>$request['team_id'],
            'name'=>$request['name'],
            'nationality'=>$request['nationality'],
            'position'=>$request['position']
        ];
        TeamPlayers::create($alldata);
        return redirect()->back();
    }

    public function  team_pleyers_edit(Request $request)
    {

        $results_update = TeamPlayers::find($request['results_id']);
        $results_update->team_id =$request['team_id'];
        $results_update->name =$request['name'];
        $results_update->nationality =$request['nationality'];
        $results_update->position = $request['position'];
        $results_update->save();

        return redirect()->back();
    }

    public function team_pleyers_del($id)
    {

        $delete = TeamPlayers::find($id);
        $delete->delete();

        return redirect()->back();

    }
}
