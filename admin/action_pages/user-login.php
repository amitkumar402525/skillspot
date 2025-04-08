<?php session_start(); // Start the session ?>
<?php require "../../functions.php"; ?>
<?php require "../../dbConn.php"; ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
	$response = ['success' => "false", 'message' => "", 'form' => "", 'errors' => []];
	$err = "false";
	$http_verb = $_SERVER['REQUEST_METHOD'];
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);
	$signupBtn = test_input($_POST["signin"]);
	
	if ($http_verb == "POST") {
	    if (isset($signupBtn) == true) {
	    	if (empty($email)) {
	            $response['errors']['email'] = 'Email is required';
	        }
	        if (empty($password)) {
	            $response['errors']['password'] = 'Password is required';
	        }
	        //  else {
	        //     $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
	        // }
	        if (empty($response['errors'])) {
		        if ($conn) {
		        	$sql_check_email = "SELECT * FROM users WHERE email = '$email'";
	            	$result_email = mysqli_query($conn, $sql_check_email);
	            	if (mysqli_num_rows($result_email) > 0) {
		            	if ($result_email)  {
		            		// Fetch the user data
                    		$user = mysqli_fetch_assoc($result_email);
                    		// Verify the password with the password of database by using password_verify() php function
		                    if (password_verify($password, $user['password'])) {
		                    	// Store the session data after login successful
		                    	$_SESSION['user_id'] = $user['id'];  // Store user ID in session
		                        $_SESSION['user_email'] = $user['email'];  // Store email in session
		                        $_SESSION['user_name'] = $user['username'];  // Store email in session
		                        $_SESSION['first_name'] = $user['first_name'];  // Store first_name in session
		                        $_SESSION['last_name'] = $user['last_name'];  // Store last_name in session
		                        $_SESSION['user_type'] = $user['user_type'];  // Store user type in session

		                        $response['success'] = "true";
		                        $response['message'] = "Login successfully";
		                        $response['redirect'] = "./inner_pages/dashboard.php"; // Set the redirection URL
		                    } else {
		                        $response['errors']['password'] = "Incorrect Password";
		                    }
		                } else {
		                    $response['errors']['database'] = 'Error selecting data from database';
		                }
	            	} else {
	            		$response['errors']['email'] = "Email does not exists.";
	            	}
		        } else {
	                $response['errors']['database'] = 'Database connection failed: ' . mysqli_connect_error();
	            }
	            mysqli_close($conn);
			}  else {
	        	$response['success'] = "false";
	        }
	    } else {
	        $response['errors']['form'] = 'Submit button not set!';
	    }
	} else {
	    $response['errors']['form'] = 'Invalid request method!';
	}

echo json_encode($response);
exit;
?>