<?php
session_start();
	$host = "localhost";
  	$login = "root";
  	$passwd = "";
  	$db = "tool_db";
	

  	$conn = mysqli_connect($host, $login, $password, $db);

  	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
      exit;
  	}
	
	if($_SESSION['inputCatName'] != ''){
		
	$query2 = "SELECT category_id FROM category Where category_category = '" . $_SESSION['inputCatName'] ."';";
	$result2 = mysqli_query($conn, $query2);
	$Category = mysqli_fetch_assoc($result2);	// тут делаю проверку что создаваемая категория не существует						
	$Category = $Category["category_id"];
		
	if($Category == NULL){
		// Каталог, в который мы будем принимать файл:
$uploaddir = './img/cats/';
if($_FILES['uploadfile']['name'] != ''){
$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);//вот тут и происходит взятие картинки по сути
copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
}
else{
	$uploadfile = 'img/cats/5.png';//тут я устанавливаю название файла по умолчанию, если картинка выбрана не была
}

var_dump($_FILES['uploadfile']['name']);
	$sql = "Insert Into category (category_category,category_status
,category_sub,category_image) Values ('{$_SESSION['inputCatName']}','1','null','{$uploadfile}');";
	$result = mysqli_query($conn, $sql);
	var_dump($result);

echo "<script>location.replace('addProduct.php');</script>";
	}
	else{

	}	
echo <<<HTML
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<br>
		<div style='    display: flex;
						width: 50%;
						height: 10%;
						margin-top: 14rem;
						margin-left: 25%;'class="alert alert-danger" role="alert">
			Категория с таким названием уже существует!	
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
			Не было заполнено поле названиe категории!
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

