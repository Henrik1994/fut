@extends('layouts.main')
@section('title')
    single
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
                    @if(isset($teams))
                    @foreach($teams as $team)
                        <li><a href="{{ url('/club', $team->id) }}"><img
                                        src="{{ ($team->link != '')?$team->link:asset('image/'.$team->image) }}"
                                        style="width: 32px;height: 32px"/><span
                                        style="height: 46px;top: 0">{{ $team->team }}</span></a></li>
                    @endforeach
                        @endif
                </ul>
                <!--sidebar nav end-->
                <div class="text-center">
                    <a href="#"><img src="{{ asset('images/17.png') }}"/></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div id="page-wrapper">
        <div class="top-grids">
            <div class="top-grids-info">
                <!-- top-grid-right -->
                <div class="col-md-3 top-grid-right basket-top-grid-right s-top-grid-right">
                    <div class="top-news features">
                        <h3 style="color: #F44336">News</h3>
                        <div class="top-news-grids">
                            @if(isset($news_all))
                                @foreach($news_all as $news)
                                    <div class="two-grids-bottom-grid-img">
                                        <a href="{{ url('news_single',$news->id) }}"><img src="{{ asset('image/'.$news->image) }}" style="width:273px;height:182px"></a>
                                        <a href="{{ url('news_single',$news->id) }}">{{ $news->title }}</a>
                                        <p>{{ $news->description }}</p>
                                    </div>
                                @endforeach
                            @endif
                            {{--<div class="two-grids-bottom-grid-img">--}}
                                {{--<a href=""><img src="{{ asset('images/g9.jpg') }}" alt=""></a>--}}
                                {{--<a href="">Cras euismod tortor sit amet sem dapibus lacinia vel ut felis</a>--}}
                                {{--<p>barev axpers</p>--}}
                            {{--</div>--}}

                        </div>
                    </div>

                </div>
                <!-- //top-grid-right -->
                <!-- top-grid-left -->
                <div class="col-md-9 top-grid-left basket-top-grid-left">
                    <!-- top-big-grids -->
                    <div class="top-big-grids">
                        <div class="col-md-8 top-grid-left-left s-top-grid-left-left">
                            <div class="top-grid-left-left-grids">
                    @yield('single')

                            </div>
                            <!-- three-grids -->
                            <div class="three-grids">
                                <div class="three-grid">
                                    @if(isset($important_all))
                                        @foreach($important_all as $item)
                                    <div class="three-grid-info">
                                        <div class="three-grid-img">
                                            <a href="{{ url('/important_single',$item->id) }}"><img src="{{ asset('image/'.$item->image) }}" alt=""/></a>
                                        </div>
                                        <div class="three-grid-text">
                                            <div class="three-grid-text-heading">
                                                <a class="text" href="{{ url('/important_single',$item->id) }}">{{ $item->title }}</a>
                                            </div>
                                            <div class="t-grid author-grid">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-clock-o"></i> {{ date('d-m-y',strtotime($item->created_at)) }}</a></li>
                                                    {{--<li><a href="#"><i class="fa fa-user"></i> Vestibulum</a></li>--}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                        @endif
                                </div>

                                <div class="clearfix"></div>
                            </div>
                            <!-- //three-grids -->

                        </div>
                        <!-- top-grid-left-right -->
                        <div class="col-md-4 top-grid-left-right s-top-grid-left-right">
                            <!-- most-view-grids -->
                            <div class="most-view-grids s-most-view-grids">
                                <div class="most-view-grids-heading">
                                    <h3>Most Viewed</h3>
                                </div>
                                <div class="sap_tabs">
                                    <div id="horizontalTab" style="display: block; margin: 0px; width: 100%;">
                                        <ul class="resp-tabs-list">
                                            <li class="resp-tab-item grid1 resp-tab-active" aria-controls="tab_item-0"
                                                role="tab"><span>Today</span></li>
                                            <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span>This Week</span>
                                            </li>
                                            <li class="resp-tab-item grid3" aria-controls="tab_item-2" role="tab"><span>This Month</span>
                                            </li>
                                            <div class="clearfix"></div>
                                        </ul>
                                        <div class="clear"></div>
                                        <div class="resp-tabs-container">
                                            <h2 class="resp-accordion resp-tab-active" role="tab"
                                                aria-controls="tab_item-0"><span class="resp-arrow"></span>Today</h2>
                                            <div class="tab-1 resp-tab-content resp-tab-content-active"
                                                 aria-labelledby="tab_item-0" style="display:block">
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f7.jpg') }}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Sed neque nibh</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f8.jpg') }}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="#">Nam efficitur</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f10.jpg') }}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Quisque lacinia</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f13.jpg') }}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Duis accumsan</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f15.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Nulla facilisi</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span
                                                        class="resp-arrow"></span>This Week</h2>
                                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f15.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Nulla facilisi</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f7.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Sed neque nibh</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f8.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Nam efficitur</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f10.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Quisque lacinia</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f13.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Duis accumsan</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span
                                                        class="resp-arrow"></span>This Month</h2>
                                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img
                                                                    src="{{ asset('images/f13.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Duis accumsan</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img src="images/f15.jpg" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Nulla facilisi</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img src="images/f7.jpg" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Sed neque nibh</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img src="images/f8.jpg" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Nam efficitur</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="news-right-grids most-view-left">
                                                    <div class="news-right-grids-img most-view-left-img">
                                                        <a href="single.blade.php"><img src="images/f10.jpg" alt=""></a>
                                                    </div>
                                                    <div class="news-right-grids-info most-view-left-img">
                                                        <a href="single.blade.php">Quisque lacinia</a>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //most-view-grids -->
                        </div>
                        <!-- top-grid-left-right -->
                        <div class="clearfix"></div>
                    </div>
                    <!-- //top-big-grids -->
                </div>
                <!-- //top-grid-left -->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection