<?PHP
if(!is_numeric($getData->siteConfig["getID"])){
	redirect("main.php?module=page/pagelist");
}

$editData = $getData->selectDB("md_page","page_id",$getData->siteConfig["getID"]); 
?>

<div class="col-lg-12">

<form class="form-horizontal" action="main.php?module=home/homeedit&id=<?PHP print $getData->siteConfig["getID"]; ?>"  method="post" style="display:inline;">
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

    <a href="main.php?module=home/homelist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> İçerik Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>




<?php include "hometype_".$editData["pag_ctype"].".php";?>



</div>
</form>
</div>




<?PHP



if($_POST){
	
	if($editData["pag_ctype"]=="3"){
	include_once('../core/class/upload.php');
	
	function base64_to_jpeg($base64_string, $output_file) {
		$ifp = fopen( $output_file, 'wb' ); 
		$data = explode( ',', $base64_string );
		fwrite( $ifp, base64_decode( $data[ 1 ] ) );
		fclose( $ifp ); 
		return $output_file; 
	}	
	
	}

	
	if($editData["page_title1"]!=$_POST["p1"]){
	
		$pageSlug = $adminEngine->pageSlug($_POST["p1"]);
	
	}else{
	
		$pageSlug = $editData["page_slug"];

	}



	$data = array( 	"page_title1" => $_POST["p1"],

					"page_content1" => $_POST["p2"],

					"page_slug" => $pageSlug,

					"page_status" => $_POST["p6"],					

					"page_order" => $_POST["p7"],					

					"page_icon" => $_POST["p55"],					

					"page_bg" => $_POST["pn1"],
					
					"page_url" => $_POST["pn2"],					
					
					"page_url2" => $_POST["pn3"],					

					"page_content_all1" => $_POST["content"],					

					"page_ex5" => $_POST["pD"],					

					 );

	

	if ($adminEngine->updateDB("md_page",$data, "page_id", $getData->siteConfig["getID"])){

if($editData["pag_ctype"]=="3"){

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
				
				
				if($upload->file_src_name_ext != 'png'){
					$upload->image_convert	= 'png'; 
				}
				
				$upload->process($write_dir);
				if ($upload->processed){
					$upload->clean();
				}else{
				}
			}
		}else{}

}

}

		redirect("main.php?module=home/homeedit&id=". $getData->siteConfig["getID"] ."&success");

	}else{
		redirect("main.php?module=home/homeedit&id=". $getData->siteConfig["getID"] ."&failed");
	}

	

	

}


?>


