<?PHP
if(!is_numeric($getData->siteConfig["getID"])){
	redirect("main.php?module=page/pagelist");
}

$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 
?>

<div class="col-lg-12">

<form class="form-horizontal" action="main.php?module=page/pageedit&id=<?PHP print $getData->siteConfig["getID"]; ?>"  method="post" style="display:inline;">
<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">İçerik Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Sayfa Bilgileri &nbsp; <span class="caret"></span> </a>

      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="main.php?module=page/pageedit&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">İçerik Bilgileri</a>
        <a href="main.php?module=page/pageimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Kapak Resmi</a>
        <a href="main.php?module=page/menuimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Menü Resmi</a>
        <a href="main.php?module=page/bgimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Arkaplan Resmi</a>
        <a href="main.php?module=page/pagedocument&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Dokümanı</a>
        <a href="main.php?module=page/productgallery&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Galerisi</a>
      </div>

    </div>

    <a href="main.php?module=page/pagelist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> İçerik Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>


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
        <label class="form-control-label">Sayfa URL</label>
        <input name="pUrl" type="text" id="pUrl" class="form-control" placeholder="İçerik Başlığı" value="<?PHP print unhtmlDBString2($editData["page_slug"]);?>">
     </div>
      
     


	 <div class="form-group">
        <label class="form-control-label">İçerik Özet</label>
        <textarea name="p2" rows="5" class="form-control" id="p2" ><?PHP print unhtmlDBString($editData["page_content1"]);?></textarea>
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
        <h3 class="h4">Sayfa Özellikleri</h3>
      </div>

<div class="card-body">
    <?php
	
	if($editData["page_date"]==""){
		$contentDate = date('Y-m-d');
	}else{
		$contentDate = $editData["page_date"];
	}
	
	
	?>
	 <div class="form-group">
        <label class="form-control-label">Tarih</label>
          <input name="p111" type="date" id="p111" class="form-control" placeholder="<?=$contentDate;?>" value="<?=$contentDate;?>">
      </div>
      
      


	

	 <div class="form-group">
        <label class="form-control-label">İçerik Grubu</label>
          <select name="p3" id="p3" class="form-control">
            <?PHP print $adminEngine->groupSelectBox($editData["page_group"],"page"); ?>
          </select>
      </div>
      
      

	 <div class="form-group">
        <label class="form-control-label">Ebeveyn Seçimi</label>
          <select name="p4" id="p4" class="form-control">
          </select>
      </div>
      
      

	 <div class="form-group">
        <label class="form-control-label">Sayfa Tasarımı</label>
          <select name="p5" id="p5" class="form-control">
            <?PHP print $adminEngine->templateSelectBoxMenu($editData["page_template"]); ?>
          </select>
      </div>
      
      

	 <div class="form-group">
        <label class="form-control-label">Link Grubu</label>
          <select name="p17" id="p17" class="form-control">
            <?PHP print $adminEngine->groupSelectBox($editData["page_group"],"page"); ?>
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
        <label class="form-control-label">Durumu</label>
          <select name="p6" id="p6" class="form-control">
            <?PHP print $adminEngine->statusSelectBoxMenu($editData["page_status"]); ?>
          </select>
      </div>
      
      

	 <div class="form-group">
        <label class="form-control-label">Öncelik</label>
          <input name="p7" type="number" id="p7" class="form-control" placeholder="Öncelik" value="<?PHP print $editData["page_order"];?>">
      </div>
      
      

	 <div class="form-group">
        <div class="col-sm-3">
		<div class="i-checks">
		  <input id="page_home" name="page_home" type="checkbox" value="1" class="checkbox-template" <?PHP if($editData["page_home"] == 1){ print " checked"; } ?>>
		  <label for="checkboxCustom1">Anasayfa</label>
		</div>
          </div>

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
      
      <div class="line"></div>

	 <div class="form-group">
        <label class="form-control-label">Açıklama</label>
          <input name="p10" type="text" id="p10" class="form-control" placeholder="Açıklama" value="<?PHP print $editData["page_descriptions"];?>">
      </div>


</div>
</div>

</div>




</div>
</form>
</div>




<?PHP



if($_POST){

	
	if($editData["page_title1"]!=$_POST["p1"]){
	
		$pageSlug = $adminEngine->pageSlug($_POST["p1"]);
	
	}else{
	
		$pageSlug = $editData["page_slug"];

	}

	

	$parent = explode(":*:", $_POST["p4"]);
	
	if($_POST["page_home"]==""){
		$page_home = "0";
	}else{
		$page_home = $_POST["page_home"];
	}
	
	
	$sectionData = $getData->selectDB("md_page_group","group_id",$_POST["p3"]);


	$data = array( 	"page_title1" => $_POST["p1"],

					"page_content1" => $_POST["p2"],

					"page_group" => $_POST["p3"],

					"page_slug" => $pageSlug,
	
					"page_type" => $sectionData["group_url_type"],					

					"linked_group" => $_POST["p17"],

					"page_parent" => $parent["0"],					

					"page_parent_root" => $parent["1"],					

					"page_template" => $_POST["p5"],					

					"page_status" => $_POST["p6"],					

					"page_order" => $_POST["p7"],					

					"page_gallery" => $_POST["p8"],					

					"page_keywords" => $_POST["p9"],					

					"page_descriptions" => $_POST["p10"],					

					"page_content_all1" => $_POST["content"],					

					"page_home" => $page_home,					

					"page_date" => $_POST["p111"]

					 );

					

	

	//print_r($data);

	

	if ($adminEngine->updateDB("md_page",$data, "page_id", $getData->siteConfig["getID"])){

		$groupID = array("page_group" => $data["page_group"]);

		$adminEngine->pageGroupUpdateDB($groupID,$editData["page_id"]);

		redirect("main.php?module=page/pageedit&id=". $getData->siteConfig["getID"] ."&success");

	}else{
		redirect("main.php?module=page/pageedit&id=". $getData->siteConfig["getID"] ."&failed");
	}

	

	

}



?>