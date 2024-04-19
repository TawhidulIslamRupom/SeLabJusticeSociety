<img src="../images//bkash.jpg" alt="" width="400" height="300">

<?php

session_start();
require_once("../dbconnection.php");

$email = $_GET['id'];

$query = "select * from lawyers where email='" . $email . "';";
$result = $conn->query($query);
$bkashnumber = "";

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $bkashnumber = $row['bkashnumber'];
    }
}

?>

<ul class="list-group">
    <li class="list-group-item"> Go to your bKash Mobile Menu by dialing *247#</li>
    <li class="list-group-item">Choose “Send Money”</li>
    <li class="list-group-item">Enter the bKash Account Number: <span style="color:red"><?php echo $bkashnumber ?> </span></li>
    <li class="list-group-item">Enter the amount you want to send</li>
    <li class="list-group-item">Enter a reference about the transaction. (Do not use more than one word, avoid space or special characters)</li>
    <li class="list-group-item">Now enter your bKash Mobile Menu PIN to confirm the transaction</li>
    <li class="list-group-item">Copy transaction id and provide it to lawyer</li>
</ul>