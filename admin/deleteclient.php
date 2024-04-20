<?php
include_once '../dbconnection.php';
session_start();

$email = $_GET['email'];
$query = "delete from clients where email='" . $email . "';";
$result = $conn->query($query);

echo "<script>
    alert('Deleted!!!!');
    window.location.href='client.php';
    </script>";
    