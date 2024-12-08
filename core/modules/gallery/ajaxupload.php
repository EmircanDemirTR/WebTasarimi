<?php 

if($_FILES){
	
	
	$fileNameCount = count($_FILES['image']['name']);
	
	for($i=0;$i<$fileNameCount;$i++){
	
	$fileName = $getData->siteConfig["getID"] .  "_" . randomGenerator();
	
	if(!empty($_FILES["image"]["name"][$i])){

	include_once('../core/class/upload.php');

	/**/
	
		$upload = new upload($_FILES['image'][$i]);
		if($upload->file_src_error == 0){
			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = $fileName;
				
								
				$upload->process("../core/uploads/gallery/");

				$data = array(	
								"image_name" => $fileName.".".$upload->file_src_name_ext, 
								"image_gallery" => $getData->siteConfig["getID"], 
								"image_title1" => $_POST["p1"],
								"image_desc" => $_POST["p2"],
								"image_link" => $_POST["p3"]
							 );

				
				//$adminEngine->gallerythumb($_FILES['image'], $fileName);
				
				if ($upload->processed){
					
					if($getData->insertDB("md_images", $data)){
						
						redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"]);
						
						$upload->clean();
					
					}
					
				}else{
					
					redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"] ."&failed");
				
				}
			}
			
		}else{
			
			redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"] ."&errorFile");
		
		}
	
	/**/

	}
	
	}
}
?>