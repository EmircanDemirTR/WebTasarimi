<?PHP

if(!is_numeric($getData->siteConfig["getID"])){
	
	redirect("main.php?module=page/pagelist");
	
	}

$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 

?>

<?php 

$getID = $getData->siteConfig["getID"];
$getPath = "../uploads/page/images/";
?>


<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">İçerik Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Sayfa Bilgileri &nbsp; <span class="caret"></span> </a>

      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="main.php?module=page/pageedit&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">İçerik Bilgileri</a>
        <a href="main.php?module=page/pageimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Kapak Resmi</a>
        <a href="main.php?module=page/pagedocument&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Dokümanı</a>
        <a href="main.php?module=page/productgallery&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Galerisi</a>
        <a href="main.php?module=page/bgimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa BG</a>
      </div>

    </div>

    <a href="main.php?module=page/pagelist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> İçerik Listesi</a>
	  
	  
	</div>
	<div class="card-body">

<?PHP print $adminEngine->processMessage(); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#info" aria-controls="1" aria-expanded="true">Kapak Resmi</a></li>
</ul>
	 
	 
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="info">
	
    <div class="clearfix" style="height: 40px;"></div>
	 
	
    
    <div class="tab-pane active" id="info">
	<div class="form-group row">
    
	<div class="col-sm-7">
    <form action="main.php?module=page/pageimage&id=<?PHP print $getData->siteConfig["getID"]; ?>" method="post" enctype="multipart/form-data" class="avatar">
        <label class="col-sm-6 form-control-label">Resim Yükleme Aracı</label>
        <div class="col-sm-6">
            <?php if($editData["page_id"]=="371"){ ?>
            <div class="slim" data-fetcher="fetch.php"  data-force-size="1000,743">
                <input type="file"  required/>
            </div>
        
        	<?php }elseif($editData["page_group"]=="1"){ ?>
            <div class="slim" data-fetcher="fetch.php">
                <input type="file"  required/>
            </div>
            <?php }elseif($editData["page_parent"]=="952"){ ?>
            <div class="slim" data-fetcher="fetch.php"  data-force-size="800,400">
                <input type="file"  required/>
            </div>
            <?php }elseif($editData["page_group"]=="30"){ ?>
            <div class="slim" data-fetcher="fetch.php"  data-force-size="1050,668">
                <input type="file"  required/>
            </div>
            <?php }elseif($editData["page_group"]=="20"){ ?>
            <div class="slim" data-fetcher="fetch.php">
                <input type="file"  required/>
            </div>
            <?php }elseif($editData["page_group"]=="41" or $editData["page_group"]=="42"){ ?>
            <div class="slim" data-fetcher="fetch.php"  data-force-size="1000,600">
                <input type="file"  required/>
            </div>
            <?php }else{ ?>
            <div class="slim" data-fetcher="fetch.php"  data-size="800,500">
                <input type="file"  required/>
            </div>
            <?php } ?>
        </div>

    <div class="line"></div>

	<div class="form-group row">
	  <div class="col-sm-6" style="text-align:center;">
		  <button type="submit" class="btn btn-primary">Yükle</button>
		</div>
	</div>

    </form>
    </div>
    
    
	<div class="col-sm-5">
		<?PHP print $adminEngine->pageImgControl();?>
    </div>
    
    </div>
    </div>
    
    
    
	 
	   
	 
	 
	  </div>
	</div>
		  
		  	  
		  	  	  
		  	  	  	  	  
	 </div>
	</div>
</div>




<?PHP
if($_POST){
		include_once('../core/class/upload.php');
		
		$userID = $getData->siteConfig["getID"];
		$write_dir = "../core/uploads/page/images/";
		$thumbDir = $write_dir.'thumb';
		

		
		$postAry = $_POST["slim"]["0"];
		$pExp = explode('"output":{"name":"',$postAry);
		$pExp = explode(',"image":',$pExp["1"]);
		$pExp = explode('"}',$pExp["1"]);
		
		$dataR = $pExp["0"];
		$profileImg = $dataR;
		
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[ 1 ] ) );
			fclose( $ifp ); 
			return $output_file; 
		}	

		$image = base64_to_jpeg( $profileImg, $write_dir.'temp_'.$userID.'.jpg' );
		
		$temp_code = "temp_".$userID.".jpg";


		
		$upload = new upload($write_dir.$temp_code);
		if($upload->file_src_error == 0){
			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = $getData->siteConfig["getID"];
				
				
				
				$upload->image_convert = 'jpg'; 
				
				
				$upload->process($write_dir);
				//$upload->image_watermark = 'watermark.png';
				$adminEngine->helloThumb($write_dir.$temp_code, $getData->siteConfig["getID"], $thumbDir);
				if ($upload->processed){
					redirect("main.php?module=page/pageimage&id=". $getData->siteConfig["getID"] ."&success");
					$upload->clean();
				}else{
					redirect("main.php?module=page/pageimage&id=". $getData->siteConfig["getID"] ."&success");
				}
			}
		}else{
			redirect("main.php?module=page/pageimage&id=". $getData->siteConfig["getID"] ."&errorFile");
		}

} else if(isset($_GET["delete"])){
	
	$path = "../core/uploads/page/images/";
	
	$file = $getData->siteConfig["getID"] . ".jpg";
	
	
	if (file_exists($path . $file)) { 
	
		unlink($path . $file);
	
	}
	
	
	if (file_exists($path . "thumb/" . $file)) { 
	
		unlink($path . "thumb/" . $file);
	
	}
	
	redirect("main.php?module=page/pageimage&id=". $getData->siteConfig["getID"] ."&success");
	
}
?>
