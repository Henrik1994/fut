<?php

namespace App\Http\Controllers;

use App\Read;
use App\Top;
use App\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TopController extends Controller
{
    public function index()
    {
        $tops = Top::OrderBy('id','desc')->get();
        return view('admin.top',compact('tops'));
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
        Top::create($alldata);
        return redirect()->back();
    }

    public function  update_top(Request $request)
    {
        if(!$request['file'] == '') {
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }
        $update = Input::all();
        $top_update = Top::find($update['top_id']);
      if(isset($filename)){
          $top_update->title =$update['title'];
          $top_update->description =$update['description'];
          $top_update->image = $filename;
          $top_update->video = $update['video'];
          $top_update->save();
      } else{
          $top_update->title =$update['title'];
          $top_update->description =$update['description'];
          $top_update->image = '';
          $top_update->video = $update['video'];
          $top_update->save();
        }


        return redirect()->back();
    }


    public function delete_top($id){

        $delete = Top::find($id);
        $delete->delete();

        return redirect()->back();

    }

    public function add_top_to_slider($id)
    {
        $top = Top::find($id);
        $slider = new Welcome();
        $slider->title = $top['title'];
        $slider->description = $top['description'];
        $slider->image = $top['image'];
        if($top['video'] != ''){
            $slider->video = $top['video'];
        }
        $slider->save();
        $top->delete();

        return redirect()->back();
    }

    public function add_top_to_read_more($id)
    {
        $top = Top::find($id);
        $read = new Read();
        $read->title = $top['title'];
        $read->description = $top['description'];
        $read->image = $top['image'];
      if($top['video'] != ''){
          $read->video = $top['video'];
      }
        $read->save();
        $top->delete();

        return redirect()->back();
    }
}
