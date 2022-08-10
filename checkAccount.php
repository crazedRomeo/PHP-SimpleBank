<?php
session_start();

$type = trim($_POST['id']);
$value = trim($_POST['value']);
$user_id = intval($_SESSION['user_id']);

if ($user_id > 0) {
    $con = new mysqli('localhost','root','','db_sbank');

    if ( $type == 'account_number' ) {
        $result = $con->query("select * from account where account = '$value' AND active = 1");

        if ($result->num_rows > 0) {
            echo "false";
        } else {
            echo "true";
        }
    } elseif ( $type == 'account_reload' ) {
        $bytes = random_bytes(6);
        $account_number = bin2hex($bytes);
        echo json_encode( array('account_number' => $account_number) );
    }
} else {
    echo "false";
}

?>