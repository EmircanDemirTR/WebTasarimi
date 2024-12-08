<?PHP
if(!is_numeric($getData->siteConfig["getID"])){
	redirect("main.php?module=product/categoryList");
}

$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 

?>

<div class="col-lg-12">

<form class="form-horizontal" action="main.php?module=product/categoryEdit&id=<?PHP print $getData->siteConfig["getID"]; ?>"  method="post" style="display:inline;">
<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Kategori Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Sayfa Bilgileri &nbsp; <span class="caret"></span> </a>

      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="main.php?module=product/categoryEdit&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Kategori Bilgileri</a>
        <a href="main.php?module=product/categoryImage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Kategori Kapak Görseli</a>
      </div>

    </div>

    <a href="main.php?module=product/categoryList" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Kategori Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>


<div class="col-lg-12">
<div class="card">
<div class="card-body">

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#c1" aria-controls="1" aria-expanded="true">Kategori</a></li>
</ul>



<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="c1">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tabCat.php" ;?>
    </div>
</div>


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

	$parent = explode(":*:", $_POST["p4"]);
	$pageP = $parent["0"];
	$pagePR = $parent["1"];



	$data = array( 	"page_title1" => $_POST["p1"],
	
					"page_title2" => $_POST["p1en"],
					
					"page_title3" => $_POST["p1ar"],

					"page_content_all1" => $_POST["p3"],

					"page_ex1" => $_POST["p5"],

					"page_parent" => $pageP,	

					"page_gallery" => $_POST["p8"],														

					"page_parent_root" => $pagePR,					
										
					"page_slug" => $pageSlug,

					"page_slug2" => $pageSlug2,

					"page_slug3" => $pageSlug2,

					"page_status" => $_POST["p6"],					

					"page_order" => $_POST["p7"],					

					"page_keywords" => $_POST["p9"],					

					"page_descriptions" => $_POST["p10"],					

					 );

					

	

	//print_r($data);

	

	if ($adminEngine->updateDB("md_page",$data, "page_id", $getData->siteConfig["getID"])){
		


		redirect("main.php?module=product/categoryEdit&id=". $getData->siteConfig["getID"] ."&success");

	}else{
		redirect("main.php?module=product/categoryEdit&id=". $getData->siteConfig["getID"] ."&failed");
	}

	

	

}



?>