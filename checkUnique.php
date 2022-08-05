<?php
$type = trim($_POST['id']);
$con = new mysqli('localhost','root','','db_sbank');

if ( $type == 'username' ) {
    $value = trim($_POST['username']);
    $result = $con->query("select * from users where username = '$value' AND active = 1");
} elseif ( $type == 'email' ) {
    $value = trim($_POST['email']);
    $result = $con->query("select * from users where email = '$value' AND active = 1");
}

if ($result->num_rows > 0) {
    echo "false";
} else {
    echo "true";
}
?>