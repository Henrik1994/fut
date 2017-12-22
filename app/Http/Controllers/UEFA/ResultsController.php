<?php

namespace App\Http\Controllers\UEFA;

use App\Models\UEFA\Results;
use App\Models\Team\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ResultsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $results = Results::OrderBy('id','desc')->get();
      return view('admin.UEFA.results',compact('results','teams'));
    }
    public function results_set(Request $request)
    {
        $alldata = [
            'team1'=>$request['team1'],
            'res1'=>$request['res1'],
            'res2'=> $request['res2'],
            'team2'=>$request['team2']
        ];
        Results::create($alldata);
        return redirect()->back();
    }

    public function  update_results(Request $request)
    {
        $update = Input::all();
        $results_update = Results::find($update['results_id']);
        $results_update->team1 =$update['team1'];
        $results_update->res1 =$update['res1'];
        $results_update->res2 = $update['res2'];
        $results_update->team2 =$update['team2'];
        $results_update->save();

        return redirect()->back();
    }

    public function delete_results($id){

        $delete = Results::find($id);
        $delete->delete();

        return redirect()->back();

    }
}
