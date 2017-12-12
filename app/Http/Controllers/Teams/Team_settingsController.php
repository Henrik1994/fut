<?php

namespace App\Http\Controllers\Teams;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Team_settingsController extends Controller
{
    public function index()
    {
        return view('admin.team_settings');
    }
}
