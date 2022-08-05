<?php
$type = trim($_POST['id']);
$value = trim($_POST['value']);

$con = new mysqli('localhost','root','','db_sbank');

if ( $type == 'username' ) {
    $result = $con->query("select * from users where username = '$value' AND active = 1");
} elseif ( $type == 'email' ) {
    $result = $con->query("select * from users where email = '$value' AND active = 1");
}

if ($result->num_rows > 0) {
    echo "false";
} else {
    echo "true";
}
?>