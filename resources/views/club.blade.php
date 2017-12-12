@extends('layouts.main')
@section('title')
	Clubs
	@endsection
@section('content')
<div id="page-wrapper">
	<div class="club">
		<div class="club-heading">
			<h2 class="text-center">Barcelona</h2>
		</div>
		<div class="club-grids">
			<div class="col-md-8 club-left">
				<div class="slider-grids">
					<div class="col-md-8 slider">
						<script src="js/responsiveslides.min.js"></script>
						<script>
                            // You can also use "$(window).load(function() {"
                            $(function () {
                                // Slideshow 4
                                $("#slider3").responsiveSlides({
                                    auto: true,
                                    pager: true,
                                    nav: false,
                                    speed: 500,
                                    namespace: "callbacks",
                                    before: function () {
                                        $('.events').append("<li>before event fired.</li>");
                                    },
                                    after: function () {
                                        $('.events').append("<li>after event fired.</li>");
                                    }
                                });
                            });
						</script>
						<div  id="top" class="callbacks_container-wrap">
							<ul class="rslides" id="slider3">
								<li>
									<div class="slider1"></div>
								</li>
								<li>
									<div class="slider1 slider2"></div>
								</li>
								<li>
									<div class="slider1 slider3"></div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 slider-right">
						<div class="slider-right-img">
							<img src="images/f4.jpg" alt="" />
							<div class="slider-right-info">
								<a href="single.html">Fusce ornare congue ligula vel</a>
								<p>Nam id sollicitudin felis. Nulla non bibendum arcu. Vestibulum non venenatis Vestibulum non venenatis </p>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="three-grids">
					<div class="three-grid">
						<div class="three-grid-info">
							<div class="three-grid-img">
								<a href="single.html"><img src="images/g3.jpg" alt="" /></a>
							</div>
							<div class="three-grid-text">
								<div class="three-grid-text-heading">
									<a class="text" href="single.html">Fusce ornare congue ligula vel placerat</a>
								</div>
								<div class="t-grid author-grid">
									<ul>
										<li><a href="#"><i class="fa fa-clock-o"></i> 1h</a></li>
										<li><a href="#"><i class="fa fa-user"></i> Vestibulum</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="three-grid">
						<div class="three-grid-info">
							<div class="three-grid-img">
								<a href="single.html"><img src="images/g4.jpg" alt="" /></a>
							</div>
							<div class="three-grid-text">
								<div class="three-grid-text-heading">
									<a class="text" href="single.html">Fusce ornare congue ligula vel placerat</a>
								</div>
								<div class="t-grid author-grid">
									<ul>
										<li><a href="#"><i class="fa fa-clock-o"></i> 2h</a></li>
										<li><a href="#"><i class="fa fa-user"></i> Cras pretium </a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="three-grid">
						<div class="three-grid-info">
							<div class="three-grid-img">
								<a href="single.html"><img src="images/g5.jpg" alt="" /></a>
							</div>
							<div class="three-grid-text">
								<div class="three-grid-text-heading">
									<a class="text" href="single.html">Fusce ornare congue ligula vel placerat</a>
								</div>
								<div class="t-grid author-grid">
									<ul>
										<li><a href="#"><i class="fa fa-clock-o"></i> 4h</a></li>
										<li><a href="#"><i class="fa fa-user"></i> Phasellus</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
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
								<tr class="p-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">Messi</td>
									<td class="player-name p-country">Argentina</td>
									<td class="player-name p-place">Forward</td>
								</tr>
								<tr class="pg-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">Ortolá</td>
									<td class="player-name p-country">Spain</td>
									<td class="player-name p-place">Goalkeeper</td>
								</tr>
								<tr class="p-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">C.Bravo</td>
									<td class="player-name p-country">Chile</td>
									<td class="player-name p-place">Goalkeeper</td>
								</tr>
								<tr class="pg-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">M.ter Stegen</td>
									<td class="player-name p-country">Germany</td>
									<td class="player-name p-place">Goalkeeper</td>
								</tr>
								<tr class="p-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">Bartra</td>
									<td class="player-name p-country">Spain</td>
									<td class="player-name p-place">Defender</td>
								</tr>
								<tr class="pg-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">Jordi Alba</td>
									<td class="player-name p-country">Spain</td>
									<td class="player-name p-place">Defender</td>
								</tr>
								<tr class="p-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">Douglas</td>
									<td class="player-name p-country">Brazil</td>
									<td class="player-name p-place">Defender</td>
								</tr>
								<tr class="pg-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">Piqué</td>
									<td class="player-name p-country">Spain</td>
									<td class="player-name p-place">Defender</td>
								</tr>
								<tr class="p-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">T. Vermaelen</td>
									<td class="player-name p-country">Belgium</td>
									<td class="player-name p-place">Defender</td>
								</tr>
								<tr class="pg-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">Dani Alves</td>
									<td class="player-name p-country">Brazil</td>
									<td class="player-name p-place">Defender</td>
								</tr>
								<tr class="p-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">J.Mathieu</td>
									<td class="player-name p-country">France</td>
									<td class="player-name p-place">Defender</td>
								</tr>
								<tr class="pg-color">
									<td class="p-user"><i class="fa fa-user"></i></td>
									<td class="player-name">Correia</td>
									<td class="player-name p-country">Brazil</td>
									<td class="player-name p-place">Defender</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-6 club-players-right-grid">
						<div class="most-grid">
							<div class="most-grid-heading">
								<h3>Popular Now</h3>
							</div>
							<div class="popular-grids">
								<div class="popular-grid">
									<div class="col-md-3 popular-grid-img">
										<img src="images/club1.jpg" alt="" />
									</div>
									<div class="col-md-9 popular-grid-right">
										<a href="single.html">Etiam velit lacus, blandit ac nulla eget, tincidunt fermentum elit. Morbi feugiat erat felis</a>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="popular-grids">
								<div class="popular-grid">
									<div class="col-md-3 popular-grid-img">
										<img src="images/club2.jpg" alt="" />
									</div>
									<div class="col-md-9 popular-grid-right">
										<a href="single.html">Etiam velit lacus, blandit ac nulla eget, tincidunt fermentum elit. Morbi feugiat erat felis</a>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="popular-grids">
								<div class="popular-grid">
									<div class="col-md-3 popular-grid-img">
										<img src="images/club3.jpg" alt="" />
									</div>
									<div class="col-md-9 popular-grid-right">
										<a href="single.html">Etiam velit lacus, blandit ac nulla eget, tincidunt fermentum elit. Morbi feugiat erat felis</a>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="popular-grids">
								<div class="popular-grid">
									<div class="col-md-3 popular-grid-img">
										<img src="images/club4.jpg" alt="" />
									</div>
									<div class="col-md-9 popular-grid-right">
										<a href="single.html">Etiam velit lacus, blandit ac nulla eget, tincidunt fermentum elit. Morbi feugiat erat felis</a>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="popular-grids">
								<div class="popular-grid">
									<div class="col-md-3 popular-grid-img">
										<img src="images/club5.jpg" alt="" />
									</div>
									<div class="col-md-9 popular-grid-right">
										<a href="single.html">Etiam velit lacus, blandit ac nulla eget, tincidunt fermentum elit. Morbi feugiat erat felis</a>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="popular-grids">
								<div class="popular-grid">
									<div class="col-md-3 popular-grid-img">
										<img src="images/club1.jpg" alt="" />
									</div>
									<div class="col-md-9 popular-grid-right">
										<a href="single.html">Etiam velit lacus, blandit ac nulla eget, tincidunt fermentum elit. Morbi feugiat erat felis</a>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 club-right">
				<div class="next-match">
					<h3>Next Matches</h3>
					<div class="match-table">
						<table>
							<tr class="match-b-color">
								<td class="date">
									03/04/2014
								</td>
								<td class="time">
									17:30
								</td>
								<td class="country-club">
									FCB
								</td>
								<td class="v-points">
									Vs
								</td>
								<td class="country-club">
									ATM
								</td>
							</tr>
							<tr class="match-b-color">
								<td class="date">
									04/04/2014
								</td>
								<td class="time">
									18:25
								</td>
								<td class="country-club">
									RMA
								</td>
								<td class="v-points">
									Vs
								</td>
								<td class="country-club">
									FCB
								</td>
							</tr>
							<tr class="match-b-color">
								<td class="date">
									06/04/2014
								</td>
								<td class="time">
									19:30
								</td>
								<td class="country-club">
									FCB
								</td>
								<td class="v-points">
									Vs
								</td>
								<td class="country-club">
									ATM
								</td>
							</tr>
							<tr class="match-b-color">
								<td class="date">
									07/04/2014
								</td>
								<td class="time">
									20:25
								</td>
								<td class="country-club">
									RMA
								</td>
								<td class="v-points">
									Vs
								</td>
								<td class="country-club">
									FCB
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="next-match last-match">
					<h3>Last matches</h3>
					<div class="match-table">
						<table>
							<tr class="match-b-color">
								<td class="date">
									01/04/2014
								</td>
								<td class="time">
									20:10
								</td>
								<td class="country-club">
									FCB
								</td>
								<td class="v-points">
									Vs
								</td>
								<td class="country-club">
									VIL
								</td>
							</tr>
							<tr class="match-b-color">
								<td class="date">
									02/04/2014
								</td>
								<td class="time">
									21:45
								</td>
								<td class="country-club">
									RMA
								</td>
								<td class="v-points">
									Vs
								</td>
								<td class="country-club">
									FCB
								</td>
							</tr>
							<tr class="match-b-color">
								<td class="date">
									31/04/2014
								</td>
								<td class="time">
									18:10
								</td>
								<td class="country-club">
									FCB
								</td>
								<td class="v-points">
									Vs
								</td>
								<td class="country-club">
									VIL
								</td>
							</tr>
							<tr class="match-b-color">
								<td class="date">
									01/04/2014
								</td>
								<td class="time">
									19:45
								</td>
								<td class="country-club">
									RMA
								</td>
								<td class="v-points">
									Vs
								</td>
								<td class="country-club">
									FCB
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="clearfix"> </div>
				<div class="player-rank club-player-rank">
					<div class="ranking-heading">
						<h3>Top 10 Players</h3>
					</div>
					<div class="ranking-grids">
						<table>
							<thead>
							<tr><th class="th-rank">
									Rank
								</th>
								<th class="th-country">
									Name
								</th>
								<th class="th-t-points">
									Position
								</th>
								<th class="th-p-points">
									Club
								</th>
								<th class="th-p-points">
									Nationality
								</th>
							</tr></thead>
							<tbody>
							<tr class="b-color">
								<td class="rank c-rank">
									1.
								</td>
								<td class="country c-rank">
									Lionel Messi
								</td>
								<td class="t-points c-rank">
									Forward
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Barcelona</a>
								</td>
								<td class="t-points p-points c-rank">
									Argentina
								</td>
							</tr>
							<tr class="bg-color">
								<td class="rank c-rank">
									2.
								</td>
								<td class="country c-rank">
									Cristiano Ronaldo
								</td>
								<td class="t-points c-rank">
									Forward
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Real Madrid</a>
								</td>
								<td class="t-points p-points c-rank">
									Portugal
								</td>
							</tr>
							<tr class="b-color">
								<td class="rank c-rank">
									3.
								</td>
								<td class="country c-rank">
									Xavi
								</td>
								<td class="t-points c-rank">
									Midfielder
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Barcelona</a>
								</td>
								<td class="t-points p-points c-rank">
									Spain
								</td>
							</tr>
							<tr class="bg-color">
								<td class="rank c-rank">
									4.
								</td>
								<td class="country c-rank">
									Andres Iniesta
								</td>
								<td class="t-points c-rank">
									Midfielder
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Barcelona</a>
								</td>
								<td class="t-points p-points c-rank">
									Spain
								</td>
							</tr>
							<tr class="b-color">
								<td class="rank c-rank">
									5.
								</td>
								<td class="country c-rank">
									Ibrahimovic
								</td>
								<td class="t-points c-rank">
									Forward
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">PSG</a>
								</td>
								<td class="t-points p-points c-rank">
									Sweden
								</td>
							</tr>
							<tr class="bg-color">
								<td class="rank c-rank">
									6.
								</td>
								<td class="country c-rank">
									Radamel Falcao
								</td>
								<td class="t-points c-rank">
									Forward
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Atletico Madrid</a>
								</td>
								<td class="t-points p-points c-rank">
									Colombia
								</td>
							</tr>
							<tr class="b-color">
								<td class="rank c-rank">
									7.
								</td>
								<td class="country c-rank">
									Robin van Persie
								</td>
								<td class="t-points c-rank">
									Forward
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Man Utd</a>
								</td>
								<td class="t-points p-points c-rank">
									Netherlands
								</td>
							</tr>
							<tr class="bg-color">
								<td class="rank c-rank">
									8.
								</td>
								<td class="country c-rank">
									Andrea Pirlo
								</td>
								<td class="t-points c-rank">
									Midfielder
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Juventus</a>
								</td>
								<td class="t-points p-points c-rank">
									Italy
								</td>
							</tr>
							<tr class="b-color">
								<td class="rank c-rank">
									9.
								</td>
								<td class="country c-rank">
									Yaya Toure
								</td>
								<td class="t-points c-rank">
									Midfielder
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Man City</a>
								</td>
								<td class="t-points p-points c-rank">
									Ivory Coast
								</td>
							</tr>
							<tr class="bg-color">
								<td class="rank c-rank">
									10.
								</td>
								<td class="country c-rank">
									Edinson Cavani
								</td>
								<td class="t-points c-rank">
									Forward
								</td>
								<td class="t-points p-points c-rank">
									<a href="club.html">Napoli</a>
								</td>
								<td class="t-points p-points c-rank">
									Uruguay
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>

			<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
		</div>
	</div>
</div>
	@endsection