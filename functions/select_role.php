<?php

include "../settings/connection.php";

$query = "SELECT * FROM family_name";

// Execute the query using the connection
$result = mysqli_query($con, $query);

// Check if execution worked
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the results
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free result set
mysqli_free_result($result);

// Close the connection
mysqli_close($con);
?>