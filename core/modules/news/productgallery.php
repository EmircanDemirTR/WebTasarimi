<?PHP

if(!is_numeric($getData->siteConfig["getID"])){
	
	redirect("main.php?module=page/pagelist");
	
	}

$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 

/**/

$query = "SELECT * FROM md_page_image WHERE (image_product = '" . $getData->siteConfig["getID"] . "') ORDER BY image_order ASC";
			  
$result = $getData->query($query);

$numrows = $getData->numrows($result);

?>

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Sayfa Galeri&nbsp;&nbsp;&nbsp;</h3>

    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Sayfa Bilgileri &nbsp; <span class="caret"></span> </a>

      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="main.php?module=page/pageedit&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">İçerik Bilgileri</a>
        <a href="main.php?module=page/pageimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Kapak Resmi</a>
        <a href="main.php?module=page/pagedocument&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Dokümanı</a>
        <a href="main.php?module=page/productgallery&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Galerisi</a>
        <a href="main.php?module=page/bgimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa BG</a>
      </div>

    </div>

    <a href="main.php?module=product/pagelist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> İçerik Listesi</a>
      
      
	</div>
	<div class="card-body">


<?PHP print $adminEngine->processMessage(); ?>





 

    <form action="main.php?module=page/productgallery&id=<?PHP print $getData->siteConfig["getID"]; ?>" method="post" enctype="multipart/form-data" class="avatar">
    
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Resim Yükleme Aracı</label>
        <div class="col-sm-3">
       	 <input name="image" type="file" id="image" class="form-control">
        </div>
    </div>
    
    <div class="line"></div>


	<div class="form-group row">
	  <div class="col-sm-4 offset-sm-2">
		  <button type="submit" class="btn btn-primary">Kaydet</button>
		</div>
	</div>

    </form>
 
 
 

	</div>
  </div>
</div>







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
          
            <img src="../core/uploads/page/gallery/<?PHP print $row["image_name"];?>" alt="" class="img-thumbnail" style="width: 100%; height: 140px;">
            
            <div class="line"></div>
            
            <a href="../core/uploads/page/gallery/<?PHP print $row["image_name"];?>" class="btn btn-info myfancyImg" title="<?PHP print $row["image_title1"];?>"><i class="icon-search"></i></a>
            <a href="main.php?module=product/productgallery&id=<?=$getData->siteConfig["getID"];?>&delete=<?PHP print $row["image_id"];?>&file=<?PHP print $row["image_name"];?>" data-id="<?PHP print $row["image_id"];?>" data-rel="<?PHP print $row["image_name"];?>" class="removeData btn btn-danger" title="Sil"><i class="icon-close"></i> </a>
			
            
            
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
				/*
				if($upload->image_dst_x > "1024"){
					$upload->image_resize   = true;
					$upload->image_x        = 1024;
					$upload->image_ratio_y  = true;	
				}
				*/
				
				$upload->process("../core/uploads/page/gallery/");
				
	$data = array("image_name" => $fileName.".".$upload->file_src_name_ext, "image_product" => $getData->siteConfig["getID"]);
				
				
				$adminEngine->pageProductthumb($_FILES['image'], $fileName);
				
				if ($upload->processed){
					
					if($getData->insertDB("md_page_image", $data)){
						
						redirect("main.php?module=page/productgallery&id=". $getData->siteConfig["getID"]);
						
						$upload->clean();
					
					}
					
				}else{
					
					redirect("main.php?module=page/productgallery&id=". $getData->siteConfig["getID"] ."&failed");
				
				}
			}
			
		}else{
			
			redirect("main.php?module=page/productgallery&id=". $getData->siteConfig["getID"] ."&errorFile");
		
		}
	
	/**/

	}
	
}

if(isset($_GET["delete"])){

	$deleteFile = $_GET["file"];
	$pageID = $_GET["id"];
	
	$path = "../core/uploads/page/gallery/";
	
	if( $getData->deleteDB("md_page_image", "image_id", $adminEngine->getDeleteID()) ){
		
		if(file_exists($path . $deleteFile)){
			
			if(unlink($path . $deleteFile) && unlink($path . "thumb/" . $deleteFile)){
				
				redirect("main.php?module=page/productgallery&id=". $pageID);
				
			}	
			
		}
		
	} else { 
			
		redirect("main.php?module=page/productgallery&id=". $pageID ."&failed");
			
	}
	
}

?>
