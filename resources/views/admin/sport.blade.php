@extends('layouts.adminfaq')
@section('title')
  Sport
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4 class="text-center">Sport Page</h4>
                <div class="col-sm-12">
                    <button class="center btn-primary btn-group-justified" id="add_post"><span class="glyphicon glyphicon-plus"></span> Add
                        Post
                    </button>
                    <hr>
                    <div class="demo" id="demo" style="display: none!important;"><br>
                        <form action="{{ url('/sport_set') }}" method="post" enctype="multipart/form-data">
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
                        @if(isset($sports))
                            @foreach($sports as $sport)
                                <div class="col-sm-4" style="padding-top: 10px">
                                    @if($sport->video != "")
                                        <iframe class="embed-responsive-item" src="{{ $sport->video }}"  style="width:100%; height: 200px"></iframe>
                                    @else
                                        <img src="{{ asset('image/'.$sport->image) }}" class="img-responsive"
                                             style="width:100%; height: 200px" alt="Image">
                                    @endif
                                    <p style="text-align:center ">{{ (strlen($sport->title) < 100)?$sport->title:substr($sport->title,0,70)."..."  }}</p>
                                    <a href="{{ url('/delete_sport', $sport->id) }}"><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button></a>
                                    <button type="button" class="btn btn-success pull-right sport_update" data-toggle="modal" data-target="#sport_update" data-id="{{ $sport->id }}" data-title="{{ $sport->title }}" data-desc="{{ $sport->description }}"  data-img ="{{  asset("image/".$sport->image)  }}"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button type="button" class="btn btn-info pull-right sport_show" data-toggle="modal" data-target="#sport_show" data-id="{{ $sport->id }}" data-title="{{ $sport->title }}" data-desc="{{ $sport->description }}"  data-img ="{{  asset("image/".$sport->image)  }}"><span class="glyphicon glyphicon-eye-open"></span></button>
                                        <a href="{{ url('/add_sport_to_slider', $sport->id) }}"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon glyphicon-picture"></span></button></a>
                                        <a href="{{ url('/add_sport_to_read_more', $sport->id) }}"><button type="button" class="btn btn-warning pull-right"><span class="glyphicon glyphicon glyphicon-pushpin"></span></button></a>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
            <br><br><br><br>
        </div>
    </div>
    <div id="sport_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="sport_id"></h4>
                </div>
                <div class="modal-body">
                    <img src=""  style="height: 200px; width : 300px;margin: 0 30%">
                    <form action="{{ url('/update_sport') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="sport_id" id="sport_id_hid" value="" />
                        <div class="form-group">
                            <label for="title">Title</label>
                            <textarea class="form-control" name="title" id="sport_title"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="sport_desc" rows="10" required></textarea>
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
    <div id="sport_show" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="sport_id_show"></h4>
                </div>
                <div class="modal-body">
                    <img src=""  style="height: 200px; width : 300px;margin: 0 30%">
                    <h4 id="sport_title_show"></h4>
                    <hr>
                    <p id ="sport_desc_show"></p>
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

        $('.sport_update').on('click', function () {
            var sport_id =  "ID " +  $(this).data('id') ;
            var sport_id_hid =   $(this).data('id') ;
            var sport_title = $(this).data('title');
            var sport_desc = $(this).data('desc');
            $('#sport_id').text(sport_id);
            $('#sport_title').text(sport_title);
            $('#sport_desc').text(sport_desc);
            $('#sport_id_hid').val(sport_id_hid);
            $('#sport_update img').attr('src', $(this).attr('data-img'));
        });
        $('.sport_show').on('click', function () {
            var sport_id_show =  "ID " +  $(this).data('id') ;
            var sport_title_show = $(this).data('title');
            var sport_desc_show = $(this).data('desc');
            $('#sport_id_show').text(sport_id_show);
            $('#sport_title_show').text(sport_title_show);
            $('#sport_desc_show').text(sport_desc_show);
            $('#sport_show img').attr('src', $(this).attr('data-img'));
        });

    </script>

@endsection
