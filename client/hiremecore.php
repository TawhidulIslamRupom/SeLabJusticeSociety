<?php
include_once '../dbconnection.php';
session_start();


$client = $_SESSION['email'];
$lawyer = $_POST['id'];
$fromdate = $_POST['fromdate'];
$details = $_POST['details'];
$transaction = $_POST['transaction'];


$sql = "insert into  appoinments(client  ,lawyer,fromdate,details,transaction) 
values('" . $client  . "' , '" . $lawyer . "','" . $fromdate . "','" . $details . "','" . $transaction . "');";

$res = $conn->query($sql);

if ($res) {
    echo "<script>
    alert('Booking Request sent!');
    window.location.href='lawyers.php'
    </script>";
} else {
    echo "<script>
    alert('error!!!!');
    window.location.href='index.php';
    </script>";
}
