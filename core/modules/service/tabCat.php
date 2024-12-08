<div class="col-md-7">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Kategori Yazıları</h3>
      </div>
      
      
<div class="card-body">


    <div class="form-group">
      <label class="form-control-label">Kategori Başlığı</label>
      <input name="p1" type="text" id="p1" placeholder="Kategori Başlığı" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title1"]);?>">
    </div>

    <div class="form-group">
      <label class="form-control-label">Kategori Başlığı (İngilizce)</label>
      <input name="p1en" type="text" id="p1en" placeholder="Kategori Başlığı (İngilizce)" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title2"]);?>">
    </div>


    <div class="form-group">
      <label class="form-control-label">Kategori Başlığı (İspanyolca)</label>
      <input name="p1ar" type="text" id="p1ar" placeholder="Kategori Başlığı (İspanyolca)" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title3"]);?>">
    </div>


     <div class="form-group">
        <label class="form-control-label">Kategori</label>
          <select name="p4" id="p4" class="form-control">
          </select>
      </div>

    
    <div class="line"></div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Kaydet</button>
	</div>

      
</div>

</div>
</div>


<div class="col-lg-5">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Kategori Özellikleri</h3>
      </div>

    <div class="card-body">


    
         <div class="form-group">
            <label class="form-control-label">Durumu</label>
              <select name="p6" id="p6" class="form-control">
                <?PHP print $adminEngine->statusSelectBoxMenu($editData["page_status"]); ?>
              </select>
          </div>
          

	 <div class="form-group">
        <label class="form-control-label">Galeri</label>
          <select name="p8" id="p8" class="form-control">
          	<option value="0">/</option>
			<?PHP print $adminEngine->gallerySelectBoxMenu($editData["page_gallery"]); ?>
          </select>
      </div>

          
    
         <div class="form-group">
            <label class="form-control-label">Öncelik</label>
            <input name="p7" type="number" id="p7" class="form-control" placeholder="Öncelik" value="<?PHP print $editData["page_order"];?>">
         </div>
    
    </div>
</div>

 <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">SEO</h3>
      </div>

<div class="card-body">


	 <div class="form-group">
        <label class="form-control-label">Anahtar Kelimeler</label>
          <input name="p9" type="text" id="p9" class="form-control" placeholder="Anahtar Kelimeler" value="<?PHP print $editData["page_keywords"];?>">
      </div>
      

	 <div class="form-group">
        <label class="form-control-label">Açıklama</label>
          <textarea name="p10" id="p10" class="form-control"><?PHP print $editData["page_descriptions"];?></textarea>
      </div>


</div>
</div>

</div>
