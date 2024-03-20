<?php
include '../settings/connection.php';

function getChoreById($id)
{
    global $con;
    $query = "SELECT * FROM Chores WHERE cid = $id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}
?>