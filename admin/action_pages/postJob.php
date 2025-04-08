<?php require "../../functions.php"; ?>
<?php require "../../dbConn.php"; ?>
<?php
session_start(); // Start the session
error_reporting(E_ALL);
ini_set('display_errors', 1);
$response = ['success' => "false", 'message' => "", 'errors' => []];
$err = "false";
$http_verb     = $_SERVER['REQUEST_METHOD'];
$user_id       = $_SESSION['user_id'];

$postJobBtn    = $_POST["postJob"];

$jobTitle      = test_input($_POST["jobTitle"]);

$jobCategories = array_map("test_input", $_POST["jobCategories"] ?? []);
$jobType       = array_map("test_input", $_POST["jobType"] ?? []);
$skills        = array_map("test_input", $_POST["skills"] ?? []);
$carrerLevel   = array_map("test_input", $_POST["carrerLevel"] ?? []);
$experience    = array_map("test_input", $_POST["experience"] ?? []);
$gender        = array_map("test_input", $_POST["gender"] ?? []);

$salary        = test_input($_POST["salary"] ?? "");
$location      = test_input($_POST["location"] ?? "");
$description   = test_input($_POST["description"] ?? "");


if ($http_verb == "POST") {
    if (isset($postJobBtn) == true) {
    	// if ($userType == "undefined") {
        //     $response['errors']['userType'] = 'You must select the Role(Worker or Employer)';
        // }
        if (empty($jobTitle)) {
            $response['errors']['jobTitle'] = 'Job Title is required';
        }
        if (empty($jobCategories)) {
            $response['errors']['jobCategories'] = 'Job Categories is required';
        }
        if (empty($jobType)) {
            $response['errors']['jobType'] = 'Job Type is required';
        }
        if (empty($skills)) {
            $response['errors']['skills'] = 'Skills are required';
        }
        if (empty($experience)) {
            $response['errors']['experience'] = 'Experience is required';
        } 
        if (empty($salary)) {
            $response['errors']['salary'] = 'Salary is required';
        }
        if (empty($location)) {
            $response['errors']['location'] = 'Location is required';
        }
        if (empty($description)) {
            $response['errors']['description'] = 'Description is required';
        }
        if ($conn) {
            // check if username already exists
            $sql_userType = "SELECT user_type FROM users WHERE id = $user_id";
            $result_userType = mysqli_query($conn, $sql_userType);

            // If any of the fields already exist, add an error
            if (mysqli_num_rows($result_userType) > 0) {
                $row = mysqli_fetch_assoc($result_userType);
                $user_type = $row['user_type'];
                $response['message'] = $user_type;
                die();
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
