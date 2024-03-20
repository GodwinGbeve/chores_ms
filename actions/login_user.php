<?php
session_start();

// Include the connection file
require_once '../settings/connection.php';

// Collect form data and store in variables after escaping
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

// Prepare the query to select a record from the people table using the email
$query = "SELECT * FROM people WHERE email = '$email'";

// Prepare the statement
$result = mysqli_query($con, $query);


// Check if any row was returned
if (mysqli_num_rows($result) == 0) {
    // No record found, provide appropriate response
    $_SESSION['error'] = "User not registered or incorrect username";
    header('Location: ../login/login.php');
    exit();
}

// Fetch the record
$user = mysqli_fetch_assoc($result);

// Verify password user provided against database record using the PHP method password_verify()
if (!password_verify($password, $user['passwd'])) {
    // Password does not match, provide appropriate response
    $_SESSION['error'] = "Incorrect password";
    header('Location: ../login/login.php');
    exit();
}

// Password verified, create a session for user id and role id
$_SESSION['user_id'] = $user['pid'];
$_SESSION['role_id'] = $user['rid'];

echo "We are here!";
// Redirect to home page
header('Location: ../view/home.php');

exit();

?>