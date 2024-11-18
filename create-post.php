<?php 
    error_reporting(0);
    include 'includes/headerProvider.php';
?>

			<section class="ls with_bottom_border">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ol class="breadcrumb darklinks">
								<li class="active">Create New Post</li>
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

			<section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Create New Post</h3>
                        </div>
                        <!-- .col-* -->
                    </div>
                    <!-- .row -->

                    <div class="row" style="margin-left:5%">
                        <div class="col-xs-6">
                            <form action="provider_create_post.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="postImage">Image:</label>
                                    <input type="file" class="form-control" id="postImage" name="image" accept="image/*" onchange="showThumbnail(this)">
                                    <img id="thumbnail" src="#" alt="Image Preview" style="display: none; margin-top: 10px; max-height: 150px;">
                                </div>

                                <div class="form-group">
                                    <label for="postTitle">Title:</label>
                                    <input type="text" class="form-control" id="postTitle" name="title" required>
                                </div><br><br>

                                <div class="form-group">
                                    <label for="postCategories">Category:</label>
                                    <select class="form-control" id="categories" name="categories" required>
                                        <option value="Mental Health">Mental Health</option>
                                        <option value="Grief & Loss">Grief & Loss</option>
                                    </select>
                                </div><br><br>

                                <div class="form-group">
                                    <label for="postCategories">Article:</label>
                                    <textarea type="text" class="form-control" id="article" name="article"></textarea>
                                </div><br><br>

                                <input type="hidden" name="author" value="<?php echo $username; ?>">

                                <button type="submit" class="btn btn-primary">Create Post</button>
                            </form>
                        </div>
                        <!-- .col-* -->
                    </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
            </section>

            <script>
                function showThumbnail(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            var thumbnail = document.getElementById('thumbnail');
                            thumbnail.src = e.target.result;
                            thumbnail.style.display = 'block';
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>


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