<link rel="stylesheet" href="et-line.css">
<div class="col-lg-7">
<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">İçerik Yazıları</h3>
</div>
<div class="card-body">


    <div class="form-group">
        <label class="form-control-label">Slogan</label>
        <input name="p1" type="text" id="p1" placeholder="Slogan" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title1"]);?>">
    </div>


    <div class="form-group">
        <label class="form-control-label">Rakam</label>
        <input name="p2" type="text" id="p2" placeholder="Rakam" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_content1"]);?>">
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