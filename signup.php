<?php
include "config.php";

$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO signup_tbl (user, email, pwd) VALUES ('$username', '$email', '$pwd')";

$usr = "select * from signup_tbl where user='$username'";
$chk_usr = mysqli_query($con, $usr);
$mail = "select * from signup_tbl where email='$email'";
$chk_mail = mysqli_query($con, $mail);

if ($chk_usr->num_rows > 0) {
    $message = "Username is already exists please try with another username.";
    echo "<script type='text/javascript'>alert('$message'); 
    window.location.href = 'Login.html';</script>";
} elseif ($chk_mail->num_rows > 0) {
    $message = "Email is already exists please try with another Email.";
    echo "<script type='text/javascript'>alert('$message'); 
    window.location.href = 'Login.html';</script>";
} else {
    $rs = mysqli_query($con, $sql);
    if ($rs) {
        header("Location: ./index.html");
        exit();
    } else
        echo mysqli_error($con);
}
?>