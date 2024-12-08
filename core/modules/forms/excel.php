<?PHP

?>
<div class="col-lg-12">
<form class="form-horizontal" action="excelExport.php?type=<?=$_GET["type"];?>"  method="post" style="display:inline;">

<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">İçerik Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    
    <a href="excelExport.php?type=<?=$_GET["type"];?>" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Form Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>


<div class="col-lg-6">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">&nbsp;</h3>
      </div>
      
<div class="card-body">

	 <div class="form-group">
		<div class="i-checks">
		  <input id="e1" name="e1" type="checkbox" value="1" class="checkbox-template">
		  <label for="checkboxCustom1">Ad & Soyad</label>
		</div>
      </div>

<?php if($_GET["type"]!="contact"){ ?>
     
     <div class="line"></div>
      
	 <div class="form-group">
		<div class="i-checks">
		  <input id="e2" name="e2" type="checkbox" value="2" class="checkbox-template">
		  <label for="checkboxCustom1">Kurum</label>
		</div>
      </div>
      
     <div class="line"></div>
      
	 <div class="form-group">
		<div class="i-checks">
		  <input id="e3" name="e3" type="checkbox" value="3" class="checkbox-template">
		  <label for="checkboxCustom1">Ünvan</label>
		</div>
      </div>

<?php }else{ ?>
	
    <div class="line"></div>
    
	 <div class="form-group">
		<div class="i-checks">
		  <input id="e8" name="e8" type="checkbox" value="8" class="checkbox-template">
		  <label for="checkboxCustom1">Mesaj</label>
		</div>
      </div>


<?php } ?>

	<div class="line"></div>

	 <div class="form-group">
		<div class="i-checks">
		  <input id="e4" name="e4" type="checkbox" value="4" class="checkbox-template">
		  <label for="checkboxCustom1">E-Posta</label>
		</div>
      </div>
      
     

      
</div>

</div>
</div>


<div class="col-lg-6">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">&nbsp;</h3>
      </div>

<div class="card-body">

<?php if($_GET["type"]!="contact"){ ?>
      
	 <div class="form-group">
		<div class="i-checks">
		  <input id="e5" name="e5" type="checkbox" value="5" class="checkbox-template">
		  <label for="checkboxCustom1">Telefon</label>
		</div>
      </div>
      
     <div class="line"></div>
      
	 <div class="form-group">
		<div class="i-checks">
		  <input id="e6" name="e6" type="checkbox" value="6" class="checkbox-template">
		  <label for="checkboxCustom1">Şehir</label>
		</div>
      </div>

     <div class="line"></div>
      
	 <div class="form-group">
		<div class="i-checks">
		  <input id="e7" name="e7" type="checkbox" value="7" class="checkbox-template">
		  <label for="checkboxCustom1">KVKP Onay</label>
		</div>
      </div>

<?php } ?>

     <div class="line"></div>

	 <div class="form-group">
		  <button type="submit" class="btn btn-primary">Excel Rapor Al</button>
	 </div>


</div>
</div>



</div>




</div>
</div>

</form>

