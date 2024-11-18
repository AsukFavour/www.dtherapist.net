<?php 
    error_reporting(0);
    include 'includes/headerProvider.php';
?>

			<section class="ls with_bottom_border">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ol class="breadcrumb darklinks">
								<li class="active">Dashboard</li>
							</ol>
						</div>
						<!-- .col-* -->
						<div class="col-md-6 text-md-right">
							<span class="dashboard-daterangepicker">
								<i class="fa fa-calendar"></i>
								<span></span>
								<i class="caret"></i>
							</span>
						</div>
						<!-- .col-* -->
					</div>
					<!-- .row -->
				</div>
				<!-- .container -->
			</section>

			<?php
				// check if provider has been approved.
				if ($approvalstatus == 'Pending') {
					$message = htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8');
					echo '<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">Close×</span>
							<span class="sr-only">Close</span>
						</button>
						Your registration is still pending and waiting for Admin approval. This may take up to 3-4days. During this period, you will not be able to receive consultation and some features will be limited. For assistance, kindly reach out to support@dtherapist.net.
					</div>';
				}
			?>

			<section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_10">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-4">
							<h3 class="dashboard-page-title">My Dashboard
							</h3>
						</div>
						<div class="col-md-8 text-md-right">
							<h3 class="sparklines-title">
								<sup>Today Earnings:</sup>

								₦0

								<span class="sparklines" data-values="670,350,135,-170,-324,-386,-468,-200,55,375,520,270,790,-670,-350,135,170,324,386,468,10,55,375,520,270,790" data-type="bar" data-line-color="#eeb269" data-neg-color="#dc5753" data-height="30" data-bar-width="2">
								</span>

							</h3>

							<h3 class="sparklines-title">
								<sup>Yesterday Earn: </sup>
								₦0

								<span class="sparklines" data-values="670,350,135,-170,-324,386,-468,-10,55,375,520,-270,790,670,-350,135,170,324,386,468,10,-55,-375,-520,270,790" data-type="bar" data-line-color="#4db19e" data-neg-color="#007ebd" data-height="30" data-bar-width="2">
								</span>
							</h3>

						</div>

					</div>
					<!-- .row -->


					<div class="row">
						<div class="col-lg-3 col-sm-6">

							<div class="teaser warning_bg_color counter-background-teaser text-center">
								<span class="counter counter-background" data-from="0" data-to="0" data-speed="2100">0</span>
								<h3 class="counter highlight" data-from="0" data-to="0" data-speed="2100">0</h3>
								<p>Consultations / Month</p>
							</div>

						</div>

						<div class="col-lg-3 col-sm-6">

							<div class="teaser danger_bg_color counter-background-teaser text-center">
								<span class="counter counter-background" data-from="0" data-to="0" data-speed="1500">0</span>
								<h3 class="counter highlight" data-from="0" data-to="0" data-speed="1500">0</h3>
								<p>Clients / Month</p>
							</div>

						</div>

						<div class="col-lg-3 col-sm-6">

							<div class="teaser success_bg_color counter-background-teaser text-center">
								<span class="counter counter-background" data-from="0" data-to="0" data-speed="1900">0</span>
								<h3 class="counter highlight" data-from="0" data-to="0" data-speed="1900">0</h3>
								<p>Orders / Month</p>
							</div>

						</div>

						<div class="col-lg-3 col-sm-6">

							<div class="teaser info_bg_color counter-background-teaser text-center">
								<span class="counter counter-background" data-from="0" data-to="0" data-speed="1800">0</span>
								<h3 class="counter-wrap highlight" data-from="0" data-to="0" data-speed="1800">
                                ₦
									<span class="counter" data-from="0" data-to="0" data-speed="1500">0</span>
								</h3>
								<p>Total Earnings</p>
							</div>

						</div>
					</div>

                    <div class="row">


						<div class="col-xs-12 col-lg-6">

							<div class="with_padding">


								<h4 class="unstyled-tabs-title">Appointments</h4>


								<!-- Nav tabs -->
								<ul class="nav-unstyled darklinks" role="tablist">
									<li class="active">
										<a href="#tab-comments-1" role="tab" data-toggle="tab">Pending</a>
									</li>
									<li>
										<a href="#tab-comments-2" role="tab" data-toggle="tab">Scheduled</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content tab-unstyled tab-comments admin-scroll-panel scrollbar-macosx">
									<div class="tab-pane fade in active" id="tab-comments-1">
										<p>You do not have any pending Consultations</p>
										<!-- <ul class="list-unstyled">
											<li class="item-editable">
												<div class="media">
													<div class="item-edit-controls darklinks">
														<a href="#">
															<i class="fa fa-share-square-o"></i>
														</a>
														<a href="#">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#">
															<i class="fa fa-trash-o"></i>
														</a>
													</div>
													<div class="media-left">
														<img src="images/team/01.jpg" alt="...">
													</div>
													<div class="media-body">
														<h5>
															Alex Walker
															<small>2 hours ago</small>
														</h5>
														<div>
															<p>
																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, corporis. Voluptatibus odio perspiciatis non quisquam provident, quasi eaque officia.
															</p>
															<p class="warning_color">
																Pending
															</p>
														</div>
													</div>
												</div>
											</li>
										</ul> -->
									</div>

									<div class="tab-pane fade" id="tab-comments-2">
										<p>You do not have any Scheduled Consultations</p>
										<!-- <ul class="list-unstyled">
											<li class="item-editable">
												<div class="media">
													<div class="item-edit-controls darklinks">
														<a href="#">
															<i class="fa fa-share-square-o"></i>
														</a>
														<a href="#">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#">
															<i class="fa fa-trash-o"></i>
														</a>
													</div>
													<div class="media-left">
														<img src="images/team/02.jpg" alt="...">
													</div>
													<div class="media-body">
														<h5>
															Janet C. Donnalds
															<small>5 hours ago</small>
														</h5>
														<div>
															<p>
																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque dolor laboriosam dolores magnam mollitia, voluptatibus inventore accusamus illo.
															</p>
															<p class="info_color">
																Approved
															</p>
														</div>
													</div>
												</div>
											</li>
										</ul> -->
									</div>

								</div>


							</div>

						</div>
						<!-- .col-* -->

                        <!-- <div class="col-xs-12 col-md-6">

							<div class="with_padding">
								<h4>
									My Communities
								</h4>
								<div class="admin-scroll-panel scrollbar-macosx">
									<ul class="list1 no-bullets">
										<li class="item-editable small-teaser">
											<div class="media">
												<div class="media-left">
													<div class="teaser_icon label-success fontsize_16">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="media-body">
													<h5>
														Stopping Alcoholism
														<small>365 members</small>
													</h5>
													<div>
														<h6>Order Comment:</h6>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, corporis. Voluptatibus odio perspiciatis non quisquam provident, quasi eaque officia.
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- .with_border
						</div> -->

						
					</div>


					


				</div>
				<!-- .container -->
			</section>

			<section class="page_copyright ds darkblue_bg_color">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<p class="grey">&copy; Copyrights 2017</p>
						</div>
						<div class="col-sm-6 text-sm-right">
							<p class="grey">Last account activity
								<i class="fa fa-clock-o"></i> 52 mins ago</p>
						</div>
					</div>
				</div>
			</section>

		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->


	<!-- chat -->
	<div class="side-dropdown side-chat dropdown">
		<a class="side-button side-chat-button" id="chat-dropdown" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-comments-o"></i>
		</a>

		<ul class="dropdown-menu list-unstyled" aria-labelledby="chat-dropdown">
			<li class="dropdown-title darkgrey_bg_color">
				<h4>
					Small Chat
					<span class="pull-right">14.03.2017</span>
				</h4>
			</li>
			<li>

				<ul class="list-unstyled">
					<li class="side-chat-item item-secondary">
						<h5>
							Michael Anderson
							<time class="pull-right small-chat-date" datetime="2017-03-13T08:50:40+00:00">
								08:50
							</time>
						</h5>
						<div class="danger_bg_color">
							Duis autem veum iriure dolor in hendrerit
						</div>
					</li>
					<li class="side-chat-item item-primary">
						<h5>
							Jane Walker
							<time class="pull-right small-chat-date" datetime="2017-03-13T08:50:40+00:00">
								08:52
							</time>
						</h5>
						<div class="warning_bg_color">
							Vulputate vese molestie consequatl illum
						</div>
					</li>
					<li class="side-chat-item item-secondary">
						<h5>
							Michael Anderson
							<time class="pull-right small-chat-date" datetime="2017-03-13T08:50:40+00:00">
								08:50
							</time>
						</h5>
						<div class="danger_bg_color">
							Duis autem veum iriure dolor in hendrerit
						</div>
					</li>
				</ul>
			</li>


			<li role="separator" class="divider"></li>

			<li>
				<div class="side-chat-answer">
					<form class="form-inline button-on-input">
						<div class="form-group">
							<label for="side-chat-message" class="sr-only">Message</label>
							<input type="text" class="form-control" id="side-chat-message" placeholder="Message">
						</div>
						<button type="submit" class="btn btn-danger">
							<i class="fa fa-paper-plane-o"></i>
						</button>
					</form>
				</div>
			</li>
		</ul>
	</div>
	<!-- .chat-dropdown -->


	<a class="side-button side-contact-button" data-target="#admin_contact_modal" href="#admin_contact_modal" data-toggle="modal" role="button">
		<i class="fa fa-envelope"></i>
	</a>


	<!-- template init -->
	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>

	<!-- dashboard libs -->

	<!-- events calendar -->
	<script src="js/admin/moment.min.js"></script>
	<script src="js/admin/fullcalendar.min.js"></script>
	<!-- range picker -->
	<script src="js/admin/daterangepicker.js"></script>

	<!-- charts -->
	<script src="js/admin/Chart.bundle.min.js"></script>
	<!-- vector map -->
	<script src="js/admin/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="js/admin/jquery-jvectormap-world-mill.js"></script>
	<!-- small charts -->
	<script src="js/admin/jquery.sparkline.min.js"></script>

	<!-- dashboard init -->
	<script src="js/admin.js"></script>

</body>


<!-- Mirrored from html.modernwebtemplates.com/DTherapist/admin_index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jan 2024 17:29:13 GMT -->
</html>