<?PHP

if(!is_numeric($getData->siteConfig["getID"])){
	
	redirect("main.php?module=banner/bannerlist");
	
	}

$editData = $getData->selectDB("md_banner","banner_id",$getData->siteConfig["getID"]); 

?>

<?php 

$getID = $getData->siteConfig["getID"];
$getPath = "../uploads/page/images/";
?>


<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Banner Layer Resim&nbsp;&nbsp;&nbsp;</h3>
	  
    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Banner Bilgileri &nbsp; <span class="caret"></span> </a>

      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="main.php?module=banner/banneredit&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Banner Bilgileri</a>
        <a href="main.php?module=banner/bannerimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Banner Arkaplan Resmi</a>
        <a href="main.php?module=banner/layerimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Banner Layer Resmi</a>
      </div>

    </div>

    <a href="main.php?module=banner/bannerlist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Banner Listesi</a>
	  
	  
	</div>

	<div class="card-body">

<?PHP print $adminEngine->processMessage(); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#info" aria-controls="1" aria-expanded="true">Banner Layer Resim</a></li>
</ul>
	 
	 
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="info">
	
    <div class="clearfix" style="height: 40px;"></div>
	 
	
    
    <div class="tab-pane active" id="info">
	<div class="form-group row">
    
	<div class="col-sm-7">
    <form action="main.php?module=banner/layerimage&id=<?PHP print $getData->siteConfig["getID"]; ?>" method="post" enctype="multipart/form-data" class="avatar">

        <label class="col-sm-6 form-control-label">Konum (px)</label>
        <div class="col-sm-6">
       	 <input name="layer_k" type="text" id="layer_k" placeholder="Konum (px)" class="form-control" value="<?PHP print unhtmlDBString2($editData["layer_k"]);?>">
        </div>

	<div class="line"></div>
        <label class="col-sm-6 form-control-label">Resim Yükleme Aracı</label>
        <div class="col-sm-6">
       	 <input name="image" type="file" id="image" class="form-control">
        </div>

    <div class="line"></div>

	
	  <div class="col-sm-6" style="text-align:left;">
		  <button type="submit" class="btn btn-primary">Yükle</button>
		</div>
	

    </form>
    </div>
    
    
	<div class="col-sm-5">
    <?php if($editData["layer_r"]==""){}else{ ?>
		<?PHP print $adminEngine->bannerLBgImgControl($editData["layer_r"]);?>
    <?php } ?>    
    </div>
    
    </div>
    </div>
    
    
    
	 
	   
	 
	 
	  </div>
	</div>
		  
		  	  
		  	  	  
		  	  	  	  	  
	 </div>
	</div>
</div>




<?PHP

if($_FILES){





if($_FILES["image"]["name"]!=''){
	$fileName = $getData->siteConfig["getID"] .  "ly_" . randomGenerator();

	if(!empty($_FILES["image"]["name"])){
		
		
		$fileTy = explode(".",$_FILES["image"]["name"]);

		include_once('../core/class/upload.php');

		$upload = new upload($_FILES['image']);

		if($upload->file_src_error == 0){

			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = $fileName;
				$upload->file_new_name_ext = $fileTy[1];
				
				
				$upload->process("../core/uploads/page/images/");
					$data = array( 	"layer_r" => $fileName.".".$upload->file_src_name_ext,
									"layer_k" => $_POST["layer_k"],
								 );

					$adminEngine->updateDB("md_banner",$data, "banner_id", $getData->siteConfig["getID"]);


				if ($upload->processed){
					redirect("main.php?module=banner/layerimage&id=". $getData->siteConfig["getID"] ."&success");
					$upload->clean();
				}else{
					redirect("main.php?module=banner/layerimage&id=". $getData->siteConfig["getID"] ."&success");
				}

			}

		}else{
			redirect("main.php?module=banner/layerimage&id=". $getData->siteConfig["getID"] ."&errorFile");
		}

	}

}else{


	$data = array( "layer_k" => $_POST["layer_k"] );
	  

	
	if ($adminEngine->updateDB("md_banner",$data, "banner_id", $getData->siteConfig["getID"])){
		
		redirect("main.php?module=banner/layerimage&id=". $getData->siteConfig["getID"] ."&success");
		
	}else{
		
		redirect("main.php?module=banner/layerimage&id=". $getData->siteConfig["getID"] ."&failed");
		
	}








}




} else if(isset($_GET["delete"])){

  $data = array(  "layer_r" => "" );
  $adminEngine->updateDB("md_banner",$data, "banner_id", $getData->siteConfig["getID"]);
  redirect("main.php?module=banner/layerimage&id=". $getData->siteConfig["getID"] ."&success");
}

?>