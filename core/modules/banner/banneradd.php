<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Banner Ekle&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	<?PHP print $adminEngine->processMessage(); ?>

<form class="form-horizontal" action="main.php?module=banner/banneradd" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">



<div class="form-group row">
	<label class="col-sm-2 form-control-label">Banner Adı</label>
	<div class="col-sm-3">
	  <input name="p1" type="text" id="p1" class="form-control" placeholder="Banner Adı">
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
	
	$data = array( "banner_name" => $_POST["p1"] );
	
	if ($adminEngine->insertDB("md_banner", $data)){
		
		redirect("main.php?module=banner/bannerlist&success");
		
	}else{
		
		redirect("main.php?module=banner/bannerlist&failed");
		
	}
	
}

?>