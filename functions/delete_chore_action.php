<?php
// Include the connection file
include '../settings/connection.php';

// Check if chore ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Retrieve the chore ID from the URL
    $chore_id = $_GET['id'];

    // Write the DELETE query
    $delete_query = "DELETE FROM Chores WHERE cid = $chore_id";

    // Execute the query
    $result = mysqli_query($con, $delete_query);

    // Check if execution worked
    if ($result) {
        // Chore successfully deleted, redirect back to chore_control_view.php
        header('Location: ../admin/chore_control_view.php');
        exit();
    } else {
        // If execution failed, display error message
        echo "Error: " . mysqli_error($con);
        // You can also redirect back to chore_control_view.php with an error message
    }
} else {
    // Chore ID not provided in the URL, redirect back to chore_control_view.php
    header('Location: ../admin/chore_control_view.php');
    exit();
}
?>