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

$label = 'ParentProductName';
$ParentProductName;
if (  !empty( $_GET[ $label ] )  )
{
  $ParentProductName = $_GET[ $label ];
}
$_SESSION["ParentProductName"] = $ParentProductName;
require_once("assets/detailProduct_info.php");



//$parts = explode(',',$str);

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
				<div class="group">
					<a href="subcat.php?cat=<?php echo $_SESSION["ParentCatetegoryName"];?>"> - <?php echo $_SESSION["ParentCatetegoryName"]; ?></a>
				</div>
				<div class="subgroup">
					<a href="product.php?subcat=<?php echo $_SESSION["ParentSubCatetegoryName"];?>"> - <?php echo $_SESSION["ParentSubCatetegoryName"]; ?></a>
				</div>
				<div style="margin-left: 34%">
				<?php require_once("assets/AddProdBNT.php") ?>			
				</div>
			</div>
			<div class="Content">
				<?php require_once("assets/detailProductContent.php") ?>
				
			</div>
		</div>
	</div>
	</body>
</html>

