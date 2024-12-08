

<?PHP $getProfile = $getData->selectDB("md_administrator","admin_id",$_SESSION["admin"]["admin_id"]); ?>




<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=profile/account"  method="post" style="display:inline;">

<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">Hesabım&nbsp;&nbsp;&nbsp;</h3>
	  
    
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
        <label class="form-control-label">Ad</label>
        <input name="p1" type="text"  id="p1" placeholder="Ad" class="form-control" value="<?PHP print $getProfile["admin_fname"];?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Soyad</label>
        <input name="p2" type="text"  id="p2" placeholder="Soyad" class="form-control" value="<?PHP print $getProfile["admin_lname"];?>">
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
        <h3 class="h4">&nbsp;</h3>
      </div>

<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">Email</label>
        <input name="p3" type="text"  id="p3" placeholder="Email" class="form-control" value="<?PHP print $getProfile["admin_email"];?>">
      </div>

      <div class="form-group">
        <label class="form-control-label">Şifre</label>
        <input name="p4" type="password"  id="p4" placeholder="Şifre" class="form-control" value="<?PHP print $getProfile["admin_pass"];?>">
      </div>



</div>
</div>



</div>




</div>
</div>


</form>








<?PHP

if($_POST){
	
	$data = array(	"admin_fname" => $_POST["p1"],
					"admin_lname" => $_POST["p2"],
					"admin_email" => $_POST["p3"],
					"admin_pass" => $_POST["p4"] );
	
		if(!$adminEngine->updateDB("md_administrator", $data, "admin_id", $_SESSION["admin"]["admin_id"])){
			
			redirect("main.php?module=profile/account&failed&" . $fieldData);
			
		} else {
			
			$_SESSION["admin"]["admin_fname"] = $_POST["p1"];
			
			$_SESSION["admin"]["admin_lname"] = $_POST["p2"];
			
			redirect("main.php?module=profile/account&success");
			
		}
		
}

?>