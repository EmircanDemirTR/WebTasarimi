<?PHP
if(!is_numeric($getData->siteConfig["getID"])){
	redirect("main.php?module=product/pagelist");
}

$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 

/*
$coQuery = "SELECT * FROM md_product_extra WHERE (product_id = '".$getData->siteConfig["getID"]."')";
$coResult = $getData->query($coQuery);
$coCount = $getData->numrows($coResult);

if($coCount=="0"){


$data2 = array("product_id" => $getData->siteConfig["getID"], "extra_type" => "1", "extra_status" => "1");
$adminEngine->insertDB("md_product_extra", $data2);

$data3 = array("product_id" => $getData->siteConfig["getID"], "extra_type" => "2", "extra_status" => "1");
$adminEngine->insertDB("md_product_extra", $data3);



}*/
?>

<div class="col-lg-12">

<form class="form-horizontal" action="main.php?module=product/pageedit&id=<?PHP print $getData->siteConfig["getID"]; ?>"  method="post" style="display:inline;">
<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Ürün Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Sayfa Bilgileri &nbsp; <span class="caret"></span> </a>

      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="main.php?module=product/pageedit&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">İçerik Bilgileri</a>
        <a href="main.php?module=product/pageimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Ürün Kapak Görseli</a>
        <a href="main.php?module=product/productgallery&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Ürün Galerisi</a>
        <a href="main.php?module=product/pagedocument&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Ürün Dokümanı</a>
      </div>

    </div>

    <a href="main.php?module=product/pagelist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Ürün Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>


<div class="col-lg-7">
<div class="card">
<div class="card-body">

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#tr" aria-controls="1" aria-expanded="true">Türkçe İçerikler</a></li>
    <li class="nav-item"><a class="nav-link" id="home-info" data-toggle="tab" href="#en" aria-controls="1" aria-expanded="true">İngilizce</a></li>
    <li class="nav-item"><a class="nav-link" id="home-info" data-toggle="tab" href="#ar" aria-controls="1" aria-expanded="true">İspanyolca</a></li>
</ul>


<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="tr">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tab1.php" ;?>
    </div>
</div>

<div class="tab-pane fade" id="en">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tab1en.php" ;?>
    </div>
</div>

<div class="tab-pane fade" id="ar">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tab1ar.php" ;?>
    </div>
</div>




</div>


</div>
</div>
</div>




<div class="col-lg-5">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Ürün Özellikleri</h3>
      </div>

    <div class="card-body">

     <div class="form-group">
        <label class="form-control-label">Kategori</label>
        <div style="clear:both;"></div>
          <select name="p4[]" id="p4[]" class="form-control multiS"  multiple="multiple">
            <?php print $adminEngine->categoryESelect(0,"",3,$editData["page_id"]);?>
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
		  <input id="page_firsat" name="page_firsat" type="checkbox" value="1" class="checkbox-template" <?PHP if($editData["page_firsat"] == 1){ print " checked"; } ?>>
		  <label for="checkboxCustom1">Fırsat Ürünü</label>
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


	include_once('../core/class/upload.php');
	
	function base64_to_jpeg($base64_string, $output_file) {
		$ifp = fopen( $output_file, 'wb' ); 
		$data = explode( ',', $base64_string );
		fwrite( $ifp, base64_decode( $data[ 1 ] ) );
		fclose( $ifp ); 
		return $output_file; 
	}	


	
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



	if($_POST["page_firsat"]==""){
		$page_firsat = "0";
	}else{
		$page_firsat = $_POST["page_firsat"];
	}


	$data = array( 	"page_title1" => $_POST["p1"],
					
					"page_title2" => $_POST["p1en"],
					
					"page_title3" => $_POST["p1ar"],

					"page_content1" => $_POST["p2"],

					"page_content2" => $_POST["p2en"],

					"page_content3" => $_POST["p2ar"],

					"page_content_all1" => $_POST["p3"],

					"page_content_all2" => $_POST["p3en"],

					"page_content_all3" => $_POST["p3ar"],
										
					"page_slug" => $pageSlug,

					"page_slug2" => $pageSlug2,

					"page_slug3" => $pageSlug2,

					"page_status" => $_POST["p6"],					

					"page_order" => $_POST["p7"],					

					"page_keywords" => $_POST["p9"],					

					"page_descriptions" => $_POST["p10"],					

					"page_firsat" => $page_firsat,					
					 );

					

	

	//print_r($data);

	

	if ($adminEngine->updateDB("md_page",$data, "page_id", $getData->siteConfig["getID"])){
		
		
		$adminEngine->deleteDB("md_product_relationships","product_id",$getData->siteConfig["getID"]);


		foreach ($_POST['p4'] as $key => $name) {

			$dataCat = array("product_id" => $getData->siteConfig["getID"],
							 "category_id" => $name,
							 );

			
			$adminEngine->insertDB("md_product_relationships", $dataCat);
		}




/*


$x = 0;
foreach ($_POST['slim'] as $key => $name) {
$x++;		
		$userID = $getData->siteConfig["getID"];
		$write_dir = "../core/uploads/page/images/";
		

		
		$postAry = $name;
		$pExp = explode('"output":{"name":"',$postAry);
		$pExp = explode(',"image":',$pExp["1"]);
		$pExp = explode('"}',$pExp["1"]);
		
		$dataR = $pExp["0"];
		$profileImg = $dataR;
		

		$image = base64_to_jpeg( $profileImg, $write_dir.'temp_'.$x.$userID.'.png' );
		
		$temp_code = "temp_".$x.$userID.".png";


		
		$upload = new upload($write_dir.$temp_code);
		if($upload->file_src_error == 0){
			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = $key."_".$getData->siteConfig["getID"];
				
				
				if($upload->file_src_name_ext != 'jpg'){
					$upload->image_convert	= 'jpg'; 
				}
				
				$upload->process($write_dir);
				if ($upload->processed){
					$upload->clean();
				}else{
				}
			}
		}else{}

}


		$data6 = array("extra_title" => $_POST["pb1"], "extra_content_all" => $_POST["pb3"]);
		$adminEngine->updateDB("md_product_extra",$data6, "pExtra_id", $editSlooo["pExtra_id"]);


		$data7 = array("extra_title" => $_POST["pc1"], "extra_content_all" => $_POST["pc3"]);
		$adminEngine->updateDB("md_product_extra",$data7, "pExtra_id", $editSloooo["pExtra_id"]);



*/

		redirect("main.php?module=product/pageedit&id=". $getData->siteConfig["getID"] ."&success");

	}else{
		redirect("main.php?module=product/pageedit&id=". $getData->siteConfig["getID"] ."&failed");
	}

	

	

}



?>