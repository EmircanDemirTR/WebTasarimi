<?php


class getData {
    
    private $databaseConnection;
    
	public $siteConfig = array();
    
	public $pageData = array();
	
	public $pageTitle;
    
    public function __construct()
    {
        GLOBAL $db_host;
		
		GLOBAL $db_user;
        
		GLOBAL $db_pass;
        
		GLOBAL $db_name;
        
		GLOBAL $_GET;

		$this->connect($db_host, $db_user, $db_pass, $db_name);
        
        /*
        $sqlCharset = 'SET NAMES "utf8" COLLATE "utf8_turkish_ci",'
                 . 'character_set_client = "utf8", '
                 . 'character_set_results = "utf8", ' 
                 . 'character_set_connection = "utf8", ' 
                 . 'character_set_server = "utf8", ' 
                 . 'character_set_database = "utf8" ';
                 
		$sqlCharsetResult = $this->query(sqlCharset);
        */
        
        $query = "SELECT * FROM md_system ORDER BY id ASC";
        $getSiteQuery = $this->query($query);
        while ($getQueryData = $this->fetch_array($getSiteQuery)){
            $this->siteConfig[$getQueryData["name"]] = unhtmlDBString($getQueryData["data"]);
        }
        
        $this->getID();

        $this->getUrlID();

		$this->groupID();

		$this->adminGroupID();

        $this->section();
        
        $this->getURL();
        
        $this->getSection();

		$this->adminModule();
		
		switch($this->section()){
			
			
			case "page":
				$this->siteConfig["template"] = "default.php";
				$this->pageData = $this->selectDB("md_page", "page_id", $this->getUrlID());
				$this->getMeta("DP", $this->pageData);
			break;

			case "product":
				$this->siteConfig["template"] = "product.php";
				$this->pageData = $this->selectDB("md_page", "page_id", $this->getUrlID());
				$this->getMeta("DP", $this->pageData);
			break;

			case "news":
				$this->siteConfig["template"] = "newsDetail.php";
				$this->pageData = $this->selectDB("md_page", "page_id", $this->getUrlID());
				$this->getMeta("DP", $this->pageData);
			break;

			case "blog":
				$this->siteConfig["template"] = "blogDetail.php";
				$this->pageData = $this->selectDB("md_page", "page_id", $this->getUrlID());
				$this->getMeta("DP", $this->pageData);
			break;

			case "galeri":
				$this->siteConfig["template"] = "galleryDetail.php";
				$this->pageData = $this->selectDB("md_page", "page_id", $this->getUrlID());
				$this->getMeta("DP", $this->pageData);
			break;

			case "productt":
				$this->siteConfig["template"] = "prodcutt.php";
				$this->pageData = $this->selectDB("md_page", "page_id", $this->getUrlID());
				$this->getMeta("DP", $this->pageData);
			break;

			case "sert":
				$this->siteConfig["template"] = "sertDet.php";
				$this->pageData = $this->selectDB("md_page", "page_id", $this->getUrlID());
				$this->getMeta("DP", $this->pageData);
			break;
			
			
			default:
				$this->siteConfig["template"] = "home.php";
				$this->getMeta();
			break;
		
		}
	
	}
	
	
    public function __destruct()
    {
	   /**/
    }

    public function connect($db_host, $db_user, $db_pass, $db_name)
    {
        $this->databaseConnection = mysqli_connect($db_host, $db_user, $db_pass);
		$databaseCharset = 'SET NAMES "utf8" COLLATE "utf8_turkish_ci",'
                         . 'character_set_client = "utf8", '
                         . 'character_set_results = "utf8", ' 
                         . 'character_set_connection = "utf8", ' 
                         . 'character_set_server = "utf8", ' 
                         . 'character_set_database = "utf8" ';
       $dCharsetResult = mysqli_query($this->databaseConnection, $databaseCharset);
        if (!mysqli_select_db($this->databaseConnection,$db_name)) {
		    die($this->errorMessage('Veritabaný Hatasý', mysqli_connect_errno(), 'error'));
		}
	}
	
    public function query($query)
	{
        if ($control = mysqli_query($this->databaseConnection, $query)){
            return $control;
        }else{
		    die($this->errorMessage('Sorgu Hatasý'));
        }
	}
	
	
	public function result($data)
	{
		return mysql_result($data);	
}
	
	
    public function fetch_array($data)
    {
	    return mysqli_fetch_array($data, MYSQLI_ASSOC);
	}
	
	
    public function fetch_assoc($data)
    {
		return mysqli_fetch_assoc ($data);
	}
    
    
	public function numrows($data)
	{
		return mysqli_num_rows($data);	
    }

	
    
    public function importLibJS($data)
    {
        return '<script type="text/javascript" src="https://soloteknoloji.com.tr/'. rootPath() .'core/libraries/'. $data .'"></script>'; 
    }
    
    public function importLibCSS($data)
    {
        return '<link rel="stylesheet" type="text/css" href="https://soloteknoloji.com.tr/'. rootPath() .'core/libraries/'. $data .'"/>'; 
    }
    
    public function importThemeJS($data)
    {
        return '<script type="text/javascript" src="https://soloteknoloji.com.tr/'. rootPath() .'theme/js/'. $data .'"></script>'; 
    }
    
    public function importThemeCSS($data)
    {
        return '<link rel="stylesheet" type="text/css" href="https://soloteknoloji.com.tr/'. rootPath() .'theme/css/'. $data .'"/>'; 
    }
    
	public function getIP()
    {
        return getenv("REMOTE_ADDR");
    }
    
    
    public function getDate()
    {
        return date("Y-m-d H:i:s");
    }
    
    
    public function getUserAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }
    
    
	public function close()
    {
		mysqli_close($this->databaseConnection);
        ob_end_flush();
        return;
    }
    
	
	public function getMeta($section = "", $data = "")
	{
		
		switch($section){
		
		case "CT":
			$this->siteConfig["getTitle"] = $data["category_title1"] . " | " . $this->siteConfig["title"];
			$this->siteConfig["getSubTitle"] = $data["category_title1"];
			$this->siteConfig["getKeywords"] = $data["category_keywords"];
			$this->siteConfig["getDescriptions"] = $data["category_descriptions"];
		break;
		
		case "PR":
			$this->siteConfig["getTitle"] = $data["product_title1"] . " | " . $this->siteConfig["title"];
			$this->siteConfig["getSubTitle"] = $data["product_title1"];
			$this->siteConfig["getKeywords"] = $data["product_keywords"];
			$this->siteConfig["getDescriptions"] = $data["product_descriptions"];
		break;
		
		
		case "DP":
			$this->siteConfig["getTitle"] = $data["page_title1"] . " | " . $this->siteConfig["title"];
			$this->siteConfig["getSubTitle"] = $data["page_title1"];
			
			if($data["page_keywords"]==""){
				$this->siteConfig["getKeywords"] = $this->siteConfig["keywords"];
			}else{
				$this->siteConfig["getKeywords"] = $data["page_keywords"];
			}
			
			if($data["page_descriptions"]==""){
				$this->siteConfig["getDescriptions"] = $this->siteConfig["descriptions"];
			}else{
				$this->siteConfig["getDescriptions"] = $data["descriptions"];
			}
			
		break;


		
		default:
			$this->siteConfig["getTitle"] = $this->siteConfig["title"];
			$this->siteConfig["getSubTitle"] = $this->siteConfig["title"];
			$this->siteConfig["getKeywords"] = $this->siteConfig["keywords"];
			$this->siteConfig["getDescriptions"] = $this->siteConfig["descriptions"];
		break;
		
	}

		
	}
	
	
	
	public function getID()
	{
		if(isset($_GET["id"])){
            $this->siteConfig["getID"] = getDBString($_GET["id"]);  
        }else{ 
            $this->siteConfig["getID"] = ""; 
        }
		
		return $this->siteConfig["getID"];
	}


    
	public function getUrlID()
	{
		if($this->getURL()){
            $this->siteConfig["getUrlID"] = $this->getURL();  
        }else{ 
            $this->siteConfig["getUrlID"] = ""; 
        }
		
		return $this->siteConfig["getUrlID"];
	}
    
	
	public function groupID()
	{
		if($this->getURL()){
            $this->siteConfig["groupID"] = $this->getURL();  
        }else{ 
            $this->siteConfig["groupID"] = ""; 
        }
		
		return $this->siteConfig["groupID"];
	}
    
	

	public function adminGroupID()
	{
		if(isset($_GET["group"])){
            $this->siteConfig["adminGroupID"] = getDBString($_GET["group"]);  
        }else{ 
            $this->siteConfig["adminGroupID"] = ""; 
        }
		
		return $this->siteConfig["adminGroupID"];
	}

	
	public function section()
	{
		if($this->getSection()){
            $this->siteConfig["section"] = $this->getSection();  
        }else{ 
            $this->siteConfig["section"] = ""; 
        }
		
		return $this->siteConfig["section"];
	}
    

	public function getURL()
	{
		if(isset($_GET["url"])){
			
			$urlL = explode(".html",$_GET["url"]);
			
			if($_GET["lang"]=="tr"){
				$langSlug = "page_slug";
			}elseif($_GET["lang"]=="en"){
				$langSlug = "page_slug2";
			}elseif($_GET["lang"]=="es"){
				$langSlug = "page_slug2";
			}
			
			$urlQuery = "SELECT * FROM md_page WHERE (".$langSlug." = '".escapeDBString($this->databaseConnection,$urlL["0"])."')";
			$urlResult = $this->query($urlQuery);
			$urlCount = $this->numrows($urlResult);
			$urlRow = $this->fetch_array($urlResult);
			
			if($urlCount=="1"){
				$getInfID =  $urlRow["page_id"]; 
			}else{
				$getInfID = "";
			}
			 
        }else{ 
            $getInfID = ""; 
        }
		
		return $getInfID;
	}



	public function getSection()
	{
		if(isset($_GET["url"])){

			$urlL = explode(".html",$_GET["url"]);

			if($_GET["lang"]=="tr"){
				$langSlug = "page_slug";
			}elseif($_GET["lang"]=="en"){
				$langSlug = "page_slug2";
			}elseif($_GET["lang"]=="es"){
				$langSlug = "page_slug2";
			}
			
			$sectionQuery = "SELECT * FROM md_page WHERE (".$langSlug." = '".escapeDBString($this->databaseConnection,$urlL["0"])."')";
			$sectionResult = $this->query($sectionQuery);
			$sectionCount = $this->numrows($sectionResult);
			$sectionRow = $this->fetch_array($sectionResult);
			
			if($sectionCount=="1"){
				$getSection =  $sectionRow["page_type"]; 
			}else{			
            $getSection = "";
			}
			 
        }else{ 
            $getSection = ""; 
        }
		
		return $getSection;
	}



	
	public function adminModule()
	{
		if(isset($_GET["module"])){ 
            $this->siteConfig["adminModule"] = htmlDBString($_GET["module"]); 
        }else{ 
            $this->siteConfig["adminModule"] = ""; 
        }
		
		return $this->siteConfig["adminModule"];
	}
	
	
	public function errorMessage($title, $text)
    {
	   return '<div class="error_message"><span class="error_message_title">' . $title . '</span><span class="error_message_text">' . $text . '</span></div>';
    }
    
    
    public function selectDB($tableName, $fieldName, $fieldValue)
    {
		$query = "SELECT * FROM " . $tableName . " WHERE (". $fieldName ." = '". $fieldValue ."')";
		$result = $this->query($query);
		$data = $this->fetch_array($result);
		return $data;
	}

    public function selectPDB($tableName, $fieldName, $fieldValue, $fieldName2, $fieldValue2)
    {
		$query = "SELECT * FROM " . $tableName . " WHERE (". $fieldName ." = '". $fieldValue ."') AND (". $fieldName2 ." = '". $fieldValue2 ."')";
		$result = $this->query($query);
		$data = $this->fetch_array($result);
		return $data;
	}


    public function insertDB($tableName, $data)
    {
        foreach($data as $key => $value){
            $fieldName .= $key . ",";
            $fieldValue .= "'" . htmlDBString($value) . "',"; 
        }
        
        $fieldName = substr($fieldName, 0 , -1);
        $fieldValue = substr($fieldValue, 0 , -1); 
        
        $query = "INSERT INTO ". $tableName ." (". $fieldName .") VALUES (". $fieldValue .")";
        $result = $this->query($query);
        if($result){
            return true;
        }else{
            return false;
        }
        
    }


    public function insertDBID($tableName, $data)
    {
        foreach($data as $key => $value){
            $fieldName .= $key . ",";
            $fieldValue .= "'" . htmlDBString($value) . "',"; 
        }
        
        $fieldName = substr($fieldName, 0 , -1);
        $fieldValue = substr($fieldValue, 0 , -1); 
        
        $query = "INSERT INTO ". $tableName ." (". $fieldName .") VALUES (". $fieldValue .")";
        $result = $this->query($query);
		
        if($result){
			$data = mysqli_insert_id($this->databaseConnection);
            return $data;
        }else{
            return false;
        }
        
    }


    
    public function updateDB($tableName, $data, $fieldName, $fieldValue)
    {
		foreach ($data as $key => $value){
			$fieldData .= $key . "=" . "'" . htmlDBString($value) . "',";
		}
        
        $fieldData = substr($fieldData, 0, - 1);
        
        $query = "UPDATE ". $tableName ." SET ". $fieldData ." WHERE (". $fieldName ." = '". $fieldValue ."')";
		$result = $this->query($query);
		if($result){
		    return true;
		}else{
			return false;
		}
	}
	
	
    public function updateFieldDB($tableName, $fieldDataName, $fieldData, $fieldName, $fieldValue)
    {

        $query = "UPDATE ". $tableName ." SET  ". $fieldDataName ." = '". htmlDBString($fieldData) ."' WHERE (". $fieldName ." = '". $fieldValue ."')";
	   	$result = $this->query($query);
		if($result){
		    return true;
		}else{
			return false;
		}
	}
    
        
    public function deleteDB($tableName, $fieldName, $fieldValue)
    {
		$query = "DELETE FROM ". $tableName ." WHERE (". $fieldName ." = '". $fieldValue ."')";
		$result = $this->query ($query);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}
	

	public function urlCleaner($data)
    {
        $before = array("ç","Ç","ı","İ","ş","Ş","ğ","Ğ","ö","Ö","ü","Ü");    
    	$after  = array("c","c","i","i","s","s","g","g","o","o","u","u");
    	$data = str_replace($before, $after, $data);
		$data = strtolower($data);
		$data = preg_replace("#[^-a-zA-Z0-9_ ]#", "", $data);
		$data = trim($data);
    	$data = preg_replace("#[-_ ]+#", "-", $data);
        return $data;
    }
    
    
    public function urlCreate($id,$title,$section)
    {
		
			if($_GET["lang"]=="tr"){
				$langSlug = "page_slug";
			}elseif($_GET["lang"]=="en"){
				$langSlug = "page_slug2";
			}elseif($_GET["lang"]=="es"){
				$langSlug = "page_slug2";
			}
					
			$subCQuery = "SELECT * FROM md_page WHERE (page_id = '".$id."')";
			$subCResult = $this->query($subCQuery);
			$subProRow = $this->fetch_array($subCResult);

		
			$url = rootPath() . $subProRow[$langSlug].".html";
        return $url;
	}


    public function urlCreateLang($id,$langS)
    {
		
			if($langS=="tr"){
				$langSlug = "page_slug";
			}elseif($langS=="en"){
				$langSlug = "page_slug2";
			}elseif($langS=="es"){
				$langSlug = "page_slug2";
			}
					
			$subCQuery = "SELECT * FROM md_page WHERE (page_id = '".$id."')";
			$subCResult = $this->query($subCQuery);
			$subProRow = $this->fetch_array($subCResult);

		
			$url = "/".$langS."/".$subProRow[$langSlug].".html";
        return $url;
	}

	
	public function ImgControlSLIDER($data,$w,$h)
	{
		if(file_exists("core/uploads/product/" . $data)){
			return '<img src="'. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../uploads/gallery/'. $data .'&w='. $w .'&h='. $h .'&zc=1&q=100" alt="">';
		}else{
			return '<img src="'. rootPath() .'theme/images/noimage.jpg" alt="">';
		}
		
	}
	
	public function BgControl($data,$w,$h)
	{
		if(file_exists("core/uploads/gallery/" . $data)){
			return ''. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../uploads/gallery/'. $data .'&w='. $w .'&h='. $h .'&zc=1&q=100';
		}else{
			return ''. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../../theme/images/noimage.jpg&w='. $w .'&h='. $h .'&zc=1&q=100';
		}
		
	}
	public function pageProfilImg($data,$w,$h)
	{
		if(file_exists("core/uploads/page/images/" . $data)){
			return '<img src="'. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../uploads/page/images/'. $data .'&w='. $w .'&h='. $h .'&zc=1&q=100">';
		}else{
			return '<img src="'. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../../theme/images/noimage.jpg&w='. $w .'&h='. $h .'&zc=1&q=100">';
		}
			
	}
	public function pageProfilImg3($data,$w,$h)
	{
		if(file_exists("core/uploads/page/images/" . $data)){
			return '<img src="'. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../uploads/page/images/'. $data .'&w='. $w .'&h='. $h .'&zc=1&q=100">';
		}else{
			return '<img src="'. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../../theme/images/noimage.jpg&w='. $w .'&h='. $h .'&zc=1&q=100">';
		}
			
	}
	public function pageMenuImg($data,$w,$h)
	{
		if(file_exists("core/uploads/page/images/" . $data)){
			return '<img src="'. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../uploads/page/images/'. $data .'&w='. $w .'&h='. $h .'&zc=1&q=100">';
		}else{
			return '<img src="'. rootPath() .'theme/images/noimage.jpg" alt="">';
		}
			
	}

	public function galleryImg($data,$w,$h)
	{
		if(file_exists("core/uploads/gallery/" . $data)){
			return '<img src="'. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../uploads/gallery/'. $data .'&w='. $w .'&h='. $h .'&zc=1&q=100&f=png">';
		}else{
			return '<img src="'. rootPath() .'theme/images/noimage.jpg" alt="">';
		}
			
	}
	
	public function pageBGImg()
	{
		
		$imgName = "bg_".$this->pageData["page_id"].".jpg";
		
		if(file_exists("core/uploads/page/images/" . $imgName)){
			return rootPath() .'core/uploads/page/images/'. $imgName;
		}elseif($this->pageData["page_group"]=="23"){
			$imgName2 = "bg_336.jpg";
			return rootPath() .'core/uploads/page/images/'. $imgName2;
		}elseif($this->pageData["page_group"]=="22"){
			$imgName2 = "bg_335.jpg";
			return rootPath() .'core/uploads/page/images/'. $imgName2;
		}elseif($this->pageData["page_group"]=="21"){
			$imgName2 = "bg_334.jpg";
			return rootPath() .'core/uploads/page/images/'. $imgName2;
		}else{
		$imgName2 = "bg_".$this->pageData["page_parent_root"].".jpg";
			return rootPath() .'core/uploads/page/images/'. $imgName2;
		}
			
	}

//////////////////////////// PAGE CLASS ////////////////////////////


	public function mainSlider()
	{
	
		$query = "SELECT * FROM md_images WHERE (image_gallery = '2') ORDER BY image_order ASC LIMIT 20";
		
		$result = $this->query($query);
		
		while($row = $this->fetch_array($result)){
				
							
				$data .= '
				<li>
					<img src="core/uploads/gallery/'.$row["image_name"].'"/>
					<div class="capcontain">
						<div class="slidetitle">
							<h2>'.unhtmlDBString($row["image_title1"]).'</h2>
							<a href="'.$row["image_link"].'" class="slidecat">Devamını Oku</a>
						</div>
					</div>
				</li>
				';
			
			
		}
		
		return $data;
		
	}
	

	public function tabContent($ID)
	{
		$query = "SELECT * FROM md_page WHERE (page_group = '".$ID."') AND (page_parent = '0') AND (page_status = '1') ORDER BY page_order ASC LIMIT 12";
		
		$result = $this->query($query);
		$x = "0";
		while($row = $this->fetch_array($result)){
			
			$imageName = "pm_".$row["page_id"].".jpg";
			$x++;
			
			//if(($x%4)=="0"){ $data .='<li style="background:none">'; }else{ 
			$data .='<li>'; 
			//}
			
			$data .='<div class="iCarouselImage"><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'">'.$this->pageProfilImg3($imageName,'191','128').'</a></div> 
                     <div id="iCarouselTitle"><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'">'.$row["page_title1"].'</a></div>
                     <div style="clear:both;"></div>
                     <div id="iCarouselText"><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'">'.$row["page_content1"].'</a></div>
                     <div class="iCarouselBtn"><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'"><img src="theme/images/tab-btn.png" /></a></div>
                     </li>';
				
		}
		return $data;
	}
	


	public function partnersCarousel()
	{
	
		$query = "SELECT * FROM md_images WHERE (image_gallery = '48') ORDER BY image_order ASC LIMIT 20";
		
		$result = $this->query($query);
		
		while($row = $this->fetch_array($result)){
				
							
				$data .= '<li><div data-background="'.$this->BgControl($row["image_name"],'1920','452').'" class="sl-background"></div></li>
				';
			
			
		}
		
		return $data;
		
	}

	public function partnersLogos($ID)
	{
	
		$query = "SELECT * FROM md_images WHERE (image_gallery = '".$ID."') ORDER BY image_order ASC LIMIT 20";
		
		$result = $this->query($query);
		
		while($row = $this->fetch_array($result)){
				
							
				$data .= '<a href="#">'.$this->galleryImg($row["image_name"],'160','80').'</a>';
			
			
		}
		
		return $data;
		
	}
	
	public function showPageGroup() {
	
		$query = "SELECT page_group  FROM md_page WHERE (page_id = '".$this->pageData["page_id"]."')";
		$result = $this->query($query);
		$row = $this->fetch_array($result);

		$groupQuery = "SELECT group_title1  FROM md_page_group WHERE (group_id = '".$row["page_group"]."')";
		$groupResult = $this->query($groupQuery);
		$groupRow = $this->fetch_array($groupResult);
		
		$groupTitle = $groupRow["group_title1"];



	return $groupTitle;
	}


	public function getBreadPath($pageID) {
	
		$query = "SELECT page_parent  FROM md_page WHERE (page_id = '".$pageID."')";
		$result = $this->query($query);
		$row = $this->fetch_array($result);


		$path = array();
		
		if ($row['page_parent']!='0'){
			$path[]= $row['page_parent'];
			$path = array_merge($this->getBreadPath($row['page_parent']), $path);
		}

	return $path;
	}
	
	
	
	public function breadCrumb($pageID)
	{	

	$breadCrumbs = $this->getBreadPath($pageID);
	
	
	
	//$data .= '<li><a href="'.rootPath().'"><i class="fa fa-home"></i></a></li>';
	///$data .= '<a href="'.rootPath().'">'.$this->showPageGroup().'</a><i class="icon-angle-right"></i>';
	
	foreach($breadCrumbs as $bPageID){

	$query = "SELECT *  FROM md_page WHERE (page_status = '1') AND (page_id = '".$bPageID."')";
	$result = $this->query($query);
	$row = $this->fetch_array($result);
	
	if($row["page_id"]=="1520" or $row["page_id"]=="1528" or $row["page_id"]=="1536" or $row["page_id"]=="1548"){
		
		
	$query2 = "SELECT *  FROM md_page WHERE (page_status = '1') AND (page_parent = '".$row["page_id"]."')";
	$result2 = $this->query($query2);
	$row2 = $this->fetch_array($result2);
		
	$data .= '<li class="breadcrumb-item"><a href="'.$this->urlCreate($row2["page_id"],$row2["page_title1"],"DP").'">'.upperCase($row['page_title'.contentLang()]).'</a></li>';
	}else{
	$data .= '<li class="breadcrumb-item"><a href="'.$this->urlCreate($row["page_id"],$row["page_title1"],"DP").'">'.upperCase($row['page_title'.contentLang()]).'</a></li>';
	}
		
	}
	$data .= '<li class="breadcrumb-item active" aria-current="page">'.upperCase($this->pageData["page_title".contentLang()]).'</li>';
	
	return $data;
	
	}
	

////////////////////////


	public function breadCrumbProduct($pageID)
	{	

	$breadCrumbs = $this->getBreadPath($pageID);
	
	
	
	//$data .= '<li><a href="'.rootPath().'"><i class="fa fa-home"></i></a></li>';
	///$data .= '<a href="'.rootPath().'">'.$this->showPageGroup().'</a><i class="icon-angle-right"></i>';
	
	foreach($breadCrumbs as $bPageID){

	$query = "SELECT *  FROM md_page WHERE (page_status = '1') AND (page_id = '".$bPageID."')";
	$result = $this->query($query);
	$row = $this->fetch_array($result);
	
	if($row["page_id"]=="1520" or $row["page_id"]=="1528" or $row["page_id"]=="1536" or $row["page_id"]=="1548"){
		
		
	$query2 = "SELECT *  FROM md_page WHERE (page_status = '1') AND (page_parent = '".$row["page_id"]."')";
	$result2 = $this->query($query2);
	$row2 = $this->fetch_array($result2);
		
	$data .= '<li class="breadcrumb-item"><a href="'.$this->urlCreate($row2["page_id"],$row2["page_title1"],"DP").'">'.$row['page_title'.contentLang()].'</a></li>';
	}else{
	$data .= '<li class="breadcrumb-item"><a href="'.$this->urlCreate($row["page_id"],$row["page_title1"],"DP").'">'.upperCase($row['page_title'.contentLang()]).'</a></li>';
	}
		
	}
	
  $countQuery = "SELECT * FROM md_page WHERE (page_id = '".$pageID."')";
  $countResult = $this->query($countQuery);
  $countRow = $this->fetch_array($countResult);

	
	$data .= '<li class="breadcrumb-item"><a href="'.$this->urlCreate($countRow["page_id"],$countRow["page_title1"],"DP").'">'.upperCase($countRow["page_title".contentLang()]).'</a></li>';

	$data .= '<li class="breadcrumb-item active" aria-current="page">'.upperCase($this->pageData["page_title".contentLang()]).'</li>';
	
	return $data;
	
	}

	
	
	
	
	public function ImgControlPR($data,$w,$h)
	{
		if(file_exists("core/uploads/product/" . $data)){
			return '<img src="'. rootPath() .'core/libraries/ptm/phpThumb.php?src=../../uploads/product/'. $data .'&w='. $w .'&h='. $h .'&zc=1&q=100" alt="">';
		}else{
			return '<img src="'. rootPath() .'theme/images/noimage.jpg" alt="">';
		}
		
	}

	
	

	public function mainMenu()
	{
		
		
		if(homeLangg()=="/tr/"){
			$homeL = "ANASAYFA";
		}elseif(homeLangg()=="/en/"){
			$homeL = "HOME";
		}
		
		
		$data = '';
		
		$data .='<li class="main-menu__item"><a class="main-menu__link" href="'.homeLangg().'"><i class="fa fa-home"></i></a></li>';
		
		$query = "SELECT * FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_parent = '0') ORDER BY page_order ASC";
		$result = $this->query($query);
		while($row = $this->fetch_array($result)){

				$PLquery = "SELECT *  FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_parent = '". $row["page_id"] ."')  ORDER BY page_order ASC";
				$PLresult = $this->query($PLquery);
				$PLcount = $this->numrows($PLresult);
			
			if($row["page_id"]=="1095"){		
					$data .= '<li class="main-menu__item main-menu__item--has-child">';	
					$data .= '<a href="javascript:void(0);" class="main-menu__link"><span>'. unhtmlDBString($row["page_title".contentLang()]) .'</span></a>';	
			}elseif($PLcount !="0"){	
			 
				 if($row["page_url"]!=""){
					$data .= '<li class="main-menu__item main-menu__item--has-child"><a href="'.$row["page_url"].'" class="main-menu__link"><span>'. upperCase(unhtmlDBString($row["page_title".contentLang()])) .'</span></a>';	
				 }else{
					$data .= '<li class="main-menu__item main-menu__item--has-child"><a href="javascript:void(0);" class="main-menu__link"><span>'. upperCase(unhtmlDBString($row["page_title".contentLang()])) .'</span></a>';	
				 }
					
			}else{

				 if($row["page_url"]!=""){
					$data .= '<li class="main-menu__item"><a class="main-menu__link" href="'.$row["page_url"].'">'. upperCase(unhtmlDBString($row["page_title".contentLang()])) .'</a>';	
				 }else{
					$data .= '<li class="main-menu__item"><a class="main-menu__link" href="'. $this->urlCreate($row["page_id"],$row["page_title".contentLang()],"DP") .'">'. upperCase(unhtmlDBString($row["page_title".contentLang()])) .'</a>';
				 }
					
			}
			
						
			
						
			
			$Pquery = "SELECT *  FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_parent = '". $row["page_id"] ."')  ORDER BY page_order ASC";
			$Presult = $this->query($Pquery);
			$Pcount = $this->numrows($Presult);
			
			if($row["page_id"]=="1095"){ 
			
					$data .= '<ul class="main-menu__sub-list">';
									 
									 
					$proQuery = "SELECT * FROM md_page WHERE (is_category = '1') AND (page_group = '3') AND (page_parent = '0') ORDER BY page_order ASC";
					$proResult = $this->query($proQuery);
					$proCount = $this->numrows($proResult);
					while($proRow = $this->fetch_array($proResult)){
						
						$data .= '<li><a href="'.$this->urlCreate($proRow["page_id"],$proRow["page_title".contentLang()],"DP").'"><span>'. unhtmlDBString($proRow["page_title".contentLang()]) .'</span></a></li>';
						
					}
									 
					$data .='</ul></li>';				 
							  
			}elseif($Pcount=="0"){ $data .= '</li>'; 
			}else{ $data .= '<ul class="main-menu__sub-list">'; 
			}


			
			while($Prow = $this->fetch_array($Presult)){
				
				 if($Prow["page_url"]==''){
					$data .= '<li><a href="'. $this->urlCreate($Prow["page_id"],$Prow["page_title1"],"DP") .'"><span>'.$Prow["page_title".contentLang()].'</a></span></a></li>';
				 }else{
					$data .= '<li><a href="'.$Prow["page_url"].'"><span>'. unhtmlDBString($Prow["page_title".contentLang()]) .'</a></span></a></li>';	
				 }

				
				

			}

			if($Pcount>="1"){ $data .= '</ul></li>'; }
			
		}

		//$data .='</ul>';

		
		return $data;
	}
	




	public function mainMenuAyaz()
	{
		
		
		
		$data = '<ul id="main-header-menu">';
		
		
		//$data .='<li><a href="/">ANASAYFA</a></li>';
		
		$query = "SELECT * FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_parent = '0') ORDER BY page_order ASC";
		$result = $this->query($query);
		while($row = $this->fetch_array($result)){

					

			 if($row["page_url"]!=""){
				$data .= '<li><a href="'.$row["page_url"].'">'. upperCase(unhtmlDBString($row["page_title1"])) .'</a>';	
			 }else{
				$data .= '<li><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'">'. upperCase(unhtmlDBString($row["page_title1"])) .'</a>';
			 }

						
			
						
			
		}

		$data .='</ul>';
		

		/*$queryC = "SELECT * FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_id = '376') ORDER BY page_order ASC";
		$resultC = $this->query($queryC);
		$rowC = $this->fetch_array($resultC);

		
		$data .='<a href="'. $this->urlCreate($rowC["page_id"],$rowC["page_title1"],"DP") .'" class="head-btn">'. upperCase(unhtmlDBString($rowC["page_title1"])) .'</a>';*/
		

		
		return $data;
	}



	public function mainMenuu($start, $limit)
	{
		
		$x = 0;
		
		$data = '<ul class="nav-menu">';
		//if($start=="0"){
		//$data .='<li><a href="/">ANASAYFA</a></li>';
		//}

		
		$query = "SELECT * FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_parent = '0') ORDER BY page_order ASC LIMIT " . $start . ", " . $limit . "";
		$result = $this->query($query);
		while($row = $this->fetch_array($result)){
		$x++;	

		
		
		
			$PLquery = "SELECT *  FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_parent = '". $row["page_id"] ."')  ORDER BY page_order ASC";
			$PLresult = $this->query($PLquery);
			$PLcount = $this->numrows($PLresult);
			
			if($PLcount !="0"){	
				 if($row["page_url"]!=""){
					$data .= '<li><a href="'.$row["page_url"].'">'. upperCase(unhtmlDBString($row["page_title1"])) .'</a>';	
				 }else{
					$data .= '<li class="current-menu-item menu-item-has-children"><a href="javascript:void(0);">'. upperCase(unhtmlDBString($row["page_title1"])) .'</a>';	
				 }
			}else{
				 if($row["page_url"]!=""){
					$data .= '<li><a href="'.$row["page_url"].'">'. upperCase(unhtmlDBString($row["page_title1"])) .'</a>';	
				 }else{
					$data .= '<li><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'">'. upperCase(unhtmlDBString($row["page_title1"])) .'</a>';
				 }
			}
			
						
			
						
			
			$Pquery = "SELECT *  FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_parent = '". $row["page_id"] ."')  ORDER BY page_order ASC";
			$Presult = $this->query($Pquery);
			$Pcount = $this->numrows($Presult);
			
			if($Pcount=="0"){ $data .= '</li>'; }else{ $data .= '<ul class="sub-menu">';}
			
			while($Prow = $this->fetch_array($Presult)){
				
			 if($Prow["page_url"]==''){
				$data .= '<li><a href="'. $this->urlCreate($Prow["page_id"],$Prow["page_title1"],"DP") .'">'.$Prow["page_title1"].'</a>';
			 }else{
				$data .= '<li><a href="'.$Prow["page_url"].'">'. unhtmlDBString($Prow["page_title1"]) .'</a>';	
			 }

				$P2query = "SELECT *  FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_parent = '". $Prow["page_id"] ."') AND (page_parent_root = '". $row["page_id"] ."') ORDER BY page_order ASC";
				$P2result = $this->query($P2query);
				$P2count = $this->numrows($P2result);
			
				if($P2count=="0"){ $data .= '</li>'; }else{	$data .= '<ul class="sub-menu">'; }
			
				while($P2row = $this->fetch_array($P2result)){
					$data .= '<li><a href="'. $this->urlCreate($P2row["page_id"],$P2row["page_title1"],"DP") .'">'.$P2row["page_title1"].'</a></li>';
				}
			
				if($P2count=="0"){ }else{$data .= '</ul>'; }
			
				if($P2count>="1"){ $data .= '</li>'; }
			
			}

				if($Pcount>="1"){ $data .= '</ul></li>'; }
				
			
			
		}

		$data .='</ul>';

		
		return $data;
	}

	
	
	public function leftMenu($pageParent,$pageID)
	{

		$tQuery = "SELECT * FROM md_page WHERE (page_status = '1') AND (page_group = '1') AND (page_id = '".$pageParent."')  ORDER By page_order ASC";
		$tResult = $this->query($tQuery);
		$tRow = $this->fetch_array($tResult);
		
		$data .= '<div class="leftMTitle">'.$tRow["page_title1"].'</div>';
		
		$data .= '<ul class="leftMenu">';
		
		
			
		$query = "SELECT * FROM md_page WHERE (page_status = '1') AND (page_group = '1') AND (page_parent_root = '".$pageParent."')  ORDER By page_order ASC";
		$result = $this->query($query);
		while($row = $this->fetch_array($result)){
			
			if($row["page_id"] == $pageID){
			$data .='<li><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'" class="selected"><i class="fa fa-caret-right"></i> '.$row["page_title1"].'</a></li>';
			}else{
			$data .='<li><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'"><i class="fa fa-caret-right"></i> '.$row["page_title1"].'</a></li>';
			}
			
		}
		
		$data .= '</ul>';
		
		return $data;
		
	}


	public function footerMenu($parentID)
	{

		
			
		$query = "SELECT * FROM md_page WHERE (page_status = '1') AND (page_group = '1') AND (page_parent = '".$parentID."')  ORDER By page_order";
		$result = $this->query($query);
		while($row = $this->fetch_array($result)){
			
			if($row["page_url"]!=""){
			$data .='<li><a href="'. $row["page_url"] .'">'.$row["page_title".contentLang()].'</a></li>';
			}elseif($row["page_url"]==""){
			$data .='<li><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'">'.$row["page_title".contentLang()].'</a></li>';
			}
			
		}
		
		
		return $data;
		
	}
	
	public function footerProductMenu()
	{

		
			
		$query = "SELECT * FROM md_page WHERE (page_status = '1') AND (page_group = '3') AND (is_category = '1') AND (page_parent = '0')  ORDER By page_order";
		$result = $this->query($query);
		while($row = $this->fetch_array($result)){
			
			if($row["page_url"]!=""){
			$data .='<li><a href="'. $row["page_url"] .'">'.$row["page_title".contentLang()].'</a></li>';
			}elseif($row["page_url"]==""){
			$data .='<li><a href="'. $this->urlCreate($row["page_id"],$row["page_title".contentLang()],"DP") .'">'.$row["page_title".contentLang()].'</a></li>';
			}
			
		}
		
		
		return $data;
		
	}

	

	public function footerProMenu()
	{

		
			
		$query = "SELECT * FROM md_page WHERE (is_category = '1') AND (page_group = '3') AND (page_parent = '0') ORDER BY rand() limit 5 ";
		$result = $this->query($query);
		while($row = $this->fetch_array($result)){
			
			if($row["page_url"]!=""){
			$data .='<li><a href="'. $row["page_url"] .'"><i class="icofont-thin-double-right"></i>'.$row["page_title".contentLang()].'</a></li>';
			}elseif($row["page_url"]==""){
			$data .='<li><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'"><i class="icofont-thin-double-right"></i> '.$row["page_title".contentLang()].'</a></li>';
			}
			
		}
		
		
		return $data;
		
	}


	public function footerGMenu($groupID)
	{

		
			
		$query = "SELECT * FROM md_page WHERE (page_status = '1') AND (page_group = '".$groupID."')  ORDER By page_order ASC";
		$result = $this->query($query);
		while($row = $this->fetch_array($result)){
			
			$data .='<li><a href="'. $this->urlCreate($row["page_id"],$row["page_title1"],"DP") .'">'.upperCase($row["page_title1"]).'</a></li>';
			
		}
		
		
		return $data;
		
	}



	public function postDate2($date)
	{
		
		if($date=="0000-00-00"){
		$day = "";
		$year = "";
		$month = "";
		}else{
		
		$date = explode("-", $date);
		
		$day = $date["2"];
		$year = $date["0"];
		
		if($date["1"]=="01"){
		$month = "Ocak";
		}elseif($date["1"]=="02"){
		$month = "Şubat";
		}elseif($date["1"]=="03"){
		$month = "Mart";
		}elseif($date["1"]=="04"){
		$month = "Nisan";
		}elseif($date["1"]=="05"){
		$month = "Mayıs";
		}elseif($date["1"]=="06"){
		$month = "Haziran";
		}elseif($date["1"]=="07"){
		$month = "Temmuz";
		}elseif($date["1"]=="08"){
		$month = "Ağustos";
		}elseif($date["1"]=="09"){
		$month = "Eylül";
		}elseif($date["1"]=="10"){
		$month = "Ekim";
		}elseif($date["1"]=="11"){
		$month = "Kasım";
		}elseif($date["1"]=="12"){
		$month = "Aralık";
		}
		
		}
				
		return array($day,$month,$year);
		
	}




	public function chartList($chartSession)
	{

$chartListQuery = "SELECT * FROM ms_chart where (chartSession = '".$chartSession."')";
$chartListResult = $this->query($chartListQuery);
$chartListCount = $this->numrows($chartListResult);
while($chartListRow = $this->fetch_array($chartListResult) ){ 


		$listQuery = "SELECT *  FROM md_page WHERE (page_group = '1') AND (page_status = '1') AND (page_id = '".$chartListRow["productID"]."') ORDER BY page_date DESC";
		$listResult = $this->query($listQuery);
		$listRow = $this->fetch_array($listResult);
		
$totalPrice += $listRow['page_title2']*$chartListRow["productQuantity"];
		
		$chartList .='<div class="itemCon">
		
			<div class="col-md-4 padd5">
				<div class="proTitle">'.$listRow["page_title1"].'</div>
				<div class="proInf">'.$listRow["page_content1"].'</div>
			</div>
			<div class="col-md-3 padd5">
				<input type="text" class="frmMny" value="'.$listRow["page_title2"].'">
				<div class="frmMnyAdn">$</div>
			</div>
		
			<div class="col-md-2 padd5">
				<input type="number" min="1" max="9" step="1" name="quantity" id="'.$listRow["page_id"].'" class="quantity" value="'.$chartListRow["productQuantity"].'"/>
				<div class="qtyminus">+</div>
				<div class="qtyminus">-</div>
			</div>
		
			<div class="col-md-3 padd5">
				<input type="text" name="tProPrice" id="proID'.$listRow["page_id"].'" class="frmMny" value="'.$totalPrice.'">
				<div class="frmMnyAdn">$</div>
				<div class="clearfix"></div>
				<a href="#" id="'.$chartListRow["chartID"].'" class="delItem">sil</a>
			</div>
		
		</div>';

		
}
		
		
		return $chartList;
		
	}









    public function insertIDDB($tableName, $data)
    {
        foreach($data as $key => $value){
            $fieldName .= $key . ",";
            $fieldValue .= "'" . htmlDBString($value) . "',"; 
        }
        
        $fieldName = substr($fieldName, 0 , -1);
        $fieldValue = substr($fieldValue, 0 , -1); 
        
        $query = "INSERT INTO ". $tableName ." (". $fieldName .") VALUES (". $fieldValue .")";
        $result = $this->query($query);
        if($result){
			
			$data = mysql_insert_id();
            return $data;

        }else{
            return false;
        }
        
    }

/*
	public function productSectionList($title,$content,$contentAll,$icon,$tpye)
	{

	$secType1 ='<div class="col-md-4">
				<div class="infBox">
					<div class="infBicon"><i class="'.$icon.'"></i></div>
					<div class="infBtitle">'.$title.'</div>
					<div class="infBtxt">'.$content.'</div>
				</div>
				</div>';


	$secType2 ='<div class="col-md-4">
					<div class="productSec1-1">'.$title.'</div>
				</div>
				
				<div class="col-md-8">
				<div class="productSec1-2">'.unhtmlDBString($content).'</div>
				</div>
				
				<div class="clearfix" style="height:50px;"></div>
				';

	
	
	}


	public function productSectionList($type,$productID)
	{



	
	
	
	
	

	}
*/



public function tempOne($id)
{

	$tempQuery = "SELECT * FROM md_page where (page_id = '".$id."')";
	$tempResult = $this->query($tempQuery);
	$tempRow = $this->fetch_array($tempResult) ;
	
	
	$data .='    
	<div class="titleCon">
    	<div class="mainTitle">'.$tempRow["page_title1"].'</div>
		<div class="mainTText">'.unhtmlDBString($tempRow["page_content_all1"]).'</div>
    </div>
	<div class="clearfix h20"></div>
	';
	
	return $data;
}




public function tempTwo($id)
{

	$tempQuery = "SELECT * FROM md_page where (page_id = '".$id."')";
	$tempResult = $this->query($tempQuery);
	while($tempRow = $this->fetch_array($tempResult) ){ 

	$data .=
	'<div class="col-md-4">
    <div class="col-md-3 col-sm-2 col-xs-2 noPadding"><i class="icon-'.$tempRow["page_icon"].' iboxIcon"></i></div>
    
    <div class="col-md-9 col-sm-9 col-xs-9 noPadding">
    <div class="iboxTitle">'.$tempRow["page_title1"].'</div>
    <div class="iboxSep"></div>
    <p class="iboxText">'.unhtmlDBString($tempRow["page_content_all1"]).'</p>
    </div>
	</div>
	';

	
	}


	return $data;
}



public function tempThree($id)
{

	$tempQuery = "SELECT * FROM md_page where (page_id = '".$id."')";
	$tempResult = $this->query($tempQuery);
	while($tempRow = $this->fetch_array($tempResult) ){ 

	$data .=
	'<div class="col-md-15 noPadding">
    	<a href="'.$tempRow["page_url"].'" class="'.$tempRow["page_bg"].' fiveBoxCol">
        	<div class="fBoxLogo">
			<img src="core/uploads/page/images/0_'.$tempRow["page_id"].'.png" class="fBoxLimg">
			<img src="core/uploads/page/images/1_'.$tempRow["page_id"].'.png" class="fBoxLimgH">
			</div>
            <div class="fBoxText">'.unhtmlDBString($tempRow["page_content_all1"]).'</div>
            <div class="fBoxBtn">DETAYLI BİLGİ</div>
        </a>
    </div>
	';

	
	}


	return $data;
}



public function tempFive($id)
{

	$tempQuery = "SELECT * FROM md_page where (page_id = '".$id."')";
	$tempResult = $this->query($tempQuery);
	while($tempRow = $this->fetch_array($tempResult) ){ 

	$data .=
	'<div style="width:100%; padding:50px 0; background-color:#fff;">
	<div class="demoVIcon">
		<i class="icon-'.$tempRow["page_icon"].'"></i>
	</div>
	
	<div class="demoVText">
	<span class="demoVSText">'.$tempRow["page_title1"].'</span><br>
	<span style="font-size:15px;">'.unhtmlDBString($tempRow["page_content_all1"]).'</span>
	</div>
	
	<div class="demoVLC">
		<a  href="'.$tempRow["page_url"].'"  data-fancybox="" class="btnBlack">TANITIM VIDEOSU</a>
		<a href="'.$tempRow["page_url2"].'" class="btnBlack2">DEMO TALEBİ</a>
	</div>
	<div class="clearfix"></div>
	</div>';

	
	}


	return $data;
}


public function tempSix($id)
{

	$tempQuery = "SELECT * FROM md_page where (page_id = '".$id."')";
	$tempResult = $this->query($tempQuery);
	while($tempRow = $this->fetch_array($tempResult) ){ 

	$data .=
	'
<div style="width:100%; position:relative;">
<div class="parallax-window" data-parallax="scroll" data-image-src="theme/images/guvenlikihlali.jpg">
<div class="ewf-section__overlay-color-right"></div>
<div class="ewf-section__content ewf-section">

<div class="container">
<div class="col-md-7"></div>
<div class="col-md-5">

	<div style="width:100%; padding:0 70px;">
    	<div class="secTitle">'.$tempRow["page_title1"].'</div>
        <div style="width:60%; height:1px; background:#fff;"></div>
    	<div style="width:100%; height:auto; padding:15px 0; font-size:20px; color:#fff; font-weight:300; line-height:25px; letter-spacing:1px;">'.unhtmlDBString($tempRow["page_content_all1"]).'</div>

		<div class="clearfix" style="height:25px;"></div>
		<div style="width:100%; height:auto; display:inline-block; text-align:left;">
			<a href="iletisim.html" class="btnWhite2">'.$tempRow["page_url"].'</a>
		</div>
    
    </div>


</div>

</div>
</div>
</div>
</div>
';

	
	}


	return $data;
}




} // END CLASS


?>