<?php
include_once '../dbconnection.php';
session_start();

$quote = $_POST['quote'];
$writer = $_POST['writer'];
$identity = $_POST['identity'];
$quote = str_replace("'","`",$quote);

$query = "INSERT into quotes VALUES('" . $quote . "','" . $writer . "','" . $identity . "');";
$result = $conn->query($query);
if ($result) {
    echo "<script>
    alert('inserted!!!!');
    window.location.href='quote.php';
    </script>";
} else {
    echo "<script>
    alert('Quote already exist, not inserted!');
    window.location.href='quote.php';
    </script>";
 
}
