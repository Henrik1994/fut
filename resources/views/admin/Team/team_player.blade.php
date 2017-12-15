@extends('layouts.admin')
@section('title')
    Results
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="more-sports">
                        <div class="more-sports-heading">
                            <h3 class="text-center">{{ $team_id->team }} Players Page </h3>
                            <button class="center btn-primary btn-group-justified" id="add_results"><span class="glyphicon glyphicon-plus"></span> Add
                                Posts
                            </button>
                            <hr/>
                            <div class="demo" id="results_demo" style="display: none!important;">
                                <form action="{{ url('team_pleyers_set') }}" method="post" class="form-inline">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="team_id" value="{{($team_id)?$team_id->id:''}}">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" name="position" id="position" placeholder="Position" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn-success" id="save" value="Save">
                                    </div>
                                </form><br /><hr />
                            </div>
                        </div>

                        {{--<h2>Hover Rows</h2>--}}
                        <table class="table table-bordered" style="border: 1px solid black">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Position</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($team_id))
                                @foreach($team_id->Team_player as $result)
                                    <tr>
                                        <td><i class="fa fa-user"></i></td>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->nationality }}</td>
                                        <td>{{ $result->position }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success results_update" data-toggle="modal" data-target="#results_update" data-id="{{ $result->id }}"  data-teamid="{{ $result->team_id }}"  data-name="{{ $result->name }}" data-nationality="{{ $result->nationality }}" data-position ="{{ $result->position }}"><span class="glyphicon glyphicon-edit"></span></button>
                                            <a href="{{ url('/team_pleyers_del',$result->id) }}"><button type="button" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div id="results_update" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content col-sm-12">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" id="results_id"></h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('team_pleyers_edit') }}" method="post" class="form-inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="results_id" id="results_id_hid" value="" />
                                        <input type="hidden" name="team_id" id="results_teamid" value="" />
                                        <div class="form-group">
                                            <label for="name"></label>
                                            <input type="text" class="form-control" name="name" id="results_team1" placeholder="Name" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="nationality"></label>
                                            <input type="text" class="form-control" name="nationality" id="results_res2" placeholder="Nationality" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="position"></label>
                                            <input type="text" class="form-control" name="position" id="results_team2" placeholder="Position" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" id="save" value="Save">
                                        </div>
                                    </form><br /><hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#add_results").click(function () {
                $("#results_demo").slideToggle("slow");
            });
            $('.results_update').on('click', function () {
                var $results_id =  "ID " +  $(this).data('id') ;
                var $results_id_hid =   $(this).data('id') ;
                var $results_teamid =   $(this).data('teamid') ;
                var $results_team1 = $(this).data('team1');
                var $results_res1 = $(this).data('res1');
                var $results_res2 = $(this).data('res2');
                var $results_team2 = $(this).data('team2');
                $('#results_id').text($results_id);
                $('#results_id_hid').val($results_id_hid);
                $('#results_teamid').val($results_teamid);
                $('#results_team1').val($results_team1);
                $('#results_res1').val($results_res1);
                $('#results_res2').val($results_res2);
                $('#results_team2').val($results_team2);
            });
        </script>
    </section>
@endsection