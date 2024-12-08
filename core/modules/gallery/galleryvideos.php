<?PHP

if( !is_numeric( $getData->getID() ) ) {
	
	redirect("main.php?module=gallery/gallerylist");
	
	}

$editData = $getData->selectDB("md_gallery","gallery_id",$getData->siteConfig["getID"]); 

/**/

$query = "SELECT * FROM md_images WHERE (image_gallery = '" . $getData->siteConfig["getID"] . "') ORDER BY image_order ASC";
			  
$result = $getData->query($query);

$numrows = $getData->numrows($result);

?>

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Video Url Yükle&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">


<?PHP print $adminEngine->processMessage(); ?>

<?PHP if(isset($_GET["edit"])){?>

<?PHP $editImage = $getData->selectDB("md_images","image_id",$_GET["edit"]); ?>

 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="main.php?module=gallery/galleryvideos&id=<?PHP print $getData->siteConfig["getID"]; ?>"  >
     

 
	 <div class="form-group row">
	  <label class="col-sm-2 form-control-label">Video Başlık</label>
	  <div class="col-sm-3">
		<input name="p1" type="text" id="p1" class="form-control" placeholder="Video Başlık" value="<?PHP print unhtmlDBString2($editImage["image_title1"]);?>">
	  </div>
	</div>
      
      <div class="line"></div>



	 <div class="form-group row">
	  <label class="col-sm-2 form-control-label">Video Açıklama</label>
	  <div class="col-sm-4">
		<textarea name="p2" class="form-control" id="p2" placeholder="Video Açıklama" rows="3"><?PHP print unhtmlDBString2($editImage["image_desc1"]);?></textarea>
	  </div>
	</div>
      
     <div class="line"></div>

	 <div class="form-group row">
	  <label class="col-sm-2 form-control-label">Video Url</label>
	  <div class="col-sm-3">
		<input name="p3" type="text" id="p3" class="form-control" placeholder="Video Url" value="<?PHP print unhtmlDBString2($editImage["image_link1"]);?>">
	  </div>
	</div>

     <div class="line"></div>



  	<div class="form-group row">
	  <div class="col-sm-4 offset-sm-2">
	    <input name="p4" type="hidden" id="p4" value="<?PHP print $editImage["image_id"]; ?>">
        <input name="edit" type="hidden" id="edit">
		<button type="submit" class="btn btn-primary">Kaydet</button>
	  </div>
	</div>
 

      
                  
      
      
      
</form>



<?PHP } else { ?>



 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="main.php?module=gallery/galleryvideos&id=<?PHP print $getData->siteConfig["getID"]; ?>"  >
 
	 <div class="form-group row">
	  <label class="col-sm-2 form-control-label">Video Başlık</label>
	  <div class="col-sm-3">
		<input name="p1" type="text" id="p1" class="form-control" placeholder="Video Başlık">
	  </div>
	</div>

      
      <div class="line"></div>

      
      <div class="line"></div>

	 <div class="form-group row">
	  <label class="col-sm-2 form-control-label">Video Açıklama</label>
	  <div class="col-sm-4">
		<textarea name="p2" class="form-control" id="p2" placeholder="Video Açıklama" rows="3"></textarea>
	  </div>
	</div>
      
      <div class="line"></div>

	 <div class="form-group row">
	  <label class="col-sm-2 form-control-label">Video Url</label>
	  <div class="col-sm-3">
		<input name="p3" type="text" id="p3" class="form-control" placeholder="Video Url">
	  </div>
	</div>

     <div class="line"></div>


  	<div class="form-group row">
	  <div class="col-sm-4 offset-sm-2">
		<button type="submit" class="btn btn-primary">Kaydet</button>
	  </div>
	</div>
 

</form>	 	 
<?php } ?>	   
	</div>
  </div>
</div>







<!-- --->



<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Galeri Resimleri&nbsp;&nbsp;&nbsp; </h3>
	 <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="click">Sıralamayı Kaydet</a> 	  
	  
	</div>
	<div class="card-body">
	  
	  <span id="data"></span>

<table class="table table-striped table-bordered" id="dasdasd">
  <thead>
    <tr>
      <th width="5%">ID</th>
      <th width="60%">Galeri Adı</th>
      <th width="19%" style="text-align:center;">İşlemler</th>
    </tr>
  </thead>
	  <?PHP if( $numrows >= 1 ){ ?>
  <tbody id="gallery"> 







      
       
       <tr  id="sort_0" style="display:none;">
       	<td></td>
       	<td></td>
       	<td></td>
       </tr>
       
        <?PHP while($row = $getData->fetch_array($result)){ ?>
        

        <tr id="sort_<?PHP print $row["image_id"];?>">
            <td><?=$row["image_id"]?></td>
            <td><?=unhtmlDBString($row["image_title1"])?></td>
            <td style="text-align:center;">
            <a href="main.php?module=gallery/galleryvideos&id=<?PHP print $getData->siteConfig["getID"];?>&edit=<?PHP print $row["image_id"];?>" class="btn btn-sm btn-info">Düzenle</a> &nbsp; 
            <a href="#" data-id="<?=$row["image_id"]?>"  data-rel="<?PHP print $row["image_name"];?>" class="removeData btn btn-sm btn-danger">Sil</a>
            </td>
        </tr>

        
    
        <?PHP } ?>
      
  </tbody>
	  <?PHP } ?>
</table>
      
   

    
			  
		  	  
		  	  	  
		  	  	  	  	  
	 </div>
	</div>
</div>








<!-- -->

<div id="modal_dat_remove" class="modal fade">
<div class="modal-dialog" role="document"> 
<div class="modal-content">
  
  <div class="modal-header">
    <h5>Kayıt Silme Onayı</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
  </div>
  <div class="modal-body">
    <p>Bu veriyi silmek istediğinizden emin misiniz?</p>
  </div>
  <div class="modal-footer"> 
  <a href="#" id="deleteID" class="btn btn-success" data-delete="" data-loading-text="Siliniyor...">Evet</a> 
  <a href="#" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Hayır</a> 
  </div>


</div>
</div>
</div>






<?PHP

if($_POST){
	


  $data = array(	
				  "image_gallery" => $getData->siteConfig["getID"], 
				  "image_title1" => $_POST["p1"],
				  "image_desc1" => $_POST["p2"],
				  "image_link1" => $_POST["p3"],
			   );

  
	  
	  if($getData->insertDB("md_images", $data)){
		  
		  redirect("main.php?module=gallery/galleryvideos&id=". $getData->siteConfig["getID"]);
		  
 }else{
		redirect("main.php?module=gallery/galleryvideos&id=". $getData->siteConfig["getID"] ."&failed");
	}
	  
	
	/**/

	
}

if(isset($_GET["delete"])){

	
	if( $getData->deleteDB("md_images", "image_id", $adminEngine->getDeleteID()) ){
		
				
			redirect("main.php?module=gallery/galleryvideos&id=". $getData->siteConfig["getID"]);

		
	} else { 
			
		redirect("main.php?module=gallery/galleryvideos&id=". $getData->siteConfig["getID"] ."&failed");
			
	}
	
}


if(isset($_POST["edit"])){
	
	$data = array( 	"image_title1" => $_POST["p1"],
					"image_desc1" => $_POST["p2"],
					"image_link1" => $_POST["p3"],
					);

	
	if ($adminEngine->updateDB("md_images", $data, "image_id", $_POST["p4"])){
		
		redirect("main.php?module=gallery/galleryvideos&id=". $getData->siteConfig["getID"] ."&success");
		
	}else{
		
		redirect("main.php?module=gallery/galleryvideos&id=". $getData->siteConfig["getID"] ."&failed");
		
	}
	
}


?>
