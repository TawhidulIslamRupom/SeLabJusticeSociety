<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['email']);
header("Location: ../index.php");//return home
?>