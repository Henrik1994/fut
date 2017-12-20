<?php

namespace App\Http\Controllers;

use App\Models\Team\Team;
use App\Models\Team\Team_Slider;
use App\Models\Team\TeamImportant;
use App\Models\Team\TeamNews;
use App\Models\Team\TeamNext;
use App\Models\Team\TeamPlayers;
use App\Models\Team\TeamResults;
use Illuminate\Http\Request;

class TeamIndexController extends Controller
{
 public function index($id)
     {
         $team_importants = TeamImportant::OrderBy('id','desc')->get();
         $team_news = TeamNews::OrderBy('id','desc')->get();
         $team_nexts = TeamNext::OrderBy('id','desc')->get();
         $team_players = TeamPlayers::OrderBy('id','desc')->get();
         $team_results = TeamResults::OrderBy('id','desc')->get();
         $team_temas = Team::find($id);
         $teams = Team::all()->take(10);
         $team_slider = Team_Slider::OrderBy('id','desc')->get();


         return view('club',compact('team_importants','team_temas','team_news','team_nexts','team_players','team_results','team_slider','teams'));
     }
}
