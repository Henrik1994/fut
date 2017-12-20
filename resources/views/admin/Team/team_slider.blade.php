@extends('layouts.admin')
@section('title')
    welcome
@endsection
@section('content')
    <style>
        .img1 {
            width: 550px !important;
            height: 350px !important;
        }

        .slider-chap {
            width: 550px !important;
            height:350px !important;
        }
    </style>
    <div class="flex-center position-ref full-height">
        <div class="row" style="margin-left: 0 !important;">
            <div class="container-flued">
                <h4 class="text-center">Slider Page</h4>
                <hr>
                <div class="col-sm-8">
                    <div id="myCarousel" class="carousel slide slider-chap" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $i = 0; ?>
                            @if(isset($rels))
                            @foreach($rels->Team_set as $rel)
                                @if ($i == 0)
                                    <div class="item active">
                                            <img src="{{ asset('/image/'.$rel->image)}}" class="img1">
                                    </div>
                                        @else
                                            <div class="item">
                                                <img src="{{ asset('/image/'.$rel->image)}}"
                                                     class="img1">
                                            </div>
                                                @endif
                                        <?php $i++; ?>
                                            @endforeach
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
                        <form action="{{ url('/slider_set') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="team_id" value="{{ ($rels)?$rels->id:'' }}" />
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
                <div class="col-sm-10">
                    <h3 style="text-align: center">What We Do</h3><br>

                    <div class="row">
                        @if(isset($rels))
                        @foreach($rels->Team_set as $slider)
                            <div class="col-sm-4"><br/>
                                <img src="{{ asset('/image/'.$slider->image) }}" class="img-responsive"
                                     style="width:100%; height: 200px" alt="Image"><br/>
                                <a href="{{ url('/slider_del',$slider->id) }}">
                                    <button type="button" class="btn btn-danger btn-md pull-right"><span
                                                class="glyphicon glyphicon-trash"></span></button>
                                </a>
                                <button type="button" class="btn btn-success btn-md pull-right slider_update"
                                        data-toggle="modal" data-target="#slider_update"
                                        data-id="{{ $slider->id }}" data-teamid="{{ $slider->team_id }}"  data-img="{{ $slider->image }}"><span class="glyphicon glyphicon-edit"></span>
                                </button>
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
        <div class="modal-dialog">
            <div class="modal-content col-sm-8">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="slider_id"></h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/slider_edit') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="team_id_hid" id="slider_id_hid" value="" />
                        <input type="hidden" name="team_id" id="slider_team_id" value="" />
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
    <script>
        $("#add_image").click(function () {
            $("#demo").slideToggle("slow");
        });

        $('.slider_update').on('click', function () {
            var slider_id = "ID " + $(this).data('id');
            var slider_id_hid = $(this).data('id');
            var slider_teamid  = $(this).data('teamid');

            $('#slider_id').text(slider_id);
            $('#slider_id_hid').val(slider_id_hid);
            $('#slider_team_id').val(slider_teamid);
        });


    </script>
@endsection
