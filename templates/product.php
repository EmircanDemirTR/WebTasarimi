<?php

if($getData->pageData["page_id"]=="1021"){
	include "productList.php";
}else{
	
	$cQuery = "SELECT * FROM md_page WHERE (page_id = '".$getData->pageData["page_id"]."') ORDER BY page_order ASC";
	$cResult = $getData->query($cQuery);
	$cRow = $getData->fetch_array($cResult);

	if($cRow["is_category"]=="1"){
	include "productList.php";
	}elseif($cRow["is_category"]=="0"){
	include "productDetail.php";
	}



}
?>