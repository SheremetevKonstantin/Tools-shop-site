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
?>
<!doctype.html>
<html>
<head>
<title>Хозяин</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color:#e3e8e8;">
	<div class="container">
			<?php require_once("assets/header.php") ?>
		<div class="Main">
			<div class="Nav">
				<div class="Official">
					<a href="index.html" style="padding-left: 1em;">Главная</a>
				</div>
			</div>
			<div class="Content">
				<?php require_once("assets/dealsDetailContent.php");
					  //require_once("assets/dealsDetail_info.php");?>				
			</div>
		</div>
	</div>
	</body>
	
</html>

