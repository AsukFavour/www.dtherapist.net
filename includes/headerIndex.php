<!DOCTYPE html>
<html class="no-js">

<head>
	<title>DTherapist</title>
	<meta charset="utf-8">
	<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg+xml" href="./images/logo1.png" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	
</head>

<body>
	<div class="preloader">
		<div class="preloader_image"></div>
	</div>
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<section class="page_topline cs table_section table_section_md columns_padding_0">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 text-center text-md-left">
							<ul class="inline-dropdown inline-block divided_content">

								<li class="dropdown login-dropdown">
									<a class="header-button" data-target="#" href="index" data-toggle="dropdown"
										aria-haspopup="true" role="button" aria-expanded="false">
										<i class="fa fa-user"></i>
										<span class="header-button-text">Login</span>
									</a>

									<div class="dropdown-menu ls with_padding">

										<p>
											<strong class="grey">If you have an account, please log in:</strong>
										</p>
										<form role="form" action="includes/login.php" method="POST">

											<div class="form-group">
												<label for="login_email" class="sr-only">Email address</label>
												<input type="email" class="form-control" id="login_email"
													placeholder="Email Address" name="email">
											</div>
											<div class="form-group">
												<label for="login_password" class="sr-only">Password</label>
												<input type="password" class="form-control" id="login_password"
													placeholder="Password" name="password">
											</div>
											<div class="form-group">
												<label for="login_password" class="sr-only">Registration Type</label>
												<select class="form-control" name="registrationType">
													<option value=" ">Select Registration Type</option>
													<option>Client</option>
													<option>Provider</option>
												</select>
											</div>
											<div class="checkbox">
												<input type="checkbox" id="remember_checkbox" name="rememberme">
												<label for="remember_checkbox">
													Remember Me
												</label>
											</div>

											<button type="submit" class="theme_button color1 block_button">
												Log in
											</button>

										</form>
										<div class="topmargin_20 darklinks">
											<a href="forgot-password">Forgot Your Password?</a>
										</div>

									</div>
								</li>


								<a class="header-button" data-target="#" href="index" data-toggle="dropdown"
								aria-haspopup="true" role="button" aria-expanded="false" id="registerButton">
									<i class="fa fa-lock"></i>
									<span class="header-button-text">Register</span>
								</a>
								<div class="dropdown-menu ls with_padding" style="display:none" id="registerDiv">
									<form role="form">

										<div class="form-group">
											<label for="login_email" class="sr-only">Email address</label>
											<select class="form-control" id="registrationType">
												<option value=" ">Select Registration Type</option>
												<option value="register-client">Register As A Client</option>
        										<option value="register-provider">Register As A Provider</option>
											</select>
										</div>
									</form>

								</div>
								
							</ul>

						</div>
						<script>
							document.querySelector('#registerButton').addEventListener('click', function(event) {
								event.preventDefault(); // Prevent the default link behavior
								var dropdownMenu = document.querySelector('#registerDiv');
								if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
									dropdownMenu.style.display = 'block';
								} else {
									dropdownMenu.style.display = 'none';
								}
							});
							document.getElementById('registrationType').addEventListener('change', function() {
								var selectedValue = this.value;
								if (selectedValue === 'register-client') {
									window.location.href = 'register-user';
								} else if (selectedValue === 'register-provider') {
									window.location.href = 'register-provider';
								}
							});
						</script>

						<div class="col-md-6 text-center divided_content">

							<div>
								<div class="media small-teaser">
									<div class="media-left">
										<i class="fa fa-user highlight fontsize_16"></i>
									</div>
									<div class="media-body">
										+234 (803)308 7303
									</div>
								</div>
							</div>

							<div>
								<div class="media small-teaser">
									<div class="media-left">
										<i class="fa fa-map-marker highlight fontsize_16"></i>
									</div>
									<div class="media-body">
										12a Mabinuori Dawodu st, Gbagada1, Lagos, Nigeria
									</div>
								</div>
							</div>

						</div>

						<div class="col-md-3 text-center text-md-right bottommargin_0">
							<?php
								//if there is a login cookie, send to login else send to fill appointment form setcookie(""
								if(isset($_COOKIE['dTheraClie'])){
									$usercode = $_COOKIE['dTheraClie'];
									echo'<a href="login-user" class="theme_button color1 margin_0">Make an appointment</a>';
								}else{
									echo'<a href="login-user" class="theme_button color1 margin_0">Make an appointment</a>';
								}
							?>
						</div>

					</div>
				</div>
			</section>

			<header class="page_header header_white table_section columns_padding_0 toggler-xs-right">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-sm-5">
							<a href="index" class="logo">
							<img src="images/logo.jpg">
							</a>
							<!-- header toggler -->
							<span class="toggle_menu visible-xs">
								<span></span>
							</span>
						</div>
						<div class="col-md-6 col-sm-2 text-center">
							<!-- main nav start -->
							<nav class="mainmenu_wrapper">
								<ul class="mainmenu nav sf-menu">
									<li class="active">
										<a href="index">Home</a>
									</li>

									<li>
										<a href="about">About Us</a>
									</li>

									<li>
										<a href="blog">Our Services</a>
									</li>

									<li>
										<a href="contact">Resources</a>
										<ul>
											<li>
												<a href="contact">Blogs</a>
											</li>
											<li>
												<a href="contact2">Resources</a>
											</li>
										</ul>
									</li>
									</li>

									<li>
										<a href="blog">Contact</a>
									</li>
								</ul>
							</nav>
							<!-- eof main nav -->
							<span class="toggle_menu hidden-xs">
								<span></span>
							</span>
						</div>
						<div class="col-md-3 col-sm-5 text-right hidden-xs lightgreylinks">
							<div class="page_social_icons divided_content">
								<span>
									<a class="social-icon soc-facebook" href="#" title="Facebook"></a>
								</span>
								<span>
									<a class="social-icon soc-twitter" href="#" title="Twitter"></a>
								</span>
								<span>
									<a class="social-icon soc-instagram" href="#" title="Instagram"></a>
								</span>
								<span>
									<a class="social-icon soc-linkedin" href="#" title="LinkedIn"></a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</header>