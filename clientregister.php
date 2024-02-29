<?php
include_once 'dbconnection.php';
session_start();

//all the fields 
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];



$filename = $_FILES["picture"]["name"];
$tempname = $_FILES["picture"]["tmp_name"];

$folder = "client/images/" . $filename;

$sql = "insert into  clients(email  ,password,name,phonenumber,picture) 
values('" . $email  . "' , '" . $password . "','" . $name . "','" . $phonenumber . "','" . $filename . "');";

echo $sql;
$res = $conn->query($sql);

if ($res) {
    move_uploaded_file($tempname, $folder);
    $_SESSION['user'] = "client";
    $_SESSION['email'] = $email;
    header("Location:client");
} else {
    echo "<script>
    alert('Email alreay exist!!!!');
    window.location.href='index.php';
    </script>";
}
