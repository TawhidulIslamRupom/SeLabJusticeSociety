<?php
include_once '../dbconnection.php';
session_start();

$email = $_GET['email'];
$query = "delete from lawyers where email='" . $email . "';";
$result = $conn->query($query);

echo "<script>
    alert('Deleted!!!!');
    window.location.href='lawyer.php';
    </script>";
    