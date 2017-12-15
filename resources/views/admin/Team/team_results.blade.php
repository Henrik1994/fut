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
                            <h3 class="text-center">{{ $team_id->team }} Results Page </h3>
                            <button class="center btn-primary btn-group-justified" id="add_results"><span class="glyphicon glyphicon-plus"></span> Add
                                Posts
                            </button>
                            <hr/>
                            <div class="demo" id="results_demo" style="display: none!important;">
                                <form action="{{ url('team_results_set') }}" method="post" class="form-inline">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="team_id" value="{{($team_id)?$team_id->id:''}}">
                                    <div class="form-group">
                                        <label for="tesam1">Team 1</label>
                                        <input type="text" class="form-control" name="team1" id="team1" placeholder="Team 1" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="res1">Res 1</label>
                                        <input type="number" class="form-control" name="res1" id="res1" placeholder="Res 1" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="res2">Res 2</label>
                                        <input type="number" class="form-control" name="res2" id="res2" placeholder="Res 2" required />
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
                                <th>Team 1</th>
                                <th>Num</th>
                                <th>Num</th>
                                <th>Team 2</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($team_id))
                                @foreach($team_id->Team_results as $result)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $result->team1 }}</td>
                                        <td>{{ $result->res1 }}</td>
                                        <td>{{ $result->res2 }}</td>
                                        <td>{{ $result->team2 }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success results_update" data-toggle="modal" data-target="#results_update" data-id="{{ $result->id }}"  data-teamid="{{ $result->team_id }}"  data-team1="{{ $result->team1 }}" data-res1="{{ $result->res1 }}" data-res2 ="{{ $result->res2 }}" data-team2 ="{{ $result->team2 }}"><span class="glyphicon glyphicon-edit"></span></button>
                                            <a href="{{ url('/team_results_del',$result->id) }}"><button type="button" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span></button></a>
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
                                    <form action="{{ url('team_results_edit') }}" method="post" class="form-inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="results_id" id="results_id_hid" value="" />
                                        <input type="hidden" name="team_id" id="results_teamid" value="" />
                                        <div class="form-group">
                                            <label for="team1"></label>
                                            <input type="text" class="form-control" name="team1" id="results_team1" placeholder="Team 1" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="res1"></label>
                                            <input type="number" class="form-control" name="res1" id="results_res1" placeholder="Res 1" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="res2"></label>
                                            <input type="number" class="form-control" name="res2" id="results_res2" placeholder="Res 2" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="team2"></label>
                                            <input type="text" class="form-control" name="team2" id="results_team2" placeholder="Team 2" required />
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