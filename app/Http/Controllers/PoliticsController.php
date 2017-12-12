<?php

namespace App\Http\Controllers;

use App\Politics;
use App\Read;
use App\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PoliticsController extends Controller
{
    public function index()
    {
        $politicss = Politics::OrderBy('id',"desc")->get();
        return view('admin.politics',compact('politicss'));
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
        Politics::create($alldata);
        return redirect()->back();
    }

    public function  update_politics(Request $request)
    {
        if(!$request['file'] == '') {
            $destinationPath = 'image';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }
        $update = Input::all();
        $politics_update = Politics::find($update['politics_id']);
        if(isset($filename)){
            $politics_update->title =$update['title'];
            $politics_update->description =$update['description'];
            $politics_update->image = $filename;
            $politics_update->video = $update['video'];
            $politics_update->save();
        } else{
            $politics_update->title =$update['title'];
            $politics_update->description =$update['description'];
            $politics_update->image = '';
            $politics_update->video = $update['video'];
            $politics_update->save();
        }


        return redirect()->back();
    }


    public function delete_politics($id){

        $delete = Politics::find($id);
        $delete->delete();

        return redirect()->back();

    }
    public function add_politics_to_slider($id)
    {
        $politics = Politics::find($id);
        $slider = new Welcome();
        $slider->title = $politics['title'];
        $slider->description = $politics['description'];
        $slider->image = $politics['image'];
        if($politics['video'] != ''){
            $slider->video = $politics['video'];
        }
        $slider->save();

        $politics->delete();

        return redirect()->back();

    }
    public function add_politics_to_read_more($id)
    {
        $politics = Politics::find($id);
        $read = new Read();
        $read->title = $politics['title'];
        $read->description = $politics['description'];
        $read->image = $politics['image'];
        if($politics['video'] != ''){
            $read->video = $politics['video'];
        }
        $read->save();
        $politics->delete();

        return redirect()->back();
    }
}
