<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">İçerik Yazıları (İngilizce)</h3>
    </div>
    
    <div class="card-body">

<div class="form-group">
	<label class="form-control-label">Site Adı (İngilizce)</label>
	<input name="sitenameEn" type="text" id="sitenameEn" class="form-control" placeholder="Site Ad (İngilizce)" value="<?PHP print $getData->siteConfig["sitenameEn"];?>">
</div>
    

<div class="form-group">
	<label class="form-control-label">Footer Text (İngilizce)</label>
	<textarea name="ftextEn" rows="5" class="form-control" id="ftextEn" ><?PHP print $getData->siteConfig["ftextEn"];?></textarea>
</div>

<div class="form-group">
	<label class="form-control-label">Footer Copyright (İngilizce)</label>
	<textarea name="fcopyrightEn" rows="5" class="form-control" id="fcopyrightEn" ><?PHP print $getData->siteConfig["fcopyrightEn"];?></textarea>
</div>

<div class="form-group">
	<label class="form-control-label">Bizi Takip Edin (İngilizce) </label>
	<textarea name="subEn" rows="5" class="form-control" id="subEn" ><?PHP print $getData->siteConfig["subEn"];?></textarea>
</div>

        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>