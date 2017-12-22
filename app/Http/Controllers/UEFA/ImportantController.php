<?php

namespace App\Http\Controllers\UEFA;

use App\Models\UEFA\Important;
use App\Models\Team\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ImportantController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $importants = Important::OrderBy('id','desc')->get();
        return view('admin.UEFA.important',compact('importants','teams'));
    }
    public function important_set(Request $request)
    {
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();

        if(!$request['video'] == "") {
            $cat = $request->video;
            $exp = explode(" ", $cat);
            $video = substr($exp[3], 5, -1);
        }else{
            $video = null;
        }
            $alldata = [
                'title'=>$request['title'],
                'description'=>$request['description'],
                'image'=> $filename,
                'video'=>$video
            ];

                Important::create($alldata);
                return redirect()->back();
    }

    public function  update_important(Request $request)
    {
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();

        if(!$request['video'] == "") {
            $cat = $request->video;
            $exp = explode(" ", $cat);
            $video = substr($exp[3], 5, -1);
        }else{
            $video = null;
        }
            $update = Input::all();
            $important_update = Important::find($update['important_id']);
            $important_update->title =$update['title'];
            $important_update->description =$update['description'];
            $important_update->image = $filename;
            $important_update->video = $video;
            $important_update->save();

        return redirect()->back();
    }


    public function delete_importrant($id){

        $delete = Important::find($id);
        $delete->delete();

        return redirect()->back();

    }
}
