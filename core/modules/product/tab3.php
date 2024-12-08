<div class="col-md-12">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Ürün Slogan</h3>
      </div>
      
      
<div class="card-body">

<?php
$editSlo = $getData->selectPDB("md_product_extra","product_id",$getData->siteConfig["getID"],"extra_type","2"); 
?>


    <div class="form-group">
      <label class="form-control-label">Slogan Başlık</label>
      <input name="ps1" type="text" id="ps1" placeholder="Ürün Başlığı" class="form-control" value="<?PHP print unhtmlDBString2($editSlo["extra_title"]);?>">
    </div>
    
    
    <div class="form-group">
      <label class="form-control-label">Slogan Yazı</label>
      <textarea name="ps2" rows="4" class="form-control" id="ps2"><?PHP print unhtmlDBString($editSlo["extra_content"]);?></textarea>
    </div>

    <div class="line"></div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Kaydet</button>
	</div>

      
</div>

</div>
</div>
