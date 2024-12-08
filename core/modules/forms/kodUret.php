
<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=forms/kodUret"  method="post" style="display:inline;">

<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Kod Üret&nbsp;&nbsp;&nbsp;</h3>
	  
    
    <a href="main.php?module=forms/kitapKod" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Kod Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>


<div class="col-lg-12">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Kod Üret</h3>
      </div>
      
<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">Üretilecek Kod Sayısını Girin</label>
        <input name="e1" type="text" id="e1" placeholder="Üretilecek Kod Sayısını Girin" class="form-control">
      </div>


      <div class="form-group">
        <label class="form-control-label">Yeni Üretilen Kodlar</label>
        <textarea name="adres" rows="15" class="form-control" id="adres" placeholder="Yeni Üretilen Kodlar">
<?PHP



if($_POST){

$kodSay = $_POST["e1"]	;

for ($i = 1; $i <= $kodSay; $i++) {
    
	//echo $i;
	
	$random_number = mt_rand(10000000,99999999) ;
	
	$data = array("numara" => $random_number);
	$adminData->insertDB("numara", $data);
	
	echo $random_number;
	echo "\n";

}

	

	

}



?>
        


        </textarea>
      </div>



      <div class="line"></div>

	<div class="form-group">
		  <button type="submit" class="btn btn-primary">Kod Üret</button>
	</div>

      
</div>

</div>
</div>
















</div>
</form>
</div>



