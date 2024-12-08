<?PHP

if(isset($templateAccess)){ if($templateAccess != true){ die("Access ERROR!"); }
}else{ die("Access ERROR!"); }

if(empty($getData->pageData)){ 	die(redirect(rootPath()));  }




if($getData->pageData["page_parent"] == 0){

	if($getData->pageData["page_template"] != 1){
	
		$pageTemplate = $getData->selectDB("md_template", "template_id", $getData->pageData["page_template"]);
		
		include $pageTemplate["template_file"];
	
	} else {

?>

<?php if($getData->pageData["page_id"]=="1099"){ ?>
	<?php include "templates/d1.php";?>
<?php }elseif($getData->pageData["page_parent"]=="1094"){ ?>
	<?php include "templates/hizmet.php";?>
<?php }elseif($getData->pageData["page_parent"]=="1021"){ ?>
	<?php include "templates/urun.php";?>
<?php }else{ ?>
	<?php include "templates/content.php";?>
<?php } ?>


<?PHP 
	
	}

} else {
	
		if($getData->pageData["page_template"] != 1){
	
		$pageTemplate = $getData->selectDB("md_template", "template_id", $getData->pageData["page_template"]);
		
		include $pageTemplate["template_file"];
	
	} else {



?>

<?php if($getData->pageData["page_id"]=="1099"){ ?>
	<?php include "templates/d1.php";?>
<?php }elseif($getData->pageData["page_parent"]=="1094"){ ?>
	<?php include "templates/hizmet.php";?>
<?php }elseif($getData->pageData["page_parent"]=="1021"){ ?>
	<?php include "templates/urun.php";?>
<?php }else{ ?>
	<?php include "templates/content.php";?>
<?php } ?>


<?PHP } } ?>