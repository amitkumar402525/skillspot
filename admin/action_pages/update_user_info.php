<?php require "../../functions.php"; ?>
<?php require "../../dbConn.php"; ?>
<?php
    session_start(); // Start the session
    $user_id = $_SESSION['user_id'];
    if (!isset($_SESSION['user_id'])) {
        // If the user is not logged in, redirect to the login page
        header('Location: ../inner_pages/dashboard.php');
        exit(); // Terminate the script
    }
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$response = ['success' => "false", 'message' => "", 'errors' => []];
$err = "false";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check if all required fields are set and not empty
    $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
    $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
    $userName = isset($_POST['userName']) ? trim($_POST['userName']) : '';
    // $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phoneNumber = isset($_POST['phoneNumber']) ? trim($_POST['phoneNumber']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Check for empty fields
    if (empty($firstName)) {
        $response['errors']['firstName'] = 'First Name is required';
    }
    if (empty($lastName)) {
        $response['errors']['lastName'] = 'Last Name is required';
    }
    if (empty($userName)) {
        $response['errors']['userName'] = 'Username is required';
    }
    // if (empty($email)) {
    //     $response['errors']['email'] = 'Email is required';
    // } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $response['errors']['email'] = 'Invalid email format';
    // }
    if (empty($phoneNumber)) {
        $response['errors']['phoneNumber'] = 'Phone Number is required';
    }
    if (empty($password)) {
        $response['errors']['password'] = 'Password is required';
    }
    // Check if the file is uploaded
    if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] == 0) {
        $fileName = $_FILES['profilePic']['name'];
        $fileTmpName = $_FILES['profilePic']['tmp_name'];
        $fileSize = $_FILES['profilePic']['size'];
        $fileError = $_FILES['profilePic']['error'];
        $fileType = $_FILES['profilePic']['type'];

        // Validate file type and size (optional)
        $allowedTypes = ['image/jpeg','image/jpg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedTypes)) {
            $response['errors']['profilePic'] = 'Invalid file type';
        }

        if ($fileSize > 5000000) { // 5MB size limit
            $response['errors']['profilePic'] = 'File size exceeds limit';
        }

        // If no errors, proceed with uploading the file
        if (empty($response['errors']['profilePic'])) {
            $uploadDir = '../inc/assets/images/uploads/';
            $filePath = $uploadDir . basename($fileName);;
            if (!move_uploaded_file($fileTmpName, $filePath)) {
                $response['errors']['profilePic'] = 'Failed to upload image';
            }
        }
    } else {
        // No file uploaded
        $response['errors']['profilePic'] = 'Please select a profile picture';
        // If no file is uploaded, set default image
        $filePath = '../inc/assets/images/uploads/default.jpg';
    }

    // Check if there are any errors in the form submission
    if (!empty($response['errors'])) {
        $response['message'] = 'There were errors with your submission';
        echo json_encode($response);
        exit();
    }
    if ($conn) {
        // check if username already exists
        $sql_check_username = "SELECT * FROM users WHERE username = '$userName'";
        $result_username = mysqli_query($conn, $sql_check_username);

        // Check if phone number already exists
        $sql_check_phone = "SELECT * FROM users WHERE phone = '$phoneNumber'";
        $result_phone = mysqli_query($conn, $sql_check_phone);

        // If any of the fields already exist, add an error
        if (mysqli_num_rows($result_username) > 0) {
            $response['errors']['userName'] = 'Username already exists';
        }
        if (mysqli_num_rows($result_phone) > 0) {
            $response['errors']['phoneNumber'] = 'Phone number already exists';
        }
        if (empty($response['errors'])) {
            // If no errors, proceed with updating the user record
            $password_hash = password_hash($password, PASSWORD_DEFAULT);  // Secure password
            $sql_update = "UPDATE `users` SET `first_name` = '$firstName', `last_name` = '$lastName', `phone` = '$phoneNumber', `password` = '$password_hash', `profile_pic` = '$filePath' WHERE `user_id` = '$user_id'";
            $queryResult = mysqli_query($conn, $sql_update);

            if ($queryResult) {
                $response['success'] = "true";
                $response['message'] = "Your account has been updated successfully.";
            } else {
                $response['errors']['database'] = 'Error updating data in the database';
            }
            // Free result and close connection
            mysqli_free_result($result_username);
            mysqli_free_result($result_phone);
            mysqli_close($conn);
        } else {
            $response['success'] = "false";
        }
    } else {
        $response['errors']['database'] = 'Database connection failed: ' . mysqli_connect_error();
    }
    echo json_encode($response);
}
?>
