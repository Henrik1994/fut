@extends('layouts.adminfaq')
@section('title')
    welcome
@endsection
@section('content')
    <style>
        .img1 {
            width: 100% !important;
            height: 500px !important;
        }

        .slider-chap {
            width: 100% !important;
            height: 500px !important;
        }
    </style>
    <div class="flex-center position-ref full-height">
        <div class="row">
            <div class="container-flued">
                <h4 class="text-center">Slider Page</h4>
                <hr>
                <div class="col-sm-8">
                    <div id="myCarousel" class="carousel slide slider-chap" data-ride="carousel">
                        {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                        {{--</ol>--}}
                        <div class="carousel-inner">
                            @if(isset($sliders))
                            @for($i = 0; $i < count($sliders);$i++)
                                @if ($i == 0)
                                    <div class="item active">
                                        <img src="{{ asset( '/image/'.$sliders[$i]['image'] ) }} " class="img1">
                                        @else
                                            <div class="item">
                                                <img src="{{  asset("/image/".$sliders[$i]['image']) }}"
                                                     class="img1">
                                                @endif
                                            </div>
                                            @endfor
                                            @endif
                                    </div>
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="center btn-success" id="add_image"><span class="glyphicon glyphicon-plus"></span> Add
                        Image
                    </button>
                    <div class="demo" id="demo" style="display: none!important;"><br>
                        <form action="{{ url('/slider') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <textarea class="form-control" name="title" id="title"  required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="radio"></label>
                                Image <input type="radio" name="ff" value="ff" id="ffi"  checked>
                                Video link <input type="radio" name="ff" value="ff" id="ffv">
                            </div>
                            <div class="form-group" id="file_img">
                                <label for="image">image</label>
                                <input type="file" class="form-control" id="file_img" name="file" required><br>
                            </div>
                            <div class="form-group" id="video_link" style="display: none">
                                <label for="image">Video link</label>
                                <input type="text" class="form-control" id="modal_v" name="video" ><br>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn-success" id="save" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-10">
                    <h3 style="text-align: center">What We Do</h3><br>`
                    <div class="row">
                        @if(isset($sliders))
                        @foreach($sliders as $slider)
                            <div class="col-sm-4" style="padding-top: 10px">
                                <img src="{{ asset('image/'.$slider->image) }}" class="img-responsive"
                                     style="width:100%; height: 200px" alt="Image">
                                <p style="text-align:center ">{{ (strlen($slider->title) < 100)?$slider->title:substr($slider->title,0,70)."..."  }}</p>
                             <a href="{{ url('/delete_slider', $slider->id) }}"><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button></a>
                                <button type="button" class="btn btn-success pull-right slider_update" data-toggle="modal" data-target="#slider_update" data-id="{{ $slider->id }}" data-title="{{ $slider->title }}" data-desc="{{ $slider->description }}" data-img ="{{  asset("image/".$slider->image)  }}"><span class="glyphicon glyphicon-edit"></span></button>
                                <button type="button" class="btn btn-info pull-right slider_show" data-toggle="modal" data-target="#slider_show" data-id="{{ $slider->id }}" data-title="{{ $slider->title }}" data-desc="{{ $slider->description }}" data-img ="{{  asset("image/".$slider->image)  }}"><span class="glyphicon glyphicon-eye-open"></span></button>
                            </div>
                        @endforeach
                            @endif
                    </div>

                </div>
            </div>
            <br><br><br><br>
        </div>
    </div>
    <div id="slider_update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="slider_id"></h4>
                </div>
                <div class="modal-body">
                    <img src="" style="height: 200px; width : 300px;margin: 0 30%">
                    <form action="{{ url('/update_slider' ) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="slider_id" id="slider_id_hid" value="" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <textarea class="form-control" name="title" id="slider_title"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="slider_desc"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" class="form-control" id="file" name="file" required><br>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn-success" id="save" value="Save">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div id="slider_show" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="slider_id_show"></h4>
                </div>
                <div class="modal-body">
                    <img src="" style="height: 200px; width : 300px;margin: 0 30%">
                    <h4 id="slider_title_show"></h4>
                    <hr>
                    <p id ="slider_desc_show"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#add_image").click(function () {
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
        $('.slider_update').on('click', function () {
            var slider_id_hid = $(this).data('id');
            var slider_id=  "ID " +  $(this).data('id') ;
            var slider_title = $(this).data('title');
            var slider_desc = $(this).data('desc');
            $('#slider_id').text(slider_id);
            $('#slider_title').text(slider_title);
            $('#slider_desc').text(slider_desc);
            $('#slider_id_hid').val(slider_id_hid);
            $('#slider_update img').attr('src', $(this).attr('data-img'));
        });
        $('.slider_show').on('click', function () {
            var slider_id_show =  "ID " +  $(this).data('id') ;
            var slider_title_show = $(this).data('title');
            var slider_desc_show = $(this).data('desc');
            $('#slider_id_show').text(slider_id_show);
            $('#slider_title_show').text(slider_title_show);
            $('#slider_desc_show').text(slider_desc_show);
            $('#slider_show img').attr('src', $(this).attr('data-img'));

        });

    </script>
@endsection
