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
        <a href="main.php?module=page/pagedocument&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Dokümanı</a>
        <a href="main.php?module=page/productgallery&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa Galerisi</a>
        <a href="main.php?module=page/bgimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Sayfa BG</a>
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

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#tr" aria-controls="1" aria-expanded="true">Türkçe İçerikler</a></li>
    <li class="nav-item"><a class="nav-link" id="home-features" data-toggle="tab" href="#en" aria-controls="1" aria-expanded="true">İngilizce</a></li>
    <li class="nav-item"><a class="nav-link" id="home-seo" data-toggle="tab" href="#ar" aria-controls="1" aria-expanded="true">İspanyolca</a></li>
</ul>


<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="tr">
<?php include "t1.php";?>
</div>
<div class="tab-pane fade" id="en">
<?php include "t2.php";?>
</div>
<div class="tab-pane fade" id="ar">
<?php include "t3.php";?>
</div>



</div>



</div>


<div class="col-lg-5">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">&nbsp;</h3>
      </div>

<div class="card-body">
	
    <?php if($editData["page_group"]!="21"){ ?>
    
    <?php
		if($editData["page_date"]==""){ $contentDate = date('Y-m-d'); }else{ $contentDate = $editData["page_date"];	}
	?>
	 <div class="form-group">
        <label class="form-control-label">Tarih</label>
          <input name="p111" type="date" id="p111" class="form-control" placeholder="<?=$contentDate;?>" value="<?=$contentDate;?>">
      </div>
	
    <?php } ?>


     <div class="form-group">
        <label class="form-control-label">Ebeveyn Seçimi</label>
          <select name="p4" id="p4" class="form-control">
          </select>
      </div>
      
      
      
      <?php if(loginUserID() == "1"){  ?>
     
	 <div class="form-group">
        <label class="form-control-label">İçerik Grubu</label>
          <select name="p3" id="p3" class="form-control">
            <?PHP print $adminEngine->groupSelectBox($editData["page_group"],"page"); ?>
          </select>
      </div>
      

	 <div class="form-group">
        <label class="form-control-label">Sayfa Tasarımı</label>
          <select name="p5" id="p5" class="form-control">
            <?PHP print $adminEngine->templateSelectBoxMenu($editData["page_template"]); ?>
          </select>
      </div>
      
      <?php } ?>


	 <div class="form-group">
        <label class="form-control-label">Galeri</label>
          <select name="p8" id="p8" class="form-control">
          	<option value="0">/</option>
			<?PHP print $adminEngine->gallerySelectBoxMenu($editData["page_gallery"]); ?>
          </select>
      </div>
      
	  
	 <div class="form-group">
        <label class="form-control-label">Yönlendirme Url</label>
        <input name="purl" type="text" id="purl" placeholder="Yönlendirme Url" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_url"]);?>">
      </div>
      

	 <div class="form-group">
        <label class="form-control-label">Ana Sayfa</label>
          <select name="phome" id="phome" class="form-control">
            <?PHP print $adminEngine->homeSelectBoxMenu($editData["page_home"]); ?>
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




</div>
</form>
</div>




<?PHP



if($_POST){

	
	if($editData["page_title1"]!=$_POST["p1"]){
		$pageSlug = $adminEngine->pageSlug($_POST["p1"],"1");
	}else{
		$pageSlug = $editData["page_slug"];
	}

	if($editData["page_title2"]!=$_POST["p1en"]){
		$pageSlug2 = $adminEngine->pageSlug($_POST["p1en"],"2");
	}else{
		$pageSlug2 = $editData["page_slug2"];
	}

	if($editData["page_title3"]!=$_POST["p1ar"]){
		$pageSlug3 = $adminEngine->pageSlug($_POST["p1ar"],"3");
	}else{
		$pageSlug3 = $editData["page_slug3"];
	}


	
	if(loginUserID() == "1"){$p5 = $_POST["p5"];}else{ $p5 = $editData["page_template"];}
	if(loginUserID() == "1"){$p3 = $_POST["p3"];}else{ $p3 = $editData["page_group"];}
	
	$parent = explode(":*:", $_POST["p4"]);
	$pageP = $parent["0"];
	$pagePR = $parent["1"];



	$data = array( 	"page_title1" => $_POST["p1"],
					
					"page_title2" => $_POST["p1en"],
					
					"page_title3" => $_POST["p1ar"],

					"page_content1" => $_POST["p2"],

					"page_content2" => $_POST["p2en"],

					"page_content3" => $_POST["p2ar"],

					"page_group" => $p3,

					"page_slug" => $pageSlug,

					"page_slug2" => $pageSlug2,

					"page_slug3" => $pageSlug2,

					"page_parent" => $pageP,					

					"page_parent_root" => $pagePR,					

					"page_template" => $p5,					

					"page_status" => $_POST["p6"],					

					"page_order" => $_POST["p7"],					

					"page_keywords" => $_POST["p9"],					

					"page_descriptions" => $_POST["p10"],					

					"page_content_all1" => $_POST["content"],					

					"page_content_all2" => $_POST["contenten"],					

					"page_content_all3" => $_POST["contentar"],		

					"page_gallery" => $_POST["p8"],													

					"page_date" => $_POST["p111"],

					"page_url" => $_POST["purl"],

					"page_home" => $_POST["phome"],					

					"page_url" => $_POST["purl"],

					"page_ex1" => $_POST["pex1"],

					"page_ex2" => $_POST["pex2"],

					"page_ex5" => $_POST["pex5"],

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