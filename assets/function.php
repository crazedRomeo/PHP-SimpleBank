<?php 
$con = new mysqli('localhost','root','','db_sbank');

function loginUser($username, $password)
{
	global $con;
	
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
	global $con;

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	return $con->query("insert into users (username, email, password, role, created, modified) values ('$username', '$email', '$hashed_password', 2, '". date("Y-m-d H:i:s") .", '". date("Y-m-d H:i:s") ."')");
}

function updateUser($username, $email, $password, $role)
{
	global $con;

	session_start();

	$user_id = $_SESSION['user_id'];

	if ($user_id > 0) {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		return $con->query("update users set username = '$username', email = '$email', password = '$hashed_password', role = '$role', modified = '". date("Y-m-d H:i:s") ."' where id = '$user_id'");
	}
}

function getRoles()
{
	global $con;
	
	$result = $con->query("select * from roles where active = 1");

	$roles_arr = array();
	if ( $result->num_rows > 0 )
	{
		while ($row = $result->fetch_assoc())  {
			$roles_arr[] = $row;
		}
	}

	return $roles_arr;
}