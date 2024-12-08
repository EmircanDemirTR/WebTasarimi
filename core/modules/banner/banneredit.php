<?PHP
if(!is_numeric($getData->siteConfig["getID"])){
	redirect("main.php?module=banner/bannerlist");
}

$editData = $getData->selectDB("md_banner","banner_id",$getData->siteConfig["getID"]); 
?>

<div class="col-lg-12">

<form class="form-horizontal" action="main.php?module=banner/banneredit&id=<?PHP print $getData->siteConfig["getID"]; ?>"  method="post" style="display:inline;">
<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">İçerik Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    <div class="btn-group" role="group"> <a class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" href="#"> Banner Bilgileri &nbsp; <span class="caret"></span> </a>
<?php if($editData["banner_id"]!="3"){ ?>
      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="main.php?module=banner/banneredit&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Banner Bilgileri</a>
        <a href="main.php?module=banner/bannerimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Banner Arkaplan Resmi</a>
        <a href="main.php?module=banner/layerimage&id=<?PHP print $getData->siteConfig["getID"];?>" class="dropdown-item">Banner Layer Resmi</a>
      </div>
<?php } ?>
    </div>

    <a href="main.php?module=banner/bannerlist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Banner Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>


<div class="col-lg-6">


<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">Banner Başlık</h3>
</div>
<div class="card-body">

<?php if($editData["banner_id"]!="3"){ ?>

    <div class="form-group row">
    	<div class="col-sm-9">
        <label class="form-control-label">Başlık 1</label>
        </div>
    	<div class="col-sm-3">
        <label class="form-control-label">Konum (px)</label>
        </div>
        <div class="col-sm-9">
        <input name="title_1" type="text" id="title_1" placeholder="Başlık 1" class="form-control" value="<?PHP print unhtmlDBString2($editData["title_1"]);?>">
        </div>
        <div class="col-sm-3">
        <input name="title_1_k" type="text" id="title_1_k" placeholder="Konum (px)" class="form-control" value="<?PHP print unhtmlDBString2($editData["title_1_k"]);?>">
        </div>
    </div>

    <div class="form-group row">
    	<div class="col-sm-9">
        <label class="form-control-label">Başlık 2</label>
        </div>
    	<div class="col-sm-3">
        <label class="form-control-label">Konum (px)</label>
        </div>
        <div class="col-sm-9">
        <input name="title_2" type="text" id="title_2" placeholder="Başlık 2" class="form-control" value="<?PHP print unhtmlDBString2($editData["title_2"]);?>">
        </div>
        <div class="col-sm-3">
        <input name="title_2_k" type="text" id="title_2_k" placeholder="Konum (px)" class="form-control" value="<?PHP print unhtmlDBString2($editData["title_2_k"]);?>">
        </div>
    </div>


    <div class="form-group row">
    	<div class="col-sm-9">
        <label class="form-control-label">Altyazı 1</label>
        </div>
    	<div class="col-sm-3">
        <label class="form-control-label">Konum (px)</label>
        </div>
        <div class="col-sm-9">
        <input name="slogan_1" type="text" id="slogan_1" placeholder="Altyazı 1" class="form-control" value="<?PHP print unhtmlDBString2($editData["slogan_1"]);?>">
        </div>
        <div class="col-sm-3">
        <input name="slogan_1_k" type="text" id="slogan_1_k" placeholder="Konum (px)" class="form-control" value="<?PHP print unhtmlDBString2($editData["slogan_1_k"]);?>">
        </div>
    </div>

    <div class="form-group row">
    	<div class="col-sm-9">
        <label class="form-control-label">Altyazı 2</label>
        </div>
    	<div class="col-sm-3">
        <label class="form-control-label">Konum (px)</label>
        </div>
        <div class="col-sm-9">
        <input name="slogan_2" type="text" id="slogan_2" placeholder="Altyazı 2" class="form-control" value="<?PHP print unhtmlDBString2($editData["slogan_2"]);?>">
        </div>
        <div class="col-sm-3">
        <input name="slogan_2_k" type="text" id="slogan_2_k" placeholder="Konum (px)" class="form-control" value="<?PHP print unhtmlDBString2($editData["slogan_2_k"]);?>">
        </div>
    </div>

    <div class="form-group row">
    	<div class="col-sm-9">
        <label class="form-control-label">Banner Link</label>
        </div>
    	<div class="col-sm-3">
        <label class="form-control-label">Konum (px)</label>
        </div>
        <div class="col-sm-9">
        <input name="banner_link" type="text" id="banner_link" placeholder="Banner Link" class="form-control" value="<?PHP print unhtmlDBString2($editData["banner_link"]);?>">
        </div>
        <div class="col-sm-3">
        <input name="banner_link_k" type="text" id="banner_link_k" placeholder="Konum (px)" class="form-control" value="<?PHP print unhtmlDBString2($editData["banner_link_k"]);?>">
        </div>
    </div>


    
    <div class="line"></div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </div>

<?php } ?>
      
</div>
</div>
</div>


<div class="col-lg-6">
<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">Banner Ayarlar</h3>
</div>
<div class="card-body">
    <div class="form-group">
        <label class="form-control-label">Banner İsmi</label>
        <input name="banner_name" type="text" id="banner_name" placeholder="Banner İsmi" class="form-control" value="<?PHP print unhtmlDBString2($editData["banner_name"]);?>">
    </div>




    <div class="form-group">
        <label class="form-control-label">Banner Öncelik</label>
        <input name="banner_order" type="text" id="banner_order" placeholder="Banner Öncelik" class="form-control" value="<?PHP print unhtmlDBString2($editData["banner_order"]);?>">
    </div>

    <div class="form-group">
        <label class="form-control-label">Banner Durum</label>
          <select name="banner_status" id="banner_status" class="form-control">
            <?PHP print $adminEngine->statusSelectBoxMenu($editData["banner_status"]); ?>
          </select>
    </div>
    

    
    <div class="line"></div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </div>

      
</div>
</div>
</div>










</div>
</form>
</div>




<?PHP



if($_POST){

	
	if($_POST["title_1_k"]==""){ $title_1_k = "0";}else{$title_1_k = $_POST["title_1_k"];}
	if($_POST["title_2_k"]==""){ $title_2_k = "0";}else{$title_2_k = $_POST["title_2_k"];}
	if($_POST["slogan_1_k"]==""){ $slogan_1_k = "0";}else{$slogan_1_k = $_POST["slogan_1_k"];}
	if($_POST["slogan_2_k"]==""){ $slogan_2_k = "0";}else{$slogan_2_k = $_POST["slogan_2_k"];}
	if($_POST["banner_link_k"]==""){ $banner_link_k = "0";}else{$banner_link_k = $_POST["banner_link_k"];}


	$data = array( 	"banner_name" => $_POST["banner_name"],	

					"title_1" => $_POST["title_1"],	
					"title_1_k" => $title_1_k,	
					"title_2" => $_POST["title_2"],	
					"title_2_k" => $title_2_k,	
					"slogan_1" => $_POST["slogan_1"],	
					"slogan_1_k" => $slogan_1_k,	
					"slogan_2" => $_POST["slogan_2"],	
					"slogan_2_k" => $slogan_2_k,	
					"banner_link" => $_POST["banner_link"],	
					"banner_link_k" => $banner_link_k,	
					"banner_status" => $_POST["banner_status"],	
					"banner_order" => $_POST["banner_order"],	
					 );

	

	if ($adminEngine->updateDB("md_banner",$data, "banner_id", $getData->siteConfig["getID"])){

		redirect("main.php?module=banner/banneredit&id=". $getData->siteConfig["getID"] ."&success");

	}else{

		redirect("main.php?module=/banneredit&id=". $getData->siteConfig["getID"] ."&failed");

	}

}

?>