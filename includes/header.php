<?php
    //chat with AI
    //load wallet
        //pay with e-wallet
        //pay online
    //Book an appointment
    //notifications
    //have a consultation
    //see doctor's notes
    //chat with admin
    //get details of user
    error_reporting(0);
    session_start();
    $usercode = $_SESSION['dTheraClie'];  
	if(!isset($_SESSION['dTheraClie'])){
		header("Location: login-user");
		exit();
	}
    include 'includes/connect_to_db.php';
    include 'includes/clientData.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->


<!-- Mirrored from html.modernwebtemplates.com/DTherapist/admin_index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jan 2024 17:28:58 GMT -->
<head>
	<title>DTherapist</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg+xml" href="./images/logo1.png" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/dashboard.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->

</head>

<body class="admin">
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">
				<i class="rt-icon2-cross2"></i>
			</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form form-inline" action="">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="theme_button">Search</button>
			</form>
		</div>
	</div>

	<!-- Unyson messages modal -->
     <?php
        //if a new user, display this message once
        if (isset($_GET['message']) && !empty($_GET['message'])) {
            $message = htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8');
            if($message == 'Registration Complete.'){
                echo'<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
                        <div class="fw-messages-wrap ls with_padding" style="color:black">
                            Welcome to our online community!<br><br>

                            We are thrilled to have you join us on this journey towards mental wellness and self-discovery. Our group is dedicated to providing a safe, supportive, and non-judgmental space for individuals to share their experiences, receive guidance, and connect with others who understand what they`re going through.<br><br>

                            Our team of experienced DTherapists and mental health professionals are here to offer expert advice, guidance, and support. Additionally, our AI assistant is available to provide limited advice and guidance to help you get started or answer any immediate questions you may have.<br><br>

                            Remember, you are not alone, and we are here to support you every step of the way.<br><br>
                            
                            <ul class="list-unstyled">
                                <li><b>Mrs Uju Oji</b></li>
                            </ul>
                    

                        </div>
                </div>';
            }
        }
        
    ?>

    
	
	<!-- eof .modal -->

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="admin_contact_modal">
		<!-- <div class="ls with_padding"> -->
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<form class="with_padding" method="post" action="includes/messageAdminClient.php">
					<div class="row">
						<div class="col-sm-12">
							<h3>Contact Admin</h3>
							<div class="contact-form-name">
								<label for="name">Full Name
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="contact-form-subject">
								<label for="subject">Subject
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Subject">
							</div>
						</div>

						<div class="col-sm-12">

							<div class="contact-form-message">
								<label for="message">Message</label>
								<textarea aria-required="true" rows="6" cols="45" name="message" id="message" class="form-control" placeholder="Message"></textarea>
							</div>
						</div>

						<div class="col-sm-12 text-center">
							<div class="contact-form-submit">
								<button type="submit" name="contact_submit" class="theme_button wide_button color1">Send Message</button>
								<button type="reset" id="contact_form_reset" name="contact_reset" class="theme_button wide_button">Clear Form</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<header class="page_header_side page_header_side_sticked ds">
				<div class="side_header_logo ds ms">
					<a href="admin_index.html">
						<span class="logo_text">
							DTherapist
						</span>
					</a>
				</div>
				<span class="toggle_menu_side toggler_light header-slide">
					<span></span>
				</span>
				<div class="scrollbar-macosx">
					<div class="side_header_inner">

						<!-- user -->

						<div class="user-menu">


							<ul class="menu-click">
								<li>
									<a href="#">
										<div class="media">
											<div class="media-left media-middle">
                                                <?php
                                                    if(empty($imageupload)){
                                                        echo'<img src="images/avatar.JPG" alt="">';
                                                    }else{
                                                        echo'<img src="images/team/01.jpg" alt="">';
                                                    }
                                                ?>
												
											</div>
											<div class="media-body media-middle">
												<h4 style="color:black"><?php echo $fname.' '.$lname; ?>
												</h4>

											</div>

										</div>
									</a>
									<ul>
										<li>
											<a href="admin_profile.html">
												<i class="fa fa-user"></i>
												Profile
											</a>
										</li>
										<li>
											<a href="admin_profile_edit.html">
												<i class="fa fa-edit"></i>
												Edit Profile
											</a>
										</li>
										<!--<li>
											<a href="admin_inbox.html">
												<i class="fa fa-envelope-o"></i>
												Inbox
											</a>
										</li> -->
										<li>
											<a href="admin_signin.html">
												<i class="fa fa-sign-out"></i>
												Log Out
											</a>
										</li>
									</ul>
								</li>
							</ul>

						</div>

						<!-- main side nav start -->
						<nav class="mainmenu_side_wrapper">
							<!--<h3 class="dark_bg_color"></h3>
							<ul class="menu-click">
								<li>
									<a href="admin_index.html">
										<i class="fa fa-th-large"></i>
										Dashboard
									</a>

								</li>
							</ul> -->

							<ul class="menu-click">
								<!-- <li>
									<a href="#">
										<i class="fa fa-user"></i>
										Account
									</a>
									<ul>
										<li>
											<a href="admin_profile.html">
												Profile
											</a>
										</li>
										<li>
											<a href="admin_profile_edit.html">
												Edit Profile
											</a>
										</li>
										<li>
											<a href="admin_inbox.html">
												Inbox
											</a>
										</li>
										<li>
											<a href="admin_signin.html">
												Sign In
											</a>
										</li>
										<li>
											<a href="admin_signup.html">
												Sign Up
											</a>
										</li>
									</ul>
								</li> -->
								<li>
									<a href="admin_posts.html">
										<i class="fa fa-file-text"></i>
										A<span style="text-transform: lowercase;">ppointments</span>
									</a>
									<ul>
										<li>
											<a href="admin_posts.html">
												Appointments
											</a>
										</li>
										<li>
											<a href="admin_appointment.html">
												Archived
											</a>
										</li>

									</ul>
								</li>
								<!-- <li>
									<a href="admin_products.html">
										<i class="fa fa-suitcase"></i>
										Products
									</a>
									<ul>
										<li>
											<a href="admin_products.html">
												Products
											</a>
										</li>
										<li>
											<a href="admin_product.html">
												Single Product
											</a>
										</li>

									</ul>
								</li> -->
								<li>
									<a href="danonymous_space.html">
										<i class="fa fa-shopping-cart"></i>
										O<span style="text-transform: lowercase;">rders</span>
									</a>
									<ul>
										<li>
											<a href="danonymous_space.html">
												My Orders
											</a>
										</li>
										<li>
											<a href="communities.html">
												New Order
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="admin_wallet.html">
										<i class="fa fa-comment"></i>
										DA<span style="text-transform: lowercase;">nonymous</span>
									</a>
									<ul>
										<li>
											<a href="admin_wallet.html">
												S<span style="text-transform: lowercase;">hare a </span>S<span style="text-transform: lowercase;">tory</span>
											</a>
										</li>
										<li>
											<a href="admin_comment.html">
												T<span style="text-transform: lowercase;">rending</span>
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="admin_tables.html">
										<i class="fa fa-table"></i>
										M<span style="text-transform: lowercase;">y</span> W<span style="text-transform: lowercase;">allet</span>
									</a>
								</li>
								<li>
									<a href="admin_forms.html">
										<i class="fa fa-check-square-o"></i>
										L<span style="text-transform: lowercase;">oad</span> W<span style="text-transform: lowercase;">allet</span>
									</a>
								</li>
								<li>
									<a href="admin_faq.html">
										<i class="fa fa-support"></i>
										FAQ
									</a>
								</li>
							</ul>
							</ul>
						</nav>
						<!-- eof main side nav -->

						<div class="with_padding grey text-center">
							0 of
							<strong>1</strong> Free Consultation
						</div>

					</div>
				</div>
			</header>

			<header class="page_header header_darkgrey">

				<div class="widget widget_search">
					<form method="get" class="searchform form-inline" action="">
						<div class="form-group">
							<label class="screen-reader-text" for="widget-search-header">Search for:</label>
							<input id="widget-search-header" type="text" value="" name="search" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="theme_button">Search</button>
					</form>
				</div>


				<div class="pull-right big-header-buttons">
					<ul class="inline-dropdown inline-block">


						<li class="dropdown header-notes-dropdown">
							<a class="header-button" data-target="#" href="index.html" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
								<i class="fa fa-bell-o grey"></i>
								<span class="header-button-text">Messages</span>
								<span class="header-dropdown-number">
									1
								</span>
							</a>

							<div class="dropdown-menu ls">
								<div class="dropdwon-menu-title with_background">
									<strong>1 Pending</strong> Notifications

									<div class="pull-right darklinks">
										<a href="dashboard?message=Message has been read">View All</a>
									</div>

								</div>
								<ul class="list-unstyled">

									<li>
										<div class="media with_background">
											<div class="media-left media-middle">
												<div class="teaser_icon label-success">
													<i class="fa fa-envelope"></i>
												</div>
											</div>
											<div class="media-body media-middle">
												<span class="grey">
													We sent you a welcome mail.
												</span>
												<span class="pull-right">Just Now</span>
											</div>
										</div>
									</li>

								</ul>
							</div>
						</li>

						<li class="dropdown header-notes-dropdown">
							<a class="header-button" data-target="#" href="index.html" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
								<i class="fa fa-envelope-o grey"></i>
								<span class="header-button-text">Inbox</span>
								<span class="header-dropdown-number">
									0
								</span>
							</a>

							<div class="dropdown-menu ls">
								<div class="dropdwon-menu-title with_background">
									<strong>0 New</strong> Messages

									<div class="pull-right darklinks">
										<a href="#">View All</a>
									</div>

								</div>
								<ul class="list1 no-bullets no-top-border no-bottom-border">

									<!-- <li>
										<div class="media">
											<div class="media-left">
												<img src="images/team/01.jpg" alt="...">
											</div>
											<div class="media-body">
												<h5 class="media-heading">
													<a href="#">
														Alex Walker
														<span class="pull-right">23 feb at 11:36</span>
													</a>
												</h5>
												<div>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, corporis.
												</div>
											</div>
										</div>
									</li> -->
								</ul>
							</div>
						</li>

						<li class="dropdown header-notes-dropdown">
							<a class="header-button" data-target="#" href="index.html" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
								<i class="fa fa-calendar-o grey"></i>
								<span class="header-button-text">User</span>
							</a>
							<div class="dropdown-menu ls">

								<div class="dropdwon-menu-title with_background">
									<strong>0 Pending</strong> Tasks

									<div class="pull-right darklinks">
										<a href="#">View All</a>
									</div>

								</div>

								<ul class="list-unstyled">

									<!-- <li>
										<p class="progress-bar-title grey">
											<strong>Tasks</strong>
										</p>
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="90">
												<span>90%</span>
											</div>
										</div>
									</li> -->

								</ul>

							</div>

						</li>

						<!-- Uncomment following to show user menu -->
				
                            <li class="dropdown user-dropdown-menu">
                                <a class="header-button" id="user-dropdown-menu" data-target="#" href="./" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                    <i class="fa fa-user grey"></i> <span class="header-button-text">User</span>
                                </a>
                                <div class="dropdown-menu ls">
                                    <ul class="nav darklinks">
                                        <li>
                                            <a href="admin_profile.html">
                                                <i class="fa fa-user"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="admin_profile_edit.html">
                                                <i class="fa fa-edit"></i>
                                                Edit Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="admin_inbox.html">
                                                <i class="fa fa-envelope-o"></i>
                                                Inbox
                                            </a>
                                        </li>
                                        <li>
                                            <a href="admin_signin.html">
                                                <i class="fa fa-sign-out"></i>
                                                Log Out
                                            </a>
                                        </li>
                                    </ul>

                                </div>

                            </li>
                        
                        

						<li class="dropdown visible-xs-inline-block">
							<a href="#" class="search_modal_button header-button">
								<i class="fa fa-search grey"></i>
								<span class="header-button-text">Search</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- eof .header_right_buttons -->
			</header>