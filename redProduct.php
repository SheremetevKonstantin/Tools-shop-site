<?php 
session_start();
if(empty($_SESSION['login'])){
	header('Location: login.php');
}
if(isset($_POST['loguotBTN'])){
	require_once "logout.php";
}
if(isset($_POST['RecordDelBTN'])){
	echo "<script>location.replace('delMarked.php');</script>";
}


	$host = "localhost";
  	$login = "root";
  	$passwd = "";
  	$db = "tool_db";
	

  	$conn = mysqli_connect($host, $login, $password, $db);

  	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
      exit;
  	}
	
	$_SESSION['RedProductName'] = $_GET['name'];
	require_once('assets/redProduct_info.php');
	
	
	if(isset($_POST['RedInsertProduct'])){
		$CHARACTERISTICS = '';
		
		$ProductCharacteristicCount = explode(';',$_SESSION['RedProductCharacteristic']);
		
		for($i=0;$i<count($ProductCharacteristicCount);$i++){
			$_POST['CharacteristicName' . $i] = str_replace(';',',',$_POST['CharacteristicName' . $i]);
			$_POST['ProductNameValue' . $i] =str_replace(';',',',$_POST['ProductNameValue' . $i]);
			if($i==0){
				$CHARACTERISTICS=$_POST['CharacteristicName' . $i] . '-' . $_POST['ProductNameValue'. $i];
			}
			else{
				$CHARACTERISTICS = $CHARACTERISTICS . ';' . $_POST['CharacteristicName' . $i] . '-' . $_POST['ProductNameValue'. $i];
			}
		}	
		//write your code here

		$uploaddir = 'img/products/';
		if($_FILES['uploadfile']['name'] != ''){
		$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
		copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
		}
		else{
			$uploadfile = $_SESSION['RedProductImage'];
		}
		$sql = "UPDATE `product` SET `product_name`='{$_POST['ProductName']}',`product_cost`={$_POST['ProductCost']},
	`product_description`='{$_POST['ProductDescription']}',`product_image`='{$uploadfile}',
		`product_count`={$_POST['ProductCount']},`product_characteristic`='{$CHARACTERISTICS}'
		 WHERE `product_id` = {$_SESSION['RedProductId']};";
		$result = mysqli_query($conn, $sql);
			echo "<script>location.replace('detailProduct.php?ParentProductName={$_POST['ProductName']}');</script>";							
			
			}
	
	
		
?>


<!doctype.html>
<html>
<head>
<title>Хозяин</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/addProduct.js"></script>
</head>
<body style="background-color:#e3e8e8;">
	<div class="container">
			<?php require_once("/assets/header.php") ?>
		<div class="Main">
			<div class="Nav">
				<div class="Official">
					<a href="index.html" style="padding-left: 1em;">Главная</a>
				</div>
			</div>
			<div class="Content">		
				<h1 class="display-4">Редактирование товара</h1>	
				<form method='post' enctype=multipart/form-data>								
				<div style="display:flex; width:100%;">
					<h3>Наименование товара</h3>
					<input maxlength=100 type='text' value="<?php echo $_SESSION['RedProductName']; ?>" name='ProductName' required>
					<h3 style="margin-left: 1%;">Стоимость товара</h3>
					<input maxlength=6 type='text' pattern='[0-9]{1,}' name='ProductCost' value="<?php echo $_SESSION['RedProductCost']; ?>" required>
				</div>
				<div style="display:flex; width:100%; margin-top: 1.3%;">
					<h3>Количество на складе</h3>
					<input style="margin-left: 0.6%;" maxlength=10 pattern='[0-9]{1,}' type='text' required value="<?php echo $_SESSION['RedProductCount']; ?>" name='ProductCount' required>
					<h3 style="margin-left: 1%;">Фотография</h3>
					<input style="margin-left: 7%;" type=file name=uploadfile value="<?php echo $_SESSION['RedProductImage']; ?>">
				</div>
				<h3 style="margin-top: 1.3%">Характеристики</h3>
				<div id='charact'>
				<?php
					$ProductCharacteristicArray = explode(';',$_SESSION['RedProductCharacteristic']);
					for($i=0;$i< count($ProductCharacteristicArray);$i++){
					$ProductCharArr = explode('-',$ProductCharacteristicArray[$i]);
						echo <<<HTML
						<b>Наименование</b>
						<input type='text' maxlength=50 name='CharacteristicName{$i}' value='{$ProductCharArr[0]}' required>
						<b>Значение</b>
						<input type='text' maxlength=15 name='ProductNameValue{$i}' value='{$ProductCharArr[1]}' required>
HTML;
					}
				?>
				</div>
				<h3 style="margin-top: 1.3%">Описание товара</h3>
				<textarea name="ProductDescription" maxlength=512 required style="width: 100%; height: 8em;"><?php echo $_SESSION['RedProductDescription'];?></textarea>
				<input style="width: 100%;
							  margin-top: 1%;
							  height: 3rem;" type="submit" value="Редактировать товар" name="RedInsertProduct">
				</form>				
			</div>
		</div>
	</div>
	</body>
</html>



				