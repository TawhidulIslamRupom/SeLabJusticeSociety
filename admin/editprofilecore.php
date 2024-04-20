
<?php
session_start();
require_once("../dbconnection.php");

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$filename= $_FILES["profilepic"]["name"];

if ($filename!="") {

    $tempname = $_FILES["profilepic"]["tmp_name"];

    $folder = "images/" . $filename;

    $sql = "UPDATE admin set email='" . $email . "' , password='" . $password . "',name='" . $name . "',profilepic='" . $filename . "';";

    $conn->query($sql);

    move_uploaded_file($tempname, $folder);
} else {
    $sql = "UPDATE admin set email='" . $email . "' , password='" . $password . "',name='" . $name . "';";
    echo $sql;
    $conn->query($sql);
}

header("Location:index.php");


?>