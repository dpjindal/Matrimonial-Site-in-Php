<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'sample_matrimony';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>