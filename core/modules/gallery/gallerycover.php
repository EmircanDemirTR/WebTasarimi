<?PHP

if(!is_numeric($getData->siteConfig["getID"])){
	
	redirect("main.php?module=page/pagelist");
	
	}

$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 

?>

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Galeri Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Galeri Bilgileri &nbsp; <span class="caret"></span> </a>

      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

        <a href="main.php?module=gallery/galleryedit&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">İçerik Bilgileri</a>
        <a href="main.php?module=gallery/gallerycover&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Kapak Resmi</a>
        <a href="main.php?module=gallery/galleryimages&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Galeri Resimleri</a>

      </div>

    </div>

    <a href="main.php?module=gallery/gallerylist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Galeri Listesi</a>
	  
	  
	</div>
	<div class="card-body">

<?PHP print $adminEngine->processMessage(); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#info" aria-controls="1" aria-expanded="true">Kapak Resmi</a></li>
</ul>
	 
	 
<form class="form-horizontal" method="post" enctype="multipart/form-data" action="main.php?module=gallery/gallerycover&id=<?PHP print $getData->siteConfig["getID"]; ?>"  >
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="info">
	
    <div class="clearfix" style="height: 40px;"></div>
	 
	
    
    <div class="tab-pane active" id="info">
	<div class="form-group row">
	<div class="col-sm-7">
    
	 <div class="form-group row">
        <label class="col-sm-3 form-control-label">Resim Yükleme Aracı</label>
        <div class="col-sm-6">
          <input name="image" type="file" id="image">
        </div>
      </div>
      
      <div class="line"></div>

	<div class="form-group row">
	  <div class="col-sm-4 offset-sm-3">
		  <button type="submit" class="btn btn-primary">Yükle</button>
		</div>
	</div>
      
    </div>
    
	<div class="col-sm-5">
		<?PHP print $adminEngine->galleryImgControl();?>
    </div>
    
    </div>
    </div>
    
    
    
	 
	   
	 
	 
	  </div>
	</div>
</form>	
		  
		  	  
		  	  	  
		  	  	  	  	  
	 </div>
	</div>
</div>








<?PHP
if($_FILES){
	if(!empty($_FILES["image"]["name"])){
		include_once('../core/class/upload.php');
		$upload = new upload($_FILES['image']);
		if($upload->file_src_error == 0){
			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = $getData->siteConfig["getID"];
				
				if($upload->image_dst_x > "1024"){
					$upload->image_resize   = true;
					$upload->image_x        = 1024;
					$upload->image_ratio_y  = true;	
				}
				
				if($upload->file_src_name_ext != 'jpg'){
					$upload->image_convert	= 'jpg'; 
				}
				
				$upload->process("../core/uploads/gallery/");
				//$upload->image_watermark = 'watermark.png';
				$adminEngine->gallerythumb($_FILES['image'], $getData->siteConfig["getID"]);
				if ($upload->processed){
					redirect("main.php?module=gallery/gallerycover&id=". $getData->siteConfig["getID"] ."&success");
					$upload->clean();
				}else{
					redirect("main.php?module=gallery/gallerycover&id=". $getData->siteConfig["getID"] ."&success");
				}
			}
		}else{
			redirect("main.php?module=gallery/gallerycover&id=". $getData->siteConfig["getID"] ."&errorFile");
		}
	}
} else if(isset($_GET["delete"])){
	
	$path = "../core/uploads/gallery/";
	
	$file = $getData->siteConfig["getID"] . ".jpg";
	
	if (file_exists($path . $file)) { 
	
		unlink($path . $file);
	
	}
	
	
	if (file_exists($path . "thumb/" . $file)) { 
	
		unlink($path . "thumb/" . $file);
	
	}
		
	redirect("main.php?module=gallery/gallerycover&id=". $getData->siteConfig["getID"] ."&success");
	
}
?>
