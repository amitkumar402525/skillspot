<?php require "../../functions.php"; ?>
<?php require "../../dbConn.php"; ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$response = ['success' => "false", 'message' => "", 'errors' => []];
$err = "false";
$http_verb = $_SERVER['REQUEST_METHOD'];
$firstName = test_input($_POST["firstName"]);
$lastName = test_input($_POST["lastName"]);
$userName = test_input($_POST["userName"]);
$email = test_input($_POST["email"]);
$phoneNumber = test_input($_POST["phoneNumber"]);
$password = test_input($_POST["password"]);
$userType = test_input($_POST["userType"]);
$accept_terms = test_input($_POST["accept_terms"]);
$signupBtn = test_input($_POST["signupBtn"]);

if ($http_verb == "POST") {
    if (isset($signupBtn) == true) {
    	if ($userType == "undefined") {
            $response['errors']['userType'] = 'You must select the Role(Worker or Employer)';
        }
        if (empty($firstName)) {
            $response['errors']['firstName'] = 'First name is required';
        }
        if (empty($lastName)) {
            $response['errors']['lastName'] = 'Last name is required';
        }
        if (empty($userName)) {
            $response['errors']['userName'] = 'Username is required';
        }
        if (empty($email)) {
            $response['errors']['email'] = 'Email is required';
        }
        if (empty($phoneNumber)) {
            $response['errors']['phoneNumber'] = 'Phone number is required';
        } 
        if (empty($password)) {
            $response['errors']['password'] = 'Password is required';
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
        }
        if ($accept_terms == "0") {
            $response['errors']['accept_terms'] = 'You must accept the terms';
        }
        if ($conn) {
            // check if username already exists
            $sql_check_username = "SELECT * FROM users WHERE username = '$userName'";
            $result_username = mysqli_query($conn, $sql_check_username);
            /*$result_username_rows = mysqli_fetch_array($result_username);
            echo print_r($result_username_rows);
            die;*/
            // Check if email already exists
            $sql_check_email = "SELECT * FROM users WHERE email = '$email'";
            $result_email = mysqli_query($conn, $sql_check_email);

            // Check if phone number already exists
            $sql_check_phone = "SELECT * FROM users WHERE phone = '$phoneNumber'";
            $result_phone = mysqli_query($conn, $sql_check_phone);

            // If any of the fields already exist, add an error
            if (mysqli_num_rows($result_username) > 0) {
                $response['errors']['userName'] = 'Username already exists';
            }
            if (mysqli_num_rows($result_email) > 0) {
                $response['errors']['email'] = 'Email already exists';
            }
            if (mysqli_num_rows($result_phone) > 0) {
                $response['errors']['phoneNumber'] = 'Phone number already exists';
            }
        }
        if (empty($response['errors'])) {
            /* Insert the data into database users */
            if ($conn) {
                $sql = "INSERT INTO `users` (`user_type`, `first_name`, `last_name`, `username`, `email`, `password`, `phone`, `is_verified`, `created_at`) VALUES ('$userType','$firstName','$lastName','$userName','$email','$password_hash','$phoneNumber','$accept_terms',NOW())";
                $queryResult = mysqli_query($conn,$sql) or die("SQL Query Failed.");
                if ($queryResult)  {
                    $response['success'] = "true";
            		$response['message'] = $firstName . ", Your account has been created successfully. Thanks!";
                } else {
                    $response['errors']['database'] = 'Error inserting data into database';
                }
                mysqli_free_result($result_username);
                mysqli_free_result($result_email);
                mysqli_free_result($result_phone);
            } else {
                $response['errors']['database'] = 'Database connection failed: ' . mysqli_connect_error();
            }
            mysqli_close($conn);


        } else {
        	$response['success'] = "false";
        }
    } else {
        $response['errors']['form'] = 'Submit button not set!';
    }
} else {
    $response['errors']['form'] = 'Invalid request method!';
}

/*echo "<pre>";
print_r($response);
echo "</pre>";*/
echo json_encode($response);
exit;
?>
