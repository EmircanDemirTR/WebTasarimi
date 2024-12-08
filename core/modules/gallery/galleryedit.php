<?PHP

if(!is_numeric($getData->getID())){
	
	redirect("main.php?module=gallery/gallerylist");
	
	}
	
$editData = $getData->selectDB("md_gallery","gallery_id",$getData->getID()); 

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

    <a href="main.php?module=gallery/gallerylist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-picture"></i> Galeri Listesi</a>
	  
	  
	</div>
	<div class="card-body">
	
	
<?PHP print $adminEngine->processMessage(); ?>

<form class="form-horizontal" action="main.php?module=gallery/galleryedit&id=<?PHP print $editData["gallery_id"];?>" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">

 <div class="form-group row">
    <label class="col-sm-2 form-control-label">Galeri Adı</label>
	<div class="col-sm-3">
      <input name="p1" type="text" id="p1" class="form-control" placeholder="Galeri Adı" value="<?=unhtmlDBString2($editData["gallery_title1"])?>">
    </div>
  </div>

  <div class="line"></div>

 <div class="form-group row">
    <label class="col-sm-2 form-control-label">Öncelik</label>
	<div class="col-sm-3">
      <input name="p2" type="number" id="p2" class="form-control" placeholder="Öncelik" value="<?=$editData["gallery_order"]?>">
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






<?PHP

if($_POST){
	
	$data = array( 	"gallery_title1" => $_POST["p1"],
					"gallery_order" => $_POST["p2"]);
	
	if ($adminEngine->updateDB("md_gallery", $data, "gallery_id", $editData["gallery_id"])){
		
		redirect("main.php?module=gallery/galleryedit&id=" . $getData->getID() . "&success");
		
	}else{
		
		redirect("main.php?module=gallery/galleryedit&id=" . $getData->getID() . "&failed");
		
	}
	
}

?>