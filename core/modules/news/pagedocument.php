<?PHP



if(!is_numeric($getData->siteConfig["getID"])){

	

	redirect("main.php?module=page/pagelist");

	

	}




$query = "SELECT * FROM md_doc WHERE (page_id = '" . $getData->siteConfig["getID"] . "')";
$result = $getData->query($query);
$numrows = $getData->numrows($result);



?>



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
      </div>

    </div>

    <a href="main.php?module=page/pagelist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> İçerik Listesi</a>
	  
	  
	</div>
	<div class="card-body">

<?PHP print $adminEngine->processMessage(); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#info" aria-controls="1" aria-expanded="true">Sayfa Dokümanı</a></li>
</ul>
	 
	 
<form class="form-horizontal" method="post" enctype="multipart/form-data" action="main.php?module=page/pagedocument&id=<?PHP print $getData->siteConfig["getID"]; ?>"  >
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="info">
	
    <div class="clearfix" style="height: 40px;"></div>
	 
	
    
    <div class="tab-pane active" id="info">
    
	 <div class="form-group row">
        <label class="col-sm-2 form-control-label">Doküman Başlığı</label>
        <div class="col-sm-6">
          <input name="p1" type="text" id="p1" class="form-control" placeholder="Doküman Başlığı" value="">
        </div>
      </div>
      
      <div class="line"></div>

	 <div class="form-group row">
        <label class="col-sm-2 form-control-label">Doküman Yükleme Aracı</label>
        <div class="col-sm-6">
          <input name="document" type="file" id="document">
        </div>
      </div>
      
      <div class="line"></div>


	<div class="form-group row">
	  <div class="col-sm-4 offset-sm-2">
		  <button type="submit" class="btn btn-primary">Yükle</button>
		</div>
	</div>
      
    </div>
    
	 
	  </div>
	</div>
</form>	
		  
		  	  
		  	  	  
		  	  	  	  	  
	 </div>
	</div>
</div>


<!-- --->



<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Sayfaya Ait Dokümanlar&nbsp;&nbsp;&nbsp;</h3>
	 	  
	  
	</div>
	<div class="card-body">


  <table class="table">
  <thead>
    <tr>
      <th width="81%">Doküman Adı</th>
      <th width="19%" style="text-align:center;">İşlemler</th>
    </tr>
  </thead>
  <tbody>

<?PHP while($row = $getData->fetch_array($result)){ ?>

<?php $IconName = explode(".",$row["doc_name"]);?>
    
<tr>

<td><?php echo $row["doc_title"];?></td>
<td style="text-align:center;">
<a href="../core/uploads/page/document/<?php echo $row["doc_name"];?>" class="btn btn-primary btn-sm" target="_blank">Dokümanı Aç</a> 
<a href="main.php?module=page/pagedocument&id=<?php echo $getData->siteConfig["getID"];?>&docid=<?php echo $row["doc_id"];?>&delete" id="pageImgDel" class="btn btn-danger btn-sm">Doküman Sil</a></td>
</tr>
  
<?php } ?>   
   
   
  </tbody>
</table>
   
    

    
			  
		  	  
		  	  	  
		  	  	  	  	  
	 </div>
	</div>
</div>








<!-- -->








<?PHP

if($_FILES){

	$fileName = $getData->siteConfig["getID"] .  "_" . randomGenerator();

	if(!empty($_FILES["document"]["name"])){
		
		
		$fileTy = explode(".",$_FILES["document"]["name"]);

		include_once('../core/class/upload.php');

		$upload = new upload($_FILES['document']);

		if($upload->file_src_error == 0){

			if ($upload->uploaded){

				$upload->file_overwrite 	= true;

				$upload->file_new_name_body = $fileName;

				$upload->file_new_name_ext = end($fileTy);


				

				/*if($upload->file_src_name_ext != 'jpg'){

					$upload->image_convert	= 'jpg'; 

				}*/

				
				
				$upload->process("../core/uploads/page/document/");

				//$upload->image_watermark = 'watermark.png';
					$data = array( 	"page_id" => $getData->siteConfig["getID"],
				
					
									"doc_title" => $_POST["p1"],
									"doc_name" => $fileName.".".$upload->file_src_name_ext);
				
					
				
					$adminEngine->insertDB("md_doc", $data);


				if ($upload->processed){



					redirect("main.php?module=page/pagedocument&id=". $getData->siteConfig["getID"] ."&success");

					$upload->clean();

				}else{

					redirect("main.php?module=page/pagedocument&id=". $getData->siteConfig["getID"] ."&success");

				}

			}

		}else{

			redirect("main.php?module=page/pagedocument&id=". $getData->siteConfig["getID"] ."&errorFile");

		}

	}

} else if(isset($_GET["delete"])){

	

	$path = "../core/uploads/page/document/";

	$editData = $getData->selectDB("md_doc","doc_id",$_GET["docid"]); 
	

	$file = $editData["doc_name"];

	$adminEngine->deleteDB("md_doc","doc_id",$_GET["docid"]);

	

	if (file_exists($path . $file)) { 

	

		unlink($path . $file);

	

	}
	

	redirect("main.php?module=page/pagedocument&id=". $getData->siteConfig["getID"] ."&success");

	

}

?>

