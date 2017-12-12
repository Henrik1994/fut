<?php

namespace App\Http\Controllers;

use App\Top;
use App\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class WelcomeController extends Controller
{
 public function  index()
     {
         $sliders  = Welcome::OrderBy('id','desc')->get();
         return view('admin.welcome' ,compact('sliders'));
     }

      public function upload_slider(Request $request)
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
          Welcome::create($alldata);
          return redirect()->back();
      }

      public function update_slider(Request $request)
      {
          if(!$request['file'] == '') {
              $destinationPath = 'image';
              $file = $request->file('file');
              $file->move($destinationPath, $file->getClientOriginalName());
              $filename = $file->getClientOriginalName();
          }
          $update = Input::all();
          $slider_update = Welcome::find($update['top_id']);
          if(isset($filename)){
              $slider_update->title =$update['title'];
              $slider_update->description =$update['description'];
              $slider_update->image = $filename;
              $slider_update->video = $update['video'];
              $slider_update->save();
          } else{
              $slider_update->title =$update['title'];
              $slider_update->description =$update['description'];
              $slider_update->image = '';
              $slider_update->video = $update['video'];
              $slider_update->save();
          }
          return redirect()->back();
      }
      public function delete($id)
      {
          $del = Welcome::find($id);
          $del->delete();

          return redirect()->back();
      }



}
