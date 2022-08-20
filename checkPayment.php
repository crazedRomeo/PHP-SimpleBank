<?php
session_start();

$type = trim($_POST['id']);
$value = intval($_POST['balance']);
$user_id = intval($_SESSION['user_id']);
$account_id = intval($_POST['account']);

if ($user_id > 0) {
    $con = new mysqli('localhost','root','','db_sbank');

    if ( $type == 'withdraw' ) {
        $result = $con->query("select * from account where id = '$account_id' AND active = 1");

        if ($result->num_rows > 0) {
            $max_balance = 0;
            while ($row = $result->fetch_assoc()) {
                $max_balance = $row['balance'];
            }

            if ($max_balance < $value) {
                echo "false";
                exit;
            }
        }
    } elseif ( $type == 'transfer' ) {
        $result = $con->query("select * from account where id = '$account_id' AND active = 1");

        if ($result->num_rows > 0) {
            $max_balance = 0;
            while ($row = $result->fetch_assoc()) {
                $max_balance = $row['balance'];
            }

            if ($max_balance < $value) {
                echo "false";
                exit;
            }
        }
    } elseif ( $type == 'get_balance' ) {
        $result = $con->query("select * from account where id = '$account_id' AND active = 1");

        if ($result->num_rows > 0) {
            $max_balance = 0;
            while ($row = $result->fetch_assoc()) {
                $max_balance = $row['balance'];
            }

            echo json_encode(array('balance' => $max_balance));
            exit;
        }
    }
}

echo "true";
exit;
?>