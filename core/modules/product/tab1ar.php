<div class="col-md-12">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Ürün Yazıları (İspanyolca)</h3>
      </div>
      
      
<div class="card-body">


    <div class="form-group">
      <label class="form-control-label">Ürün Başlığı (İspanyolca)</label>
      <input name="p1ar" type="text" id="p1ar" placeholder="Ürün Başlığı (İspanyolca)" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title3"]);?>">
    </div>

    <div class="form-group">
        <label class="form-control-label">İçerik Önyazı (İspanyolca)</label>
        <textarea name="p2ar" class="form-control" id="p2ar"><?PHP print unhtmlDBString($editData["page_content3"]);?></textarea>
    </div>

    
    <div class="form-group">
      <label class="form-control-label">Ürün Açıklama (İspanyolca)</label>
      <textarea name="p3ar" rows="4" class="form-control" id="p3ar"><?PHP print unhtmlDBString($editData["page_content_all3"]);?></textarea>
    </div>

    <div class="line"></div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Kaydet</button>
	</div>

      
</div>

</div>
</div>



