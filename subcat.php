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



$label = 'cat';
$ParentCatetegoryName;
if (  !empty( $_GET[ $label ] )  )
{
  $ParentCatetegoryName = $_GET[ $label ];
}
$_SESSION["ParentCatetegoryName"] = $ParentCatetegoryName;

if(isset($_POST['subGroupDelBTN'])){
	$query = "Update category Set category_status = '0' Where category_category = '{$_POST['text']}';";
	$result = mysqli_query($conn, $query);
							echo <<<HTML
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<br>
		<div class="alert alert-success" role="alert">
			Запись помечена на удаление.
		</div>	
HTML;
	sleep(2);
	echo "<script>location.replace('subcat.php?cat={$ParentCatetegoryName}');</script>";
}
require_once("assets/Subgroup_info.php");
?>

<!doctype.html>
<html>
<head>
<title>Хозяин</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body style="background-color:#e3e8e8;">
	<div class="container">
			<?php require_once("assets/header.php") ?>
		<div class="Main">
			<div class="Nav">
				<div class="Official">
					<a href="index.html" style="padding-left: 1em;">Главная</a>
				</div>
				<div style="margin-left: 66%">
				<?php require_once("assets/AddProdBNT.php") ?>			
				</div>
			</div>
			<div class="Content">
				<?php require_once("assets/subgroup.php"); ?>
			</div>
		</div>
	</div>
	</body>
</html>

