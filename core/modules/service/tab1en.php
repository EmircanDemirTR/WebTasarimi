<div class="col-md-12">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Ürün Yazıları (İngilizce)</h3>
      </div>
      
      
<div class="card-body">


    <div class="form-group">
      <label class="form-control-label">Ürün Başlığı (İngilizce)</label>
      <input name="p1en" id="p1en" type="text" placeholder="Ürün Başlığı (İngilizce)" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title2"]);?>">
    </div>

    <div class="form-group">
        <label class="form-control-label">İçerik Önyazı (İngilizce)</label>
        <textarea name="p2en" id="p2en" class="form-control"><?PHP print unhtmlDBString($editData["page_content2"]);?></textarea>
    </div>

    
    <div class="form-group">
      <label class="form-control-label">Ürün Açıklama (İngilizce)</label>
      <textarea name="p3en" id="p3en" rows="4" class="form-control"><?PHP print unhtmlDBString($editData["page_content_all2"]);?></textarea>
    </div>

    <div class="line"></div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Kaydet</button>
	</div>

      
</div>

</div>
</div>



