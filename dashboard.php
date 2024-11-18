<?php   
    include 'includes/header.php';
?>

			<section class="ls with_bottom_border">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ol class="breadcrumb darklinks">
								<!-- <li>
									<a href="#">Homepage</a>
								</li> -->
								<li class="active">My Dashboard</li>
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
                        <?php
                            if (isset($_GET['message']) && !empty($_GET['message'])) {
                                $message = htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8');
                                if($message !== 'Registration Complete.'){
                                        echo '<div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span aria-hidden="true">×</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>'.$message.'</strong>
                                    </div>';
                                }
                            }
                        ?>
					</div>
					<!-- .row -->

                    <!-- Button to trigger the modal -->
					<div class="row">                       
						<div class="col-md-4">									
							<button type="button" class="theme_button color1" data-toggle="modal" data-target="#appointmentModal">
								Book an appointment
							</button>
						</div>
					</div>

					<!-- Modal Structure -->
					<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="appointmentModalLabel">Book an Appointment</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Modal content (form or information) goes here -->
									<form id="clinicForm" onsubmit="return checkClinicHours() && checkAppointmentTiming();" action="includes/bookappointment.php" method="post" class="doctor-search-form trans">
										<input name="user" value="<?php echo $usercode; ?>" hidden>
										<div class="row">
											<div class="col-md-6"> 
												<div class="mb-3">
													<label class="mb-2">Select a Specialty</label>
													<select class="form-select form-control" id="hospital" name="hospital">
														<option value="">Professional Therapist</option>
														<option value="">Faith-based Counsellor (Christainity)</option>
														<option value="">Faith-based Counsellor (Islam)</option>
													</select>
													
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="mb-3">
													<div class="form-custom">
														<label for="datetime">Date and Time</label>
														<input type="datetime-local" id="datetime" name="datetime" class="form-control" value="" placeholder="Date / Time" required>
															<i class="fas fa-calendar-alt"></i>
															<p id="errormessage"></p>
													</div>
												</div>
											</div>
											
											<div class="col-md-5"><br>
												<button class="btn banner-btn" type="submit">MAKE APPOINTMENT</button>
											</div>
										</div>
									</form>

									<script>
										document.getElementById("errormessage").addEventListener("click", function(event) {
											// Prevent the default behavior to avoid any interference
											event.preventDefault();

											// Navigate to the specified URL
											window.location.href = "chat-ivy";
										});

										function checkClinicHours() {
											// Get the selected date and time from the input
											var selectedDatetime = new Date(document.getElementById("datetime").value);

											// Check if it's Saturday or Sunday
											if (selectedDatetime.getDay() === 0 || selectedDatetime.getDay() === 6) {
												document.getElementById("errormessage").innerHTML = 'Specialists only available Monday to Friday 8am to 4pm. For emergencies, kindly chat with the AI';
												return false;
											}

											// Check if the time is not between 8am to 4pm
											var selectedTime = selectedDatetime.getHours();
											if (selectedTime < 8 || selectedTime >= 16) {
												document.getElementById("errormessage").innerHTML = 'Specialists only open Monday to Friday 8am to 4pm. For emergencies, kindly chat with the AI';
												return false;
											}

											// If the selected date and time are within clinic hours
											document.getElementById("errormessage").innerText = "";
											return true;
										}
									</script>
									<script>
										function checkAppointmentTiming() {
											// Get the selected date and time from the input
											var selectedDatetime = new Date(document.getElementById("datetime").value);
											
											// Get the current date and time
											var presentDatetime = new Date();

											// Check if the selected date and time are in the past
											if (selectedDatetime <= presentDatetime) {
												document.getElementById("errormessage").innerHTML = "Selected date or time cannot be in the past.";
												return false;
											}

											// Calculate the time difference in minutes
											var timeDifference = (selectedDatetime - presentDatetime) / (1000 * 60);

											// Check if the appointment is less than 30 minutes from present time
											if (timeDifference < 30) {
												document.getElementById("errormessage").innerHTML = 'Appointment must be at least 30 minutes from the present time. For emergencies, kindly chat with the AI';
												return false;
											}

											// If the selected date and time are valid
											document.getElementById("errormessage").innerText = "";
											return true;
										}
									</script>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

					<!-- .row -->

					<div class="row">
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                            }
                            .with_border {
                                border: 1px solid #ccc;
                                border-radius: 10px;
                                margin: 20px;
                                overflow: hidden;
                            }
                            .with_padding {
                                padding: 20px;
                            }
                            .admin-scroll-panel {
                                max-height: 400px;
                                overflow-y: auto;
                            }
                            .media {
                                display: flex;
                                margin-bottom: 15px;
                            }
                            .media img {
                                border-radius: 50%;
                                width: 50px;
                                height: 50px;
                            }
                            .media-body {
                                flex: 1;
                                margin-left: 10px;
                                background-color: #f1f1f1;
                                border-radius: 10px;
                                padding: 10px;
                            }
                            .media-right img {
                                margin-left: 10px;
                            }
                            .chat-input {
                                display: flex;
                                border-top: 1px solid #ccc;
                                padding: 10px;
                            }
                            .chat-input input {
								width: 70%; /* Set the width to 70% */
                                flex: 1;
                                padding: 10px;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                margin-right: 10px;
                            }
                            .chat-input button {
                                padding: 10px 15px;
                                border: none;
                                background-color: #007bff;
                                color: white;
                                border-radius: 5px;
                                cursor: pointer;
                            }
                            .chat-input button:hover {
                                background-color: #0056b3;
                            }
                        </style>
                         <?php 
                            include 'geminiKey.php';
                        ?>
                        <div class="col-xs-12 col-lg-12">
                            <div class="with_border with_padding">
                                <h4>Chats</h4>
                                <hr>
                                <div class="admin-scroll-panel scrollbar-macosx" id="chatPanel">
                                    <ul class="list-unstyled" id="chatList">
                                        <!-- Chat items will be appended here -->
                                    </ul>
                                </div>
                                <div class="chat-input">
                                    <form id="chat-form" onsubmit="sendMessage(); return false;">
                                        <input type="text" id="chatInput" placeholder="Type a message...">
                                        <button id="sendButton">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                            const usercode = '<?php echo $usercode; ?>'; // Replace with actual usercode
                            let conversationHistory = [];

                            document.addEventListener("DOMContentLoaded", function() {
                                loadChatHistory();
                            });

                            function saveMessage(sender, message) {
								console.log(`Usercode Save: ${usercode}`); 
                                fetch('includes/save_message.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: `usercode=${encodeURIComponent(usercode)}&sender=${encodeURIComponent(sender)}&message=${encodeURIComponent(message)}`,
                                })
                                .then(response => response.text())
                                .then(data => console.log(data))
                                .catch(error => console.error('Error:', error));
                            }

                            function loadChatHistory() {
                                console.log(`Usercode: ${usercode}`); 
                                fetch(`includes/load_chat_history.php?usercode=${encodeURIComponent(usercode)}`)
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        // Check if data is not an array (which would mean an error occurred)
                                        if (!Array.isArray(data)) {
                                            throw new Error('Invalid data received from server');
                                        }

                                        conversationHistory = data;
                                        const chatList = document.getElementById('chatList');
                                        chatList.innerHTML = '';

                                        data.forEach(chat => {
                                            addMessage(chat.sender, chat.message, chat.sender === 'You' ? 'images/team/01.jpg' : 'images/team/03.jpg');
                                        });
                                    })
                                    .catch(error => {
                                        console.error('Error fetching chat history:', error);
                                        // Handle the error appropriately, e.g., show an error message to the user
                                    });
                            }




                            function sendMessage() {
                                const input = document.getElementById('chatInput');
                                const message = input.value.trim();
                                if (message) {
                                    addMessage('You', message, 'images/team/01.jpg');
                                    saveMessage('You', message);
                                    input.value = '';

                                    // Send the user's message to the Gemini API
                                    sendToGemini(message);
                                }
                            }

                            function addMessage(sender, message, imageSrc) {
                                const chatList = document.getElementById('chatList');
                                const listItem = document.createElement('li');
                                listItem.className = 'chat-item';

                                const mediaDiv = document.createElement('div');
                                mediaDiv.className = 'media';

                                const mediaImgDiv = document.createElement('div');
                                mediaImgDiv.className = sender === 'You' ? 'media-right' : 'media-left';
                                const img = document.createElement('img');
                                img.src = imageSrc;
                                mediaImgDiv.appendChild(img);

                                const mediaBodyDiv = document.createElement('div');
                                mediaBodyDiv.className = 'media-body with_background';
                                const h5 = document.createElement('h5');
                                h5.innerHTML = `${sender} <small>just now</small>`;
                                const messageDiv = document.createElement('div');
                                messageDiv.textContent = message;

                                mediaBodyDiv.appendChild(h5);
                                mediaBodyDiv.appendChild(messageDiv);

                                if (sender === 'You') {
                                    mediaDiv.appendChild(mediaBodyDiv);
                                    mediaDiv.appendChild(mediaImgDiv);
                                } else {
                                    mediaDiv.appendChild(mediaImgDiv);
                                    mediaDiv.appendChild(mediaBodyDiv);
                                }

                                listItem.appendChild(mediaDiv);
                                chatList.appendChild(listItem);

                                // Scroll to the bottom
                                const chatPanel = document.getElementById('chatPanel');
                                chatPanel.scrollTop = chatPanel.scrollHeight;
                            }

                            function receiveMessage(userMessage, aiMessage) {
                                addMessage('AI', aiMessage, 'images/team/03.jpg');
                                saveMessage('AI', aiMessage);
                            }

                            function sendToGemini(userMessage) {
                                // Check for internet connectivity
                                if (!navigator.onLine) {
                                    receiveMessage(userMessage, "Sorry, there is no internet connection.");
                                    return;
                                }

                                const YOUR_API_KEY = "<?php echo $key; ?>"; // Generate API Key at Google AI Studio and use it here.

                                // Create the conversation context with the last 5 messages
                                const recentHistory = conversationHistory.slice(-5).map(chat => `${chat.sender}: ${chat.message}`).join('\n');
                                const prompt = `
                                    Your name is Felicia. You are a friendly and helpful DTherapist care assistant for DTherapist application. Your core duty is to provide health care information to users. You were created by Dr Mbah Bernard, the CEO of Caldoc Systems. Always use emojis in your responses.

                                    Conversation history:
                                    ${recentHistory}

                                    User message: "${userMessage}"
                                `;

                                const jsonData = JSON.stringify({
                                    contents: [
                                        {
                                            parts: [
                                                {
                                                    text: prompt
                                                }
                                            ]
                                        }
                                    ]
                                });

                                const url = `https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=${YOUR_API_KEY}`;

                                async function fetchData(url, jsonData) {
                                    try {
                                        const response = await fetch(url, {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json'
                                            },
                                            body: jsonData
                                        });

                                        const data = await response.json();

                                        // Navigate the response object to extract the text
                                        const aiReply = data.candidates[0].content.parts[0].text;
                                        console.log(aiReply); // You can now use aiReply as needed
                                        receiveMessage(userMessage, aiReply);
                                    } catch (error) {
                                        console.error('Error:', error);
                                        receiveMessage(userMessage, "Sorry, there was an error processing your request.");
                                    }
                                }

                                fetchData(url, jsonData);
                            }
                        </script>
                    </div>
                   

                    <div class="row">
						<div class="col-xs-12 col-md-6">

							<div class="with_border with_padding">
								<h4>
									Available Providers
								</h4>
								<div class="admin-scroll-panel scrollbar-macosx">
									<ul class="list1 no-bullets">
										<li class="item-editable">
											<div class="media">
												<div class="media-left">
													<img src="images/team/01.jpg" alt="...">
												</div>
												<div class="media-body">
													<h5>
														Alex Walker
														<small>2 hours ago</small>
													</h5>
													<div>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, corporis. Voluptatibus odio perspiciatis non quisquam provident, quasi eaque officia.
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<!-- .admin-scroll-panel -->
								<!-- <div class="text-right greylinks panel-view-all">
									<a href="admin_wallet.html">View All</a>
								</div> -->
							</div>
							<!-- .with_border -->
						</div>
						<div class="col-xs-12 col-md-6">

							<div class="with_border with_padding">
								<h4>
									Trending Discussions
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
														Dealing with depression
														<small>365 Talking about this</small>
													</h5>
												</div>
											</div>
										</li>
										<li class="item-editable small-teaser">
											<div class="media">
												<div class="media-left">
													<div class="teaser_icon label-success fontsize_16">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="media-body">
													<h5>
														How to handle a toxic relationship
														<small>35 Talking about this</small>
													</h5>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<!-- .admin-scroll-panel -->
								<!-- <div class="text-right greylinks panel-view-all">
									<a href="danonymous_space.html">View All</a>
								</div> -->
							</div>
							<!-- .with_border -->
						</div>
						<!-- .col-* -->
					</div>
					<!-- .row -->


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