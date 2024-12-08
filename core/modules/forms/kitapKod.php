<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Kitap Kod Listesi&nbsp;&nbsp;&nbsp;</h3>
	</div>
	<div class="card-body">
	<?PHP print $adminEngine->processMessage(); ?>
  
  
  <ul class="nav nav-tabs" id="myTab" role="tablist"><li class="nav-item">
      <a class="nav-link  active" id="home-1" data-toggle="tab" href="#nav1" aria-controls="1" aria-expanded="true">Kitap Kod</a></li><li class="nav-item">
   </ul>
            
            
  <div class="tab-content" id="myTabContent"><br>
  
<div class="tab-pane fade show  active" id="nav1" role="tabpanel">
<table class="table table-striped table-bordered" id="dasdasd">
<thead>
  <tr>
    <th width="70%" style="width:36%;">Kod</th>
    <th width="6%" style="text-align:center; width:24%;">Üye İsim & Soyisim</th>
    <th width="6%" style="text-align:center; width:24%;">Üye Email</th>
    <th width="18%" style="text-align:center; width:10%;">İşlemler</th>
  </tr>
</thead>
<tbody>

<?php
        $query = "SELECT * FROM numara";
        $result = $getData->query($query);
        $numrows = $getData->numrows($result);
        while($row = $getData->fetch_array($result)){


        $uquery = "SELECT * FROM md_form WHERE (kod = '".$row["numara"]."')";
        $uresult = $getData->query($uquery);
        $urow = $getData->fetch_array($uresult);

?>



<tr>
            <td><?php echo $row["numara"];?></td>
            <td style="text-align:center;"><?php echo unhtmlDBString($urow["ad"]) .'&nbsp;'. unhtmlDBString($urow["soyad"]);?></td>
            <td style="text-align:center;"><?php echo unhtmlDBString($urow["email"]);?></td>
            <td style="text-align:center;"><a href="main.php?module=forms/formedit&id=<?=$urow["id"];?>" class="btn btn-sm btn-info">Kayıt Olan Üye</a>
			
			</td>
            </tr>

<?php } ?>
<tbody></table>
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