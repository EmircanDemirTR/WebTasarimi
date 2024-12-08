<link rel="stylesheet" href="et-line.css">
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
        <label class="form-control-label">İçerik Detay</label>
        <textarea name="content" class="form-control" id="content"><?PHP print unhtmlDBString($editData["page_content_all1"]);?></textarea>
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
    <label class="form-control-label">İcon Seçin</label>

<div class="clearfix"></div>

<?php
	$query = "SELECT * FROM md_icon_list";
	$result = $getData->query($query);
	while($row = $getData->fetch_array($result)){
?>
<div style="width:57px; height:30px; float:left;">
<div style="width:35px; display:inline-block; float:left; text-align:center;"><i class="icona-<?=$row["icon_title"];?>" style="font-size:20px;"></i></div>
<div style="width:17px; display:inline-block; float:left; text-align:center; margin-top:-3px;">

<input id="radioCustom1" type="radio" <?php if($row["icon_title"]==$editData["page_icon"]){ echo "checked"; } ?> name="p55" class="radio-template" value="<?=$row["icon_title"];?>">

</div>
<div class="clearfix"></div>
</div>
    
<?php } ?>


<div class="clearfix"></div>
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