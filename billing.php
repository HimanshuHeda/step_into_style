<?php
include "config.php";

$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];

$sql = "INSERT INTO billing_tbl (`name`, `address`, `city`, `state`, `pin`, `country`) VALUES ('$name', '$address', '$city', '$state', '$zip', '$country')";

$rs = mysqli_query($con, $sql);
if ($rs) {
    header("Location: ./index.html");
    exit();
} else
    echo mysqli_error($con);
?>