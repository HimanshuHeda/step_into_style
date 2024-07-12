<?php
include "config.php";

$email = $_POST['email'];

$sql = "INSERT INTO fmail_tbl (`email`) VALUES ('$email')";

$chk_mail = $con->query("select * from fmail_tbl where email='$email'");

if ($chk_mail->num_rows > 0) {
    echo "Email is already exists please try with another Email";
} 

else {
    $rs = mysqli_query($con, $sql);
    if ($rs) {
        header("Location: ./index.html");
        exit();
    } else
        echo mysqli_error($con);
}
?>