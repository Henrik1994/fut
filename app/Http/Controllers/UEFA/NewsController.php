<?php

namespace App\Http\Controllers\UEFA;

use App\Http\Controllers\Controller;
use App\Models\Team\Team;
use App\Models\UEFA\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $news = News::OrderBy('id','desc')->get();
        return view('admin.UEFA.news',compact('news','teams'));
    }

    public function news_set( Request $request)
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

        News::create($alldata);
        return redirect()->back();

    }
    public function  update_news(Request $request)
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
        $news_update = News::find($update['news_id']);
            $news_update->title =$update['title'];
            $news_update->description =$update['description'];
            $news_update->image = $filename;
            $news_update->video = $video;
            $news_update->save();



        return redirect()->back();
    }


    public function delete_news($id){
        $derectory = public_path('image/');
        $delete = News::find($id);
        unlink($derectory.$delete->image);
        $delete->delete();

        return redirect()->back();

    }
}
