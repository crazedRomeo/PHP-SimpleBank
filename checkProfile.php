<?php
session_start();

$type = trim($_POST['id']);
$value = trim($_POST['value']);
$user_id = intval($_SESSION['user_id']);

if ($user_id > 0) {
    $con = new mysqli('localhost','root','','db_sbank');

    if ( $type == 'username' ) {
        $result = $con->query("select * from user where username = '$value' AND active = 1 AND id != $user_id");

        if ($result->num_rows > 0) {
            echo "false";
        } else {
            echo "true";
        }
    } elseif ( $type == 'email' ) {
        $result = $con->query("select * from user where email = '$value' AND active = 1 AND id != $user_id");

        if ($result->num_rows > 0) {
            echo "false";
        } else {
            echo "true";
        }
    } elseif ( $type == 'password' ) {
        $value = trim($_POST['password']);
        
        if (password_verify($value, $_SESSION['user']['password'])) {
			echo "true";
		} else {
            echo "false";
        }
    }
} else {
    echo "false";
}

?>