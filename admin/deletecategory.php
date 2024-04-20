<?php
include_once '../dbconnection.php';
session_start();

$id = $_GET['id'];
$query = "delete from lawyercategories where id='" . $id . "';";
$result = $conn->query($query);

echo "<script>
    alert('Deleted!!!!');
    window.location.href='categories.php';
    </script>";
