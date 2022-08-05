<?php 

function loginUser($username, $password)
{
	$con = new mysqli('localhost','root','','db_sbank');
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = $con->query("select * from users where (username = '$username' OR email = '$username') AND active = 1");
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
	$con = new mysqli('localhost','root','','db_sbank');

	session_start();

	$user_id = $_SESSION['user_id'];
	if ( $user_id > 0 ) {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		return $con->query("update users set username = '$username', email = '$email', password = '$hashed_password' where id = '$user_id'");
	} else {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		return $con->query("insert into users (username, email, password) values ('$username', '$email', '$hashed_password')");
	}
}

function setBalance($amount,$process,$accountNo)
{
	$con = new mysqli('localhost','root','','db_sbank');
	$array = $con->query("select * from userAccounts where accountNo='$accountNo'");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$balance = $row['balance'] + $amount;
		return $con->query("update userAccounts set balance = '$balance' where accountNo = '$accountNo'");
	}else
	{
		$balance = $row['balance'] - $amount;
		return $con->query("update userAccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
}
function setOtherBalance($amount,$process,$accountNo)
{
	$con = new mysqli('localhost','root','','db_sbank');
	$array = $con->query("select * from otheraccounts where accountNo='$accountNo'");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$balance = $row['balance'] + $amount;
		return $con->query("update otheraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}else
	{
		$balance = $row['balance'] - $amount;
		return $con->query("update otheraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
}
function makeTransaction($action,$amount,$other)
{
	$con = new mysqli('localhost','root','','db_sbank');
	if ($action == 'transfer')
	{
		return $con->query("insert into transaction (action,debit,other,userId) values ('transfer','$amount','$other','$_SESSION[userId]')");
	}
	if ($action == 'withdraw')
	{
		return $con->query("insert into transaction (action,debit,other,userId) values ('withdraw','$amount','$other','$_SESSION[userId]')");
		
	}
	if ($action == 'deposit')
	{
		return $con->query("insert into transaction (action,credit,other,userId) values ('deposit','$amount','$other','$_SESSION[userId]')");
		
	}
}
function makeTransactionCashier($action,$amount,$other,$userId)
{
	$con = new mysqli('localhost','root','','db_sbank');
	if ($action == 'transfer')
	{
		return $con->query("insert into transaction (action,debit,other,userId) values ('transfer','$amount','$other','$userId')");
	}
	if ($action == 'withdraw')
	{
		return $con->query("insert into transaction (action,debit,other,userId) values ('withdraw','$amount','$other','$userId')");
		
	}
	if ($action == 'deposit')
	{
		return $con->query("insert into transaction (action,credit,other,userId) values ('deposit','$amount','$other','$userId')");
		
	}
}
 ?>