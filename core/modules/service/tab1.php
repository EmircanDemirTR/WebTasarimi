<div class="col-md-12">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Ürün Yazıları (Türkçe)</h3>
      </div>
      
      
<div class="card-body">


    <div class="form-group">
      <label class="form-control-label">Ürün Başlığı (Türkçe)</label>
      <input name="p1" type="text" id="p1" placeholder="Ürün Başlığı (Türkçe)" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title1"]);?>">
    </div>


    <div class="form-group">
        <label class="form-control-label">İçerik Önyazı (Türkçe)</label>
        <textarea name="p2" class="form-control" id="p2"><?PHP print unhtmlDBString($editData["page_content1"]);?></textarea>
    </div>

    
    <div class="form-group">
      <label class="form-control-label">Ürün Açıklama (Türkçe)</label>
      <textarea name="p3" rows="4" class="form-control" id="p3"><?PHP print unhtmlDBString($editData["page_content_all1"]);?></textarea>
    </div>

    <div class="line"></div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Kaydet</button>
	</div>

      
</div>

</div>
</div>



