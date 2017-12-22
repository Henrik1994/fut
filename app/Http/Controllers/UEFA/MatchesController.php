<?php

namespace App\Http\Controllers\UEFA;

use App\Models\UEFA\Matches;
use App\Models\Team\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MatchesController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $matches = Matches::OrderBy('id','desc')->get();
        return view('admin.UEFA.matches',compact('matches','teams'));
    }
    public function matches_set(Request $request)
    {
        $alldata = [
            'date'=>$request['date'],
            'team1'=>$request['team1'],
            'team2'=>$request['team2']
        ];
        Matches::create($alldata);
        return redirect()->back();
    }
    public function  update_matches(Request $request)
    {
        $update = Input::all();
        $matches_update = Matches::find($update['matches_id_hid']);
        $matches_update->date =$update['date'];
        $matches_update->team1 =$update['team1'];
        $matches_update->team2 =$update['team2'];
        $matches_update->save();

        return redirect()->back();
    }

    public function delete_matches($id){

        $delete = Matches::find($id);
        $delete->delete();

        return redirect()->back();

    }
    
}
