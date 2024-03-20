<?php
session_start();
// Include the connection file
include '../settings/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $assignPerson = $_POST['assignPerson'];
    $assignChore = $_POST['assignChore'];
    $dueDate = $_POST['dueDate'];
    $whoAssign = $_SESSION['user_id'];
    
    // Insert assignment into the database
    $sql = "INSERT INTO Assignment (cid, sid, date_assign, date_due, who_assigned) VALUES ('$assignChore', 1, NOW(), '$dueDate', '$whoAssign')";
    
    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Get the ID of the last inserted assignment
        $last_id = mysqli_insert_id($con);

        // Insert assigned person into the database
        $assignsql = "INSERT INTO Assigned_people (pid, assignmentid) VALUES ('$assignPerson', '$last_id')";

        // Execute the query
        if (mysqli_query($con, $assignsql)) {
            // Redirect back to assign_chore_view.php after successful assignment
            header("Location: ../admin/assign_chore_view.php");
            exit();
        } else {
            // Handle database error
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // Handle database error
        echo "Error: " . mysqli_error($con);
    }
} 
?>
