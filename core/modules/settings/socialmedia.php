<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Sosyal Medya&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	
<?PHP print $adminEngine->processMessage(); ?>
<form class="form-horizontal" action="main.php?module=settings/socialmedia" enctype="application/x-www-form-urlencoded" method="post">

	

<div class="form-group row">
	<label class="col-sm-2 form-control-label">Facebook</label>
	<div class="col-sm-3">
	  <input name="p1" type="text" id="p1" class="form-control" placeholder="www.facebook.com" value="<?PHP print $getData->siteConfig["facebook"];?>">
	</div>
</div>
	
<div class="line"></div>

<div class="form-group row">
	<label class="col-sm-2 form-control-label">Twitter</label>
	<div class="col-sm-3">
	  <input name="p2" type="text" id="p2" class="form-control" placeholder="www.twitter.com" value="<?PHP print $getData->siteConfig["twitter"];?>">
	</div>
</div>
	
<div class="line"></div>

<div class="form-group row">
	<label class="col-sm-2 form-control-label">Google Plus</label>
	<div class="col-sm-3">
	  <input name="p3" type="text" id="p3" class="form-control" placeholder="plus.google.com" value="<?PHP print $getData->siteConfig["googleplus"];?>">
	</div>
</div>
	
<div class="line"></div>

<div class="form-group row">
	<label class="col-sm-2 form-control-label">Linked In</label>
	<div class="col-sm-3">
	  <input name="p4" type="text" id="p4" class="form-control" placeholder="www.linkedin.com" value="<?PHP print $getData->siteConfig["linkedin"];?>">
	</div>
</div>
	
<div class="line"></div>

<div class="form-group row">
	<label class="col-sm-2 form-control-label">Youtube</label>
	<div class="col-sm-3">
	  <input name="p5" type="text" id="p5" class="form-control" placeholder="www.youtube.com" value="<?PHP print $getData->siteConfig["youtube"];?>">
	</div>
</div>
	
<div class="line"></div>

<div class="form-group row">
	<label class="col-sm-2 form-control-label">Instagram</label>
	<div class="col-sm-3">
	  <input name="p6" type="text" id="p6" class="form-control" placeholder="www.instagram.com" value="<?PHP print $getData->siteConfig["instagram"];?>">
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
	
	$data = array(	"facebook" => $_POST["p1"],
					"twitter" => $_POST["p2"],
					"googleplus" => $_POST["p3"],
					"linkedin" => $_POST["p4"],
					"youtube" => $_POST["p5"],
				  	"instagram" => $_POST["p6"],
				 );
	
	foreach($data as $fieldName => $fieldData){
		
		if(!$adminEngine->updateFieldDB("md_system", "data", $fieldData, "name", $fieldName)){
			
			redirect("main.php?module=settings/socialmedia&success&failed&" . $fieldData);
					
		}
		
	}	
	
	redirect("main.php?module=settings/socialmedia&success");
	
}

?>