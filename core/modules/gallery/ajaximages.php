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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script type="text/javascript" src="/aksis.com/core/libraries/jqueryform/jquery.form.js"></script> 

<script type="text/javascript">
$(document).ready(function()
{
 
     $("#galleryUpload").ajaxForm({
        beforeSend: function()
        {
            $("#progress").show();
            //clear everything
            $("#bar").width('0%');
            $("#mesaj").html("");
            $("#yuzde").html("0%");
        },
        uploadProgress: function(event, position, total, percentComplete)
        {
            $("#bar").width(percentComplete+'%');
            $("#yuzde").html(percentComplete+'%');
 
        },
        success: function()
        {
            $("#bar").width('100%');
            $("#yuzde").html('100%');
 
        },
        complete: function(response)
        {
            $("#mesaj").html("<font color='green'>Dosya başarılı bir şekilde yüklendi</font>");
        },
        error: function()
        {
            $("#mesaj").html("<font color='red'> Bir hata oluştu</font>");
 
        }
    });
 
});
</script>
<style>
	#progress { display: none; position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
	#bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
	#yuzde { position:absolute; display:inline-block; top:3px; left:48%; }
</style>

<div class="row-fluid">
  <div class="span3">
    <h2>Galeri Düzenle</h2>
  </div>
  <div class="span9">
    <div class="btn-group btn-margin"> <a class="btn btn-small btn-info dropdown-toggle" data-toggle="dropdown" href="#"> Galeri Bilgileri &nbsp; <span class="caret"></span> </a>
      <ul class="dropdown-menu">
        <li><a href="main.php?module=gallery/galleryedit&id=<?PHP print $getData->siteConfig["getID"];?>">İçerik Bilgileri</a></li>
        <li><a href="main.php?module=gallery/gallerycover&id=<?PHP print $getData->siteConfig["getID"];?>">Kapak Resmi</a></li>
        <li><a href="main.php?module=gallery/galleryimages&id=<?PHP print $getData->siteConfig["getID"];?>">Galeri Resimleri</a></li>
      </ul>
    </div>
    <a href="main.php?module=gallery/gallerylist" class="btn btn-small" style="margin:6px 0 0 2px;"><i class="icon-picture"></i> Galeri Listesi</a>
  </div>
</div>

<?PHP print $adminEngine->processMessage(); ?>


<div id="modal_dat_remove" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Kayıt Silme Onayı</h3>
  </div>
  <div class="modal-body">
    <p>Bu veriyi silmek istediğinizden emin misiniz?</p>
  </div>
  <div class="modal-footer"> <a href="#" id="deleteID" class="btn btn-success" data-delete="" data-loading-text="Siliniyor...">Evet</a> <a href="#" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Hayır</a> </div>
</div>



<ul class="nav nav-tabs" id="mdTabMenu">
  <li class="active"><a href="#info" data-toggle="tab">Galeri Resimleri</a></li>
</ul>




  <div class="tab-content">
  <div class="row">
    <div class="tab-pane active" id="info">

    
 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="../core/modules/gallery/ajaxupload.php" id="galleryUpload"  >


    
      <div class="control-group">
        <label class="control-label" for="input05">Resim Yükleme Aracı</label>
        <div class="controls">
          <input name="image[]" type="file" id="image" multiple>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-info" id="uploadbtn">Yükle</button>
               <input type="submit" value="Ajax File Upload">

        </div>
      </div>
</form>
 <div id="progress">
    <div id="bar"></div>
    <div id="yuzde">0%</div >
</div>
<br/>
<div id="mesaj"></div>

      
	  <?PHP if( $numrows >= 1 ){ ?>
      <hr>
      <div class="container" style="margin-bottom:15px;"> 
      <a class="btn btn-info" id="click"><i class="icon-ok icon-white"></i> Sıralamayı Kaydet</a> <span id="data"></span> 
      </div>
      
      <ul id="gallery">
        <li id="sort_0" style="display:none;"></li>
       
        <?PHP while($row = $getData->fetch_array($result)){ ?>
        
        <li id="sort_<?PHP print $row["image_id"];?>">
          <div class="span2 well well-small">
            <p><img src="../core/uploads/gallery/<?PHP print $row["image_name"];?>" alt="" width="140" height="140" class="img-rounded"></p>
            <a href="../core/uploads/gallery/<?PHP print $row["image_name"];?>" class="btn btn-info btn-mini myfancyImg" title="<?PHP print $row["image_title1"];?>"><i class="icon-zoom-in icon-white"></i></a>
            <a href="main.php?module=gallery/galleryimages&id=<?PHP print $getData->siteConfig["getID"];?>&edit=<?PHP print $row["image_id"];?>" class="btn btn-mini btn-warning" title="Düzenle"><i class="icon-pencil icon-white"></i></a>
            <a class="removeData btn btn-danger btn-mini" data-id="<?PHP print $row["image_id"];?>" data-rel="<?PHP print $row["image_name"];?>" title="Sil"><i class="icon-remove icon-white"></i> </a> </div>
        </li>
    
        <?PHP } ?>
      
      </ul>
      
	  <?PHP } ?>
    
    </div>
  </div>



<?PHP


if(isset($_GET["delete"])){

	$deleteFile = $_GET["file"];
	
	$path = "../core/uploads/gallery/";
	
	if( $getData->deleteDB("md_images", "image_id", $adminEngine->getDeleteID()) ){
		
		if(file_exists($path . $deleteFile)){
			
			unlink($path . $deleteFile);
			
			//unlink($path . "thumb/" . $deleteFile);
				
			redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"]);

		}
		
	} else { 
			
		redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"] ."&failed");
			
	}
	
}


if(isset($_POST["edit"])){
	
	$data = array( 	"image_title1" => $_POST["p1"],
					"image_desc" => $_POST["p2"],
					"image_link" => $_POST["p3"]);

	
	if ($adminEngine->updateDB("md_images", $data, "image_id", $_POST["p4"])){
		
		redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"] ."&success");
		
	}else{
		
		redirect("main.php?module=gallery/galleryimages&id=". $getData->siteConfig["getID"] ."&failed");
		
	}
	
}


?>
