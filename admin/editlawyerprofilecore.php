<?php
session_start();
require_once("../dbconnection.php");

$email = $_POST['email'];
$name = $_POST['name'];
$categoryid = $_POST['categoryid'];
$rate = $_POST['rate'];
$location = $_POST['location'];
$description = $_POST['description'];
$phonenumber = $_POST['phonenumber'];
$location = $_POST['location'];

$bkashnumber = $_POST['bkashnumber'];
$password = $_POST['password'];




$filename = $_FILES["image"]["name"];


if ($filename != "") {

    $tempname = $_FILES["image"]["tmp_name"];

    $folder = "../lawyer/images/" . $filename;

    $sql = "UPDATE lawyers set name ='" . $name  . "' , password='" . $password . "',categoryid='" . $categoryid . "',rate='" . $rate . "',description='" . $description
        . "',phonenumber='" . $phonenumber . "',bkashnumber='" . $bkashnumber . "',location='" . $location . "',picture='" . $filename . "' where email='" . $email . "';";


    $conn->query($sql);
    move_uploaded_file($tempname, $folder);
} else {
    $sql = "UPDATE lawyers set name ='" . $name  . "' ,password='" . $password . "', categoryid='" . $categoryid . "',rate='" . $rate . "',description='" . $description
        . "',phonenumber='" . $phonenumber . "',bkashnumber='" . $bkashnumber . "',location='" . $location . "' where email='" . $email . "';";

    $conn->query($sql);
}

header("Location:lawyer.php");


?>