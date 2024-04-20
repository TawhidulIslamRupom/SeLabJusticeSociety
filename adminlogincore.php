<?php
include_once 'dbconnection.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "select * from admin where email='" . $email . "' and password='" . $password . "';";
$result = $conn->query($query);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = "admin";
        $_SESSION['email'] = $row['email'];
        header("Location: admin");
    }
} else {
    echo "<script>
    alert('email or password is incorrect');
    window.location.href='index.php';
    </script>";
}
