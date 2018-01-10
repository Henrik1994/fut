@extends('layouts.main')
@section('title')
    Clubs
@endsection
@section('left_teams')
    <div class="left-side sticky-left-side" style='background-color: #006D96;'>
        <!--logo and iconic logo end-->
        <div class="left-side-inner">
            <div class="scrollbar scrollbar1">
                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked custom-nav" style="margin-top: 0 !important; ">
                    <li style="height: 58px!important;" class="active"><a href="{{ url('/') }}"><img
                                    src="{{ asset('icons/4.png') }}" style="width: 41px;height: 47px" alt="Home"/></a>
                    </li>
                    @foreach($teams as $team)
                        <li><a href="{{ url('/club', $team->id) }}"><img
                                        src="{{ ($team->link != '')?$team->link:asset('image/'.$team->image) }}"
                                        style="width: 32px;height: 32px"/><span
                                        style="height: 46px;top: 0">{{ $team->team }}</span></a></li>
                    @endforeach
                </ul>
                <!--sidebar nav end-->
                <div class="text-center">
                    <a href="{{ url('/teams/more') }}"><img src="{{ asset('image/17.png') }}"/></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div id="page-wrapper">
        <div class="club">
            <div class="club-heading">
                <h2 class="text-center"><img src="{{ ($team_temas->image  == "")? $team_temas->link:asset('image/'.$team_temas->image )}}" style="height: 55px"/> {{ $team_temas->team }}
                </h2>
            </div>
            <div class="club-grids">
                <div class="col-md-8 club-left">
                    <div class="slider-grids" >
                        <div class="col-md-8 slider-left" style="padding: 0!important;">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 549px!important;height: 316px!important;">
                                <div class="carousel-inner">
                                    <?php $i = 0; ?>
                                    @if(isset($team_temas))
                                        @foreach($team_temas->Team_set as $rel)
                                            @if ($i == 0)
                                                    <div class="item active">
                                                        <img src="{{ asset('/image/'.$rel->image)}}" style="width: 549px!important;height: 316px!important;">
                                                    </div>
                                                @else
                                                    <div class="item">
                                                        <img src="{{ asset('/image/'.$rel->image)}}"
                                                             style="width: 549px!important;height: 316px!important;">
                                                    </div>
                                                @endif
                                                <?php $i++; ?>
                                            @endforeach
                                        @endif
                                </div>

                                <!-- Left and right controls -->
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
                        <div class="col-sm-4 slider-right" style="padding: 0!important;">
                            <div class="slider-right-img">
                                @if(isset($team_temas))
                                @for($i = 0; $i < count($team_temas->Team_news);$i++)
                                    <img src=" {{ asset('image/'.$team_temas->Team_news[$i]->image)}}"
                                         style="height: 220px"/>
                                    <div class="slider-right-info">
                                        <a href="{{ url('team_news_single',$team_temas->Team_news[$i]->id) }}">{{ $team_temas->Team_news[$i]->title }}</a>
                                        <p>{{ $team_temas->Team_news[$i]->description }} </p>
                                    </div>
                                    @break($i = 1)
                                @endfor
                                    @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="three-grids">
                        @if(isset($team_temas))
                        @for($i = 1; $i < count($team_temas->Team_news);$i++)
                            <div class="three-grid">
                                <div class="three-grid-info">
                                    <div class="three-grid-img">
                                        <a href="{{ url('team_news_single',$team_temas->Team_news[$i]->id) }}"><img src="{{ asset('image/'.$team_temas->Team_news[$i]->image)}}"
                                                         alt="" style="height: 177px"/></a>
                                    </div>
                                    <div class="three-grid-text">
                                        <div class="three-grid-text-heading">
                                            <a class="text" href="{{ url('team_news_single',$team_temas->Team_news[$i]->id) }}">{{ $team_temas->Team_news[$i]->title }}</a>
                                        </div>
                                        <div class="t-grid author-grid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @break($i == 3)
                        @endfor
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="club-players">
                        <div class="col-md-6 club-players-left-grid">
                            <div class="club-players-left">
                                <div class="club-players-left-heading">
                                    <h3>Our Players</h3>
                                </div>
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="p-name">
                                            Player
                                        </th>
                                        <th class="p-name p-nation">
                                            Name
                                        </th>
                                        <th class="p-name p-nation">
                                            Nationality
                                        </th>
                                        <th class="p-name p-position">
                                            Position
                                        </th>
                                    </tr>
                                    <thead>
                                    <tbody>
                                    @if(isset($team_temas))
                                    @foreach($team_temas->Team_player as $player)
                                        <tr class="p-color">
                                            <td class="p-user"><i class="fa fa-user"></i></td>
                                            <td class="player-name">{{ $player->name }}</td>
                                            <td class="player-name p-country">{{ $player->nationality }}</td>
                                            <td class="player-name p-place">{{ $player->position }}</td>
                                        </tr>
                                    @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 club-players-right-grid">
                            <div class="most-grid">
                                <div class="most-grid-heading">
                                    <h3>Popular Now</h3>
                                </div>
                                @if(isset($team_temas))
                                @foreach($team_temas->Team_important as $item)
                                    <div class="popular-grids">
                                        <div class="popular-grid">
                                            <div class="col-md-3 popular-grid-img">
                                                <img src="{{ asset('images/'.$item->image)}}" alt=""/>
                                            </div>
                                            <div class="col-md-9 popular-grid-right">
                                                <a href="{{ url('team_important_single',$item->id) }}">{{ $item->title }}</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                @endforeach
                                    @endif

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 club-right">
                    <div class="next-match">
                        <h3>Next Matches</h3>
                        <div class="match-table">
                            <table>
                                @foreach($team_temas->Team_next as $next)
                                    <?php
                                    $new = explode(' ', $next->date);
                                    $date = $new[0];
                                    $time = $new[1];
                                    ?>
                                    <tr class="match-b-color">
                                        <td class="date">
                                            {{ $date }}
                                        </td>
                                        <td class="time" style="padding: 0!important;">
                                            {{ $time }}
                                        </td>
                                        <td class="country-club">
                                            {{ $next->team1 }}
                                        </td>
                                        <td class="v-points">
                                            Vs
                                        </td>
                                        <td class="country-club">
                                            {{ $next->team2 }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="next-match last-match">
                        <h3>Last matches</h3>
                        <div class="match-table">
                            <table style="width: 100%">
                                @foreach($team_temas->Team_results as $res)
                                    <tr class="match-b-color">
                                        <td class="date"></td>
                                        <td class="time">
                                            {{ $res->team1 }}
                                        </td>
                                        <td class="country-club">
                                            {{ $res->res1 }}
                                        </td>
                                        <td class="country-club">
                                            {{ $res->res2 }}
                                        </td>
                                        <td class="country-club">
                                            {{ $res->team2 }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="player-rank club-player-rank">
                        <div class="most-view-grids-heading">
                            <h3>Most Viewed</h3>
                        </div>
                        <div class="sap_tabs">
                            <div id="horizontalTab" style="display: block; margin: 0px;">
                                <ul class="resp-tabs-list">
                                    <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab">
                                        <span>Today</span></li>
                                    <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span>This Week</span>
                                    </li>
                                    <li class="resp-tab-item grid3" aria-controls="tab_item-2" role="tab"><span>This Month</span>
                                    </li>
                                    <div class="clearfix"></div>
                                </ul>
                                <div class="clear"></div>
                                <div class="resp-tabs-container">
                                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="{{ asset('images/f7.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Sed neque nibh</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="{{ asset('images/f8.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="#">Nam efficitur</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="{{ asset('images/f10.jpg')}}"
                                                                           alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Quisque lacinia</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="{{ asset('images/f13.jpg') }}"
                                                                           alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Duis accumsan</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f15.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Nulla facilisi</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f15.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Nulla facilisi</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f7.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Sed neque nibh</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f8.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Nam efficitur</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f10.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Quisque lacinia</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f13.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Duis accumsan</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f13.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Duis accumsan</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f15.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Nulla facilisi</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f7.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Sed neque nibh</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f8.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Nam efficitur</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="news-right-grids most-view-left">
                                            <div class="news-right-grids-img most-view-left-img">
                                                <a href="single.html"><img src="images/f10.jpg" alt=""></a>
                                            </div>
                                            <div class="news-right-grids-info most-view-left-img">
                                                <a href="single.html">Quisque lacinia</a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection