<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team\Team;
use App\Models\Team\Team_Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::OrderBy('id','desc')->get();
        return view('admin.teams',compact('teams'));
    }

    public function team_set(Request $request)
    {
        if(isset($request['file'])) {
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }
        if(!$request['link'] == null) {
            $alldata = [
                'team' => $request['team'],
                'image' => '',
                'link' => $request['link']
            ];
        }else {
            $alldata = [
                'team' => $request['team'],
                'image' => $filename,
                'link' => ''
            ];
        }
        Team::create($alldata);
        return redirect()->back();
    }
    public function team_edit(Request $request)
    {

        if(isset($request['file'])) {
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }

        if(!$request['link'] == null) {
            $team_up = Team::find($request['team_id_hid']);
            $team_up->team = $request['team'];
            $team_up->image = '';
            $team_up->link = $request['link'];
            $team_up->save();
        }else {
            $team_up = Team::find($request['team_id_hid']);
            $team_up->team = $request['team'];
            $team_up->image = $filename;
            $team_up->link = '';
            $team_up->save();
        }
        return redirect()->back();
    }
    public function team()
    {
      return view('admin.team_settings');
    }

    public function delete_team($id)
    {
        $team = Team::find($id);
        $team->delete();

        return redirect()->back();
    }

}
