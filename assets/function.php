<?php 
define("TRANSACTION_DEPOSIT",		"deposit");
define("TRANSACTION_WITHDRAW",		"withdraw");
define("TRANSACTION_TRANSFER",     	"transfer");
define("TRANSACTION_EXT_TRANSFER",	"ext-transfer");

$con = new mysqli('localhost','root','','db_sbank');

function loginUser($username, $password)
{
	global $con;
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = $con->query("select * from user where (username = '$username' OR email = '$username') AND active = 1");
	if ( $result->num_rows > 0 )
	{
		$data = $result->fetch_assoc();
		if (password_verify($password, $data['password'])) {
			session_start();
			$_SESSION['user_id'] = $data['id'];
			$_SESSION['user'] = $data;
			header('location:index.php');
		} else {
			return 1;
		}
	} else {
		return 2;
	}
}

function registerUser($username, $email, $password)
{
	global $con;

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	return $con->query("insert into user (username, email, password, role, created, modified) values ('$username', '$email', '$hashed_password', 2, '". date("Y-m-d H:i:s") ."', '". date("Y-m-d H:i:s") ."')");
}

function updateUser($username, $email, $password, $role)
{
	global $con;

	session_start();

	$user_id = $_SESSION['user_id'];

	if ($user_id > 0) {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		return $con->query("update user set username = '$username', email = '$email', password = '$hashed_password', role = '$role', modified = '". date("Y-m-d H:i:s") ."' where id = '$user_id'");
	}
}

function getRoles()
{
	global $con;
	
	$result = $con->query("select * from role where active = 1");

	$roles_arr = array();
	if ( $result->num_rows > 0 )
	{
		while ($row = $result->fetch_assoc())  {
			$roles_arr[] = $row;
		}
	}

	return $roles_arr;
}

function registerAccount()
{
	global $con;
		
	$account_number = trim($_POST['account_number']);
	$user_id = intval($_SESSION['user_id']);
	if ( intval($_POST['type']) == 0 )
		$type = "personal";
	$balance = intval($_POST['balance']);

	$result = $con->query("insert into account (account, user_id, balance, type, created, modified) values ('$account_number', '$user_id', '$balance', '$type', '". date("Y-m-d H:i:s") ."', '". date("Y-m-d H:i:s") ."')");
	$account_id = ($result) ? $con->insert_id : 0;

	if ( $account_id > 0 ) {
		if (addTransaction(0, $account_id, $balance * -1, TRANSACTION_DEPOSIT, "Create Account")) {
			$result = $con->query("select * from transaction where account_src = '0' AND active = 1");
			$account_balance = 0;
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$account_balance += $row['balance_change'];
				}
			}
	
			$con->query("update account set balance = '$account_balance', modified = '". date("Y-m-d H:i:s") ."' where id = '0'");
	
			return true;
		} else {
			$con->query("delete from account where id = '$account_id'");
			return false;
		}
	} else {
		return false;
	}
}

function totalAccounts()
{
	global $con;
	
	$user_id = intval($_SESSION['user_id']);
	$result = $con->query("select COUNT(*) as total_account from account where user_id = '$user_id'");
	
	$total_account = 0;
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$total_account = $row['total_account'];
		}
	}

	return $total_account;
}

function getAccounts()
{
	global $con;
	
	$user_id = intval($_SESSION['user_id']);
	$page_num = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$start_num = ($page_num - 1) * 5;

	$result = $con->query("select * from account where user_id = '$user_id' LIMIT {$start_num}, 5");
	
	$account_list = array();
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$account_list[] = $row;
		}
	}

	return $account_list;
}

function addTransaction($account_src, $account_dest, $balance, $type, $memo)
{
	global $con;

	if ( $type == TRANSACTION_DEPOSIT ) {
		$result = $con->query("select * from transaction where account_src = '$account_src' AND active = 1 ORDER BY id DESC LIMIT 1");
		$account_src_info = array();
		if ( $result->num_rows > 0 )
		{
			while ($row = $result->fetch_assoc())  {
				$account_src_info = $row;
			}
		}

		$result = $con->query("select * from transaction where account_src = '$account_dest' AND active = 1 ORDER BY id DESC LIMIT 1");
		$account_dest_info = array();
		if ( $result->num_rows > 0 )
		{
			while ($row = $result->fetch_assoc())  {
				$account_dest_info = $row;
			}
		}

		$expected_total = $account_src_info['expected_total'] + $balance;
		$result = $con->query("insert into transaction (account_src, account_dest, balance_change, transaction_type, memo, expected_total, created, modified) values ('$account_src', '$account_dest', '$balance', '$type', '$memo', '$expected_total', '". date("Y-m-d H:i:s") ."', '". date("Y-m-d H:i:s") ."')");

		if ($result) {
			$balance = $balance * -1;
			$expected_total = $account_dest_info['expected_total'] + $balance;

			$result = $con->query("insert into transaction (account_src, account_dest, balance_change, transaction_type, memo, expected_total, created, modified) values ('$account_dest', '$account_src', '$balance', '$type', '$memo', '$expected_total', '". date("Y-m-d H:i:s") ."', '". date("Y-m-d H:i:s") ."')");
		}
	}

	return $result;
}