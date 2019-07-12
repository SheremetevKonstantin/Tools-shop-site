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

require_once("assets/addProduct_info.php");


	$host = "localhost";
  	$login = "root";
  	$passwd = "";
  	$db = "tool_db";
	

  	$conn = mysqli_connect($host, $login, $password, $db);

  	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
      exit;
  	}
?>
<!doctype.html>
<html>
<head>
<title>Хозяин</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script> 
<script>
function get() {
				var slct = document.getElementById('categoryProduct').value;
				var result = document.getElementById('two');
				var xhr = new XMLHttpRequest();

				var uri = "changer.php" + "?cat=" + slct;
				
				xhr.open("POST", uri, true);

				xhr.onreadystatechange = function() {
					if ((xhr.readyState==4) && (xhr.status==200)) {
						result.innerHTML = xhr.responseText;
					}
				}
				
				xhr.send();
			}
			
			var CharacteristicCount = 0;
function CharacteristicAdd(){
				CharacteristicCount++;
				var slct = document.getElementById('charact').value = CharacteristicCount +1;
				var result = document.getElementById('hered');
				var xhr = new XMLHttpRequest();

				var uri = "changerChar.php" + "?cat=" + CharacteristicCount;
				
				xhr.open("POST", uri, true);

				xhr.onreadystatechange = function() {
					if ((xhr.readyState==4) && (xhr.status==200)) {
						result.innerHTML += xhr.responseText;
					}
				}
				
				xhr.send();
				
}

function CharacteristicDel(){
				var temt = "char" + CharacteristicCount;
				var elem = document.getElementById(temt);
				elem.remove();
				CharacteristicCount--;	
				var slct = document.getElementById('charact').innerHTML = CharacteristicCount +1;				
}
</script>
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
				<div style="display:flex;width:100%;">				
				<h1 class="display-4">Добавление товара</h1>	
				
					<form method='post'>
						<input type="submit" class="adBTNS" name="addCat" value="Добавить категорию">
					</form>			

					<form method="post">
						<input type="submit" class="adBTNS" style="    margin-left: 4%;" name="addSubCat" value="Добавить подкатегорию">
					</form>
				</div>
				<?php
///////////////////////////////////////////////////////
//Раздел с подкатегорией
//////////////////////////////////////////////////////	
					if(isset($_POST['addCat'])){ 
					echo "<script>document.getElementById('form').style.background-color = 'red';</script>";
					echo	<<<HTML
						<form method='post'>
						<h4>Название категории</h4>
						<input type="text" name="inputCatName">
							<form  method=post enctype=multipart/form-data>
							<input type="submit"  name="addCatImg" value="Далее">
							<input type="submit"  name="addCatCansel" value="Отмена">
							</form>					
						</form>
						
HTML;
					}
					else if(isset($_POST['addCatImg'])){ //Добавить изображение категории
					$_SESSION['inputCatName'] = $_POST['inputCatName'];	
					
					echo	<<<HTML
						<h6>Выбрать изображение для подкатегории</h6>
						<form action=uploadcatImg.php method=post enctype=multipart/form-data>
						<input type=file name=uploadfile>
						<input type=submit value=Завершить></form>
						
HTML;
					}			
					else if(isset($_POST['addSubCatImg'])){ // Загрузка фотографии в папку subcats и добавление подкатегори
									
						$_SESSION['catSelect'] = $_POST['catSelect'];
						$_SESSION['inputSubCatName'] = $_POST['inputSubCatName'];	
						echo	<<<HTML
						<h6>Выбрать изображение для подкатегории</h6>
						<form action=uploadSubcatImg.php method=post enctype=multipart/form-data>
						<input type=file name=uploadfile>
						<input type=submit name=addSubCatAdd value=Завершить></form>						
HTML;
				}
					else if(isset($_POST['addSubCat'])){
					
										echo <<<HTML
						<form method='post' enctype=multipart/form-data>
						<h3 id="out">Выберите категорию</h3>		
						<select id="categoryProduct" name="catSelect">
						<option>---Выберите категорию---</option>
HTML;
					for($i=0;$i < count($_SESSION["NullCategoryArray"]);$i++){
					echo <<<HTML
					<option>{$_SESSION["NullCategoryArray"][$i]}</option>
HTML;
				}
					echo <<<HTML
						</select>		
						<h4>Название подкатегории</h4>
						<input type="text" name="inputSubCatName">
							<form  method=post enctype=multipart/form-data>
							<input type="submit"  name="addSubCatImg" value="Далее">
							<input type="submit"  name="addSubCatCansel" value="Отмена">
							</form>										
						</form>						
HTML;
				}else{
				echo <<<HTML
					<form method='post' enctype=multipart/form-data id="form">
				<h3 id="out">Выберите категорию</h3>		
				<select id="categoryProduct" name="catSelect" onClick="get();">
					<option>---Выберите категорию---</option>
HTML;
					for($i=0;$i < count($_SESSION["NullCategoryArray"]);$i++){
					echo <<<HTML
					<option>{$_SESSION["NullCategoryArray"][$i]}</option>
HTML;
					}
				echo <<<HTML
				</select>	
				<h3>Выберите подкатегорию</h3>				
				<select id="two" name="subSelect">
					<option>---Выберите подкатегорию---</option>				
				</select>				
				<div style="display:flex; width:100%;">
					<h3>Наименование товара</h3>
					<input maxlength=100 type='text' name='ProductName' required>
					<h3 style="margin-left: 1%;">Стоимость товара</h3>
					<input maxlength=6 type='text' pattern='[0-9]{1,}'  name='ProductCost' required>
				</div>
				<div style="display:flex; width:100%; margin-top: 1.3%;">
					<h3>Количество на складе</h3>
					<input style="margin-left: 0.6%;" pattern='[0-9]{1,}' maxlength=10 type='text' name='ProductCount' required>
					<h3 style="margin-left: 1%;">Фотография</h3>
					<input style="margin-left: 7%;" type=file name=uploadfile>
				</div>
				<h3 style="margin-top: 1.3%">Характеристики</h3>
				<div style='display:flex;'>
				<input hidden id='charact' name = "charact" value="1" style='margin-top: 2px;'>
				</div>
				<b>Наименование</b>
				<input type='text' maxlength=50 name='CharacteristicName0' required>
				<b>Значение</b>
				<input type='text' maxlength=15 name='ProductNameValue0' required>
				<input type='button' value='Добавить новую характеристику' onClick="CharacteristicAdd()" name='AddCharacteristic'>
				<input type='button' value='Удалить последнее' name='ResetCharacteristic' onClick="CharacteristicDel()" >
				<div id='hered'></div>
				<h3 style="margin-top: 1.3%">Описание товара</h3>
				<textarea name="ProductDescription" maxlength=512 required style="width: 100%; height: 8em;"></textarea>
				<input style="width: 100%;
							  margin-top: 1%;
							  height: 3rem;" type="submit" value="Добавить товар" name="InsertProduct">
				</form>
HTML;
				}				
///////////////////////////////////////////////////////
//Раздел заполнения товара
//////////////////////////////////////////////////////
				?>		
				
				<?php									
					if(isset($_POST['InsertProduct'])){						
						/*echo $_POST['ProductName'];
						echo $_POST['ProductCost'];
						echo $_POST['ProductCount'];
						*/
						//var_dump($_FILE['filename']['name']); Сделать проверку
						//echo $_POST['ProductDescription'];
						
						if($_POST['catSelect']=="---Выберите категорию---"){
							echo "<script>swal('Ошибка!', 'Не была выбрана категория и подкатегория!', 'error');</script>"; 
						}
						else if($_POST['subSelect']=="---Выберите подкатегорию---"){
							echo "<script>swal('Ошибка!', 'Не была выбрана подкатегория!', 'error');</script>"; 
						}
						else{
							$query = "SELECT product_id FROM product Where product_name = '" . $_POST['ProductName'] ."';";
							$result = mysqli_query($conn, $query);
							$TwiceProductNameId = mysqli_fetch_assoc($result);							
							$TwiceProductNameId = $TwiceProductNameId["product_id"];
														
							if($TwiceProductNameId == NULL){
								
							$CHARACTERISTICS = '';
							for($i=0;$i<$_POST['charact'];$i++){
								$_POST['CharacteristicName' . $i] = str_replace(';',',',$_POST['CharacteristicName' . $i]);
								$_POST['ProductNameValue' . $i] =str_replace(';',',',$_POST['ProductNameValue' . $i]);
								if($i==0){
									$CHARACTERISTICS=$_POST['CharacteristicName' . $i] . '-' . $_POST['ProductNameValue'. $i];
								}
								else{
									$CHARACTERISTICS = $CHARACTERISTICS . ';' . $_POST['CharacteristicName' . $i] . '-' . $_POST['ProductNameValue'. $i];
								}
							}		
								
							$query2 = "SELECT category_id FROM category Where category_category = '" . $_POST['subSelect'] ."';";
							$result2 = mysqli_query($conn, $query2);
							$Category = mysqli_fetch_assoc($result2);							
							$Category = $Category["category_id"];
								
								$uploaddir = 'img/products/';
							if($_FILES['uploadfile']['name'] != ''){
							$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
							copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
							}
							else{
								$uploadfile = 'img/products/5.png';
							}
							$sql = "INSERT INTO `product`(`product_name`,
							`product_cost`, `product_description`, `product_image`,
							`product_count`, `product_characteristic`, `product_category`,
							`product_status`) Values ('{$_POST['ProductName']}',{$_POST['ProductCost']},
							'{$_POST['ProductDescription']}','{$uploadfile}',{$_POST['ProductCount']},
							'{$CHARACTERISTICS}',{$Category},'1');";
							$result = mysqli_query($conn, $sql);
							$_SESSION['ResultProductAdd'] = $result;
							echo "<script>location.replace('uploadProduct.php');</script>";							
							
							}
							else{
								echo <<<HTML
			<div class="alert alert-danger" role="alert">
				Товар с таким названием уже существует!			
			</div>
HTML;
							}
						}
					}
				?>
			</div>
		</div>
	</div>
	</body>
</html>



				