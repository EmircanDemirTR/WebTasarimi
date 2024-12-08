<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Galeri Listesi&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	
<?PHP print $adminEngine->processMessage(); ?>

<?PHP

 $query = "SELECT * FROM md_gallery ORDER BY gallery_order ASC";
  
 $result = $getData->query($query);
  
 $numrows = $getData->numrows($result);

?>

<?PHP if( $numrows >= 1 ) { ?>

<table class="table table-striped table-bordered" id="dasdasd">
  <thead>
    <tr>
      <th width="5%">ID</th>
      <th width="60%">Galeri Adı</th>
      <th width="19%" style="text-align:center;">İşlemler</th>
    </tr>
  </thead>
  <tbody> 
  
  
  <?PHP while($row = $getData->fetch_array($result)){ 
  
  if($row["gallery_type"]=="0"){
	
	$galleryEdit =  'main.php?module=gallery/galleryimages';
  
  }elseif($row["gallery_type"]=="1"){
	 
	$galleryEdit =  'main.php?module=gallery/galleryvideos';

  }
  ?>
  
  <tr>
            <td><?=$row["gallery_id"]?></td>
            <td><?=unhtmlDBString($row["gallery_title1"])?></td>
            <td style="text-align:center;"><a href="<?=$galleryEdit;?>&id=<?=$row["gallery_id"]?>" class="btn btn-sm btn-primary">Galeriyi Göster</a> &nbsp; <a href="main.php?module=gallery/galleryedit&id=<?=$row["gallery_id"]?>" class="btn btn-sm btn-info">Düzenle</a> &nbsp; <a href="#" data-id="<?=$row["gallery_id"]?>" class="removeData btn btn-sm btn-danger">Sil</a></td>
            </tr>
  
  <?PHP } ?>
  
  </tbody>
</table>

<?PHP 
	} else { 

		print $adminEngine->notifyWarning("<h4>Kayıtlı galeri bulunamadı!</h4><p>Galeri yöneticisini kullanarak yeni kayıt girişi yapabilirsiniz.</p><p><a href='main.php?module=gallery/galleryadd' class='btn btn-warning'>Yeni Galeri Girişi &raquo;</a></p>","off");

	}

?>
	
	
	
	
	</div>
  </div>
</div>



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

<?PHP

if($adminEngine->issetDelete() && $adminEngine->getDeleteID() != ""){
	
	if(!is_numeric($adminEngine->getDeleteID())){
		
		redirect("main.php?module=gallery/gallerylist");
		
		}
		
	if($getData->deleteDB("md_gallery","gallery_id",$adminEngine->getDeleteID())){
		
		redirect("main.php?module=gallery/gallerylist&success");
	
	} else {
	
		redirect("main.php?module=gallery/gallerylist&failed");	
		
	}
		
}

?>