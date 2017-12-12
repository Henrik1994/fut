<?php

namespace App\Http\Controllers\UEFA;

use App\Models\UEFA\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::OrderBy('id','desc')->get();
        return view('admin.UEFA.video',compact('videos'));
    }
    public function video_set( Request $request)
    {
        $cat = $request->video;
        $exp = explode(" ",$cat);
        $video = substr($exp[3],5,-1);
            $alldata = [
                'title'=>$request['title'],
                'description'=>$request['description'],
                'video'=>$video
            ];
        Video::create($alldata);
        return redirect()->back();

    }
    public function  update_video(Request $request)
    {
            $cat = $request->video;
            $exp = explode(" ",$cat);
            $video = substr($exp[3],5,-1);
            $update = Input::all();
            $news_update = Video::find($update['video_id']);
            $news_update->title =$update['title'];
            $news_update->description =$update['description'];
            $news_update->video = $video;
            $news_update->save();

        return redirect()->back();
    }


    public function delete_video($id){

        $delete = Video::find($id);
        $delete->delete();

        return redirect()->back();

    }
}
