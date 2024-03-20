<?php
// Include the connection file
include '../settings/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data and assign each to a variable
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $raw_password = $_POST['password'];
    $gender = $_POST['gender'];
    $family_role = $_POST['familyRole'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    // Encrypt the password using password_hash()
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

    // Set a default number of "3" for the rid field/column
    $rid = 3;

    // Write the insert query using the variables
    $insert_query = "INSERT INTO People (rid,fid, fname, lname ,passwd, email, gender ,dob, tel) 
                 VALUES ('$rid','$family_role','$first_name', '$last_name', '$hashed_password','$email', '$gender',  '$dob', '$phone')";

    // Execute the query using the connection
    $result = mysqli_query($con, $insert_query);

    $fid = $_POST["familyRole"];

    // Check if execution worked
    if ($result) {
        // Redirect to login page if execution is successful
        header('Location: ../login/login.php');
        exit();
    } else {
        // Take appropriate action if execution fails (display error on register page)
        echo "Error: " . mysqli_error($con);
        // Additional error handling or redirection to registration page can be added here
    }
} else {
    // If the form is not submitted, redirect to the registration page
    header('Location: ../login/register.php');
    exit();
}
?>