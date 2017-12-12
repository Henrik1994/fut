<?php

namespace App\Http\Controllers\UEFA;

use App\Models\UEFA\GroupSelect;
use App\Models\UEFA\Grups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GroupsController extends Controller
{
  public function index()
  {
      $groups = GroupSelect::with('Groups')->get();

      return view('admin.UEFA.grups', compact('groups'));
  }

  public function groups_select(Request $request){
      $sel = new GroupSelect();
      $sel->group = $request->sel;
      $sel->save();

      return redirect()->back();
  }
  public function groups_set(Request $request)
  {
      if(isset($request['file'])) {
          $destinationPath = 'image';
          $file = $request->file('file');
          $file->move($destinationPath, $file->getClientOriginalName());
          $filename = $file->getClientOriginalName();
      }
      if(!$request['link'] == null) {
          $alldata = [
              'groupselect_id' => $request['grups_id'],
              'image' => $request['link'],
              'name' => $request['team1'],
              'p' =>  $request['p'],
              'pts' =>  $request['pts']
          ];
      }else {
          $alldata = [
              'groupselect_id' => $request['grups_id'],
              'image' => $filename,
              'name' => $request['team1'],
              'p' => $request['p'],
              'pts' => $request['pts']
          ];
      }
      Grups::create($alldata);
      return redirect()->back();
  }

  public function update_groups_select(Request $request)
  {
      $update = Input::all();
      $grups_update = GroupSelect::find($update['sel_id']);
      $grups_update->group =$update['sel'];

      $grups_update->save();

      return redirect()->back();
  }

  public function update_groups_group(Request $request)
  {
      if(isset($request['file'])) {
          $destinationPath = 'image';
          $file = $request->file('file');
          $file->move($destinationPath, $file->getClientOriginalName());
          $filename = $file->getClientOriginalName();
      }
      if(!$request['link'] == null) {
          $up = Grups::find($request['up_id_hid']);
          $up->groupselect_id = $request['gr_id'];
          $up->image = $request['link'];
          $up->name = $request['team1'];
          $up->p = $request['p'];
          $up->pts = $request['pts'];
          $up->save();
      }else {
          $up = Grups::find($request['up_id_hid']);
          $up->groupselect_id = $request['gr_id'];
          $up->image = $filename;
          $up->name = $request['team1'];
          $up->p = $request['p'];
          $up->pts = $request['pts'];
          $up->save();
      }
      return redirect()->back();
  }

public function delete_groups($id)
{
    $del = GroupSelect::find($id);
    $del->delete();

    return redirect()->back();
}

public function delete_groups_group($id)
{
    $del = Grups::find($id);
    $del->delete();

    return redirect()->back();
}


}
