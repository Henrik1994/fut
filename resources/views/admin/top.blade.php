@extends('layouts.adminfaq')
@section('title')
    Top
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="text-center">Top Page</h4>
                            <div class="col-sm-12">
                                <button class="center btn-primary btn-group-justified" id="add_post"><span class="glyphicon glyphicon-plus"></span> Add
                                    Post
                                </button>
                                <hr>
                                <div class="demo" id="demo" style="display: none!important;"><br>
                                    <form action="{{ url('/top_set') }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <textarea class="form-control" name="title" id="title"  required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="radio"></label>
                                            Image <input type="radio" name="ff" value="ff" id="ffi"  checked>
                                               Video link <input type="radio" name="ff" value="ff" id="ffv">
                                        </div>
                                        <div class="form-group" id="file_img">
                                            <label for="image">image</label>
                                            <input type="file" class="form-control" id="file_img" name="file" required ><br>
                                        </div>
                                        <div class="form-group" id="video_link" style="display: none">
                                            <label for="image">Video link</label>
                                            <input type="text" class="form-control" id="video" name="video" ><br>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" id="save" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <h3 style="text-align: center">Posts</h3><br>`
                                <div class="row">
                                    @if(isset($tops))
                                        @foreach($tops as $top)
                                            <div class="col-sm-4" style="padding-top: 10px">
                                                @if($top->video != "" )
                                                    <iframe class="embed-responsive-item" src="{{ $top->video }}"  style="width:100%; height: 200px"></iframe>
                                            @else
                                                    <img src="{{ asset('image/'.$top->image) }}" class="img-responsive"
                                                         style="width:100%; height: 200px" alt="Image">
                                            @endif
                                                <p style="text-align:center ">{{ (strlen($top->title) < 100)?$top->title:substr($top->title,0,70)."..." }}</p>
                                                <a href="{{ url('/delete_top', $top->id) }}"><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon glyphicon-trash"></span></button></a>
                                                <button type="button" class="btn btn-success pull-right top_update" data-toggle="modal" data-target="#top_update" data-id="{{ $top->id }}" data-title="{{ $top->title }}" data-desc="{{ $top->description }}"  data-img ="{{  asset("image/".$top->image)  }}"><span class="glyphicon glyphicon glyphicon-edit"></span></button>
                                                <button type="button" class="btn btn-info pull-right top_show" id="show" data-toggle="modal" data-target="#top_show" data-id="{{ $top->id }}" data-title="{{ $top->title }}" data-desc="{{ $top->description }}" data-img ="{{  asset("image/".$top->image)  }}"><span class="glyphicon glyphicon-eye-open"></span></button>
                                                    <a href="{{ url('/add_top_to_slider', $top->id) }}"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon glyphicon-picture"></span></button></a>
                                                    <a href="{{ url('/add_top_to_read_more', $top->id) }}"><button type="button" class="btn btn-warning pull-right"><span class="glyphicon glyphicon glyphicon-pushpin"></span></button></a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                        <br><br><br><br>
                    </div>
                </div>
    <div id="top_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="top_id"></h4>
                </div>
                <div class="modal-body">
                    <img src=""  style="height: 200px; width : 300px;margin: 0 30%">
                    <form action="{{ url('/update_top') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="top_id" id="top_id_hid" value="" />
                        <div class="form-group">
                            <label for="title">Title</label>
                            <textarea class="form-control" name="title" id="top_title"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="top_desc" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="radio"></label>
                            Image <input type="radio" name="modal" value="modal" id="modal_img"  checked>
                            Video link <input type="radio" name="modal" value="modal" id="modal_vid">
                        </div>
                        <div class="form-group" id="modal_image">
                            <label for="image">image</label>
                            <input type="file" class="form-control" id="modal_i" name="file" required><br>
                        </div>
                        <div class="form-group" id="modal_video" style="display: none" >
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

    <div id="top_show" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="top_id_show"></h4>
                </div>
                <div class="modal-body">
                    <img src="" style="height: 200px; width : 300px;margin: 0 30%">
                    <hr>
                    <h4 id="top_title_show"></h4>
                    <hr>
                 <p id ="top_desc_show"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#add_post").click(function () {
            $("#demo").slideToggle("slow");
        });
        $('#ffi').click(function () {
            $('#file_img').show();
            $('#video_link').hide();
        });
        $('#ffv').click(function () {
            $('#file_img').hide();
            $('#video_link').show();
        });
        $('#modal_img').click(function () {
            $('#modal_image').show();
            $('#modal_video').hide();
        });
        $('#modal_vid').click(function () {
            $('#modal_image').hide();
            $('#modal_video').show();
        });

        $('.top_update').on('click', function () {
            var top_id =  "ID " +  $(this).data('id') ;
            var top_id_hid =   $(this).data('id') ;
            var top_title = $(this).data('title');
            var top_desc = $(this).data('desc');
            $('#top_id').text(top_id);
            $('#top_title').text(top_title);
            $('#top_desc').text(top_desc);
            $('#top_id_hid').val(top_id_hid);
            $('#top_update img').attr('src', $(this).attr('data-img'));
        });
        $('.top_show').on('click', function (e) {
            var top_id_show =  "ID " +  $(this).data('id') ;
            var top_title_show = $(this).data('title');
            var top_desc_show = $(this).data('desc');
            $('#top_id_show').text(top_id_show);
            $('#top_title_show').text(top_title_show);
            $('#top_desc_show').text(top_desc_show);
            $('#top_show img').attr('src', $(this).attr('data-img'));
        });
    </script>

    @endsection
