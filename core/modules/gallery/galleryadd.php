<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Yeni Galeri Ekle&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">

<form class="form-horizontal" action="main.php?module=gallery/galleryadd" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">
 
	 <div class="form-group row">
	  <label class="col-sm-3 form-control-label">Galeri Adı</label>
	  <div class="col-sm-9">
		<input name="p1" type="text" id="p1" class="form-control" placeholder="Galeri Adı">
	  </div>
	</div>


<div class="line"></div>

<div class="form-group row">
	<label class="col-sm-3 form-control-label">Galeri Türü</label>
	<div class="col-sm-9">
	  <select name="p2" id="p2" class="form-control">
	    <option value="0">Foto Galeri</option>
	    <option value="1">Video Galeri</option>
		
	  </select>
	</div>
</div>

	
	<div class="line"></div>
	<div class="form-group row">
	  <div class="col-sm-4 offset-sm-3">
		<button type="submit" class="btn btn-primary">Kaydet</button>
	  </div>
	</div>
 

</form>	 	 
	   
	</div>
  </div>
</div>





<?PHP

if($_POST){
	
	$data = array( "gallery_title1" => $_POST["p1"],"gallery_type" => $_POST["p2"] );
	
	if ($adminEngine->insertDB("md_gallery", $data)){
		
		redirect("main.php?module=gallery/gallerylist&success");
		
	}else{
		
		redirect("main.php?module=gallery/gallerylist&failed");
		
	}
	
}

?>