@extends('layouts.admin')
@section('title')
    General
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4 class="text-center">General Video Page</h4>
                    <div class="col-sm-12">
                        <button class="center btn-primary btn-group-justified" id="add_video"><span class="glyphicon glyphicon-plus"></span> Add
                            Posts
                        </button>
                        <hr>
                        <div class="demo" id="video_demo" style="display: none!important;"><br>
                            <form action="{{ url('video_set') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <textarea class="form-control" name="title" id="title"  required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                                </div>
                                <div class="form-group" id="video_link">
                                    <label for="image">Video link</label>
                                    <input type="text" class="form-control" id="video" name="video" ><br>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn-success" id="save" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3 style="text-align: center">Posts</h3><br>`
                        <div class="row">
                            @if(isset($videos))
                                @foreach($videos as $video)
                                    <div class="col-sm-4" style="padding-top: 10px">
                                            <iframe class="embed-responsive-item" src="{{ $video->video }}"  style="width:100%; height: 200px"></iframe>
                                        <p style="text-align:center ">{{ (strlen($video->title) < 50)?$video->title:substr($video->title,0,50)."..." }}</p>
                                        <a href="{{ url('/delete_video', $video->id) }}"><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button></a>
                                        <button type="button" class="btn btn-success pull-right video_update" data-toggle="modal" data-target="#video_update" data-id="{{ $video->id }}" data-title="{{ $video->title }}" data-desc="{{ $video->description }}" data-video="{{  $video->video  }}"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button type="button" class="btn btn-info pull-right video_show" data-toggle="modal" data-target="#video_show" data-id="{{ $video->id }}" data-title="{{ $video->title }}" data-desc="{{ $video->description }}" data-video="{{  $video->video  }}"><span class="glyphicon glyphicon-eye-open"></span></button>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
                <br><br><br><br>
            </div>
        </div>
        <div id="video_update" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="video_id"></h4>
                    </div>
                    <div class="modal-body">
                        <iframe src="" style="height: 200px; width : 300px;margin: 0 30%"></iframe>
                        <form action="{{ url('/update_video') }}" method="post" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="video_id" id="video_id_hid" value="" />
                            <div class="form-group">
                                <label for="title">Title</label>
                                <textarea class="form-control" name="title" id="video_title"  required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="video_desc" rows="10" required></textarea>
                            </div>
                            <div class="form-group" id="modal_video">
                                <label for="image">Video link</label>
                                <input type="text" class="form-control" id="modal_v" name="video" ><br>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn-success" id="save" value="Save">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div id="video_show" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="video_id_show"></h4>
                    </div>
                    <div class="modal-body">
                        <iframe src=" " class="embed-responsive-item"  id="video_show" style="height: 200px; width : 300px;margin: 0 30%"></iframe>
                        <h4 id="video_title_show"></h4>
                        <hr>
                        <p id ="video_desc_show"></p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#add_video").click(function () {
                $("#video_demo").slideToggle("slow");
            });
            $('.video_update').on('click', function () {
                var video_id =  "ID " +  $(this).data('id') ;
                var video_id_hid =   $(this).data('id') ;
                var video_title = $(this).data('title');
                var video_desc = $(this).data('desc');
                $('#video_id').text(video_id);
                $('#video_title').text(video_title);
                $('#video_desc').text(video_desc);
                $('#video_id_hid').val(video_id_hid);
                $('#video_update  iframe').attr('src', $(this).attr('data-video'));
            });
            $('.video_show').on('click', function () {
                var video_id_show =  "ID " +  $(this).data('id') ;
                var video_title_show = $(this).data('title');
                var video_desc_show = $(this).data('desc');
                $('#video_id_show').text(video_id_show);
                $('#video_title_show').text(video_title_show);
                $('#video_desc_show').text(video_desc_show);
                $('#video_show  iframe').attr('src', $(this).attr('data-video'));
            });

        </script>

    </section>
@endsection