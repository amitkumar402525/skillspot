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

// Get the values from the form
$postJobBtn    = $_POST["postJob"];

$jobTitle      = isset($_POST['jobTitle']) ? test_input($_POST['jobTitle']) : '';

$jobCategories = isset($_POST['jobCategories']) ? array_map('test_input', $_POST['jobCategories']) : [];
$jobType       = isset($_POST['jobType']) ? array_map('test_input', $_POST['jobType']) : [];
$skills        = isset($_POST['skills']) ? array_map('test_input', $_POST['skills']) : [];
$careerLevel   = isset($_POST['careerLevel']) ? array_map('test_input', $_POST['careerLevel']) : [];
$experience    = isset($_POST['experience']) ? array_map('test_input', $_POST['experience']) : [];
$gender        = isset($_POST['gender']) ? array_map('test_input', $_POST['gender']) : [];

$closingDays   = isset($_POST['closingDays']) ? test_input($_POST['closingDays']) : '';
$salary        = isset($_POST['salary']) ? test_input($_POST['salary']) : '';
$location      = isset($_POST['location']) ? test_input($_POST['location']) : '';
$description   = isset($_POST['description']) ? test_input($_POST['description']) : '';

// Now convert all the multi-select arrays to comma-seperated strnigs before DB insert
$jobCategoriesStr = implode(", ", $jobCategories);
$jobTypeStr       = implode(", ", $jobType);
$skillsStr        = implode(", ", $skills);
$careerLevelStr   = implode(", ", $careerLevel);
$experienceStr    = implode(", ", $experience);
$genderStr        = implode(", ", $gender);


if ($http_verb == "POST") {
    if (isset($postJobBtn) == true) {
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
        if (empty($careerLevel)) {
            $response['errors']['careerLevel'] = 'Career Level is required';
        }
        if (empty($experience)) {
            $response['errors']['experience'] = 'Experience is required';
        }
        if (empty($gender)) {
            $response['errors']['gender'] = 'Gender is required';
        }
        if (empty($closingDays)) {
            $response['errors']['closingDays'] = 'Closing Days are required';
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
        if (empty($response['errors'])) {
            if ($conn) {
                $sql = "SELECT * FROM `users` WHERE id = $user_id";
                $results = mysqli_query($conn, $sql);
                if (mysqli_num_rows($results) > 0) {
                    $row = mysqli_fetch_assoc($results);
                    $user_type = $row['user_type'];
                    $employerID = $row['id'];
                    $employerFname = $row['first_name'];
                    $employerLname = $row['last_name'];
                    $empFullName = $employerFname . " " . $employerLname;
                    // $response['message'] = $user_type;
                    
                    if ($user_type == "employer") {
                        // Check for duplicate job by same employer
                        $checkDuplicateEntry = "SELECT * FROM `jobs` WHERE jobTitle = '$jobTitle' AND empID = '$user_id'";
                        $duplicateResult = mysqli_query($conn, $checkDuplicateEntry);
                        if (mysqli_num_rows($duplicateResult) > 0) {
                            $response['errors']['jobTitle'] = "This job already exists under your account!";
                        } else {
                            /* Insert the data into database users */
                            if ($conn) {
                                $sql = "INSERT INTO `jobs`
                                ( `jobTitle`, `jobCategories`, `jobType`, `skills`, `career_level`, `experience`, `gender`, `closingDays`, `salary`, `location`, `description`, `empID`)
                                VALUES
                                ('$jobTitle', '$jobCategoriesStr', '$jobTypeStr', '$skillsStr', '$careerLevelStr', '$experienceStr', '$genderStr', '$closingDays', '$salary', '$location', '$description', '$user_id')";

                                $results = mysqli_query($conn,$sql) or die("SQL Query Failed.");
                                if ($results)  {
                                    $response['success'] = "true";
                                    $response['message'] = $empFullName . ", Your Job has been posted successfully. Thanks!";
                                } else {
                                    $response['errors']['database'] = 'Error inserting data into database';
                                }
                            } else {
                                $response['errors']['database'] = 'Database connection failed: ' . mysqli_connect_error();
                            }
                        }
                        mysqli_close($conn);
                    }
                }
            } else {
            	$response['success'] = "false";
            }
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
