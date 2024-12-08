<link rel="stylesheet" href="et-line.css">

<?php 
	
	$pr = 0;
	$iboxQuery = "SELECT * FROM md_product_extra WHERE (product_id = '".$getData->siteConfig["getID"]."') AND (extra_type = '1')";
	$iboxResult = $getData->query($iboxQuery);
	while($iboxRow = $getData->fetch_array($iboxResult)){
	$pr++;
?>

<div class="col-lg-4">
<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">İcon Box <?=$pr;?></h3>
</div>
<div class="card-body">


    <div class="form-group">
        <label class="form-control-label">İçerik Başlığı</label>
        <textarea name="title<?=$pr;?>" rows="3" class="form-control" id="title<?=$pr;?>" ><?PHP print unhtmlDBString($iboxRow["extra_title"]);?></textarea>
        
    </div>
    
    
    <div class="form-group">
        <label class="form-control-label">İçerik Detay</label>
        <textarea name="content<?=$pr;?>" rows="4" class="form-control" id="content<?=$pr;?>" ><?PHP print unhtmlDBString($iboxRow["extra_content"]);?></textarea>
    </div>
    

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
    
    <input id="radioCustom1" type="radio" <?php if($row["icon_title"]==$iboxRow["extra_icon"]){ echo "checked"; } ?> name="radio<?=$pr;?>" class="radio-template" value="<?=$row["icon_title"];?>">
    
    </div>
    <div class="clearfix"></div>
    </div>
        
    <?php } ?>
    
    
    <div class="clearfix"></div>
    </div>
    
    <div class="line"></div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </div>

      
</div>
</div>
</div>

<?php } ?>









