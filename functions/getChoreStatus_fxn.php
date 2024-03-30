<?php
// Include your database connection script
include '../settings/connection.php';

// Function to get chore status options from the database
function getChoreStatusOptions() {
    global $con;

    // Write the SELECT query to fetch status options
    $query = "SELECT sid, sname FROM Status";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if execution was successful
    if (!$result) {
        // Handle error if query fails
        echo "Error: " . mysqli_error($con);
        return null;
    }

    // Fetch status options if query is successful
    $options = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $options[$row['sid']] = $row['sname'];
    }

    return $options;
}
// Call the function to get status options
$statusOptions = getChoreStatusOptions();
?>
