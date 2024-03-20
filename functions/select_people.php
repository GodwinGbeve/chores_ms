<?php
// Include the connection file
include '../settings/connection.php';

// Function to get the people's first names from the database
function getPeopleFirstNames() {
    global $con;

    // Write the SELECT query to fetch the first names of people
    $query = "SELECT fname FROM People";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if execution worked
    if (!$result) {
        // Handle query execution error
        echo "Error: " . mysqli_error($con);
        return null;
    }

    // Fetch and return the first names
    $firstNames = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $firstNames;
}

// Call the function to get people's first names
$peopleFirstNames = getPeopleFirstNames();

// Check if the operation was successful
if ($peopleFirstNames) {
    // Display the first names retrieved from the database
    foreach ($peopleFirstNames as $firstName) {
        echo $firstName['fname'] . "<br>";
    }
} else {
    echo "Failed to fetch people's first names from the database.";
}
?>
