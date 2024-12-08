<link rel="stylesheet" href="et-line.css">
<div class="col-lg-7">
<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">İçerik Yazıları</h3>
</div>
<div class="card-body">

<?php
$editSloooo = $getData->selectPDB("md_product_extra","product_id",$getData->siteConfig["getID"],"extra_type","2"); 
?>


    <div class="form-group">
        <label class="form-control-label">İçerik Başlığı</label>
        <input name="pc1" type="text" id="pc1" placeholder="İçerik Başlığı" class="form-control" value="<?PHP print unhtmlDBString2($editSloooo["extra_title"]);?>">
    </div>

    
    
    <div class="form-group">
        <label class="form-control-label">İçerik Detay</label>
        <textarea name="pc3" class="form-control" id="pc3"><?PHP print unhtmlDBString($editSloooo["extra_content_all"]);?></textarea>
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
    <h3 class="h4">Detay Resim</h3>
</div>
<div class="card-body">


<div class="form-group row">
 
<div class="col-md-6">
  <label class="form-control-label">Resim Yükle</label>
  <div class="slim" data-fetcher="fetch.php" data-force-size="248,124">
      <input type="file"/>
  </div>
</div>

<div class="col-md-6">
 <label class="form-control-label">Resim Önizleme</label>
 <?PHP print $adminEngine->pageLogoControlN("1", "fff");?>
</div> 

 
</div>  

  









      
</div>
</div>



</div>