<?php
include_once '../dbconnection.php';
session_start();

$quote = $_GET['quote'];
$query = "delete from quotes where quote='" . $quote . "';";
$result = $conn->query($query);

echo "<script>
    alert('Deleted!!!!');
    window.location.href='quote.php';
    </script>";
