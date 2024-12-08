<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Üye Listesi&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	<?PHP print $adminEngine->processMessage(); ?>
  
  
  <ul class="nav nav-tabs" id="myTab" role="tablist"><li class="nav-item">
      <a class="nav-link  active" id="home-1" data-toggle="tab" href="#nav1" aria-controls="1" aria-expanded="true">Üye Listesi</a></li><li class="nav-item">
   </ul>
            
            
  <div class="tab-content" id="myTabContent"><br>
  
<div class="tab-pane fade show  active" id="nav1" role="tabpanel">
<?PHP print $adminEngine->formTreeList("kariyer"); ?>
</div>
  
  </div>

  
  
	 
	</div>
  </div>
</div>






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


if($adminEngine->issetDelete() && $adminEngine->getDeleteID() != ""){
	
	if(!is_numeric($adminEngine->getDeleteID())){
		
		redirect("main.php?module=forms/formlist");
		
		}
	

		
	if($adminEngine->deleteDB("md_form","id",$adminEngine->getDeleteID())){
		
		$path = array("page/images/", "page/images/thumb/");
		
		imgDelete($path, $adminEngine->getDeleteID() . ".jpg");
		
		redirect("main.php?module=forms/formlist&success");
	
	} else {
	
		redirect("main.php?module=forms/formlist&failed");	
		
	}
		
}

?>