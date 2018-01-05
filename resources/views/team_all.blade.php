@extends('layouts.main')
@section('title')
    Home
@endsection
@section('left_teams')
    <div class="left-side sticky-left-side" style='background-color: #006D96;'>
        <!--logo and iconic logo end-->
        <div class="left-side-inner">
            <div class="scrollbar scrollbar1">
                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked custom-nav" style="margin-top: 0 !important; ">
                    <li style="height: 58px!important;" class="active"><a href="{{ url('/') }}"><img src="{{ asset('icons/4.png') }}" style="width: 41px;height: 47px"  alt="Home" /></a></li>
                    @foreach($temas as $team)
                        <li><a href="{{ url('/club', $team->id) }}"><img src="{{ ($team->link != '')?$team->link:asset('image/'.$team->image) }}" style="width: 32px;height: 32px"  /><span style="height: 46px;top: 0">{{ $team->team }}</span></a></li>
                    @endforeach
                </ul>
                <!--sidebar nav end-->
                <div class="text-center">
                    <a href="{{ url('/teams/more') }}"><img src="{{ asset('images/17.png') }}"  /></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div id="page-wrapper">
        <div class="contact">
            <h2>Teams</h2>
            <div class="row">
                @if(isset($temas))
                    @for($i = 0; $i < count($temas); $i++ )
                <div class="col-sm-1">
                   <a href="{{ url('/club',$temas[$i]->id) }}"><img src="{{ ($temas[$i]->link != '')?$temas[$i]->link:asset('image/'.$temas[$i]->image) }}" style="width: 50px;height: 50px"></a>
                    <a href="{{ url('/club',$temas[$i]->id) }}"><p>{{ $temas[$i]->team }}</p></a>
                </div>
                    @endfor
                    @endif
            </div>



        </div>
    </div>
    @endsection