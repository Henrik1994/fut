<?php

namespace App\Http\Controllers;

use App\Models\Team\Team;
use Illuminate\Http\Request;

class TeamIndexController extends Controller
{
 public function index($id)
     {
         $team_temas = Team::find($id);
//         dd($team_temas);
         $teams = Team::all()->take(10);
         return view('club',compact('team_temas','teams'));
     }
     public function all()
     {
         $temas = Team::all();
         return view('team_all',compact('temas'));
     }
}
