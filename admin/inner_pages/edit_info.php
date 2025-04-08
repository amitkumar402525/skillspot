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
            <form class="form-horizontal" id="signupForm">
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
                                    </div>                                    
                                    <div id="output" class="successful_msg"></div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="customUploadWrp">
                                <div class="uploadBtnStyle1">
                                    <div class="uploadImg">
                                        <img src="../inc/assets/images/demo-user.webp">
                                    </div>
                                    <div class="uploadBtn">
                                        <i class="fa-solid fa-pen"></i>
                                        <label for="profilePic">Select a file:</label>
                                        <input type="file" id="profilePic" name="profilePic">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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