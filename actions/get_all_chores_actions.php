<?php
// Include the connection file
include '../settings/connection.php';

// Function to get all chores
function getAllChores()
{
    global $con; // Access the global connection variable

    // Write the SELECT query to get all chores
    $select_query = "SELECT * FROM Chores";

    // Execute the query
    $result = mysqli_query($con, $select_query);

    // Check if execution worked
    if ($result) {
        // Check if any record was returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch records and store them in an array
            $chores = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $chores; // Return the array of chores
        } else {
            // No records found
            return [];
        }
    } else {
        // Query execution failed
        return [];
    }
}


