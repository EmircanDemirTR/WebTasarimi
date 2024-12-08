<?PHP 

/**
 * @author Fikir Kahvesi
 * @copyright 2013
 */

if($getData->pageData["page_id"]=="403" or $getData->pageData["page_id"]=="375"){
if($_SESSION["user"]["login"] != true && $_SESSION["user"]["id"] == ""){
	
	redirect("uye-girisi.html?up=login");
	
	}			
}



?>