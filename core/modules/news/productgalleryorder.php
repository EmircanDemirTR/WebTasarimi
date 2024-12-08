<?PHP

if($_POST){

	$i = 0;
	
	foreach($_POST["sort"] as $key => $imageID ){
		
		$i++;
		
		$orderImg = array("image_order" => $i);
		
		$getData->updateDB("md_page_image",$orderImg,"image_id",$imageID);
	
	}
	
}

?>