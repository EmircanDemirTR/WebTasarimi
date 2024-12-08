<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">İçerik Yazıları (Türkçe)</h3>
    </div>
    
    <div class="card-body">

<div class="form-group">
	<label class="form-control-label">Site Adı</label>
	<input name="sitename" type="text" id="sitename" class="form-control" placeholder="Site" value="<?PHP print $getData->siteConfig["sitename"];?>">
</div>

<div class="form-group">
	<label class="form-control-label">Footer Text </label>
	<textarea name="ftext" rows="5" class="form-control" id="ftext" ><?PHP print $getData->siteConfig["ftext"];?></textarea>
</div>

<div class="form-group">
	<label class="form-control-label">Footer Copyright </label>
	<textarea name="fcopyright" rows="5" class="form-control" id="fcopyright" ><?PHP print $getData->siteConfig["fcopyright"];?></textarea>
</div>

<div class="form-group">
	<label class="form-control-label">Bizi Takip Edin </label>
	<textarea name="sub" rows="5" class="form-control" id="sub" ><?PHP print $getData->siteConfig["sub"];?></textarea>
</div>


        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>