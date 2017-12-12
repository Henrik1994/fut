@extends('layouts.admin')
@section('title')
    Index
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4 class="text-center">News Page</h4>
                    <div class="col-sm-12">
                        <button class="center btn-primary btn-group-justified" id="add_news"><span class="glyphicon glyphicon-plus"></span> Add
                            Posts
                        </button>
                        <hr>
                        <div class="demo" id="news_demo" style="display: none!important;"><br>
                            <form action="{{ url('news_set') }}" method="post" enctype="multipart/form-data">
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
                            @if(isset($news))
                                @foreach($news as $new)
                                    <div class="col-sm-4" style="padding-top: 10px">
                                        @if($new->video != "")
                                            <iframe class="embed-responsive-item" src="{{ $new->video }}"  style="width:100%; height: 200px"></iframe>
                                        @else
                                            <img src="{{ asset('image/'.$new->image) }}" class="img-responsive"
                                                 style="width:100%; height: 200px" alt="Image">
                                        @endif
                                        <p style="text-align:center ">{{ (strlen($new->title) < 40)?$new->title:substr($new->title,0,40)."..." }}</p>
                                        <a href="{{ url('/delete_news', $new->id) }}"><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button></a>
                                        <button type="button" class="btn btn-success pull-right news_update" data-toggle="modal" data-target="#news_update" data-id="{{ $new->id }}" data-title="{{ $new->title }}" data-desc="{{ $new->description }}" data-img ="{{  asset("image/".$new->image)  }}"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button type="button" class="btn btn-info pull-right interesting_show" data-toggle="modal" data-target="#interesting_show" data-id="{{ $new->id }}" data-title="{{ $new->title }}" data-desc="{{ $new->description }}" data-img ="{{  asset("image/".$new->image)  }}"><span class="glyphicon glyphicon-eye-open"></span></button>
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
        <div id="news_update" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="news_id"></h4>
                    </div>
                    <div class="modal-body">
                        <img src="" style="height: 200px; width : 300px;margin: 0 30%">
                        <form action="{{ url('/update_news') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="news_id" id="news_id_hid" value="" />
                            <div class="form-group">
                                <label for="title">Title</label>
                                <textarea class="form-control" name="title" id="news_title"  required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="news_desc" rows="10" required></textarea>
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
        <div id="interesting_show" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="interesting_id_show"></h4>
                    </div>
                    <div class="modal-body">
                        <img src="" style="height: 200px; width : 300px;margin: 0 30%">

                        <h4 id="interesting_title_show"></h4>
                        <hr>
                        <p id ="interesting_desc_show"></p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#add_news").click(function () {
                $("#news_demo").slideToggle("slow");
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

            $('.news_update').on('click', function () {
                var $news_id =  "ID " +  $(this).data('id') ;
                var $news_id_hid =   $(this).data('id') ;
                var $news_title = $(this).data('title');
                var $news_desc = $(this).data('desc');
                $('#news_id').text($news_id);
                $('#news_title').text($news_title);
                $('#news_desc').text($news_desc);
                $('#news_id_hid').val($news_id_hid);
                $('#news_update img').attr('src', $(this).attr('data-img'));
            });
            $('.interesting_show').on('click', function () {
                var interesting_id_show =  "ID " +  $(this).data('id') ;
                var interesting_title_show = $(this).data('title');
                var interesting_desc_show = $(this).data('desc');
                $('#interesting_id_show').text(interesting_id_show);
                $('#interesting_title_show').text(interesting_title_show);
                $('#interesting_desc_show').text(interesting_desc_show);
                $('#interesting_show img').attr('src', $(this).attr('data-img'));
            });

        </script>

    </section>
@endsection