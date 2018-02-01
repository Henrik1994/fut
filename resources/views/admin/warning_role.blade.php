@extends('layouts.admin')
@section('title')
    Teams
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4 class="text-center">Users</h4>
                <div class="col-sm-12">
                </div><br/>
                <?php $i = 1; ?>
                <div class="box-body">
                    <table id="apranqanvanum" class="table table-bordered table-hover">
                        <thead>
                        <tr class="active">
                            <th style="width: 10px">#</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Role</th>
                            <th >Permission</th>
                            <th class="text-center">Admin or User</th>
                        </tr>
                        </thead>
                        @if(isset($users))
                            @foreach($users as $user)
                                <tr class="item">
                                    <td class="canSelect">{{ $i++ }}<input type="checkbox" class="check hidden p_id" value=""></td>
                                    <td class="shtriz">{{ $user->name }}
                                    <td class="canSelect">{{ $user->email }}</td>
                                    <td class="canSelect">{{ $user->role }}</td>
                                    <td class="canSelect">{{ ($user->role == 1)?"Admin":'User' }}</td>
                                    <td align="center">
                                        <div class="btn-group no-print">
                                            <a href="{{ url('/role_set',$user->id) }}"><button type="button" class="btn btn-success btn-sm team_edit" ><span
                                                            class="glyphicon glyphicon glyphicon-user"></span></button>
                                            </a>
                                            <div class="p_id hidden"></div>
                                            <div class="title_kon hidden"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tfoot>
                        <tr class="success">
                            <th style="width: 10px"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div>
            <br><br><br><br>
        </div>
    </div>
    <div id="team_edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content col-sm-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="team_id"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-inline row" action="{{ url('/team_edit') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="team_id_hid" id="team_id_hid" value="" />
                        <div class="form-group ">
                            <label for="Title">Team</label>
                            <input type="text" class="form-control" id="team_team" placeholder="Team name" name="team" required />
                        </div>
                        <div class="form-group">
                            <label for="radio"></label>
                            Image <input type="radio" name="ff" value="ff" id="ffi" checked>
                            Image link <input type="radio" name="ff" value="ff" id="ffv">
                        </div>
                        <div class="form-group" id="file_img">
                            <label for="image"></label>
                            <input type="file" class="form-control" id="team_img" name="file"/><br>
                        </div>
                        <div class="form-group" id="video_link" style="display: none">
                            <label for="image"></label>
                            <input type="text" class="form-control" id="team_link" name="link"><br>
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form><br/>
                </div>

            </div>
        </div>
    </div>
    <script>

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

        $('.team_edit').on('click', function () {
            var team_id =  "ID " +  $(this).data('id') ;
            var team_id_hid =   $(this).data('id') ;
            var team_team= $(this).data('team');
            var team_image = $(this).data('image');
            var team_link = $(this).data('link');
            $('#team_id').text(team_id);
            $('#team_id_hid').val(team_id_hid);
            $('#team_team').val(team_team);
            $('#team_image').val(team_image);
            $('#team_link').val(team_link);
        });
        $('.team_show').on('click', function () {
            var team_id_show =  "ID " +  $(this).data('id') ;
            var team_title_show = $(this).data('title');
            $('#team_id_show').text(team_id_show);
            $('#team_title_show').text(team_title_show);
            $('#team_show img').attr('src', $(this).attr('data-img'));
        });

    </script>

@endsection
