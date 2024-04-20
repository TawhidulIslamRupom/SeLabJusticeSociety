
<?php
session_start();
require_once("../dbconnection.php");

$email = $_POST['email'];
$name = $_POST['name'];

$phonenumber = $_POST['phonenumber'];

$password = $_POST['password'];

$filename = $_FILES["image"]["name"];


if ($filename != "") {

    $tempname = $_FILES["image"]["tmp_name"];

    $folder = "../client/images/" . $filename;

    $sql = "UPDATE clients set name ='" . $name  . "' , password='" . $password . "',phonenumber='" . $phonenumber . "',picture='" . $filename . "' where email='" . $email . "';";

    echo $sql;
    $conn->query($sql);
    move_uploaded_file($tempname, $folder);

} else {
   
    $sql = "UPDATE clients set name ='" . $name  . "' , password='" . $password . "',phonenumber='" . $phonenumber . "' where email='" . $email . "';";


    $conn->query($sql);
}

header("Location:client.php");


?>