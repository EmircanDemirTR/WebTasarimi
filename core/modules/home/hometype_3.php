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
    <h3 class="h4">Logo Resim</h3>
</div>
<div class="card-body">


<div class="form-group row">
 
<div class="col-md-6">
  <label class="form-control-label">Logo</label>
  <div class="slim" data-fetcher="fetch.php" data-size="252,38">
      <input type="file"/>
  </div>
</div>

<div class="col-md-6">
  <label class="form-control-label">Logo Hover</label>
  <div class="slim" data-fetcher="fetch.php" data-size="252,38">
      <input type="file"/>
  </div>
</div>

 
</div>  

  
<div class="form-group row">
 
<div class="col-md-6">
 <label class="form-control-label">Logo Önizleme</label>
 <?PHP print $adminEngine->pageLogoControl("0", "fff");?>
</div> 
<div class="col-md-6">
 <label class="form-control-label" >Logo Hover Önizleme</label>
 <?PHP print $adminEngine->pageLogoControl("1", "333");?>
</div>
 
</div>


 <div class="form-group">
    <label class="form-control-label">Arkaplan Rengi</label>
      <select name="pn1" id="pn1" class="form-control">
      	<option value="">Seçiniz</option>
      	<option value="fiveBoxCol1" <?php if($editData["page_bg"] == "fiveBoxCol1"){ echo "selected"; } ?>>Yeşil</option>
      	<option value="fiveBoxCol2" <?php if($editData["page_bg"] == "fiveBoxCol2"){ echo "selected"; } ?>>Sarı</option>
      	<option value="fiveBoxCol3" <?php if($editData["page_bg"] == "fiveBoxCol3"){ echo "selected"; } ?>>Mor</option>
      	<option value="fiveBoxCol4" <?php if($editData["page_bg"] == "fiveBoxCol4"){ echo "selected"; } ?>>Mavi</option>
      	<option value="fiveBoxCol5" <?php if($editData["page_bg"] == "fiveBoxCol5"){ echo "selected"; } ?>>Turuncu</option>      
      </select>
 </div>


 <div class="form-group">
    <label class="form-control-label">Yönlendirme Url</label>
      <input name="pn2" type="text" id="pn2" class="form-control" placeholder="Yönlendirme Url" value="<?PHP print $editData["page_url"];?>">
 </div>






      
</div>
</div>



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