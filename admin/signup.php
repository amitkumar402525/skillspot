<?php require "../inc/header.php"; ?>
<?php
	session_start(); // Start the session
	if (isset($_SESSION['user_id'])) {
	    // If the user is not logged in, redirect to the login page
	    header('Location: inner_pages/dashboard.php');
	    exit(); // Terminate the script
	}
?>
<div class="signupForm">
	<div class="imgLeft"></div>
	<div class="desRight">
		<div class="logo">
			<a href="<?php echo $homeurl; ?>"><img src="inc/assets/images/logo.png" alt="SkillSpot"></a>
		</div>
		<h2 class="sec-start-h2">Sign up</h2>
		<h6 class="sec-start-h6">or already have an account? <a href="<?php echo $homeurlMain; ?>admin/signin.php">Sign in</a></h6>
		<div class="accTypebtnsGrp">
			<div class="radiobtnstyle">
				<div class="row">
					<div class="col-md-6">
						<div class="btnWrp">
							<input type="radio" id="userType" name="userType" value="worker">
							<button class="btn"><i class="fa fa-user"></i>Worker</button>
						</div>
					</div>
					<div class="col-md-6">
						<div class="btnWrp">
							<input type="radio" id="userType" name="userType" value="employer">
							<button class="btn"><i class="fa fa-briefcase"></i>Employer</button>
						</div>
					</div>
				</div>
				<span id="userTypeError" class="error"></span>
			</div>
		</div>
		<div class="formWrp">
			<form class="form-horizontal" id="signupForm">
				<div class="row">
				    <div class="col-md-6 left">
						<div class="form-group">
				      		<label class="control-label" for="firstName">First Name: <span class="required">*</span></label>
				        	<input type="text" id="firstName" class="form-control style1" placeholder="Enter First Name" name="firstName">
		        	        <span id="firstNameError" class="error"></span>
				      	</div>
				    </div>
				    <div class="col-md-6 right">
						<div class="form-group">
				      		<label class="control-label" for="lastName">Last Name: <span class="required">*</span></label>
				        	<input type="text" id="lastName" class="form-control style1" placeholder="Enter Last Name" name="lastName">
		        	        <span id="lastNameError" class="error"></span>
				      	</div>
				    </div>
				    <div class="col-md-12">
						<div class="form-group">
				      		<label class="control-label" for="userName">Username: <span class="required">*</span></label>
				        	<input type="text" id="userName" class="form-control style1" placeholder="Enter Last Name" name="userName">
		        	        <span id="userNameError" class="error"></span>
				      	</div>
				    </div>
				    <div class="col-md-12">
						<div class="form-group">
				      		<label class="control-label" for="email">Email: <span class="required">*</span></label>
				        	<input type="email" id="email" class="form-control style1" placeholder="Enter Last Name" name="email">
		        	        <span id="emailError" class="error"></span>
				      	</div>
				    </div>
				    <div class="col-md-12">
						<div class="form-group">
				      		<label class="control-label" for="phoneNumber">Phone Number: <span class="required">*</span></label>
				        	<input type="number" id="phoneNumber" class="form-control style1" placeholder="Enter Phone Number" name="phoneNumber">
		        	        <span id="phoneNumberError" class="error"></span>
				      	</div>
				    </div>
				    <div class="col-md-12">
						<div class="form-group">
				      		<label class="control-label" for="password">Password: <span class="required">*</span></label>
				        	<input type="password" id="password" class="form-control style1" placeholder="Enter Phone Number" name="password">
		        	        <span id="passwordError" class="error"></span>
				      	</div>
				    </div>
				    <div class="col-md-12">
						<div class="form-group form-check">
							<input class="form-check-input" type="checkbox" id="accept_terms" name="accept_terms" value="true">
							<label class="form-check-label">Accept the <a href="#">Terms</a> and <a href="#">Privacy Policy</a></label>
							<span id="accept_termsError" class="error"></span>
						</div> 
				    </div>
				    <div class="col-md-12">
				    	<div class="form-group">
					    	<div class="fillBtn">
					    		<input type="submit" class="form-control style1" id="signupBtn" name="signupBtn" value="Sign up">
					    	</div>
					    </div>
				    </div>
				</div>
			</form>
			<div id="output" class="successful_msg"></div>
		</div>
	</div>
</div>
<?php require "../inc/footer.php"; ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#signupForm").on("submit", function(e){
			e.preventDefault();
			
			// Clear previous error messages
            $('.error').html('');
            $(".form-group, .radiobtnstyle, .form-check").removeClass("err"); // Clear any previous error classes

			var data = $(this).serialize();
			data += '&userType=' + $("#userType:checked").val();
			data += '&accept_terms=' + ($("#accept_terms").is(":checked") ? '1' : '0');
			data += '&signupBtn=true';
			$.ajax({
				url: "action_pages/user-insert.php",
				type: "post",
				data: data,
				success: function(response) {
					jsonResponse = JSON.parse(response);
					if (jsonResponse.success == "true") {
						$("#output").html(jsonResponse.message);
						// alert(JSON.stringify(jsonResponse));
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