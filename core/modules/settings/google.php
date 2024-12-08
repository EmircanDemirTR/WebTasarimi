<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=settings/google" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">
<?PHP print $adminEngine->processMessage(); ?>

<div class="row">

<div class="col-lg-6">

<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">Google Servis Kodları</h3>
    </div>
    
    <div class="card-body">


<div class="form-group">
	<label class="form-control-label">Google Web Master Doğrulama</label>
	<textarea name="googleWebMaster" rows="5" class="form-control" id="googleWebMaster" ><?PHP print $getData->siteConfig["googleWebMaster"];?></textarea>
</div>

<div class="form-group">
	<label class="form-control-label">Google Analytics</label>
	<textarea name="googleAnalytics" rows="5" class="form-control" id="googleAnalytics" ><?PHP print $getData->siteConfig["googleAnalytics"];?></textarea>
</div>

<div class="form-group">
	<label class="form-control-label">Google Tag Manager</label>
	<textarea name="googleTagManager" rows="5" class="form-control" id="googleTagManager" ><?PHP print $getData->siteConfig["googleTagManager"];?></textarea>
</div>





        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>


</div>

<div class="col-lg-6">

<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">Ekstra Javascript Kod</h3>
    </div>
    
    <div class="card-body">



<div class="form-group">
	<label class="form-control-label">JavaScript Kod</label>
	<textarea name="extraJavaScript" rows="5" class="form-control" id="extraJavaScript" ><?PHP print $getData->siteConfig["extraJavaScript"];?></textarea>
</div>



        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>


</div>


</div>

</form>
</div>



<?PHP

if($_POST){
	
	$data = array(	"googleAnalytics" => $_POST["googleAnalytics"],
					"googleWebMaster" => $_POST["googleWebMaster"],
					"googleTagManager" => $_POST["googleTagManager"],
					"extraJavaScript" => $_POST["extraJavaScript"],
					
					 );
	
	
	foreach($data as $fieldName => $fieldData){
		
		if(!$adminEngine->updateFieldDB("md_system", "data", $fieldData, "name", $fieldName)){
			
			redirect("main.php?module=settings/google&failed&" . $fieldData);
			
		}
			
	}	
	
	redirect("main.php?module=settings/google&success");
	
}

?>