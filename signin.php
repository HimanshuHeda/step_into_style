<?php
session_start();
include "config.php";

if (isset($_POST['SignInBtn'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['pwd']);
    if ($username != "" && $password != "") {
        $sql_query = "select count(*) as cntUser from signup_tbl where user='" . $username . "' and pwd='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
    }
}

if ($count > 0) {
    $_SESSION['username'] = $username;
    header('Location: index.html');
    exit();
} else {
    $message = "Username or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message'); 
    window.location.href = 'Login.html';</script>";
}