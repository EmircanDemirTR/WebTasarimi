<?PHP

if(!is_numeric($getData->getID())){
	
	redirect("main.php?module=page/grouplist");
	
	}
	
$editData = $getData->selectDB("md_page_group","group_id",$getData->siteConfig["getID"]); 

?>
<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Grup Düzenle&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	<?PHP print $adminEngine->processMessage(); ?>
	
<form class="form-horizontal" action="main.php?module=page/groupedit&id=<?PHP print $editData["group_id"];?>" data-nextpage="" enctype="multipart/form-data" method="post">

	
		

				
<div class="line"></div>


 
<div class="form-group row">
<div class="col-sm-7">

<div class="form-group row">
	<label class="col-sm-3 form-control-label">Grup Adı</label>
	<div class="col-sm-6">
	  <input name="p1" type="text" id="p1" class="form-control" placeholder="Grup Adı" value="<?PHP print unhtmlDBString2($editData["group_title1"]);?>">
	</div>
</div>

<div class="line"></div>


<div class="form-group row">
	<label class="col-sm-3 form-control-label">Grup Sayfa Yapısı</label>
	<div class="col-sm-6">
	  <input name="p2" type="text" id="p2" class="form-control" placeholder="Grup Sayfa Yapısı" value="<?PHP print $editData["group_url_type"];?>">
	</div>
</div>

<div class="line"></div>


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
	<?PHP print $adminEngine->groupImgControl();?>
</div>

</div>

					
</form>
	
  
	</div>
  </div>
</div>

	
</form>
<?PHP
if($_POST){
	

	$data = array( "group_title1" => $_POST["p1"], "group_url_type" => $_POST["p2"] );
	

	
	if(!empty($_FILES["image"]["name"])){
		include_once('../core/class/upload.php');
		$upload = new upload($_FILES['image']);
		if($upload->file_src_error == 0){
			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = "gr_".$getData->siteConfig["getID"];
				
				
				if($upload->file_src_name_ext != 'jpg'){
					$upload->image_convert	= 'jpg'; 
				}
				
				$upload->process("../core/uploads/page/images/");
				//$upload->image_watermark = 'watermark.png';
				$adminEngine->pagethumb($_FILES['image'], "gr_".$getData->siteConfig["getID"]);
				
				$adminEngine->updateDB("md_page_group", $data, "group_id", $getData->siteConfig["getID"]);
				
				if ($upload->processed){
					redirect("main.php?module=page/groupedit&id=". $getData->siteConfig["getID"] ."&success");
					$upload->clean();
				}else{
					redirect("main.php?module=page/groupedit&id=". $getData->siteConfig["getID"] ."&success");
				}
			}
		}else{
			redirect("main.php?module=page/groupedit&id=". $getData->siteConfig["getID"] ."&errorFile");
		}
	}else{
		
	

	if ($adminEngine->updateDB("md_page_group", $data, "group_id", $getData->siteConfig["getID"])){

		redirect("main.php?module=page/groupedit&id=". $getData->siteConfig["getID"] ."&success");

	}else{
		redirect("main.php?module=page/groupedit&id=". $getData->siteConfig["getID"] ."&failed");
	}
	
	
	}
	
	
	
	
	
	
	
	
} else if(isset($_GET["delete"])){
	
	$path = "../core/uploads/page/images/";
	
	$file = "gr_".$getData->siteConfig["getID"] . ".jpg";
	
	
	if (file_exists($path . $file)) { 
	
		unlink($path . $file);
	
	}
	
	
	if (file_exists($path . "thumb/" . $file)) { 
	
		unlink($path . "thumb/" . $file);
	
	}
	
	redirect("main.php?module=page/groupedit&id=". $getData->siteConfig["getID"] ."&success");
	
}
?>


