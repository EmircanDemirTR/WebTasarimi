<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=settings/seo" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">
<?PHP print $adminEngine->processMessage(); ?>

<div class="row">

<div class="col-lg-4">
<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">SEO (Türkçe)</h3>
    </div>
    
    <div class="card-body">

        <div class="form-group">
            <label class="form-control-label">Site Başlık (Türkçe)</label>
            <input name="title" type="text" id="title" class="form-control" placeholder="Site Başlık (Türkçe)" value="<?PHP print $getData->siteConfig["title"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Anahtar Kelimeler (Türkçe)</label>
            <input name="keywords" type="text" id="keywords" class="form-control" placeholder="Anahtar Kelimeler (Türkçe)" value="<?PHP print $getData->siteConfig["keywords"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Açıklama (Türkçe)</label>
            <input name="descriptions" type="text" id="descriptions" class="form-control" placeholder="Açıklama (Türkçe)" value="<?PHP print $getData->siteConfig["descriptions"];?>">
        </div>
        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>
</div>

<!-- --->

<div class="col-lg-4">
<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">SEO (İngilizce)</h3>
    </div>
    
    <div class="card-body">

        <div class="form-group">
            <label class="form-control-label">Site Başlık (İngilizce)</label>
            <input name="titleEn" type="text" id="titleEn" class="form-control" placeholder="Site Başlık (Türkçe)" value="<?PHP print $getData->siteConfig["titleEn"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Anahtar Kelimeler (İngilizce)</label>
            <input name="keywordsEn" type="text" id="keywordsEn" class="form-control" placeholder="Anahtar Kelimeler (Türkçe)" value="<?PHP print $getData->siteConfig["keywordsEn"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Açıklama (İngilizce)</label>
            <input name="descriptionsEn" type="text" id="descriptionsEn" class="form-control" placeholder="Açıklama (Türkçe)" value="<?PHP print $getData->siteConfig["descriptionsEn"];?>">
        </div>
        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>
</div>

<!-- --->

<div class="col-lg-4">
<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">SEO (İspanyolca)</h3>
    </div>
    
    <div class="card-body">

        <div class="form-group">
            <label class="form-control-label">Site Başlık (İspanyolca)</label>
            <input name="titleAr" type="text" id="titleAr" class="form-control" placeholder="Site Başlık (İspanyolca)" value="<?PHP print $getData->siteConfig["titleAr"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Anahtar Kelimeler (İspanyolca)</label>
            <input name="keywordsAr" type="text" id="keywordsAr" class="form-control" placeholder="Anahtar Kelimeler (İspanyolca)" value="<?PHP print $getData->siteConfig["keywordsAr"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Açıklama (İspanyolca)</label>
            <input name="descriptionsAr" type="text" id="descriptionsAr" class="form-control" placeholder="Açıklama (İspanyolca)" value="<?PHP print $getData->siteConfig["descriptionsAr"];?>">
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
	
	$data = array(  
					"title" => $_POST["title"], 
					"titleEn" => $_POST["titleEn"], 
					"titleAr" => $_POST["titleAr"], 
					"keywords" => $_POST["keywords"], 
					"keywordsEn" => $_POST["keywordsEn"], 
					"keywordsAr" => $_POST["keywordsAr"], 
					"descriptions" => $_POST["descriptions"],
					"descriptionsEn" => $_POST["descriptionsEn"],
					"descriptionsAr" => $_POST["descriptionsAr"]
	);
	
	
	foreach($data as $fieldName => $fieldData){
		
		if(!$adminEngine->updateFieldDB("md_system", "data", $fieldData, "name", $fieldName)){
			
			redirect("main.php?module=settings/seo&failed&" . $fieldData);
			
		}
			
	}	
	
	redirect("main.php?module=settings/seo&success");
	
}

?>