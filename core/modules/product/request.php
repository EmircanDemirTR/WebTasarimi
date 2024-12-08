<?PHP

require_once("../../class/init.php");

if(isset($_POST["group"])){ $groupID = $_POST["group"]; }else{ $groupID = ""; }

if(isset($_POST["id"])){ $id = $_POST["id"]; }else{ $id = ""; }

$editID = explode("/",$id);

function parentSelectBoxMenu1($parent, $value = "", $editID, $editParent, $editGroup)
{
	GLOBAL $getData;
	
	$newID = $editID;
	
	$newParent = $editParent;
	
	$newGroup = $editGroup;
	
	if($parent != 0){ $value .= " - "; }
	
	$query = "SELECT * FROM md_page WHERE (page_group = '". $newGroup ."') AND (is_category = '1') AND (page_parent = '". $parent ."') AND (page_id != '". $newID ."') ORDER BY page_order ASC";

	$result = $getData->query($query);
	
	while($row = $getData->fetch_array($result)){

		if($parent == 0){
			
			$data .= '<option  value="'. $row["page_id"] .':*:'. $row["page_id"] .'"';

            if($newParent == $row["page_id"]){ $data .= " selected"; }

            $data .= '>'. $value . unhtmlDBString($row["page_title1"]) .'</option>';	

		} else {
			
			$data .= '<option value="'. $row["page_id"] .':*:'. $row["page_parent_root"] .'"';
			
			if($newParent == $row["page_id"]){ $data .= " selected"; }
			
			$data .= '>'. $value . unhtmlDBString($row["page_title1"]) .'</option>';	
			
		}
		
		$data .= parentSelectBoxMenu1($row["page_id"], $value, $newID, $newParent, $newGroup);
	
	} 
	
	return $data;
		
}



function parentSelectBoxMenu2($parent, $value = "", $groupID){
	
	GLOBAL $getData;
	
	if($parent != 0){ $value .= " - "; }
	
	$query = "SELECT * FROM md_page WHERE (page_group = '". $groupID ."') AND (is_category = '1') AND (page_parent = '". $parent ."') ORDER BY page_order DESC";

	$result = $getData->query($query);
	
	while($row = $getData->fetch_array($result)){
		
		if($parent == 0){
		
		$data .= '<option  value="'. $row["page_id"] .':*:'. $row["page_id"] .'">'. $value . unhtmlDBString($row["page_title1"]) .'</option>';
		
		} else {
		
		$data .= '<option  value="'. $row["page_id"] .':*:'. $row["page_parent_root"] .'">'. $value . unhtmlDBString($row["page_title1"]) .'</option>';
			
		}
		
		$data .= parentSelectBoxMenu2($row["page_id"], $value, $groupID);

	}
	
	return $data;
	
}


switch($_POST["proc"]){

	case "edit":

		print '<option value="0:*:0">/</option>'; 
	
		print parentSelectBoxMenu1(0, $value = "", $editID[0], $editID[1], $editID[2]);
	
	break;


	case "add":

		print '<option value="0:*:0">/</option>';
	
		print parentSelectBoxMenu2(0, $value = "", $id);
	
	break;

}


?>