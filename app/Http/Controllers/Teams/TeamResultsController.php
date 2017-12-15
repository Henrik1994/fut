<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team\Team;
use App\Models\Team\TeamResults;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamResultsController extends Controller
{
    public function index($id)
    {
        $results = TeamResults::OrderBy('id','desc')->get();
        $teams = Team::all();
        $team_id = Team::find($id);
        return view('admin.Team.team_results',compact('results','teams','team_id'));
    }
    public function team_results_set(Request $request)
    {
        $alldata = [
            'team_id'=>$request['team_id'],
            'team1'=>$request['team1'],
            'res1'=>$request['res1'],
            'res2'=> $request['res2'],
            'team2'=>$request['team2']
        ];
        TeamResults::create($alldata);
        return redirect()->back();
    }

    public function  team_results_edit(Request $request)
    {

        $results_update = TeamResults::find($request['results_id']);
        $results_update->team_id =$request['team_id'];
        $results_update->team1 =$request['team1'];
        $results_update->res1 =$request['res1'];
        $results_update->res2 = $request['res2'];
        $results_update->team2 =$request['team2'];
        $results_update->save();

        return redirect()->back();
    }

    public function team_results_del($id)
    {

        $delete = TeamResults::find($id);
        $delete->delete();

        return redirect()->back();

    }
}
