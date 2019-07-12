<?php

$array1 = $_SESSION["CategoryName"];
$array2 = $_SESSION["CategoryImage"];
$CatCount = $_SESSION["CatCount"];
$IsNotSubArray = $_SESSION["IsNotSubArray"];
$CategoryStatus = $_SESSION["CategoryStatus"];
if($_SESSION["privilege"]==0){
				for ($i=0;$i<$CatCount;$i++){
				if($IsNotSubArray[$i] == "null" and $CategoryStatus[$i] == "1"){
echo 			<<<HTML
				<a href="subcat.php?cat={$array1[$i]}">
				<div class=cats>				
					<div class=blockWithIMG>
					<img src="{$array2[$i]}" class=emg>
					</div>
					<div class=text>
					{$array1[$i]}
					</div>
				</div>
				</a>
HTML;
				}
			}
}else{
				for ($i=0;$i<$CatCount;$i++){
				if($IsNotSubArray[$i] == "null" and $CategoryStatus[$i] == "1"){
echo 			<<<HTML
				<a href="subcat.php?cat={$array1[$i]}">
				<div class=cats style="height:23rem;">
					<form method='post'>
					<div class=blockWithIMG style="height: 70%;">
					<img src="{$array2[$i]}" class=emg>
					</div>
					<div class=text style="height:19%;">
					{$array1[$i]}
					</div>
					</a>
					<div class=ProductsButton style="height:20%">
					<input type="text" hidden name="text" value="{$array1[$i]}">
					<input type="submit"  name="groupDelBTN" style="width:100%" value="Удалить" class="btn btn-outline-secondary">
					</div>
					</form>
				</div>
HTML;
				}
			}	
}

?>