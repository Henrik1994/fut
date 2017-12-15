@extends('layouts.admin')
@section('title')
    Index
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4 class="text-center">{{ $teams_id->team }} Popular Page</h4>
                    <div class="col-sm-12">
                        <button class="center btn-primary btn-group-justified" id="add_important"><span class="glyphicon glyphicon-plus"></span> Add
                            Posts
                        </button>
                        <hr>
                        <div class="demo" id="important_demo" style="display: none!important;"><br>
                            <form action="{{ url('team_important_set') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="team_id" value="{{ ($teams_id)?$teams_id->id:''}}">
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
                            @if(isset($teams_id))
                                @foreach($teams_id->Team_important as $important)
                                    <div class="col-sm-4" style="padding-top: 10px">
                                        @if($important->video != "")
                                            <iframe class="embed-responsive-item" src="{{ $important->video }}"  style="width:100%; height: 200px"></iframe>
                                        @else
                                            <img src="{{ asset('image/'.$important->image) }}" class="img-responsive"
                                                 style="width:100%; height: 200px" alt="Image">
                                        @endif
                                        <p style="text-align:center ">{{ (strlen($important->title) < 40)?$important->title:substr($important->title,0,40)."..." }}</p>
                                        <a href="{{ url('/team_important_del', $important->id) }}"><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button></a>
                                        <button type="button" class="btn btn-success pull-right important_update" data-toggle="modal" data-target="#important_update" data-id="{{ $important->id }}" data-teamid="{{ $important->team_id }}" data-title="{{ $important->title }}" data-desc="{{ $important->description }}" data-img ="{{  asset("image/".$important->image)  }}"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button type="button" class="btn btn-info pull-right important_show" data-toggle="modal" data-target="#important_show" data-id="{{ $important->id }}" data-title="{{ $important->title }}" data-desc="{{ $important->description }}" data-img ="{{  asset("image/".$important->image)  }}"><span class="glyphicon glyphicon-eye-open"></span></button>
                                        {{--<a href="{{ url('/add_interesting_to_slider', $new->id) }}"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon glyphicon-picture"></span></button></a>--}}
                                        {{--<a href="{{ url('/add_interesting_to_read_more', $new->id) }}"><button type="button" class="btn btn-warning pull-right"><span class="glyphicon glyphicon glyphicon-pushpin"></span></button></a>--}}
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
                <br><br><br><br>
            </div>
        </div>
        <div id="important_update" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="important_id"></h4>
                    </div>
                    <div class="modal-body">
                        <img src="" style="height: 200px; width : 300px;margin: 0 30%">
                        <form action="{{ url('/team_important_edit') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="important_id" id="important_id_hid" value="" />
                            <input type="hidden" name="team_id" id="important_teamid" value="" />
                            <div class="form-group">
                                <label for="title">Title</label>
                                <textarea class="form-control" name="title" id="important_title"  required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="important_desc" rows="10" required></textarea>
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
        <div id="important_show" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="important_id_show"></h4>
                    </div>
                    <div class="modal-body">
                        <img src="" style="height: 200px; width : 300px;margin: 0 30%">

                        <h4 id="important_title_show"></h4>
                        <hr>
                        <p id ="important_desc_show"></p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#add_important").click(function () {
                $("#important_demo").slideToggle("slow");
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

            $('.important_update').on('click', function () {
                var $important_id =  "ID " +  $(this).data('id') ;
                var $important_id_hid =   $(this).data('id') ;
                var $important_teamid =   $(this).data('teamid') ;
                var $important_title = $(this).data('title');
                var $important_desc = $(this).data('desc');
                $('#important_id').text($important_id);
                $('#important_teamid').val($important_teamid);
                $('#important_title').text($important_title);
                $('#important_desc').text($important_desc);
                $('#important_id_hid').val($important_id_hid);
                $('#important_update img').attr('src', $(this).attr('data-img'));
            });
            $('.important_show').on('click', function () {
                var important_id_show =  "ID " +  $(this).data('id') ;
                var important_title_show = $(this).data('title');
                var important_desc_show = $(this).data('desc');
                $('#important_id_show').text(important_id_show);
                $('#important_title_show').text(important_title_show);
                $('#important_desc_show').text(important_desc_show);
                $('#important_show img').attr('src', $(this).attr('data-img'));
            });

        </script>

    </section>
@endsection