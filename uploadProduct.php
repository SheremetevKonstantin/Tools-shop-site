<?php
session_start();

	if($_SESSION['ResultProductAdd']==true){
		echo <<<HTML
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<br>
		<div style='    display: flex;
						width: 50%;
						height: 10%;
						margin-top: 14rem;
						margin-left: 25%;'class="alert alert-success" role="alert">
			Запись успешно добавлена!
				<form method='post'>
				<input style='margin-left: 10rem;' name='back' type='submit' value = 'Вернуться назад'>
				</form>
		</div>

HTML;
	}
	else{
		echo <<<HTML
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<br>
		<div style='    display: flex;
						width: 50%;
						height: 10%;
						margin-top: 14rem;
						margin-left: 25%;'class="alert alert-danger" role="alert">
			Запись не была добавлена!
				<form method='post'>
				<input style='margin-left: 10rem;' name='back' type='submit' value = 'Вернуться назад'>
				</form>
		</div>

HTML;
	}
	
	if(isset($_POST['back'])){
		echo "<script>location.replace('addProduct.php');</script>";
	}
?>

