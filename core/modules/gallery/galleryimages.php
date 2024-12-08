<?PHP

if( !is_numeric( $getData->getID() ) ) {
	
	redirect("main.php?module=gallery/gallerylist");
	
	}

$editData = $getData->selectDB("md_gallery","gallery_id",$getData->siteConfig["getID"]); 

/**/

$query = "SELECT * FROM md_images WHERE (image_gallery = '" . $getData->siteConfig["getID"] . "') ORDER BY image_order ASC";
			  
$result = $getData->query($query);

$numrows = $getData->numrows($result);

?>






<?PHP if(isset($_GET["edit"])){?>

<?PHP $editImage = $getData->selectDB("md_images","image_id",$_GET["edit"]); ?>

<?php include "d2.php";?>

<?PHP } else { ?>

<?php include "d1.php";?>

<?php } ?>	   







<!-- --->



<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Galeri Resimleri&nbsp;&nbsp;&nbsp; </h3>
	 <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="click">Sıralamayı Kaydet</a> 	  
	  
	</div>
	<div class="card-body">
	  
	  <span id="data"></span>

	  <?PHP if( $numrows >= 1 ){ ?>
      
      <div id="gallery" class="form-group row">
        <div id="sort_0" style="display:none;"></div>
       
        <?PHP while($row = $getData->fetch_array($result)){ ?>
        
        <div id="sort_<?PHP print $row["image_id"];?>" class="col-sm-2">
          
            <img src="../core/uploads/gallery/<?PHP print $row["image_name"];?>" alt="" class="img-thumbnail" style="width: 100%; height: 120px;">
            
            <div class="line"></div>
            
            <a href="../core/uploads/gallery/<?PHP print $row["image_name"];?>" class="btn btn-info myfancyImg" title="<?PHP print $row["image_title1"];?>"><i class="icon-search"></i></a>
            <a href="main.php?module=gallery/galleryimages&id=<?PHP print $getData->siteConfig["getID"];?>&edit=<?PHP print $row["image_id"];?>" class="btn btn-warning" title="Düzenle"><i class="fa fa-pencil"></i></a>
            <a href="javascript:void(0);" class="removeData btn btn-danger" data-id="<?PHP print $row["image_id"];?>" data-rel="<?PHP print $row["image_name"];?>" title="Sil"><i class="icon-close"></i> </a>
			
            
            
        </div>
    
        <?PHP } ?>
      
      </div>
      
	  <?PHP } ?>
   

    
			  
		  	  
		  	  	  
		  	  	  	  	  
	 </div>
	</div>
</div>








<!-- -->

<div id="modal_dat_remove" class="modal fade">
<div class="modal-dialog" role="document"> 
<div class="modal-content">
  
  <div class="modal-header">
    <h5>Kayıt Silme Onayı</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
  </div>
  <div class="modal-body">
    <p>Bu veriyi silmek istediğinizden emin misiniz?</p>
  </div>
  <div class="modal-footer"> 
  <a href="#" id="deleteID" class="btn btn-success" data-delete="" data-loading-text="Siliniyor...">Evet</a> 
  <a href="#" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Hayır</a> 
  </div>


</div>
</div>
</div>






<?PHP

if($_FILES){
	
	$fileName = $getData->siteConfig["getID"] .  "_" . randomGenerator();
	
	
	if(!empty($_FILES["image"]["name"])){

	include_once('../core/class/upload.php');

	/**/
	
		$upload = new upload($_FILES['image']);
		if($upload->file_src_error == 0){
			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = $fileName;
				
								
				$upload->process("../core/uploads/gallery/");

				$data = array(	
								"image_name" => $fileName.".".$upload->file_src_name_ext, 
								"image_gallery" => $getData->siteConfig["getID"], 
								"image_title1" => $_POST["p1"],
								"image_title2" => $_POST["p1En"],
								"image_title3" => $_POST["p1Ar"],
								"image_desc1" => $_POST["p2"],
								"image_desc2" => $_POST["p2En"],
								"image_desc3" => $_POST["p2Ar"],
								"image_link1" => $_POST["p3"],
								"image_link2" => $_POST["p3En"],
								"image_link3" => $_POST["p3Ar"],
							 );

				
				$adminEngine->gallerythumb($_FILES['image'], $fileName);
				
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

if(isset($_GET["delete"])){

	$deleteFile = $_GET["file"];
	
	$path = "../core/uploads/gallery/";
	
	if( $getData->deleteDB("md_images", "image_id", $adminEngine->getDeleteID()) ){
		
		if(file_exists($path . $deleteFile)){
			
			unlink($path . $deleteFile);
			
			//unlink($path . "thumb/" . $deleteFile);
				
			redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"]);

		}
		
	} else { 
			
		redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"] ."&failed");
			
	}
	
}


if(isset($_POST["edit"])){

	  $data = array(	
					  "image_title1" => $_POST["p1"],
					  "image_title2" => $_POST["p1En"],
					  "image_title3" => $_POST["p1Ar"],
					  "image_desc1" => $_POST["p2"],
					  "image_desc2" => $_POST["p2En"],
					  "image_desc3" => $_POST["p2Ar"],
					  "image_link1" => $_POST["p3"],
					  "image_link2" => $_POST["p3En"],
					  "image_link3" => $_POST["p3Ar"],
				   );

	
	if ($adminEngine->updateDB("md_images", $data, "image_id", $_POST["p4"])){
		
		redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"] ."&success");
		
	}else{
		
		redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"] ."&failed");
		
	}
	
}


?>
