@extends('layouts.adminfaq')
@section('title')
    Read
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4 class="text-center">Read Page</h4>
                <div class="col-sm-12 col-xs-12">
                    <div class="row">
                        @if(isset($reads))
                            @foreach($reads as $read)
                                <div class="col-sm-4" style="padding-top: 10px">
                                    @if($read->video != "")
                                        <iframe class="embed-responsive-item" src="{{ $read->video }}"  style="width:100%; height: 200px"></iframe>
                                    @else
                                        <img src="{{ asset('image/'.$read->image) }}" class="img-responsive"
                                             style="width:100%; height: 200px" alt="Image">
                                    @endif
                                    <p style="text-align:center ">{{ (strlen($read->title) < 100)?$read->title:substr($read->title,0,70)."..." }}</p>
                                    <a href="{{ url('/delete_read', $read->id) }}"><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon glyphicon-trash"></span></button></a>
                                    <button type="button" class="btn btn-success pull-right read_update" data-toggle="modal" data-target="#read_update" data-id="{{ $read->id }}" data-title="{{ $read->title }}" data-desc="{{ $read->description }}"  data-img ="{{  asset("image/".$read->image)  }}"><span class="glyphicon glyphicon glyphicon-edit"></span></button>
                                    <button type="button" class="btn btn-info pull-right read_show" data-toggle="modal" data-target="#read_show" data-id="{{ $read->id }}" data-title="{{ $read->title }}" data-desc="{{ $read->description }}"  data-img ="{{  asset("image/".$read->image)  }}"><span class="glyphicon glyphicon-eye-open"></span></button>
                                    <a href="{{ url('/add_read_to_slider', $read->id) }}"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon glyphicon-picture"></span></button></a>

                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
            <br><br><br><br>
        </div>
    </div>
    <div id="read_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="read_id"></h4>
                </div>
                <div class="modal-body">
                    <img src="" style="height: 200px; width : 300px;margin: 0 30%">
                    <form action="{{ url('/update_read') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="read_id" id="read_id_hid" value="" />
                        <div class="form-group">
                            <label for="title">Title</label>
                            <textarea class="form-control" name="title" id="read_title"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="read_desc" rows="10" required></textarea>
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

    <div id="read_show" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="read_id_show"></h4>
                </div>
                <div class="modal-body">
                    <img src="" style="height: 200px; width : 300px;margin: 0 30%">
                    <h4 id="read_title_show"></h4>
                    <hr>
                    <p id ="read_desc_show"></p>
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

        $('.read_update').on('click', function () {
            var read_id =  "ID " +  $(this).data('id') ;
            var read_id_hid =   $(this).data('id') ;
            var read_title = $(this).data('title');
            var read_desc = $(this).data('desc');
            $('#read_id').text(read_id);
            $('#read_title').text(read_title);
            $('#read_desc').text(read_desc);
            $('#read_id_hid').val(read_id_hid);
            $('#read_update img').attr('src', $(this).attr('data-img'));
        });
        $('.read_show').on('click', function () {
            var read_id_show =  "ID " +  $(this).data('id') ;
            var read_title_show = $(this).data('title');
            var read_desc_show = $(this).data('desc');
            $('#read_id_show').text(read_id_show);
            $('#read_title_show').text(read_title_show);
            $('#read_desc_show').text(read_desc_show);
            $('#read_show img').attr('src', $(this).attr('data-img'));
        });

    </script>

@endsection
