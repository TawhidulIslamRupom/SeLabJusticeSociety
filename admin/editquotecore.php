<?php
include_once '../dbconnection.php';
session_start();
$idquote = $_POST['idquote'];
$quote = $_POST['quote'];
$writer = $_POST['writer'];
$identity = $_POST['identity'];

$quote = str_replace("'","`",$quote);

$query = "update quotes set quote='" . $quote . "' , writer='" . $writer . "', identity='" . $identity . "' where quote='" . $idquote . "';";
echo $query;
$result = $conn->query($query);
if ($result) {
    echo "<script>
    alert('updated!!!');
    window.location.href='quote.php';
    </script>";
}
