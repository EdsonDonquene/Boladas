<?php
ob_start();
session_start();

$timezone = date_default_timezone_set("Africa/Maputo");

$con = mysqli_connect("localhost", "root", "", "dp_database");

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

?>
