<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">İçerik Yazıları (İspanyolca)</h3>
    </div>
    
    <div class="card-body">

<div class="form-group">
	<label class="form-control-label">Site Adı (İspanyolca)</label>
	<input name="sitenameAr" type="text" id="sitenameAr" class="form-control" placeholder="Site Ad (İspanyolca)" value="<?PHP print $getData->siteConfig["sitenameAr"];?>">
</div>
    

<div class="form-group">
	<label class="form-control-label">Footer Text (İspanyolca)</label>
	<textarea name="ftextAr" rows="5" class="form-control" id="ftextAr" ><?PHP print $getData->siteConfig["ftextAr"];?></textarea>
</div>

<div class="form-group">
	<label class="form-control-label">Footer Copyright (İspanyolca)</label>
	<textarea name="fcopyrightAr" rows="5" class="form-control" id="fcopyrightAr" ><?PHP print $getData->siteConfig["fcopyrightAr"];?></textarea>
</div>


<div class="form-group">
	<label class="form-control-label">Bizi Takip Edin  (İspanyolca)</label>
	<textarea name="subEs" rows="5" class="form-control" id="subEn" ><?PHP print $getData->siteConfig["subEs"];?></textarea>
</div>

        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>