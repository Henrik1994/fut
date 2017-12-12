<?php

namespace App\Http\Controllers;

use App\Interesting;
use App\Read;
use App\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InterestingController extends Controller
{
    public function index()
    {
        $interestings = Interesting::OrderBy('id','desc')->get();
        return view('admin.interesting',compact('interestings'));
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
        Interesting::create($alldata);
        return redirect()->back();
    }

    public function  update_interesting(Request $request)
    {
        if(!$request['file'] == '') {
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }
        $update = Input::all();
        $interesting_update = Interesting::find($update['interesting_id']);
        if(isset($filename)){
            $interesting_update->title =$update['title'];
            $interesting_update->description =$update['description'];
            $interesting_update->image = $filename;
            $interesting_update->video = $update['video'];
            $interesting_update->save();
        } else{
            $interesting_update->title =$update['title'];
            $interesting_update->description =$update['description'];
            $interesting_update->image = '';
            $interesting_update->video = $update['video'];
            $interesting_update->save();
        }


        return redirect()->back();
    }


    public function delete_interesting($id){

        $delete = Interesting::find($id);
        $delete->delete();

        return redirect()->back();

    }

    public function add_interesting_to_slider($id)
    {
        $interesting = Interesting::find($id);
        $slider = new Welcome() ;
        $slider->title = $interesting['title'];
        $slider->description = $interesting['description'];
        $slider->image = $interesting['image'];
        if($interesting['video'] != ''){
            $slider->video = $interesting['video'];
        }
        $slider->save();

        $interesting->delete();

        return redirect()->back();

    }
    public function add_interesting_to_read_more($id)
    {
        $interesting = Interesting::find($id);
        $read = new Read();
        $read->title = $interesting['title'];
        $read->description = $interesting['description'];
        $read->image = $interesting['image'];
        if($interesting['video'] != ''){
            $read->video = $interesting['video'];
        }
        $read->save();
        $interesting->delete();

        return redirect()->back();
    }
}
