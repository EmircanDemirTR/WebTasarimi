<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Yeni İçerik Ekle&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	<?PHP print $adminEngine->processMessage(); ?>
  
<form class="form-horizontal" action="main.php?module=home/homeadd" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">

<div class="form-group row">
	<label class="col-sm-2 form-control-label">İçerik Başlığı</label>
	<div class="col-sm-3">
	  <input name="p1" type="text" id="p1" class="form-control" placeholder="İçerik Başlığı">
	</div>
</div>

<div class="line"></div>

<div class="form-group row">
	<label class="col-sm-2 form-control-label">İçerik Tipi</label>
	<div class="col-sm-3">
          <select name="p17" id="p17" class="form-control">
            <?PHP print $adminEngine->typeSelectBox(); ?>
          </select>
	</div>
</div>

<div class="line"></div>

<div class="form-group row">
	<label class="col-sm-2 form-control-label">Ebeveyn Seçimi</label>
	<div class="col-sm-3">
	  <select name="p3" id="p3" class="form-control">
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



<?PHP

if($_POST){

	$sectionData = $getData->selectDB("md_page_group","group_id","2");
	
	$parent = explode(":*:",$_POST["p3"]);
	
	$data = array( 	"page_title1" => $_POST["p1"],
	
					"page_group" => "2",
	
					"page_slug" => $adminEngine->pageSlug($_POST["p1"]),
		
					"page_type" => $sectionData["group_url_type"],
		
					"pag_ctype" => $_POST["p17"],
					
					"page_parent" => $parent[0],
					
					"page_parent_root" => $parent[1] );
	
	
	if ($adminEngine->insertDB("md_page", $data)){
		redirect("main.php?module=home/homeadd&success");
	}else{
		redirect("main.php?module=home/homeadd&failed");
	}
	
}

?>
