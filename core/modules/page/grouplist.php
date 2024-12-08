<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Grup Listesi&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	<?PHP print $adminEngine->processMessage(); ?>
  

	
<table class="table">
  <thead>
    <tr>
      <th width="5%">ID</th>
      <th width="71%">Grup Adı</th>
      <th width="10%">İşlemler</th>
    </tr>
  </thead>
  <tbody>
  <?PHP print $adminEngine->groupList("page"); ?>
  </tbody>
</table>		
			
				
					
						
							
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
		
		redirect("main.php?module=page/grouplist");
		
		}
		
	if($adminEngine->deleteDB("md_page_group","group_id",$adminEngine->getDeleteID())){
		
		redirect("main.php?module=page/grouplist&success");
	
	} else {
	
		redirect("main.php?module=page/grouplist&failed");	
		
	}
		
}

?>