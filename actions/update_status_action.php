<?php
session_start();
include '../settings/connection.php';

if (isset($_POST['submit'])) {
    // Check if assignment ID is set and sanitize it
    if (isset($_POST['assignmentId'])) {
        $assignmentId = $_POST['assignmentId'];

        // Sanitize the assignment ID to prevent SQL injection
        $assignmentId = mysqli_real_escape_string($con, $assignmentId);

        // Get other updated assignment details from the form
        $dateDue = $_POST['dateDue'];
        $choreStatus = $_POST['choreStatus'];

        // Sanitize the inputs
        $dateDue = mysqli_real_escape_string($con, $dateDue);
        $choreStatus = mysqli_real_escape_string($con, $choreStatus);

        // Update assignment in the database
        $query = "UPDATE assignment SET date_due = '$dateDue', sid = '$choreStatus' WHERE assignmentid = '$assignmentId'";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Redirect back to the page after successful update
            header('Location: ../admin/assign_chore_view.php');
            exit();
        } else {
            // Handle error if update fails
            echo "Error updating assignment.";
        }
    } else {
        echo "Invalid assignment ID.";
    }
} else {
    echo "Invalid request.";
}
?>
