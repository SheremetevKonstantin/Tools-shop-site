<?php
session_start();


if($_SESSION["privilege"]==0){
			for ($i=0;$i<$_SESSION["PruductCount"];$i++){
				if($_SESSION["ProductStatusArray"][$i] == "1"){
echo 			<<<HTML
				<div class=Products>
					<form method="post">
					<a href="detailProduct.php?ParentProductName={$_SESSION["ProductNamesArray"][$i]}">				
					<div class=ProductsBlockWithIMG>
					<img src="{$_SESSION["ProductImagesArray"][$i]}" class=emg>
					</div>
					<div class=ProductsText>
					{$_SESSION["ProductNamesArray"][$i]}
					</div>
					<div class=ProductsCost>
					{$_SESSION["ProductCostsArray"][$i]} руб.
					</div>
					</a>
					</form>
				</div>
HTML;
				}
			}		
}
else{
	for ($i=0;$i<$_SESSION["PruductCount"];$i++){
				if($_SESSION["ProductStatusArray"][$i] == "1"){
echo 			<<<HTML
				<div class=Products>
					<form method="post">
					<a href="detailProduct.php?ParentProductName={$_SESSION["ProductNamesArray"][$i]}">				
					<div class=ProductsBlockWithIMG style="height:50%">
					<img src="{$_SESSION["ProductImagesArray"][$i]}" class=emg>
					</div>
					<div class=ProductsText style="height:10%;">
					{$_SESSION["ProductNamesArray"][$i]}
					</div>
					<div class=ProductsCost style="height:10%;">
					{$_SESSION["ProductCostsArray"][$i]} руб.
					</div>
					</a>
					<div class=ProductsButton style="height:30%">
					<input type="text" hidden name="text" value="{$_SESSION["ProductNamesArray"][$i]}">
					<input type="submit"  name="orderBTN" style="width:100%" value="Заказ" class="btn btn-outline-secondary">
					<input type="submit"  name="orderRedBTN" style="width:100%" value="Редактировать" class="btn btn-outline-secondary">
					<input type="submit"  name="orderDelBTN" style="width:100%" value="Удалить" class="btn btn-outline-secondary">
					</div>
					</form>
				</div>
HTML;
				}
			}	
}
?>