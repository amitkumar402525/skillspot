<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('Location: signin.php');
    exit(); // Terminate the script
}
?>
<?php require "../../inc/header.php"; ?>
<div class="dash_wrp">
    <?php require "../inc/pages/dashboard-sidebar.php"; ?>
    <div class="dash_content_main">
        <?php require "../inc/pages/dashboard-header.php"; ?>
        <section class="main_dash_body">
            <h2 class="page_title">Create a job post</h2>
            <div class="dash_body_inner">
            	<div class="formWrp">
					<form class="form-horizontal" id="postJobForm" action="">
			            <div class="box_body dash_card_box">
			              	<h6 class="box_title">Job info</h6>
							<div class="row">
							    <div class="col-md-4">
									<div class="form-group">
							      		<label class="control-label" for="jobtitle">Job title: <span class="required">*</span></label>
							        	<input type="text" id="jobTitle" class="form-control style1" placeholder="Job title" name="jobTitle">
							        	<span id="jobTitleError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-4">
									<div class="form-group">
							      		<label class="control-label" for="jobCategories">Job Categories: <span class="required">*</span></label>
										<!-- Multi-select dropdown allowing users to choose multiple options -->
										<select id="jobCategories" class="jobCategoriesSelect customSelect" data-tags="true" data-max-selection="4" data-placeholder="Select or add a category" name="jobCategories[]" multiple="multiple">
										    <!-- Accounting and Finance Categories -->
										    <option disabled><strong>Accounting & Taxation</strong></option>
										    <option>Analytics</option>
										    <option>Corporate Finance</option>
										    <option>Personal Finance</option>
										    <option>Public Finance</option>

										    <!-- Customer Service Categories -->
										    <option disabled><strong>Customer Service</strong></option>
										    <option>Email Support</option>
										    <option>Live Chat Support</option>
										    <option>Telephone Support</option>
										    <option>Web Commerce Support</option>

										    <!-- Graphic & Design Categories -->
										    <option disabled><strong>Graphic & Design</strong></option>
										    <option>App Design</option>
										    <option>Digital Design</option>
										    <option>UX/UI Design</option>
										    <option>Website Design</option>

										    <!-- Promotion & Outreach Categories -->
										    <option disabled><strong>Promotion & Outreach</strong></option>
										    <option>E-Commerce Marketing</option>
										    <option>E-Commerce SEO</option>
										    <option>Marketing Strategy</option>
										    <option>Social Media Marketing</option>

										    <!-- Technology & Programming Categories -->
										    <option disabled><strong>Technology & Programming</strong></option>
										    <option>App Development</option>
										    <option>Back-end Development</option>
										    <option>Front-end Development</option>
										    <option>Web Development</option>
										</select>
							        	<span id="jobCategoriesError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-4">
							    	<div class="form-group">
							      		<label class="control-label" for="jobType">Job type: <span class="required">*</span></label>
										<!-- Multi-select dropdown allowing users to choose multiple options -->
										<select id="jobType" class="jobTypeSelect customSelect" data-tags="false" data-max-selection="1" name="jobType[]" multiple="multiple" data-placeholder="Select job type">
										    <option>Full Time</option>
										    <option>Hybrid</option>
										    <option>Part Time</option>
										    <option>Remote</option>
										</select>
							        	<span id="jobTypeError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-4">
							    	<div class="form-group">
							      		<label class="control-label" for="Skills">Skills: <span class="required">*</span></label>
										<!-- Multi-select dropdown allowing users to choose multiple options -->
										<select id="skills" class="skillSelect customSelect" data-tags="true" data-max-selection="5" name="skills[]" data-placeholder="Select skills" multiple="multiple">
											<option>BackEnd Developer</option>
											<option>Business Manager</option>
											<option>Content Editor</option>
											<option>Customer Support</option>
											<option>Data Analytics</option>
											<option>Data Management</option>
											<option>Data Scientist</option>
											<option>Director of Design</option>
											<option>Finance Manager</option>
											<option>Front-end Developer</option>
											<option>Marketing Manager</option>
											<option>Mobile Engineer</option>
											<option>Product Manager</option>
											<option>Software Engineer</option>
											<option>UI Design</option>
											<option>User Experience</option>
											<option>UX Design</option>
											<option>UX Research</option>
										</select>
							        	<span id="skillsError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-4">
							    	<div class="form-group">
							      		<label class="control-label" for="careerLevel">Career level: <span class="required">*</span></label>
										<!-- Multi-select dropdown allowing users to choose multiple options -->
										<select id="carrerLevel" class="careerLevelSelect customSelect" data-tags="false" data-max-selection="1" name="careerLevel[]" multiple="multiple" data-placeholder="Select Carrer level">
										    <option>Fresher</option>
										    <option>Junior</option>
										    <option>Middle</option>
										    <option>Senior</option>
										</select>
							        	<span id="careerLevelError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-4">
							    	<div class="form-group">
							      		<label class="control-label" for="experience">Experience: <span class="required">*</span></label>
										<!-- Multi-select dropdown allowing users to choose multiple options -->
										<select id="experience" class="experienceSelect customSelect" data-tags="false" data-max-selection="1" name="experience[]" multiple="multiple" data-placeholder="Select experience">
										    <option>1 - 2 years</option>
										    <option>3 - 5 years</option>
										    <option>6 - 9 years</option>
										    <option>10+ years</option>
										</select>
							        	<span id="experienceError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-4">
							    	<div class="form-group">
							      		<label class="control-label" for="gender">Gender: <span class="required">*</span></label>
										<!-- Multi-select dropdown allowing users to choose multiple options -->
										<select id="gender" class="genderSelect customSelect" data-tags="false" data-max-selection="1" name="gender[]" multiple="multiple" data-placeholder="Select Gender">
										    <option>Men</option>
										    <option>Non-binary</option>
										    <option>Woman</option>
										</select>
							        	<span id="genderError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-4">
									<div class="form-group">
							      		<label class="control-label" for="closingDays">Closing days: <span class="required">*</span></label>
							        	<input type="number" id="closingDays" class="form-control style1" placeholder="30" name="closingDays">
							        	<span id="closingDaysError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-4">
									<div class="form-group">
							      		<label class="control-label" for="salary">Salary per hour ($ - USD): <span class="required">*</span></label>
							        	<input type="number" id="salary" class="form-control style1" placeholder="($) - USD" name="salary">
							        	<span id="salaryError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-12">
									<div class="form-group">
							      		<label class="control-label" for="location">Location: <span class="required">*</span></label>
							        	<input type="text" id="location" class="form-control style1" placeholder="Enter job location" name="location">
							        	<span id="locationError" class="error"></span>
							      	</div>
							    </div>
							    <div class="col-md-12">
							    	<div class="form-group">
							    		<label class="control-label" for="description">Description: <span class="required">*</span></label>
							    		<textarea name="description" id="description" placeholder="Add Description" class="form-control style1" style="min-height: 200px; resize: none;"></textarea>
							    		<span id="descriptionError" class="error"></span>
							    	</div>
							    </div>
							    <div class="col-md-2">
							    	<div class="form-group">
								    	<div class="fillBtn">
								    		<input type="submit" id="postJob" class="form-control style1" name="postJob" value="Post Job">
								    	</div>
								    </div>
							    </div>
							</div>
						</div>
					</form>
					<div class="alert alert-success alert-dismissible fade in successful_msg_alert">
					    <strong>Success!</strong> <div id="output" class="successful_msg"></div>
					    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					</div>
				</div>
              </div>
            </div>
        </section>
    </div>
</div>
<?php require "../../inc/footer.php"; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#postJobForm").on("submit", function(e){
			e.preventDefault();

			// Clear previous error messages
            $('.error').html('');
            $("#output").parent(".successful_msg_alert").removeClass("show");
            $(".form-group, .radiobtnstyle, .form-check").removeClass("err"); // Clear any previous error classes

            var data = $(this).serialize();
            data += '&postJob=true';
            $.ajax({
				url: "../action_pages/postJob.php",
				type: "post",
				data: data,
				success: function(response) {
					console.log(response);
					jsonResponse = JSON.parse(response);
					if (jsonResponse.success == "true") {
						$("#output").html(jsonResponse.message);
						$("#output").parent(".successful_msg_alert").addClass("show");

						// alert(JSON.stringify(jsonResponse));
						
						// Auto-hide alert box after 5 seconds
						setTimeout(function() {
						    $("#output").parent(".successful_msg_alert").removeClass("show");
						}, 5000);

						// Check if redirect URL in the response
	                    if (jsonResponse.redirect) {
	                        window.location.href = jsonResponse.redirect; // Redirect to the dashboard
	                    }
					} else {
						// alert(JSON.stringify(jsonResponse));
						for (const field in jsonResponse.errors) {
							$('#' + field + 'Error').html(jsonResponse.errors[field]);
							if ($('#' + field + 'Error').text().trim() !== "" && $('#' + field + 'Error').html().trim().length !== 0 ) {
								$('#' + field + 'Error').parent(".form-group, .radiobtnstyle, .form-check").addClass("err");
							}
						}
					}
				},
				error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
			});
		});
	});
</script>