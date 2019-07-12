<?php
	session_start();
	if(!empty($_SESSION['login']))
	{
		header('Location: index.html');
	}
	else{
	if(isset($_POST['loginBTN'])) {	
	
	$host = "localhost";
  	$login = "root";
  	$passwd = "";
  	$db = "tool_db";
	

  	$conn = mysqli_connect($host, $login, $password, $db);

  	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
      exit;
  	}
	
	$InputLogin = $_POST['login'];
	$InputPassword = $_POST['password'];
	$query = "Select password from login where login = '".$InputLogin."';";
	$result = mysqli_query($conn, $query);
	$pas = mysqli_fetch_assoc($result);
	
	$query2 = "Select salt from login where login = '".$InputLogin."';";
	$result2 = mysqli_query($conn, $query2);
	$salt = mysqli_fetch_assoc($result2);
	
	$query3 = "Select privilege from login where login = '".$InputLogin."';";
	$result3 = mysqli_query($conn, $query3);
	$privilege = mysqli_fetch_assoc($result3);
	
	$salt = $salt["salt"];
	$pas = $pas["password"];
	$privilege = $privilege["privilege"];

	if($pas == myhash($InputPassword,$salt)){
		$_SESSION['login']=$InputLogin;
		$_SESSION['privilege']=$privilege;
		header('Refresh: 2; url=index.html');
		
		echo <<<HTML
		<br>
		<div class="alert alert-success" role="alert">
			Welcome!
		</div>	
HTML;
		
		
	}
	else{
		echo <<<HTML
		<br>
		<div class="alert alert-danger" role="alert">
			Неправильный логин или пароль!
		</div>
HTML;
	}
}
}	
		function myhash($passwd, $SALT) { 
	
        $hash = md5($SALT . $passwd);  

        sleep(1);  
		
        return $hash;  
    }
?>
<!doctype.html>
<html>
<head>
<title>Хозяин</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
	<body class="container">
		<div class="reg">
			<form class="container" method="post">
				<div style="display: grid; padding-top: 10%;">
				<p style="margin-left: 35%;"class="display-4">Логин</p>
				<input type="text" name="login" required>
				<p class="display-4" style="margin-top: 5%; margin-left: 33%;">Пароль</p>
				<input type="password" name="password" required>
				</div>
				<input type="submit"  name="loginBTN" value="Войти" style="margin-top: 1em; width: inherit; color: black;
    font-size: 20px; border-color:#010508;" class="btn btn-outline-secondary">
			</form>
		</div>
		
	</body>
</html>