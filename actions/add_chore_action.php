<?php
// Include the connection file
include '../settings/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data and assign each to a variable
    $chore_name = $_POST['choreName'];

    // Write the insert query using the variables
    $insert_query = "INSERT INTO Chores (chorename) 
                 VALUES ('$chore_name')";

    // Execute the query using the connection
    $result = mysqli_query($con, $insert_query);



    // Check if execution worked
    if ($result) {
        // Redirect to chore_manage page if execution is successful
        header('Location: ../admin/chore_control_view.php?successful');
        exit();
    } else {
        // Take appropriate action if execution fails (display error on register page)
        echo "Error: " . mysqli_error($con);
        header('Location: ../admin/chore_control_view.php?error=not_working');
        exit();
        // Additional error handling or redirection to registration page can be added here
    }
} else {
    // If the form is not submitted, redirect to the chore_control_view page
    header('Location: ../admin/chore_control_view.ph?perror=outside');
    exit();
}
?>