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
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>


	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<section class="page_breadcrumbs ds background_cover section_padding_50">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1>DTherapist</h1>
							<ol class="breadcrumb divided_content wide_divider">
								<li>
									<a href="index"><u>Home</u></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</li>
								<li>
									<a href="#"><h2>Register</h2></a>
								</li>
								<!--<li class="active">Registration</li> -->
							</ol>
						</div>
					</div>
				</div>
			</section>

			<section class="ls section_padding_top_100 section_padding_bottom_100">
				<div class="container">
					<div class="row">
                        <?php
                            if (isset($_GET['message']) && !empty($_GET['message'])) {
                                $message = htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8');
                                echo '<div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Oh snap!</strong> '.$message.'.
                                </div>';
                            }
                        ?>
                        
						<form class="shop-register" role="form" action="includes/register-client.php" method="POST">
							<div class="col-sm-6">
								<div class="form-group validate-required" id="billing_first_name_field">
									<label for="billing_first_name" class="control-label">
										<span class="grey">First Name:</span>
										<span class="required">*</span>
									</label>
									<input type="text" class="form-control " name="first_name" id="billing_first_name" placeholder="" value="" required>
								</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group validate-required" id="billing_last_name_field">
									<label for="billing_last_name" class="control-label">
										<span class="grey">Last Name:</span>
										<span class="required">*</span>
									</label>
									<input type="text" class="form-control " name="last_name" id="billing_last_name" placeholder="" value="" required>
								</div>
							</div>

							<div class="col-sm-6">
                                <div class="form-group validate-required validate-email" id="billing_email_field">
									<label for="billing_email" class="control-label">
										<span class="grey">Email Address:</span>
										<span class="required">*</span>
									</label>
									<input type="email" class="form-control " name="email" id="billing_email" placeholder="" value="" required>
								</div>
                            </div>

                            <div class="col-sm-6">
								<div class="form-group">
									<label for="billing_state" class="control-label">
										<span class="grey">Gender</span>
										<span class="required">*</span>
									</label>
									<select class="form-control" name="gender" id="billing_state">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
                            </div>

                            <div class="col-sm-6">
								<div class="form-group">
									<label for="billing_state" class="control-label">
										<span class="grey">Date of Birth</span>
										<span class="required">*</span>
									</label>
                                    <input type="date" class="form-control " name="dob" id="billing_email" placeholder="" value="" required>									
								</div>
                            </div>

                            <div class="col-sm-6">
								<div class="form-group">
									<label for="billing_state" class="control-label">
										<span class="grey">Marital Status</span>
										<span class="required">*</span>
									</label>
									<select class="form-control" name="marital" id="billing_state">
										<option>Married</option>
										<option>Single</option>
                                        <option>Divorced</option>
										<option>Seperated</option>
                                        <option>Widowed</option>
									</select>
								</div>
                            </div>

                            <div class="col-sm-6">
								<div class="form-group">
									<label for="billing_state" class="control-label">
										<span class="grey">Your Location</span>
										<span class="required">*</span>
									</label>
									<?php include 'includes/states.php'; ?>
								</div>
                            </div>

                            <div class="col-sm-6">
								<div class="form-group">
									<label for="billing_state" class="control-label">
										<span class="grey">Local Government Area</span>
										<span class="required">*</span>
									</label>
									<select class="form-control" name="lga" id="lga">
										
									</select>
								</div>
                                <script>
                                    function getLocalGovernment() {
                                        var selectedState = $("#state").val();

                                        // Make an AJAX request to fetch hospitals based on the selected state
                                        $.ajax({
                                            url: 'includes/getlocalgovernment.php',
                                            type: 'POST',
                                            data: {state: selectedState},
                                            success: function(response) {
                                                // Update the hospital dropdown with the fetched data
                                                $("#lga").html(response);
                                            }
                                        });
                                    }
                                </script>
                            </div>

							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">
									<label for="billing_address_1" class="control-label">
										<span class="grey">Your reason for registering</span>
										<span class="required">optional</span>
									</label>

									<textarea type="text" class="form-control " name="reason" id="billing_address_1" placeholder="" value=""></textarea>

								</div>

							</div>

							<div class="col-sm-12">

								<button type="submit" class="theme_button wide_button color1 topmargin_40">Register Now</button>
								<button type="reset" class="theme_button wide_button">Clear Form</button>

							</div>

						</form>


					</div>
				</div>
			</section>

			<footer class="page_footer cs main_color2 table_section section_padding_50 columns_padding_0">
				<div class="container">

					<div class="row">

						<div class="col-sm-4 col-sm-push-4 text-center">
							<a href="index.html" class="logo big text-shadow">
								DTherapist
								<span class="small-text">Premium HTML Template</span>
							</a>
						</div>

						<div class="col-sm-4 col-sm-pull-4 text-center text-sm-left text-md-left">
							<div class="widget widget_nav_menu greylinks">

								<ul class="menu divided_content wide_divider">
									<li class="">
										<a href="index.html">Home</a>
									</li>
									<li class="">
										<a href="about.html">About</a>
									</li>
									<li class="">
										<a href="services.html">Services</a>
									</li>
								</ul>

							</div>
						</div>

						<div class="col-sm-4 text-center text-sm-right text-md-right">
							<div class="widget widget_nav_menu greylinks">

								<ul class="menu divided_content wide_divider">
									<li class="">
										<a href="gallery-regular-3-cols.html">Gallery</a>
									</li>
									<li class="">
										<a href="blog-right.html">Blog</a>
									</li>
									<li class="">
										<a href="contact.html">Contacts</a>
									</li>
								</ul>

							</div>
						</div>

					</div>
				</div>
			</footer>

			<section class="cs main_color2 page_copyright section_padding_15">
				<div class="container with_top_border">
					<div class="row">
						<div class="col-sm-12 text-center">
							<p class="small-text">&copy; 2017 Psychology and Counseling. All Rights Reserved</p>
						</div>
					</div>
				</div>
			</section>

		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->

	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>
	<script src="js/switcher.js"></script>

</body>
</html>