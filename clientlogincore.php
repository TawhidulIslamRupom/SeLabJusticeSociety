<?php
include_once 'dbconnection.php';//addded db connection
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "select * from clients where email='" . $email . "' and password='" . $password . "';";
$result = $conn->query($query);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = "client";
        $_SESSION['email'] = $row['email'];
        header("Location: client");
    }
} else {
    echo "<script>
    alert('email or password is incorrect');
    window.location.href='index.php';
    </script>";
}
