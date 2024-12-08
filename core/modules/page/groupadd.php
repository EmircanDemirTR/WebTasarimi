<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">İçerik Listesi&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	<?PHP print $adminEngine->processMessage(); ?>

<form class="form-horizontal" action="main.php?module=page/groupadd" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">



<div class="form-group row">
	<label class="col-sm-2 form-control-label">Grup Adı</label>
	<div class="col-sm-3">
	  <input name="p1" type="text" id="p1" class="form-control" placeholder="Grup Adı">
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
	
	$data = array( "group_title1" => $_POST["p1"], "group_url_type" => "DP" );
	
	if ($adminEngine->insertDB("md_page_group", $data)){
		
		redirect("main.php?module=page/grouplist&success");
		
	}else{
		
		redirect("main.php?module=page/grouplist&failed");
		
	}
	
}

?>