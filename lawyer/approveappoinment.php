<?php
include_once '../dbconnection.php';
session_start();

$id = $_GET['id'];


$query = "update appoinments set approve='1' where id='" . $id . "';";

$result = $conn->query($query);
if ($result) {
    echo "<script>
    alert('APROVED!!!');
    window.location.href='appointments.php';
    </script>";
}

