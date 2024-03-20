<?php
// Include the connection file
include_once('../settings/connection.php');

// Check if there is a GET request with an 'id' parameter
if(isset($_GET['id'])) {
    // Retrieve the id from the GET URL
    $assignmentId = mysqli_real_escape_string($con, $_GET['id']);

    // Write your DELETE query using the assignment ID
    $deleteQuery = "DELETE FROM Assignment WHERE assignmentid = '$assignmentId'";

    // Execute the query using the connection
    if(mysqli_query($con,  $deleteQuery)) {
        // If execution is successful, redirect to the assignment display page
        header("Location: ../admin/assign_chore_view.php");
        exit();
    } else {
        // If execution fails, display an error message
        echo "Error: " . mysqli_error($con);
    }
} else {
    // If no 'id' parameter is found in the GET URL, redirect to the assignment display page
    header("Location: ../admin/assign_chore_view.php");
    exit();
}
?>
