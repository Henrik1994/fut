<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team\Team;

class LayoutController extends Controller
{

    public function index()
    {
        $teams = Team::OrderBy('id','asc')->get();
        return  view('layouts.admin',compact('teams'));
    }

}
