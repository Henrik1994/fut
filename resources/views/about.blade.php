@extends('layouts.main')
@section('title')
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
					<a href="#"><img src="{{ asset('image/17.png') }}"/></a>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('content')
<div id="page-wrapper">
	<!-- contact -->
	<div class="contact about">
		<div class="about-info">
			<h2>A brief history</h2>
		</div>
		<div class="about-grids">
			<div class="col-md-8 about-left">
				<h3>Phasellus dignissim massa nisl, et elementum lacus gravida at. Suspendisse vel turpis mi.Praesent luctus, est hendrerit ornare faucibus, ex neque tristique lorem</h3>
				<p>Aliquam suscipit diam eget dolor dapibus consequat ut sit amet lorem. Duis iaculis tristique mauris a aliquam. Aliquam scelerisque eros lacus, sit amet tincidunt eros bibendum in.dolor dapibus consequat ut sit amet lorem. Duis iaculis tristique mauris a aliquam. Aliquam scelerisque eros lacus, sit amet tincidunt eros bibendum in.  Aliquam erat volutpat. Cras tincidunt quis erat ac ornare. Aliquam porttitor mattis sem, commodo semper risus tempus vestibulum. Proin ipsum est Aliquam suscipit diam eget dolor dapibus consequat ut sit amet lorem. Duis iaculis tristique mauris a aliquam. Aliquam scelerisque eros lacus, sit amet tincidunt eros bibendum in. Aliquam erat volutpat. Cras tincidunt quis erat ac ornare. Aliquam porttitor mattis sem, commodo semper risus tempus vestibulum. Proin ipsum est</p>
			</div>
			<div class="col-md-4 about-right">
				<img src="images/about1.jpg" alt="">
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="testimonial">
			<div class="testimonial-heading">
				<h3>Testimonial</h3>
			</div>
			<div class="testimonial-grids">
				<div class="col-md-4 testimonial-top-grid">
					<div class="item-testimonial">
						<div class="content_box">
							<blockquote>
								<p>Nulla a urna non eros egestas fermentum quis id diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
								<div class="a-author">Director - <a href="#">John</a></div>
							</blockquote>
						</div>
						<div class="avatar">
							<img src="images/at1.jpg" class="img-responsive" alt="">
						</div>
					</div>
				</div>
				<div class="col-md-4 testimonial-top-grid">
					<div class="item-testimonial">
						<div class="avatar">
							<img src="images/at2.jpg" class="img-responsive" alt="">
						</div>
						<div class="content_box">
							<blockquote>
								<p>In pellentesque, libero eu accumsan ullamcorper, lorem mauris dictum turpis, pretium vulputate augue enim dictum tortor. Quisque nisi sapien, consectetur vitae sapien vel</p>
								<div class="a-author">Editor - <a href="#">Marry watson</a></div>
							</blockquote>
						</div>
					</div>
				</div>
				<div class="col-md-4 testimonial-top-grid">
					<div class="item-testimonial item-testimonial_last">
						<div class="avatar">
							<img src="images/at3.jpg" class="img-responsive" alt="">
						</div>
						<div class="content_box">
							<blockquote>
								<p>Sed ultrices felis eros, at dignissim massa suscipit ac. Morbi gravida, lacus eu blandit tincidunt, neque mi auctor arcu, vel euismod lorem nibh sed tortor.</p>
								<div class="a-author">Senior Reporter - <a href="#">Jack</a></div>
							</blockquote>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="testimonial-grids testimonial-bottom">
				<div class="col-md-4 testimonial-top-grid">
					<div class="item-testimonial">
						<div class="content_box">
							<blockquote>
								<p>Nulla a urna non eros egestas fermentum quis id diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
								<div class="a-author">Reader - <a href="#">KM Vilson</a></div>
							</blockquote>
						</div>
						<div class="avatar">
							<img src="images/at2.jpg" class="img-responsive" alt="">
						</div>
					</div>
				</div>
				<div class="col-md-4 testimonial-top-grid">
					<div class="item-testimonial">
						<div class="avatar">
							<img src="images/at3.jpg" class="img-responsive" alt="">
						</div>
						<div class="content_box">
							<blockquote>
								<p>In pellentesque, libero eu accumsan ullamcorper, lorem mauris dictum turpis, pretium vulputate augue enim dictum tortor. Quisque nisi sapien, consectetur vitae sapien vel</p>
								<div class="a-author">Reporter - <a href="#">Williams</a></div>
							</blockquote>
						</div>
					</div>
				</div>
				<div class="col-md-4 testimonial-top-grid">
					<div class="item-testimonial item-testimonial_last">
						<div class="avatar">
							<img src="images/at1.jpg" class="img-responsive" alt="">
						</div>
						<div class="content_box">
							<blockquote>
								<p>Sed ultrices felis eros, at dignissim massa suscipit ac. Morbi gravida, lacus eu blandit tincidunt, neque mi auctor arcu, vel euismod lorem nibh sed tortor.</p>
								<div class="a-author">Reporter - <a href="#">Jokate</a></div>
							</blockquote>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //contact -->
</div>
	@endsection