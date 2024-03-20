<?php
session_start();
include '../settings/connection.php';

if (isset($_POST['submit'])) {
    // Check if chore ID is set and sanitize it
    if (isset($_POST['choreName']) && isset($_POST['choreId'])) {
        $chore_id = $_POST['choreId'];

        // Sanitize the chore ID to prevent SQL injection
        $chore_id = mysqli_real_escape_string($con, $chore_id);

        // Get the chore name from the form
        $chore_name = $_POST['choreName'];

        // Sanitize the chore name to prevent SQL injection
        $chore_name = mysqli_real_escape_string($con, $chore_name);

        // Update chore in the database
        $query = "UPDATE Chores SET chorename = '$chore_name' WHERE cid = '$chore_id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo $result;
            header('Location: ../admin/chore_control_view.php');
            exit();
        } else {
            echo "Error updating chore.";
        }
    } else {
        echo "Invalid chore ID.";
    }
} else {
    echo "Invalid request.";
}
?>