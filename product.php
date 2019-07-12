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

$label = 'subcat';
$ParentSubCatetegoryName;
if (  !empty( $_GET[ $label ] )  )
{
  $ParentSubCatetegoryName = $_GET[ $label ];
}
$_SESSION["ParentSubCatetegoryName"] = $ParentSubCatetegoryName;

require_once("assets/Product_info.php");

if(isset($_POST['orderBTN'])){
	$ProductOrderArray = explode(';',$_SESSION['BascketNameString']);
	unset($ProductOrderArray[0]);
	for($i = 1; $i<=count($ProductOrderArray);$i++){
		if($ProductOrderArray[$i] == $_POST['text']){
		  echo "<script>alert(\"Такой товар уже в корзине!\");</script>";
		  $FREEORDER = 1;
			break;
		}
	}
	if($FREEORDER == NULL){
	$_SESSION['BasketCount']++;
	$_SESSION['BascketNameString'] = $_SESSION['BascketNameString'] . ';' . $_POST['text'];
	}
}
if(isset($_POST['orderDelBTN'])){
	$query = "Update product Set product_status = '0' Where product_name = '{$_POST['text']}';";
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
	echo "<script>location.replace('product.php?subcat={$_SESSION["ParentSubCatetegoryName"]}');</script>";
}
if(isset($_POST['orderRedBTN'])){
	$temp = str_replace('_',' ',$_POST['text']);
	echo "<script>location.replace('redProduct.php?name={$temp}');</script>";
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
				<div class="group">
					<a href="subcat.php?cat=<?php echo $_SESSION["ParentCatetegoryName"];?>"> - <?php echo $_SESSION["ParentCatetegoryName"]; ?></a>
				</div>
				<div style="margin-left: 46%">
				<?php require_once("assets/AddProdBNT.php") ?>			
				</div>
			</div>
			<div class="Content">
				<?php require_once("assets/productContent.php") ?>
			</div>
		</div>
	</div>
	</body>
	
</html>

