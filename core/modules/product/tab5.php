<link rel="stylesheet" href="et-line.css">
<div class="col-lg-7">
<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">İçerik Yazıları</h3>
</div>
<div class="card-body">

<?php
$editSlooo = $getData->selectPDB("md_product_extra","product_id",$getData->siteConfig["getID"],"extra_type","4"); 
?>


    <div class="form-group">
        <label class="form-control-label">İçerik Başlığı</label>
        <input name="pc1" type="text" id="pc1" placeholder="İçerik Başlığı" class="form-control" value="<?PHP print unhtmlDBString2($editSlooo["extra_title"]);?>">
    </div>

    <div class="form-group">
        <label class="form-control-label">İçerik Önyazı</label>
        <textarea name="pc2" class="form-control" id="pc2"><?PHP print unhtmlDBString($editSlooo["extra_content"]);?></textarea>
    </div>
    
    
    <div class="form-group">
        <label class="form-control-label">İçerik Detay</label>
        <textarea name="pc3" class="form-control" id="pc3"><?PHP print unhtmlDBString($editSlooo["extra_content_all"]);?></textarea>
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

 <div class="form-group">
  <a href="main.php?module=product/productgallery&id=<?PHP print $getData->siteConfig["getID"];?>" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Ürün Galeri</a>
</div>


 <div class="form-group">
    <label class="form-control-label">Doküman</label>
      <select name="pc4" id="pc4" class="form-control">
      	<option value="">Seçiniz</option>

<?php 
$docQuery1 = "SELECT * FROM md_doc WHERE (page_id = '" . $getData->siteConfig["getID"] . "')";
$docResult1 = $getData->query($docQuery1);
while($docRow1 = $getData->fetch_array($docResult1)){
?>
        
      	<option value="<?=$docRow1["doc_id"];?>" <?php if($docRow1["doc_id"] == $editSlooo["extra_doc"]){ echo "selected"; } ?>><?=$docRow1["doc_title"];?></option>
<?php } ?>        
      </select>
 </div>








      
</div>
</div>



</div>