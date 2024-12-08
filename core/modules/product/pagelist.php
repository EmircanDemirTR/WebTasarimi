<?php

if($getData->siteConfig["adminGroupID"]==""){

$Gquery = "SELECT * FROM md_page where (page_group = '3') AND (is_category = '1') order by page_id ASC limit 1";
$Gresult = $getData->query($Gquery);
$Grow = $getData->fetch_array($Gresult);

$groupID = "0";

}else{
$groupID = $getData->siteConfig["adminGroupID"];

}
?>
<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Ürün Listesi&nbsp;&nbsp;&nbsp;&nbsp;</h3>
      

    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Kategori Seçin &nbsp; <span class="caret"></span> </a>

      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
<?php
/*
$query = "SELECT * FROM md_page Where (page_group = '3') AND (page_group = '3')";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){
	
	
	
?>

        <a href="main.php?module=product/productlist&group=<?PHP print $row["group_id"];?>" class="dropdown-item"><?=$row["group_title1"];?></a>
		
<?php }*/ ?>   
<a href="main.php?module=product/pagelist&group=0" style="padding-left:10px;" class="dropdown-item">Kategorisi Olmayan Ürünler</a>
<?php print $adminEngine->categoryJumpList("0", "3", "10");?>     

      </div>

    </div>

    <?php
	
	//echo $getData->siteConfig["adminGroupID"];
	?>
      
	</div>
	<div class="card-body">
    
    
	<?PHP print $adminEngine->processMessage(); ?>


    <table class="table">
      <thead>
        <tr>
            <th width="6%" style="width:6%;">ID</th>
            <th width="70%" style="width:70%;">İçerik Adı</th>
            <th width="6%" style="text-align:center; width:6%;">Yayın</th>
            <th width="18%" style="text-align:center; width:18%;">İşlemler</th>
        </tr>
      </thead>
      <tbody>
	 <?PHP print $adminEngine->newProductList($groupID); ?>
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
		
		redirect("main.php?module=product/pagelist&group=". $getData->siteConfig["adminGroupID"] ."");
		
	}
	

		
	if($adminEngine->deleteDB("md_page","page_id",$adminEngine->getDeleteID())){
		
		$adminEngine->deleteDB("md_product_relationships","product_id",$adminEngine->getDeleteID());
		
		$path = array("page/images/", "page/images/thumb/");
		
		imgDelete($path, $adminEngine->getDeleteID() . ".jpg");
		
		redirect("main.php?module=product/pagelist&group=". $getData->siteConfig["adminGroupID"] ."&success");
	
	} else {
	
		redirect("main.php?module=product/pagelist&group=". $getData->siteConfig["adminGroupID"] ."&failed");	
		
	}
		
}

?>