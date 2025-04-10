<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('Location: ../signin.php');
    exit(); // Terminate the script
}
?>
<?php require "../../inc/header.php"; ?>
<div class="dash_wrp">
    <?php require "../inc/pages/dashboard-sidebar.php"; ?>
    <div class="dash_content_main">
        <?php require "../inc/pages/dashboard-header.php"; ?>
        <section class="main_dash_body">
            <!-- <h2 class="page_title">Welcome back! <?php //echo (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Dummy" ); ?></h2> -->
            <form class="form-horizontal" id="signupForm" enctype="multipart/form-data">
                <div class="dash_body_inner">
                    <h2 class="page_title">Settings</h2>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="dash_card_box">
                                <div class="card_title">
                                    <h5>Basic Information</h5>
                                </div>
                                <div class="formWrp">
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
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="customUploadWrp">
                                <div class="uploadBtnStyle1">
                                    <div class="form-group">
                                        <div class="uploadImg">
                                            <img id="uploadedImg" src="../inc/assets/images/demo-user.webp">
                                        </div>
                                        <div class="uploadBtn">
                                            <i class="fa-solid fa-pen"></i>
                                            <!-- <label for="profilePic">Select a file:</label> -->
                                            <input type="file" id="profilePic" name="profilePic">
                                        </div>
                                        <span id="profilePicError" class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="output" class="successful_msg"></div>
                </div>
                <div class="admin_btns_footer">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="btn-group small-right">
                                    <div class="fillBtn">
                                        <input type="submit" class="form-control btn outlined style1" id="cancelBtn" name="cancelBtn" value="Cancel">
                                    </div>
                                    <div class="fillBtn">
                                        <input type="submit" class="form-control btn filled style1" id="updateBtn" name="updateBtn" value="Update">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
<?php require "../../inc/footer.php"; ?>
<script>
$(document).ready(function () {
    $('#profilePic').change(function(event) {
        const file = event.target.files[0];
        // var acc = []
        // $.each(file, function(index, value) {
        //     acc.push(index + ': ' + value);
        // });
        // alert(JSON.stringify(acc));
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#uploadedImg').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
    $('#signupForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Clear previous error messages
        $('.error').html('');
        $(".form-group, .radiobtnstyle, .form-check").removeClass("err"); // Clear any previous error classes

        var formData = new FormData(this);
        // Add additional submit button name
        // var acc = []
        // $.each(formData, function(index, value) {
        //     acc.push(index + ': ' + value);
        // });
        // alert(JSON.stringify(acc));
        formData.append('updateBtn', true);


        // var data = $(this).serialize();
        //     data += '&signin=true';

        $.ajax({
            url: '../action_pages/update_user_info.php', // PHP handler
            type: 'POST',
            data: formData,
            processData: false,  // Important: prevent jQuery from processing the data
            contentType: false,  // Important: prevent jQuery from setting the content type
            success: function(response) {
                console.log(response);
                jsonResponse = JSON.parse(response);
                if (jsonResponse.success == "true") {
                    // $("#output").html(jsonResponse.message);
                    // alert(JSON.stringify(jsonResponse));

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
