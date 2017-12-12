@extends('layouts.adminfaq')
@section('title')
    Politics
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4 class="text-center">Politics Page</h4>
                <div class="col-sm-12">
                    <button class="center btn-primary btn-group-justified" id="add_post"><span class="glyphicon glyphicon-plus"></span> Add
                        Post
                    </button>
                    <hr>
                    <div class="demo" id="demo" style="display: none!important;"><br>
                        <form action="{{ url('/politics_set') }}" method="post" enctype="multipart/form-data">
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
                <div class="col-sm-12">
                    <h3 style="text-align: center">Posts</h3><br>`
                    <div class="row">
                        @if(isset($politicss))
                            @foreach($politicss as $politics)
                                <div class="col-sm-4" style="padding-top: 10px">
                                    @if($politics->video != "")
                                        <iframe class="embed-responsive-item" src="{{ $politics->video }}"  style="width:100%; height: 200px"></iframe>
                                    @else
                                        <img src="{{ asset('image/'.$politics->image) }}" class="img-responsive"
                                             style="width:100%; height: 200px" alt="Image">
                                    @endif
                                    <p style="text-align:center ">{{ (strlen($politics->title) < 100)?$politics->title:substr($politics->title,0,70)."..." }}</p>
                                    <a href="{{ url('/delete_politics', $politics->id) }}"><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button></a>
                                    <button type="button" class="btn btn-success pull-right politics_update" data-toggle="modal" data-target="#politics_update" data-id="{{ $politics->id }}" data-title="{{ $politics->title }}" data-desc="{{ $politics->description }}" data-img ="{{  asset("image/".$politics->image)  }}"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button type="button" class="btn btn-info pull-right politics_show" data-toggle="modal" data-target="#politics_show" data-id="{{ $politics->id }}" data-title="{{ $politics->title }}" data-desc="{{ $politics->description }}" data-img ="{{  asset("image/".$politics->image)  }}"><span class="glyphicon glyphicon-eye-open"></span></button>
                                        <a href="{{ url('/add_politics_to_slider', $politics->id) }}"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon glyphicon-picture"></span></button></a>
                                        <a href="{{ url('/add_politics_to_read_more', $politics->id) }}"><button type="button" class="btn btn-warning pull-right"><span class="glyphicon glyphicon glyphicon-pushpin"></span></button></a>

                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
            <br><br><br><br>
        </div>
    </div>
    <div id="politics_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="politics_id"></h4>
                </div>
                <div class="modal-body">
                    <img src=""  style="height: 200px; width : 300px;margin: 0 30%">
                    <form action="{{ url('/update_politics') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="politics_id" id="politics_id_hid" value="" />
                        <div class="form-group">
                            <label for="title">Title</label>
                            <textarea class="form-control" name="title" id="politics_title"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="politics_desc" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="radio"></label>
                            Image <input type="radio" name="modal" value="modal" id="modal_img"  checked>
                            Video link <input type="radio" name="modal" value="modal" id="modal_vid">
                        </div>
                        <div class="form-group" id="modal_image">
                            <label for="image">image</label>
                            <input type="file" class="form-control" id="modal_i" name="file" required ><br>
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
    <div id="politics_show" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="politics_id_show"></h4>
                </div>
                <div class="modal-body">
                    <img src=""  style="height: 200px; width : 300px;margin: 0 30%">
                    <h4 id="politics_title_show"></h4>
                    <hr>
                    <p id ="politics_desc_show"></p>
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

        $('.politics_update').on('click', function () {
            var politics_id =  "ID " +  $(this).data('id') ;
            var politics_id_hid =   $(this).data('id') ;
            var politics_title = $(this).data('title');
            var politics_desc = $(this).data('desc');
            $('#politics_id').text(politics_id);
            $('#politics_title').text(politics_title);
            $('#politics_desc').text(politics_desc);
            $('#politics_id_hid').val(politics_id_hid);
            $('#politics_update img').attr('src', $(this).attr('data-img'));
        });
        $('.politics_show').on('click', function () {
            var politics_id_show =  "ID " +  $(this).data('id') ;
            var politics_title_show = $(this).data('title');
            var politics_desc_show = $(this).data('desc');
            $('#politics_id_show').text(politics_id_show);
            $('#politics_title_show').text(politics_title_show);
            $('#politics_desc_show').text(politics_desc_show);
            $('#politics_show img').attr('src', $(this).attr('data-img'));
        });

    </script>

@endsection
