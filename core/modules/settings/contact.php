<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=settings/contact"  method="post" style="display:inline;">
<div class="row">
<?php 
	
	$pr = 0;
	$iboxQuery = "SELECT * FROM md_contact";
	$iboxResult = $getData->query($iboxQuery);
	while($iboxRow = $getData->fetch_array($iboxResult)){
	$pr++;
?>



<div class="col-lg-4">
<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">İletişim Bilgileri</h3>
</div>
<div class="card-body">




    <div class="form-group">
        <label class="form-control-label">İletişim Başlık</label>
        <input name="a<?=$iboxRow["id"];?>" type="text" id="a<?=$iboxRow["id"];?>" placeholder="İletişim Başlık" class="form-control" value="<?PHP print unhtmlDBString2($iboxRow["x1"]);?>">
    </div>
    
    
    <div class="form-group">
        <label class="form-control-label">Adres</label>
        <textarea name="b<?=$iboxRow["id"];?>" class="form-control" id="b<?=$iboxRow["id"];?>"><?PHP print unhtmlDBString2($iboxRow["x2"]);?></textarea>
    </div>
    

    <div class="form-group">
        <label class="form-control-label">Telefon</label>
        <input name="c<?=$iboxRow["id"];?>" type="text" id="c<?=$iboxRow["id"];?>" placeholder="Telefon" class="form-control" value="<?PHP print unhtmlDBString2($iboxRow["x3"]);?>">
    </div>

    <div class="form-group">
        <label class="form-control-label">Email</label>
        <input name="f<?=$iboxRow["id"];?>" type="text" id="f<?=$iboxRow["id"];?>" placeholder="Email" class="form-control" value="<?PHP print unhtmlDBString2($iboxRow["x6"]);?>">
    </div>
    
    <div class="form-group">
        <label class="form-control-label">Faks</label>
        <input name="g<?=$iboxRow["id"];?>" type="text" id="g<?=$iboxRow["id"];?>" placeholder="Faks" class="form-control" value="<?PHP print unhtmlDBString2($iboxRow["x7"]);?>">
    </div>
    <div class="form-group">
        <label class="form-control-label">Çalışma Saatleri Pzt-Cuma</label>
        <input name="i<?=$iboxRow["id"];?>" type="text" id="i<?=$iboxRow["id"];?>" placeholder="Çalışma Saatleri Pzt-Cuma" class="form-control" value="<?PHP print unhtmlDBString2($iboxRow["x10"]);?>">
    </div>

    <div class="form-group">
        <label class="form-control-label">Çalışma Saatleri Cumartesi</label>
        <input name="d<?=$iboxRow["id"];?>" type="text" id="d<?=$iboxRow["id"];?>" placeholder="Çalışma Saatleri Cumartesi" class="form-control" value="<?PHP print unhtmlDBString2($iboxRow["x4"]);?>">
    </div>

    <div class="form-group">
        <label class="form-control-label">Çalışma Saatleri Pazar</label>
        <input name="e<?=$iboxRow["id"];?>" type="text" id="e<?=$iboxRow["id"];?>" placeholder="Çalışma Saatleri Pazar" class="form-control" value="<?PHP print unhtmlDBString2($iboxRow["x5"]);?>">
    </div>
    
    
    <div class="form-group">
        <label class="form-control-label">Google Map</label>
        <textarea name="h<?=$iboxRow["id"];?>" rows="5" class="form-control" id="e<?=$iboxRow["id"];?>"><?PHP print unhtmlDBString2($iboxRow["x8"]);?></textarea>
    </div>
    
    <div class="line"></div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </div>

      
</div>
</div>
</div>



<?php } ?>

</div>
</form>
</div>

<?PHP



if($_POST){

	include_once('../core/class/upload.php');
	


	

	$pi = 0;
	$queryy = "SELECT * FROM md_contact";
	$resultt = $getData->query($queryy);
	while($roww = $getData->fetch_array($resultt)){
	
	$pi++;
	
	
	
	if($pi==1){		
	$data = array("x1" => $_POST["a1"], "x2" => $_POST["b1"], "x3" => $_POST["c1"], "x4" => $_POST["d1"], "x5" => $_POST["e1"], "x6" => $_POST["f1"], "x7" => $_POST["g1"], "x8" => $_POST["h1"], "x10" => $_POST["i1"]);
	$adminEngine->updateDB("md_contact",$data, "id", $roww["id"]);
	}elseif($pi==2){
	$data2 = array("x1" => $_POST["a2"], "x2" => $_POST["b2"], "x3" => $_POST["c2"], "x4" => $_POST["d2"], "x5" => $_POST["e2"], "x6" => $_POST["f2"], "x7" => $_POST["g2"], "x8" => $_POST["h2"], "x10" => $_POST["i2"]);
	$adminEngine->updateDB("md_contact",$data2, "id", $roww["id"]);
	}elseif($pi==3){
	$data3 = array("x1" => $_POST["a3"], "x2" => $_POST["b3"], "x3" => $_POST["c3"], "x4" => $_POST["d3"], "x5" => $_POST["e3"], "x6" => $_POST["f3"], "x7" => $_POST["g3"], "x8" => $_POST["h3"], "x10" => $_POST["i3"]);
	$adminEngine->updateDB("md_contact",$data3, "id", $roww["id"]);
	}
	
	
	
	}



	//print_r($data);

	

		

	redirect("main.php?module=settings/contact&success");


	

	

}



?>

