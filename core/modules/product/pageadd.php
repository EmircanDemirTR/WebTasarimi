<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Yeni Ürün Ekle&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	<?PHP print $adminEngine->processMessage(); ?>
  
<form class="form-horizontal" action="main.php?module=product/pageadd" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">

<div class="form-group row">
	<label class="col-sm-2 form-control-label">Ürün Başlığı</label>
	<div class="col-sm-3">
	  <input name="p1" type="text" id="p1" class="form-control" placeholder="Ürün Başlığı">
	</div>
</div>

<div class="line"></div>


<div class="form-group row">
	<label class="col-sm-2 form-control-label">Ebeveyn Seçimi</label>
	<div class="col-sm-3">
	  <select name="p3[]" id="p3[]" class="form-control multiS"  multiple="multiple">
      	<?php print $adminEngine->categorySelect(0,"",3);?>
	  </select>
	</div>
</div>
				
<div class="line"></div>

<div class="form-group row">
  <div class="col-sm-4 offset-sm-2">
	  <button type="submit" class="btn btn-primary">Kaydet</button>
	</div>
</div>

			
				
</form>	
				
	</div>
  </div>
</div>


<div style="clear:both; height:600px;"></div>
<?PHP




if($_POST){



	$sectionData = $getData->selectDB("md_page_group","group_id","3");

	
	
	//$parent = explode(":*:",$_POST["p3"]);
	
	$data = array( 	"page_title1" => $_POST["p1"],
	
					"page_title2" => $_POST["p1"],
					
					"page_title3" => $_POST["p1"],
	
					"page_group" => "3",
	
					"page_slug" => $adminEngine->pageSlug($_POST["p1"]),
	
					"page_slug2" => $adminEngine->pageSlug($_POST["p1"]),
	
					"page_slug3" => $adminEngine->pageSlug($_POST["p1"]),
		
					"page_type" => $sectionData["group_url_type"],
					
					"page_parent" => "0",
					
					"page_parent_root" => "0" );
	
	
	//print_r($data);
	
	$copyPId = $adminData->insertDBID("md_page", $data);
	
	if ($copyPId!=false){

		
		if(isset($_POST['p3'])){
			foreach ($_POST['p3'] as $key => $name) {
				$dataCat = array("product_id" => $copyPId, "category_id" => $name);
				$adminEngine->insertDB("md_product_relationships", $dataCat);
			}
		}else{
			$dataCat = array("product_id" => $copyPId, "category_id" => "0");
			$adminEngine->insertDB("md_product_relationships", $dataCat);
		}

		
		redirect("main.php?module=product/pageadd&success");
		
	}

}
?>
