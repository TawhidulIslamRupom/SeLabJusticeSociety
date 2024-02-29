<?php
include_once 'dbconnection.php';
session_start();

//all the fields
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$category = $_POST['category'];

$rate = $_POST['rate'];
$description = $_POST['description'];
$location = $_POST['location'];
$phonenumber = $_POST['phonenumber'];
$bkashnumber = $_POST['bkashnumber'];



$filename = $_FILES["picture"]["name"];
$tempname = $_FILES["picture"]["tmp_name"];

$folder = "lawyer/images/" . $filename;

$sql = "insert into  lawyers(email  ,password,name,categoryid,rate,description,phonenumber,bkashnumber,location,picture) 
values('" . $email  . "' , '" . $password . "','" . $name . "','" . $category . "','" . $rate . "','" . $description . "','" . $phonenumber . "','" . $bkashnumber . "','" . $location . "','" . $filename . "');";

$res = $conn->query($sql);
if ($res) {
    move_uploaded_file($tempname, $folder);
    $_SESSION['user'] = "lawyer";
    $_SESSION['email'] = $email;
    header("Location:lawyer");
} else {
    echo "<script>
    alert('Email alreay exist!!!!');
    window.location.href='index.php';
    </script>";
}
