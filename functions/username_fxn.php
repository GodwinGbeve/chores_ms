<?php
include "../settings/connection.php"; 
include_once "../settings/core.php"; 
function getUserName($userId, $con) {

    $query = "SELECT fname, lname FROM people WHERE pid = $userId";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['fname'] . ' ' . $row['lname']; // Return user's name
    } else {
        return "User not found";
    }
}


?>