<!Doctype>
<html>
<head>
  <title>Хозяин</title>
  <meta charset="utf-8">
  <link rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
  crossorigin="anonymous">
  <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
</head>
<body>
  <div class="jumbotron">
    <div class="container">
	  <form method="get" style="display: flex;   justify-content: space-between;">
	   <h1 class="display-5">Регистрация</h1>
	  <input type="submit" value="На главную" style="width: 50%;" formaction="users.php" class="btn btn-outline-secondary">	  	 
	  </form>
	</div>
  </div>

  <form class="container" method="post">
      <div class="form-group">
        <h3>Логин:</h3>
		<input type="text" name="log" placeholder="Логин" class="form-control" required>
        <h3>Пароль:</h3>
		<input type="text" id="password"name="password" placeholder="Password" class="form-control" required>
        <h3>Подтвердите пароль:<input id="passwordConfirm" type="text" name="passwordConfirm" placeholder="Password confirm" class="form-control" required></h3>
		<h3>Выбериет привелегию:
		<select name="privilege">
		<option>Пользователь</option>
		<option>Админ</option>
		<option>Полные права</option>
		</select>
		</h3>
      </div>
      <input type="submit" name="registerbtn" value="Регистрация" class="btn btn-outline-secondary">
  </form>

  <?php


	if(isset($_POST['registerbtn'])) {		
	  if($_POST['password'] != $_POST['passwordConfirm']){
				echo <<<HTML
		<div class="alert alert-danger" role="alert">
			Вводимые пароли не совпадают!
		</div>		
HTML;
	}
	else{
	$host = "localhost";
  	$login = "root";
  	$passwd = "";
  	$db = "tool_db";
	

  	$conn = mysqli_connect($host, $login, $password, $db);

  	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
      exit;
  	}
	
	define("SALT_LENGHT", 10);
	$r_min = 0;
	$r_max = 21;

	
	$SALT = substr(md5(uniqid() . time), mt_rand($r_min, $r_max), SALT_LENGHT);
	
	$log = $_POST['log'];
	$pas = $_POST['password'];
	$privilege = $_POST['privilege'];
	$hash = myhash($pas,$SALT);
	
	if($privilege == 'Пользователь'){
		$privilege = 0;
	}
	else if($privilege == 'Админ'){
		$privilege = 1;
	}
	else if($privilege == 'Полные права'){
		$privilege = 2;
	}
	
	$query = "INSERT INTO login (login, password,salt,privilege ) VALUES ('".$log."', '".$hash."', '".$SALT."','{$privilege}')";
  		if($result = mysqli_query($conn, $query)){
		echo "<script>swal('Успешно!', 'Добавлен новый пользователь \"{$log}\"', 'success');</script>"; 
		echo "<script>location.replace('users.php');</script>";
	}
	else{
		echo "<script>swal('Ошибка!', 'Пользователь \"{$log}\" не добавлен, он уже существует', 'error');</script>"; 
	}

	}
	}
	
	
	
	function myhash($passwd, $SALT) { 
	
        $hash = md5($SALT . $passwd); 
		
        sleep(1);  

		
        return $hash;  
    }
  ?>

  
  <hr>
  <footer class="container">
      <p>&copy; MDK 02.02 /PR02 Sheremetev Konstantin 2018-2019</p>
    </footer>
</body>
</html>
