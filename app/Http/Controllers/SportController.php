<?php

namespace App\Http\Controllers;

use App\Read;
use App\Sport;
use App\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::OrderBy('id','desc')->get();
        return view('admin.sport',compact('sports'));
    }

    public function set_post(Request $request)
    {

        if(!$request['file'] == ''){
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }
        if(isset($filename)){
            $alldata = [
                'title'=>$request['title'],
                'description'=>$request['description'],
                'image'=> $filename,
                'video'=>$request['video']
            ];
        }else{
            $alldata = [
                'title'=>$request['title'],
                'description'=>$request['description'],
                'image'=> '',
                'video'=>$request['video']
            ];
        }
        Sport::create($alldata);
        return redirect()->back();
    }

    public function  update_sport(Request $request)
    {
        if(!$request['file'] == '') {
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }
        $update = Input::all();
        $sport_update = Sport::find($update['sport_id']);
        if(isset($filename)){
            $sport_update->title =$update['title'];
            $sport_update->description =$update['description'];
            $sport_update->image = $filename;
            $sport_update->video = $update['video'];
            $sport_update->save();
        } else{
            $sport_update->title =$update['title'];
            $sport_update->description =$update['description'];
            $sport_update->image = '';
            $sport_update->video = $update['video'];
            $sport_update->save();
        }


        return redirect()->back();
    }


    public function delete_sport($id){

        $delete = Sport::find($id);
        $delete->delete();

        return redirect()->back();

    }

    public function add_sport_to_slider($id)
    {
        $sport = Sport::find($id);
        $slider = new Welcome();
        $slider->title = $sport['title'];
        $slider->description = $sport['description'];
        $slider->image = $sport['image'];
        if($sport['video'] != ''){
            $slider->video = $sport['video'];
        }
        $slider->save();

        $sport->delete();

        return redirect()->back();

    }
    public function add_sport_to_read_more($id)
    {
        $sport = Sport::find($id);
        $read = new Read();
        $read->title = $sport['title'];
        $read->description = $sport['description'];
        $read->image = $sport['image'];
        if($sport['video'] != ''){
            $read->video = $sport['video'];
        }
        $read->save();
        $sport->delete();

        return redirect()->back();
    }
}
