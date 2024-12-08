<?PHP
if(!is_numeric($getData->siteConfig["getID"])){
	redirect("main.php?module=forms/formlist");
}

$editData = $getData->selectDB("md_form","id",$getData->siteConfig["getID"]); 
?>

<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=forms/formedit&id=<?PHP print $getData->siteConfig["getID"]; ?>"  method="post" style="display:inline;">

<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Üye Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    
    <a href="main.php?module=forms/formlist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Üye Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>


<div class="col-lg-6">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Üye Bilgileri</h3>
      </div>
      
<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">Ad</label>
        <input name="ad" type="text" id="ad" placeholder="Ad" class="form-control" value="<?PHP print unhtmlDBString2($editData["ad"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Soyad</label>
        <input name="soyad" type="text" id="soyad" placeholder="Soyad" class="form-control" value="<?PHP print unhtmlDBString2($editData["soyad"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Doğum Tarihi</label>
        <input name="dtarihi" type="date" id="dtarihi" class="form-control" placeholder="Doğum Tarihi" value="<?PHP print unhtmlDBString2($editData["dtarihi"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Telefon</label>
        <input name="tel" type="text" id="tel" class="form-control" placeholder="Telefon" value="<?PHP print unhtmlDBString2($editData["tel"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Adres</label>
        <textarea name="adres" class="form-control" id="adres" placeholder="Adres"><?PHP print unhtmlDBString2($editData["adres"]);?></textarea>
      </div>



      <div class="line"></div>

	<div class="form-group">
		  <button type="submit" class="btn btn-primary">Kaydet</button>
	</div>

      
</div>

</div>
</div>


<div class="col-lg-6">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Üye Bilgileri</h3>
      </div>

<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">E-Mail</label>
        <input name="email" type="text" id="email" placeholder="E-Mail" class="form-control" value="<?PHP print unhtmlDBString2($editData["email"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Şifre</label>
        <input name="sifre" type="text" id="sifre" placeholder="Şifre" class="form-control" value="<?PHP print unhtmlDBString2($editData["sifre"]);?>">
      </div>

      <div class="form-group">
        <label class="form-control-label">Kitap Kod</label>
        <input name="1" type="text" id="1" placeholder="Kitap Kod" disabled class="form-control" value="<?PHP print unhtmlDBString2($editData["kod"]);?>">
      </div>



</div>
</div>



</div>













</div>
</form>
</div>



<?PHP



if($_POST){

	

	$data = array( 	"ad" => $_POST["ad"],
					"soyad" => $_POST["soyad"],
					"email" => $_POST["email"],
					"sifre" => $_POST["sifre"],
					"dtarihi" => $_POST["dtarihi"],
					"tel" => $_POST["tel"],
					"adres" => $_POST["adres"],
					 );

					

	

	//print_r($data);

	

	if ($adminEngine->updateDB("md_form",$data, "id", $getData->siteConfig["getID"])){


		redirect("main.php?module=forms/formedit&id=". $getData->siteConfig["getID"] ."&success");

	}else{
		redirect("main.php?module=forms/formedit&id=". $getData->siteConfig["getID"] ."&failed");
	}

	

	

}



?>