<?php
session_start();
$Privilege;
Switch($_SESSION["privilege"]){
	case 0: $Privilege = "Пользователь"; break;
	case 1: $Privilege = "Админ"; break;
	case 2: $Privilege = "Полные права"; break;
}
if($_SESSION['BasketCount'] == NULL) $_SESSION['BasketCount'] = 0;	
$_SESSION['BascketNameString'];

if(isset($_POST['reset'])){
	$_SESSION['BasketCount'] = 0;
	$_SESSION['BascketNameString'] = "";
}
	
if($_SESSION["privilege"] == 2){
echo <<<HTML
		<div class="Header">
			<form method="post" style="display:flex;margin:0;">
				<a href="index.html"><img src="img/logo.png" style="width: 70%;" class="IMAGE"></a>
				<a href="Orders.php"><img src="img/basket.png" style="width: 20%;margin:0;position: relative;left: -20%;"></a>
				<h1 style="    padding-top: 1%;position: relative;left: -32%;">{$_SESSION['BasketCount']}</h1>
				<input type='submit' name ='reset' value='' style="    width: 5%;    height: 25%;    margin-top: 1%;
				position: relative;left: -32%;background-size: cover;
																		background-repeat: round;
																		background-image: url(img/ResetProducts.png);">
				<h1 style="font-size: 3em;width: 35%;margin-left: -29%;">{$Privilege}</h1>
				<input type="submit"  name="loguotBTN" value="Завершить сеанс" style="width: auto; color: black;
					font-size: 20px; border-color:#010508;" class="btn btn-outline-secondary">
				<input type="submit"  name="RecordDelBTN" value="Помеченые на удаление" style="width: 22%; color: black;
					font-size: 20px; border-color:#010508;" class="btn btn-outline-secondary">						
			</form>

			<div style="    margin: 2%;">
				<a href="customers.php"> <img src="img/customers.png" style="width: 30%;
																			height: 42%;
																			margin-left: 1.5%;
																			border: 1px solid;"></a>
				<a href="deals.php"><img src="img/deals.png" style="width: 30%;
																	height: 42%;
																	margin-left: 3%;
																	border: 1px solid;"></a>
				<a href="users.php"><img src="img/login.png" style="width: 30%;
												margin-left: 3%;
												height: 42%;
												border: 1px solid;"></a>
			</div>
			<form action="search.php">
			<div class = "search">
				<input type="search" name="search" style="font-size: 22px;width: 90%;" pattern="[0-9A-Za-zА-Яа-яЁё\s]{3,}" required>
				<input type="submit"  name="go" value="Поиск" style="width: 10%;margin-left: 1%; color: black; 
				border-color:#010508;" class="btn btn-outline-secondary">
			</div>
			</form>
		</div>
HTML;
}
if($_SESSION["privilege"] == 1){
	echo <<<HTML
		<div class="Header">
			<form method="post" style="display:flex;margin:0;">
				<a href="index.html"><img src="img/logo.png" class="IMAGE"></a>
				<a href="Orders.php"><img src="img/basket.png" style="height: 42%;"></a>
				<h1 style=" padding-top: 1%;    margin-left: 4%;">{$_SESSION['BasketCount']}</h1>
				<input type='submit' name ='reset' value='' style="    width: 5%;    height: 25%;    margin-top: 1.5%;background-size: cover;
																		background-repeat: round;
																		background-image: url(img/ResetProducts.png);">
				<h1 class="headerText" style="width: auto;margin-left: 25%;">{$Privilege}</h1>
				<input type="submit"  name="loguotBTN" value="Завершить сеанс" style=" color: black;
					font-size: 20px; border-color:#010508;" class="btn btn-outline-secondary">					
			</form>

			<div style="    margin: 2%;">
				<a href="customers.php"> <img src="img/customers.png"" class="ImgCustomers"></a>
				<a href="deals.php"><img src="img/deals.png" class="ImgDeals"></a>
			</div>
			<form action="search.php">
			<div class = "search">
				<input type="search" name="search" style="font-size: 22px;width: 90%;" pattern="[0-9A-Za-zА-Яа-яЁё\s]{3,}" required>
				<input type="submit"  name="go" value="Поиск" style="width: 10%;margin-left: 1%; color: black; 
				border-color:#010508;" class="btn btn-outline-secondary">
			</div>
			</form>
		</div>
HTML;
}
if($_SESSION["privilege"] == 0){
		echo <<<HTML
		<div class="Header" style="height:5em;">
			<form method="post" style="display:flex;margin:0;">
				<a href="index.html"><img src="img/logo.png" class="IMAGE"></a>
				<a hidden href="Orders.php"><img src="img/basket.png" style="height: 88%;margin-top: 6%;"></a>
				<h1 hidden style="    padding-top: 2%;">{$_SESSION['BasketCount']}</h1>
				<input hidden type='submit' name ='reset' value='' style="height: 40%; width: 5%;   margin-top: 3%;
				position: relative; left: 2%;background-size: cover;
											background-repeat: round;
											background-image: url(img/ResetProducts.png);">
				<h1 class="headerText">{$Privilege}</h1>
				<input type="submit"  name="loguotBTN" value="Завершить сеанс" style="width: 35%; color: black;
					font-size: 20px; border-color:#010508;" class="btn btn-outline-secondary">							
			</form>
			<form action="search.php">
			<div class = "search">
				<input type="search" name="search" style="font-size: 22px;width: 90%;" pattern="[0-9A-Za-zА-Яа-яЁё\s]{3,}" required>
				<input type="submit"  name="go" value="Поиск" style="width: 10%;margin-left: 1%; color: black; 
				border-color:#010508;" class="btn btn-outline-secondary">
			</div>
			</form>
		</div>
HTML;
}
?>