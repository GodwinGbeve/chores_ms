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
$sql = "INSERT INTO Assignment (cid, sid, date_assign, date_due, who_assigned) VALUES (?, 1, NOW(), ?, ?)";

// Prepare the statement
if ($stmt = mysqli_prepare($con, $sql)) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "iss", $assignChore, $dueDate, $whoAssign);
    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Get the ID of the last inserted assignment
        $last_id = mysqli_insert_id($con);
        echo $assignPerson;
        // Insert assigned person into the database
        $assignsql = "INSERT INTO Assigned_people (pid, assignmentid) VALUES (?, ?)";
        
        // Prepare the statement
        if ($stmt_assign = mysqli_prepare($con, $assignsql)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt_assign, "ii", $assignPerson, $last_id);
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt_assign)) {
                // Redirect back to assign_chore_view.php after successful assignment
                header("Location: ../admin/assign_chore_view.php");
                exit();
            } else {
                // Handle error
                echo "Error: " . mysqli_error($con);
            }
        } else {
            // Handle error
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // Handle error
        echo "Error: " . mysqli_error($con);
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // Handle error
    echo "Error: " . mysqli_error($con);
}
}
?>
