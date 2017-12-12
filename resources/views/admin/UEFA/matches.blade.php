@extends('layouts.admin')
@section('title')
    Matches
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('date/jquery.datetimepicker.css') }}" />
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="more-sports">
                        <div class="more-sports-heading">
                            <h3 class="text-center">Matches Page </h3>
                            <button class="center btn-primary btn-group-justified" id="add_matches"><span class="glyphicon glyphicon-plus"></span> Add
                                Posts
                            </button>
                            <hr/>
                            <div class="demo" id="matches_demo" style="display: none!important;">
                                <form action="{{ url('matches_set') }}" method="post" class="form-inline">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="Date">Date</label>
                                        <button class="btn disabled"><span class="glyphicon glyphicon-calendar"></span></button><input type="text" id="datetimepicker" name="date" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="tesam1">Team 1</label>
                                        <input type="text" class="form-control" name="team1" id="team1" placeholder="Team 1" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="team2">Team 2</label>
                                        <input type="text" class="form-control" name="team2" id="team2" placeholder="Team 2" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn-success" id="save" value="Save">
                                    </div>
                                </form><br /><hr />
                            </div>
                        </div>
                        <?php  $i = 1; ?>
                        {{--<h2>Hover Rows</h2>--}}
                        <table class="table table-bordered" style="border: 1px solid black">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Team 1</th>
                                <th>Team 2</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($matches))
                                    @foreach($matches as $match)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $match->date }}</td>
                                        <td>{{ $match->team1 }}</td>
                                        <td>{{ $match->team2 }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success matches_update" data-toggle="modal" data-target="#matches_update" data-id="{{ $match->id }}" data-date="{{ $match->date }}" data-team1="{{ $match->team1 }}"  data-team2 ="{{ $match->team2 }}"><span class="glyphicon glyphicon-edit"></span></button>
                                            <a href="{{ url('/delete_matches', $match->id) }}"><button type="button" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div id="matches_update" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content col-sm-12">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" id="matches_id"></h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('update_matches') }}" method="post" class="form-inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="matches_id_hid" id="matches_id_hid" value="" />
                                        <div class="form-group">
                                            <label for="Date">Date</label>
                                            <button class="btn disabled"><span class="glyphicon glyphicon-calendar"></span></button><input type="text" name="date" id="matches_date" class="form-control datetimepicker" />
                                        </div>
                                        <div class="form-group">
                                            <label for="tesam1">Team 1</label>
                                            <input type="text" class="form-control" name="team1" id="matches_team1" placeholder="Team 1" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="team2">Team 2</label>
                                            <input type="text" class="form-control" name="team2" id="matches_team2" placeholder="Team 2" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" id="save" value="Save">
                                        </div>
                                    </form><br /><hr /><br /><hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('date/jquery.datetimepicker.full.js') }}"></script>
        <script>
            $('#datetimepicker').datetimepicker();
            $('.datetimepicker').datetimepicker();
        </script>
        <script>
            $("#add_matches").click(function () {
                $("#matches_demo").slideToggle("slow");
            });
            $('.matches_update').on('click', function () {
                var $matches_id =  "ID " +  $(this).data('id') ;
                var $matches_id_hid =   $(this).data('id') ;
                var $matches_date = $(this).data('date');
                var $matches_team1 = $(this).data('team1');
                var $matches_team2 = $(this).data('team2');
                $('#matches_id').text($matches_id);
                $('#matches_id_hid').val($matches_id_hid);
                $('#matches_date').val($matches_date);
                $('#matches_team1').val($matches_team1);
                $('#matches_team2').val($matches_team2);
            });
        </script>
    </section>
@endsection