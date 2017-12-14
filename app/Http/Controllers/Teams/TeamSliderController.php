<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team\Team;
use App\Models\Team\Team_Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamSliderController extends Controller
{
    public function index($id)
    {
        $teams = Team::all();
        $rels = Team::find($id);
        return view('admin.Team.team_slider',compact('teams','rels'));
    }
    public function slider_set(Request $request)
    {
        $destinationPath = 'image';
        $file = $request->file('file');
        $file->move($destinationPath, $file->getClientOriginalName());
        $filename = $file->getClientOriginalName();

        $alldata = [
            'team_id' => $request['team_id'],
            'image' => $filename
        ];

        Team_Slider::create($alldata);
        return redirect()->back();
    }

    public function slider_edit(Request $request)
    {

        $destinationPath = 'image';
        $file = $request->file('file');
        $file->move($destinationPath, $file->getClientOriginalName());
        $filename = $file->getClientOriginalName();

        $up = Team_Slider::find($request['team_id_hid']);
        $up->team_id = $request['team_id'];
        $up->image = $filename;
        $up->save();

        return redirect()->back();
    }

    public function slider_del($id)
    {

            $del = Team_Slider::find($id);
            $del->delete();

            return redirect()->back();
    }
}
