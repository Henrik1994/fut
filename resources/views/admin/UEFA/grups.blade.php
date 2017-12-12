@extends('layouts.admin')
@section('title')
    Grups
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="more-sports">
                        <div class="more-sports-heading">
                            <h3 class="text-center">Groups Page </h3>
                            <button class="center btn-primary btn-group-justified" id="add_grups"><span
                                        class="glyphicon glyphicon-plus"></span> Add
                                Groups
                            </button>
                            <hr/>
                            <div class="demo" id="grups_demo" style="display: none!important;"><br>
                                <form action="{{ url('groups_select') }}" method="post" class="form-inline text-center">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="sel" id="sel" value="">
                                    <div class="form-group">
                                        <label for="sel1"></label>
                                        <select class="form-control" id="sel1">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                            <option>E</option>
                                            <option>F</option>
                                            <option>G</option>
                                            <option>H</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn-success" id="save" value="Save">
                                    </div>
                                </form>
                                <br/>
                                <hr/>
                            </div>
                        </div>

                        <div class="more-sports-grids">
                            @if(isset($groups))
                                @foreach($groups as  $gro)
                                    <div class="col-sm-4 col-xs-4">
                                        <p class="group-name js-group-name" style="position: absolute">
                                            Group <b>{{ $gro->group}}</b></p>
                                        <a href="{{ url('/delete_groups',$gro->id) }}">
                                            <button type="button" class="btn btn-danger pull-right"><span
                                                        class="glyphicon glyphicon-trash"></span></button>
                                        </a>
                                        <button type="button" class="btn btn-success pull-right update_groups"
                                                data-toggle="modal" data-target="#update_groups"
                                                data-id="{{ $gro->id }}"><span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                        <button type="button" class="btn btn-info pull-right add_team"
                                                data-toggle="modal" data-target="#add_team" data-id="{{ $gro->id }}">
                                            <span class="glyphicon glyphicon-plus"></span></button>
                                        <table class="table table--standings">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>P</th>
                                                <th>Pts</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($gro->Groups))
                                                @foreach($gro->Groups as  $gr)
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img src="{{ $gr->image }}" style="width: 32px;height: 32px">
                                                                <span>{{ $gr->name }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="table_team-played js-played">{{$gr->p }}</td>
                                                        <td class="table_team-points js-points">
                                                            <strong>{{ $gr->pts }}</strong></td>
                                                        <td >
                                                            <a href="{{ url('/delete_groups_group',$gr->id) }}">
                                                                <button type="button" class="btn btn-danger btn-sm pull-right"><span
                                                                            class="glyphicon glyphicon-trash"></span></button>
                                                            </a>
                                                            <button type="button" class="btn btn-success btn-sm pull-right update_groups_group"
                                                                    data-toggle="modal" data-target="#update_groups_group"
                                                                    data-id="{{ $gr->id }}" data-grid="{{ $gr->groupselect_id }}" data-img="{{ $gr->image }}" data-name="{{ $gr->name }}" data-p="{{ $gr->p }}" data-pts="{{ $gr->pts }}"><span class="glyphicon glyphicon-edit"></span>
                                                            </button>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="update_groups" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="sel_id"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('update_groups_select') }}" method="post" class="form-inline text-center">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="sel" id="select2" value="">
                            <input type="hidden" name="sel_id" id="sel_id_hid" value=""/>
                            <div class="form-group">
                                <label for="sel2"></label>
                                <select class="form-control" id="sel2">
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>F</option>
                                    <option>G</option>
                                    <option>H</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn-success" id="save2" value="Save">
                            </div>
                        </form>
                        <br/>
                        <hr/>
                    </div>

                </div>
            </div>
        </div>
        <div id="update_groups_group" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="up_id"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('update_groups_group') }}" method="post" class="form-inline"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="up_id_hid" id="up_id_hid" value='' />
                            <input type="hidden" name="gr_id" id="gr_id" value='' />
                            <div class="form-group">
                                <label for="radio"></label>
                                Image <input type="radio" name="ff" value="ffimg" id="ffimg" checked>
                                Image link <input type="radio" name="ff" value="fflink" id="fflink">
                            </div>
                            <div class="form-group" id="file_imgg">
                                <label for="image"></label>
                                <input type="file" class="form-control" id="file_imgg" name="file"/><br>
                            </div>
                            <div class="form-group" id="linkg" style="display: none">
                                <label for="image"></label>
                                <input type="text" class="form-control up_img" id="linkg" name="link"><br>
                            </div>
                            <div class="form-group">
                                <label for="tesam1"></label>
                                <input type="text" class="form-control" name="team1" id="up_name" placeholder="Team"
                                       required/>
                            </div>
                            <div class="form-group">
                                <label for="p"></label>
                                <input type="number" class="form-control" name="p" id="up_p" placeholder="p" required
                                       style="width: 60px!important;"/>
                            </div>
                            <div class="form-group">
                                <label for="pts"></label>
                                <input type="number" class="form-control" name="pts" id="up_pts" placeholder="pts" required
                                       style="width: 60px!important;"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn-success" id="up_save" value="Save">
                            </div>
                        </form>
                        <br/><br/>
                    </div>
                </div>
            </div>
        </div>
        <div id="add_team" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="sel3_id"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('groups_set') }}" method="post" class="form-inline"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="grups_id" id="sel3_id_hid" value=""/>
                            <div class="form-group">
                                <label for="radio"></label>
                                Image <input type="radio" name="ff" value="ff" id="ffi" checked>
                                Image link <input type="radio" name="ff" value="ff" id="ffv">
                            </div>
                            <div class="form-group" id="file_img">
                                <label for="image"></label>
                                <input type="file" class="form-control" id="file_img" name="file"/><br>
                            </div>
                            <div class="form-group" id="video_link" style="display: none">
                                <label for="image"></label>
                                <input type="text" class="form-control" id="link" name="link"><br>
                            </div>

                            <div class="form-group">
                                <label for="tesam1"></label>
                                <input type="text" class="form-control" name="team1" id="team1" placeholder="Team"
                                       required/>
                            </div>
                            <div class="form-group">
                                <label for="p"></label>
                                <input type="number" class="form-control" name="p" id="p" placeholder="p" required
                                       style="width: 60px!important;"/>
                            </div>
                            <div class="form-group">
                                <label for="pts"></label>
                                <input type="number" class="form-control" name="pts" id="pts" placeholder="pts" required
                                       style="width: 60px!important;"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn-success" id="save" value="Save">
                            </div>
                        </form>
                        <br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $("#add_grups").click(function () {
            $("#grups_demo").slideToggle("slow");
        });
        $('#save').click(function () {
            var select = $('#sel1').find(":selected").val();
            $('#sel').val(select);
        });
        $('#save2').click(function () {
            var select = $('#sel2').find(":selected").val();
            $('#select2').val(select);
        });
        $('#ffi').click(function () {
            $('#file_img').show();
            $('#video_link').hide();
        });
        $('#ffv').click(function () {
            $('#file_img').hide();
            $('#video_link').show();
        });
        $('#ffimg').click(function () {
            $('#file_imgg').show();
            $('#linkg').hide();
        });
        $('#fflink').click(function () {
            $('#file_imgg').hide();
            $('#linkg').show();
        });
        $('.update_groups').on('click', function () {
            var sel_id = "ID " + $(this).data('id');
            var sel_id_hid = $(this).data('id');
            $('#sel_id').text(sel_id);
            $('#sel_id_hid').val(sel_id_hid);
        });
        $('.add_team').on('click', function () {
            var sel_id = "ID " + $(this).data('id');
            var sel_id_hid = $(this).data('id');
            $('#sel3_id').text(sel_id);
            $('#sel3_id_hid').val(sel_id_hid);
        });
        $('.update_groups_group').on('click', function () {
            var up_id = "ID " + $(this).data('id');
            var up_id_hid = $(this).data('id');
            var gr_id = $(this).data('grid');
            var up_img = $(this).data('img');
            var up_name = $(this).data('name');
            var up_p = $(this).data('p');
            var up_pts = $(this).data('pts');
            $('#up_id').text(up_id);
            $('#up_id_hid').val(up_id_hid);
            $('#gr_id').val(gr_id);
            $('.up_img').val(up_img);
            $('#up_name').val(up_name);
            $('#up_p').val(up_p);
            $('#up_pts').val(up_pts);
        });
    </script>
@endsection