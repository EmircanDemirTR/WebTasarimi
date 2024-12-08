<?PHP
if(!is_numeric($getData->siteConfig["getID"])){
	redirect("main.php?module=product/pagelist");
}

$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 

$coQuery = "SELECT * FROM md_product_extra WHERE (product_id = '".$getData->siteConfig["getID"]."')";
$coResult = $getData->query($coQuery);
$coCount = $getData->numrows($coResult);

if($coCount=="0"){


for($i = 0; $i < "3"; ++$i){
$data = array("product_id" => $getData->siteConfig["getID"], "extra_type" => "1", "extra_status" => "1");
$adminEngine->insertDB("md_product_extra", $data);
}

$data2 = array("product_id" => $getData->siteConfig["getID"], "extra_type" => "2", "extra_status" => "1");
$adminEngine->insertDB("md_product_extra", $data2);

$data3 = array("product_id" => $getData->siteConfig["getID"], "extra_type" => "3", "extra_status" => "1");
$adminEngine->insertDB("md_product_extra", $data3);

$data4 = array("product_id" => $getData->siteConfig["getID"], "extra_type" => "4", "extra_status" => "1");
$adminEngine->insertDB("md_product_extra", $data4);


}


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
        <a href="main.php?module=product/pageimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Ürün Logo</a>
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


<div class="col-lg-12">
<div class="card">
<div class="card-body">

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#c1" aria-controls="1" aria-expanded="true">İçerik Yazıları</a></li>
    <li class="nav-item"><a class="nav-link" id="home-features" data-toggle="tab" href="#c2" aria-controls="1" aria-expanded="true">Icon Box</a></li>
    <li class="nav-item"><a class="nav-link" id="home-seo" data-toggle="tab" href="#c3" aria-controls="1" aria-expanded="true">Slogan Alt Bilgi</a></li>
    <li class="nav-item"><a class="nav-link" id="home-seo" data-toggle="tab" href="#c4" aria-controls="1" aria-expanded="true">Detay 1</a></li>
    <li class="nav-item"><a class="nav-link" id="home-seo" data-toggle="tab" href="#c5" aria-controls="1" aria-expanded="true">Detay 2</a></li>
</ul>


<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="c1">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tab1.php" ;?>
    </div>
</div>

<div class="tab-pane fade" id="c2">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tab2.php" ;?>
    </div>
</div>

<div class="tab-pane fade" id="c3">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tab3.php" ;?>
    </div>
</div>

<div class="tab-pane fade" id="c4">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tab4.php" ;?>
    </div>
</div>

<div class="tab-pane fade" id="c5">
    <div class="clearfix" style="height: 40px;"></div>
    <div class="row">
		<?php include "tab5.php" ;?>
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

	include_once('../core/class/upload.php');
	
	function base64_to_jpeg($base64_string, $output_file) {
		$ifp = fopen( $output_file, 'wb' ); 
		$data = explode( ',', $base64_string );
		fwrite( $ifp, base64_decode( $data[ 1 ] ) );
		fclose( $ifp ); 
		return $output_file; 
	}	


	
	if($editData["page_title1"]!=$_POST["p1"]){
	
		$pageSlug = $adminEngine->pageSlug($_POST["p1"]);
	
	}else{
	
		$pageSlug = $editData["page_slug"];

	}


	$data = array( 	"page_title1" => $_POST["p1"],

					"page_content1" => $_POST["p2"],

					"page_content_all1" => $_POST["p3"],
										
					"page_slug" => $pageSlug,

					"page_status" => $_POST["p6"],					

					"page_order" => $_POST["p7"],					

					"page_keywords" => $_POST["p9"],					

					"page_descriptions" => $_POST["p10"],					

					 );

					

	

	//print_r($data);

	

	if ($adminEngine->updateDB("md_page",$data, "page_id", $getData->siteConfig["getID"])){
		

// Block 1 //
		
		$pi = 0;
		$query = "SELECT * FROM md_product_extra WHERE (product_id = '".$getData->siteConfig["getID"]."') AND (extra_type = '1')";
		$result = $getData->query($query);
		while($row = $getData->fetch_array($result)){
		
		$pi++;
		
		if($pi==1){		
		$data = array("extra_title" => $_POST["title1"], "extra_content" => $_POST["content1"], "extra_icon" => $_POST["radio1"]);
		$adminEngine->updateDB("md_product_extra",$data, "pExtra_id", $row["pExtra_id"]);
		}elseif($pi==2){
		$data2 = array("extra_title" => $_POST["title2"], "extra_content" => $_POST["content2"], "extra_icon" => $_POST["radio2"]);
		$adminEngine->updateDB("md_product_extra",$data2, "pExtra_id", $row["pExtra_id"]);
		}elseif($pi==3){
		$data3 = array("extra_title" => $_POST["title3"], "extra_content" => $_POST["content3"], "extra_icon" => $_POST["radio3"]);
		$adminEngine->updateDB("md_product_extra",$data3, "pExtra_id", $row["pExtra_id"]);
		}
			
			
		}

// Block 2 //


		$data4 = array("extra_title" => $_POST["ps1"], "extra_content" => $_POST["ps2"]);
		$adminEngine->updateDB("md_product_extra",$data4, "pExtra_id", $editSlo["pExtra_id"]);


// Block 3 //

		$data5 = array("extra_title" => $_POST["pb1"], "extra_content" => $_POST["pb2"], "extra_content_all" => $_POST["pb3"], "extra_doc" => $_POST["pb4"]);
		$adminEngine->updateDB("md_product_extra",$data5, "pExtra_id", $editSloo["pExtra_id"]);



		$userID = $getData->siteConfig["getID"];
		$write_dir = "../core/uploads/page/images/";
		

		
		$postAry = $_POST["slim"]["0"];
		$pExp = explode('"output":{"name":"',$postAry);
		$pExp = explode(',"image":',$pExp["1"]);
		$pExp = explode('"}',$pExp["1"]);
		
		$dataR = $pExp["0"];
		$profileImg = $dataR;
		

		$image = base64_to_jpeg( $profileImg, $write_dir.'temp_p_'.$userID.'.png' );
		
		$temp_code = "temp_p_".$userID.".png";


		
		$upload = new upload($write_dir.$temp_code);
		if($upload->file_src_error == 0){
			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = "p_".$getData->siteConfig["getID"];
				
				
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


// Block 4 //

		$data6 = array("extra_title" => $_POST["pc1"], "extra_content" => $_POST["pc2"], "extra_content_all" => $_POST["pc3"], "extra_doc" => $_POST["pc4"]);
		$adminEngine->updateDB("md_product_extra",$data6, "pExtra_id", $editSlooo["pExtra_id"]);


		

		redirect("main.php?module=product/pageedit&id=". $getData->siteConfig["getID"] ."&success");

	}else{
		redirect("main.php?module=product/pageedit&id=". $getData->siteConfig["getID"] ."&failed");
	}

	

	

}



?>