<?php
session_start();
	
	if($_SESSION["privilege"] != 0){
	echo <<<HTML
	<a href="addProduct.php">
		<i>Добавить товар</i>
		<img src="img/add.png" style="width: 8%;">
	 </a>	
HTML;
	}	
?>