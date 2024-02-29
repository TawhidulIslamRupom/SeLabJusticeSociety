
<?php
session_start();
require_once("../dbconnection.php");//db connection set up

$email = $_SESSION['email'];
$name = $_POST['name'];

$phonenumber = $_POST['phonenumber'];

$password = $_POST['password'];




$filename = $_FILES["image"]["name"];


if ($filename != "") {

    $tempname = $_FILES["image"]["tmp_name"];

    $folder = "images/" . $filename;

    $sql = "UPDATE clients set name ='" . $name  . "' , password='" . $password . "',phonenumber='" . $phonenumber . "',picture='" . $filename . "' where email='" . $email . "';";

    echo $sql;
    $conn->query($sql);
    move_uploaded_file($tempname, $folder);

} else {
   
    $sql = "UPDATE clients set name ='" . $name  . "' , password='" . $password . "',phonenumber='" . $phonenumber . "' where email='" . $email . "';";


    $conn->query($sql);
}

header("Location:editprofile.php");


?>