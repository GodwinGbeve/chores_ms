<?php

$SERVER = "localhost";
$USERNAME = "root";
$PASSWD = "";
$DATABASE = "chores_mgt";

$con = new mysqli($SERVER, $USERNAME, $PASSWD, $DATABASE) or die("could not connect database");

// check con
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
