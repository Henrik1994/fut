@extends('layouts.main')
@section('title')
	Contact
	@endsection
@section('content')
<div id="page-wrapper">
	<!-- contact -->
	<div class="contact">
		<h2>Contact</h2>
		<div class="map">
			<h4>How to find us :</h4>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3771907.975236311!2d-2.09480472072984!3d39.07355564363949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1436857347604" frameborder="0" style="border:0" allowfullscreen=""></iframe>
		</div>

		<div class="address">
			<div class="col-md-4 address-grids">
				<h4>Address :</h4>
				<ul>
					<li><p>Eiusmod Tempor inc<br>
							St Dolore Place,<br>
							Kingsport 56777</p>
					</li>
				</ul>
			</div>
			<div class="col-md-4 address-grids">
				<h4>Phone :</h4>
				<p>+2 123 456 789</p>
				<p>+2 987 654 321</p>
			</div>
			<div class="col-md-4 address-grids">
				<h4>Email :</h4>
				<p><a href="mailto:example@email.com">mail@example.com</a></p>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="contact-infom">
			<h4>Miscellaneous Information:</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sheets containing Lorem Ipsum passages,
				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.It was popularised in the 1960s with the release of Letraset
				and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
		<div class="contact-form">
			<h4>Contact Form</h4>
			<form>
				<input type="text" placeholder="Name" required="">
				<input type="email" placeholder="Email" required="">
				<input type="text" placeholder="Telephone" required="">
				<textarea placeholder="Message" required=""></textarea>
				<button class="btn1 btn-1 btn-1b">Submit</button>
			</form>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="login-body">
							<div class="login-heading">
								<h3>Login</h3>
							</div>
							<div class="login-info">
								<form>
									<input type="text" class="user" name="email" placeholder="Email" required="">
									<input type="password" name="password" class="lock" placeholder="Password">
									<div class="forgot-top-grids">
										<div class="forgot-grid">
											<ul>
												<li>
													<input type="checkbox" id="brand1" value="">
													<label for="brand1"><span></span>Remember me</label>
												</li>
											</ul>
										</div>
										<div class="forgot">
											<a href="#">Forgot password?</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<input type="submit" name="Sign In" value="Login">
									<div class="signup-text">
										<a href="signup.blade.php">Don't have an account? Create one now</a>
									</div>
									<hr>
									<h2>or login with</h2>
									<div class="login-icons">
										<ul>
											<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
										</ul>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //	Modal -->
	</div>
	<!-- //contact -->
</div>
	@endsection