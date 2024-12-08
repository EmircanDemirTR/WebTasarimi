<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=settings/define" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">
<?PHP print $adminEngine->processMessage(); ?>

<div class="row">

<div class="col-lg-4">
	<?php include "d1.php";?>
</div>
<div class="col-lg-4">
	<?php include "d2.php";?>
</div>
<div class="col-lg-4">
	<?php include "d3.php";?>
</div>

</div>

</form>
</div>



<?PHP

if($_POST){
	
	$data = array(	"sitename" => $_POST["sitename"],
					"ftext" => $_POST["ftext"],
					"fcopyright" => $_POST["fcopyright"],
					"sitenameEn" => $_POST["sitenameEn"],
					"ftextEn" => $_POST["ftextEn"],
					"fcopyrightEn" => $_POST["fcopyrightEn"],
					"sitenameAr" => $_POST["sitenameEs"],
					"ftextAr" => $_POST["ftextEs"],
					"fcopyrightAr" => $_POST["fcopyrightEs"],
					"sub" => $_POST["sub"],
					"subEn" => $_POST["subEn"],
					"subEs" => $_POST["subEs"],
					
					 );
	
	
	foreach($data as $fieldName => $fieldData){
		
		if(!$adminEngine->updateFieldDB("md_system", "data", $fieldData, "name", $fieldName)){
			
			redirect("main.php?module=settings/define&failed&" . $fieldData);
			
		}
			
	}	
	
	redirect("main.php?module=settings/define&success");
	
}

?>