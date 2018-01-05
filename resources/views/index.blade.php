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
    <div id="page-wrapper" style="padding-top: 19px!important;">
        <div class="top-grids">
            <div class="top-grids-info">
                <!-- top-grid-left -->
                <div class="col-md-9 top-grid-left">
                    <!-- top-big-grids -->
                    <div class="top-big-grids">
                        <div class="col-md-8 top-grid-left-left">
                        @if(isset($videos))
                            @foreach($videos as $video)
                                    <div class="top-grid-left-left-grids">
                                <div class="col-md-8 top-grid-left-img">
                                    <div >
                                       <iframe src="{{ $video['video'] }}" style="width:410px;height: 277px " ></iframe>
                                    </div>
                                </div>
                                <div class="col-md-4 top-grid-left-info">
                                    <a class="text" href="{{ url('/video_single',$video->id) }}">{{ (strlen($video['title']) < 50)?$video['title']:substr($video['title'],0,50)."..."  }}</a>
                                    <p>{{ (strlen($video['description']) < 85)?$video['description'] :substr($video['description'],0,90)."..."  }}</p>
                                    <div class="t-grid">
                                        <ul>
                                            <li><a href="{{ url('/video_single',$video->id) }}"><i class="fa fa-clock-o"></i> {{ date("Y-m-d",strtotime($video['created_at']))}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- three-grids -->
                            @endforeach
                            @endif
                            <div class="two-grids-bottom">
                                <div class="two-grids-bottom-grids">
                                    @if(isset($news))
                                        @for($i = 0; $i < count($news); $i++)
                                            <div class="col-md-6 two-grids-bottom-grid">
                                                <div class="two-grids-bottom-grid-img">
                                                    <a href="{{ url('/news_single',$news[$i]->id) }}"><img
                                                                src="{{ asset('image/'.$news[$i]->image) }}"
                                                                style="width: 262px;height: 148px" /></a>
                                                    <a href="{{ url('/news_single',$news[$i]->id) }}">{{ (strlen($news[$i]->title) < 50)?$news[$i]->title:substr($news[$i]->title,0,50)."..."  }}</a>
                                                    <p>{{ (strlen($news[$i]->description) < 80)?$news[$i]->description :substr($news[$i]->description,0,85)."..."  }}</p>
                                                </div>
                                            </div>
                                       @break($i == 1)
                                        @endfor
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- two-grids-bottom -->

                            <div class="three-grids">
                                @if(isset($news))
                                    @for( $i = 2; $i < count($news); $i++)
                                        <div class="three-grid">
                                            <div class="three-grid-info">
                                                <div class="three-grid-img">
                                                    <a href="{{ url('/news_single',$news[$i]->id) }}"><img src="{{ asset('image/'.$news[$i]->image) }}"
                                                                     style="width: 195px;height: 109px"/></a>
                                                </div>
                                                <div class="three-grid-text">
                                                    <div class="three-grid-text-heading">
                                                        <a class="text"
                                                           href="{{ url('/news_single',$news[$i]->id) }}">{{ (strlen($news[$i]->title) < 40)?$news[$i]->title:substr($news[$i]->title,0,40)."..."  }}</a>
                                                    </div>
                                                    <div class="t-grid author-grid">
                                                        <ul>
                                                            <li><a href="#"><i
                                                                            class="fa fa-clock-o"></i> {{ substr($news[$i]->created_at,0,10 ) }}
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @break($i == 4)
                                    @endfor
                                @endif
                                <div class="clearfix"></div>
                            </div>
                            <!-- two-grids-bottom -->
                            <!-- more-news -->
                            <div class="more-news">
                                <div class="more-news-heading">
                                    <h3>News</h3>
                                </div>
                                <div class="more-news-grids">
                                    <div class="col-md-6 more-news-left">
                                        @if(isset($news))
                                            @for( $i = 5; $i < count($news); $i++)
                                                <div class="more-news-left-heading">
                                                    <h4>
                                                        <i class="fa fa-clock-o"></i> {{ substr($news[$i]->created_at,0,10 ) }}
                                                    </h4>
                                                </div>
                                                <div class="news-right-grids">
                                                    <div class="news-right-grids-img">
                                                        <a href="{{ url('/news_single',$news[$i]->id) }}"><img
                                                                    src="{{ asset('image/'.$news[$i]->image) }}"
                                                                    style="width: 115px;height: 77px"/></a>
                                                    </div>
                                                    <div class="news-right-grids-info">
                                                        <a href="{{ url('/news_single',$news[$i]->id) }}">{{ (strlen($news[$i]->title) < 15)?$news[$i]->title:substr($news[$i]->title,0,15)."..."  }}</a>
                                                        <p>{{ (strlen($news[$i]->description) < 40)?$news[$i]->description:substr($news[$i]->description,0,40)."..."  }}</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @break($i == 6)
                                            @endfor
                                        @endif


                                    </div>
                                    <div class="col-md-6 more-news-left">
                                        @if(isset($news))
                                            @for( $i = 7; $i < count($news); $i++)
                                                <div class="more-news-left-heading">
                                                    <h4> <i class="fa fa-clock-o"></i> {{ substr($news[$i]->created_at,0,10 ) }}</h4>
                                                </div>
                                                <div class="news-right-grids">
                                                    <div class="news-right-grids-img">
                                                        <a href="{{ url('/news_single',$news[$i]->id) }}"><img src="{{ asset('image/'.$news[$i]->image) }}" style="width: 115px;height: 77px"/></a>
                                                    </div>
                                                    <div class="news-right-grids-info">
                                                        <a href="{{ url('/news_single',$news[$i]->id) }}">{{ (strlen($news[$i]->title) < 15)?$news[$i]->title:substr($news[$i]->title,0,15)."..."  }}</a>
                                                        <p>{{ (strlen($news[$i]->description) < 40)?$news[$i]->description:substr($news[$i]->description,0,40)."..."  }}</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @break($i == 8)
                                            @endfor
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- //more-news -->
                        </div>
                        <!-- top-grid-left-right -->
                        <div class="col-md-4 top-grid-left-right">
                            @if(isset($importants))
                                @foreach($importants as $important)
                            <div class="top-grid-left-right-grid">
                                <div class="top-grid-left-right-img">
                                    <a href="{{ url('important_single',$important->id) }}"><img src="{{ asset('image/'.$important->image) }}" style="width: 315px;height: 210px"/></a>
                                </div>
                                <div class="top-grid-left-right-info">
                                    <a class="text" href="{{ url('important_single',$important->id) }}">{{ (strlen($important->title) < 33)?$important->title:substr($important->title,0,33)."..."  }}</a>
                                    <p>{{ (strlen($important->description) < 130)?$important->description:substr($important->description,0,130)."..."  }}</p>
                                    <div class="t-grid right-info-t-grid">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-clock-o"></i> 4h</a></li>
                                            <li><a href="#"><i class="fa fa-user"></i> Ornare Congue</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                           @endif

                        </div>
                        <!-- top-grid-left-right -->
                    </div>
                    <!-- //top-big-grids -->
                </div>
                <!-- //top-grid-left -->
                <!-- top-grid-right -->
                <div class="col-md-3 top-grid-right">
                    <!-- today-match -->
                    <div class="today-match">
                        <div class="today-match-heading">
                            <h2>Next Matches</h2>
                        </div>
                        <div class="match-grid">
                            <div class="match-info">
                                <ul>
                                    @if(isset($matches))
                                        @foreach($matches as $match)
                                            <?php
                                            $date = explode(' ', $match->date);
                                            $year = $date[0];
                                            $time = $date[1];
                                            ?>
                                    <li><span style="padding: 0 0">{{ $year }} -</span><span style="padding: 5px;">{{ $time }}</span>{{ $match->team1 }}<span class="color" style="padding: 5px;">Vs</span>{{ $match->team2 }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- //today-match -->
                    <?php $z = 1; ?>
                    <!-- player-rank -->
                    <div class="player-rank">
                        <div class="ranking-heading">
                            <h3>Results</h3>
                        </div>
                        <div class="ranking-grids">
                            <table class="table table-striped ">
                                <thead>
                                <th class="th-rank">#</th>
                                <th class="th-country">Name</th>
                                <th class="th-t-points">Res</th>
                                <th class="th-p-points">Res</th>
                                <th class="th-p-points">Name</th>
                                </thead>

                                <tbody>
                                @if(isset($results))
                                @foreach($results as $result)
                                <tr>
                                    <td class="rank">{{ $z++ }}</td>
                                    <td class="country">{{ $result->team1 }}</td>
                                    <td class="t-points">{{ $result->res1 }}</td>
                                    <td class="t-points p-points">{{ $result->res2 }}</td>
                                    <td class="t-points p-points">{{ $result->team2 }}</td>
                                </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- //player-rank -->
                    <div class="clearfix"></div>
                    <!-- most-view-grids -->

                {{--<div class="govazdi hamar"></div>--}}

                <!-- //most-view-grids -->
                </div>
                <!-- //top-grid-right -->
                <div class="clearfix"></div>
            </div>
            <!-- more-sports -->
            <div class="more-sports">
                <div class="more-sports-heading">
                    <h3>Groups</h3>
                </div>
                <div class="more-sports-grids">
                    @if(isset($groups))
                        @foreach($groups as  $gro)
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <p class="group-name js-group-name ">Group {{ $gro->group}}</p>
                        <table class="table table--standings">
                            <thead>
                            <tr>
                                <th></th>
                                <th>P</th>
                                <th>Pts</th>
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
                                <td class="table_team-played js-played">{{ $gr->p }}</td>
                                <td class="table_team-points js-points"><strong>{{ $gr->pts }}</strong></td>
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
@endsection
