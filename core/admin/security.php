<?PHP 

/**
 * @author Fikir Kahvesi
 * @copyright 2013
 */

if($_SESSION["admin"]["login"] != true && $_SESSION["admin"]["admin_id"] == ""){
	
	redirect("index.php");
	exit();
	}			

?>