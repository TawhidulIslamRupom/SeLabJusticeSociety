
<?php
session_start();
require_once("../dbconnection.php");

$id = $_POST['id'];
$category = $_POST['category'];
$description = $_POST['description'];

$filename = $_FILES["image"]["name"];

if ($filename != "") {

    $tempname = $_FILES["image"]["tmp_name"];

    $folder = "../images/" . $filename;

    $sql = "UPDATE lawyercategories set category ='" . $category  . "' , description='" . $description . "',image='" . $filename . "' where id='".$id."';";
    echo $sql;
    $conn->query($sql);

    move_uploaded_file($tempname, $folder);
} else {
    $sql = "UPDATE lawyercategories set category='" . $category . "' , description='" . $description . "' where id='".$id."';";
    
    $conn->query($sql);
}

header("Location:categories.php");


?>