<?php
include_once '../dbconnection.php';
session_start();


$category = $_POST['category'];
$description = $_POST['description'];

$filename = $_FILES["image"]["name"];


$tempname = $_FILES["image"]["tmp_name"];

$folder = "images/" . $filename;

$sql = "insert into  lawyercategories(category ,description,image) values('" . $category  . "' , '" . $description      . "','" . $filename . "');";

$conn->query($sql);

move_uploaded_file($tempname, $folder);

header("Location:categories.php");
