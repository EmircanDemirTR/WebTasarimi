<div class="col-lg-7">
<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">İçerik Yazıları</h3>
</div>
<div class="card-body">


    <div class="form-group">
        <label class="form-control-label">İçerik Başlığı</label>
        <input name="p1" type="text" id="p1" placeholder="İçerik Başlığı" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title1"]);?>">
    </div>

    <div class="form-group">
        <label class="form-control-label">İçerik Özet</label>
        <textarea name="p2" class="form-control" id="p2"><?PHP print unhtmlDBString2($editData["page_content1"]);?></textarea>
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
    <h3 class="h4">İçerik Özellikleri</h3>
</div>
<div class="card-body">

 <div class="form-group">
    <label class="form-control-label">Sayfa Genişlik</label>
      <select name="pD" id="pD" class="form-control">
      	<option value="">Seçiniz</option>
      	<option value="1" <?php if($editData["page_ex5"] == "1"){ echo "selected"; } ?>>Full Genişlik</option>
      	<option value="0" <?php if($editData["page_ex5"] == "0"){ echo "selected"; } ?>>Standart Genişlik</option>
      </select>
 </div>

 <div class="form-group">
    <label class="form-control-label">Durumu</label>
      <select name="p6" id="p6" class="form-control">
        <?PHP print $adminEngine->statusSelectBoxMenu($editData["page_status"]); ?>
      </select>
 </div>
  
  

 <div class="form-group">
    <label class="form-control-label">Öncelik</label>
      <input name="p7" type="number" id="p7" class="form-control" placeholder="Öncelik" value="<?PHP print $editData["page_order"];?>">
 </div>



      
</div>
</div>
</div>