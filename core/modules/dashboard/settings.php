<?PHP


$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 

?>


<div class="col-lg-12">

<form class="form-horizontal" action="main.php?module=dashboard/settings" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">
<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Google Analytics Ayarları&nbsp;&nbsp;&nbsp;</h3>
	  

    <a href="main.php?module=dashboard/dashboard" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Analytics Verileriniz</a>
	  
	</div>


    <div class="card-body">
    <?PHP print $adminEngine->processMessage(); ?>
    </div>


</div>
</div>


<div class="col-lg-7">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Google Analytics Ayarları</h3>
      </div>
<div class="card-body">




      <div class="form-group">
        <label class="form-control-label" style=" color:#E31B1E">Google Analytics Verilerini Sorunsuz Erişebilmeniz İçin Analytics Hesabınıza Bu Kullanıcıyı Eklemeniz Gerekmektedir</label>
        <input name="1" type="text" readonly id="1" placeholder="Image Title" class="form-control" value="sayac-veriler@analytics-data-1215.iam.gserviceaccount.com">
      </div>

      <div class="form-group">
        <label class="form-control-label">Google Analytis Profil ID Numaranız</label>
        <input name="googleAnalyticsDash" type="text" id="googleAnalyticsDash" placeholder="Google Analytis Profil ID Numaranız" class="form-control" value="<?PHP print $getData->siteConfig["googleAnalyticsDash"];?>">
      </div>

      <div class="form-group">
      <label class="form-control-label">Profil ID Numaranızı Nasıl Öğreneceğinizi Aşaığıdaki Ekran Görüntüsünden Görebilirsiniz</label>
      <br>
      <img src="analyticid.jpg">
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
	
	$data = array(	"googleAnalyticsDash" => $_POST["googleAnalyticsDash"] );
	
	
	
	foreach($data as $fieldName => $fieldData){
		
		if(!$adminEngine->updateFieldDB("md_system", "data", $fieldData, "name", $fieldName)){
			
			redirect("main.php?module=dashboard/settings&failed&" . $fieldData);
			
		}
			
	}	
	
	redirect("main.php?module=dashboard/settings&success");
	
}

?>