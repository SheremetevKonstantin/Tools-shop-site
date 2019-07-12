<?php
$PatentCategoryId = $_SESSION["PatentCategoryId"];
$ParentCategoryNameArray = $_SESSION["ParentCategoryNameArray"];
$SubCatImage = $_SESSION["SubCatImage"];
$SubCatCount = $_SESSION["SubCatCount"];

if($_SESSION["privilege"]==0){
			for ($i=0;$i<$SubCatCount;$i++){
				if($_SESSION["SubCategoryStatusArray"][$i] == "1"){
echo 			<<<HTML
				<a href="product.php?subcat={$ParentCategoryNameArray[$i]}">
				<div class=cats>				
					<div class=blockWithIMG>
					<img src="{$SubCatImage[$i]}" class=emg>
					</div>
					<div class=text>
					{$ParentCategoryNameArray[$i]}
					</div>
				</div>
				</a>
HTML;
				}
			}	
}else{
				for ($i=0;$i<$SubCatCount;$i++){
				if($_SESSION["SubCategoryStatusArray"][$i] == "1"){
echo 			<<<HTML
				<a href="product.php?subcat={$ParentCategoryNameArray[$i]}">
				<div class=cats style="height:23rem;">	
					<form method="post">
					<div class=blockWithIMG style="height:80%;">
					<img src="{$SubCatImage[$i]}" class=emg>
					</div>
					<div class=text>
					{$ParentCategoryNameArray[$i]}
					</div>
					</a>
					<div class=ProductsButton style="height:20%">
					<input type="text" hidden name="text" value="{$ParentCategoryNameArray[$i]}">
					<input type="submit"  name="subGroupDelBTN" style="width:100%" value="Удалить" class="btn btn-outline-secondary">
					</div>
					</form>
				</div>

HTML;
				}
			}

	
}
?>