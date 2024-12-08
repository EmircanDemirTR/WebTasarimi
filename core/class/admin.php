<?php

/**
 * @author Fikir Kahvesi
 * @copyright 2013
 */

class adminEngine extends getData {
    
    public $moduleTemplate;
    
    public $adminMenu = array();
    
	public $charts = array();
	
    public function getAdminTemplate()
    {
        GLOBAL $moduleInfo;
        
        $defaultPage = "../core/modules/dashboard/dashboard.php";
        
        if($this->siteConfig["adminModule"] != ""){
            
            $getModule = explode("/",$this->siteConfig["adminModule"]);
            
            $selectPage = "../core/modules/". $getModule[0] ."/" . $getModule[1]. ".php";
            
            if (file_exists($selectPage)) {
                        
                $this->moduleTemplate = $selectPage;
            
            } else {
                
                $this->moduleTemplate = $defaultPage;
                
            }
        
        } else {
            
            $this->moduleTemplate = $defaultPage;
        }
    }
        
    
    public function notifyError($data)
    {
        return '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>'. $data .'</div>';
    }
    
    
    public function notifySuccess($data)
    {
        return '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>'. $data .'</div>';
   
    }


    public function notifyWarning($data, $close = "")
    {
        $message = '<br><div class="alert alert-warning  alert-dismissible fade show">';
        if($close != "off"){
            $message .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        }
        $message .= $data .'</div>';
        return $message;
    }
    
    
    public function notifyInfo($data, $close = "")
    {
        $message = '<div class="alert alert-info fade in">';
		if($close != "off"){
			$message .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		}
		$message .= $data .'</div>';
		return $message;
    }
    
    
    public function adminTitle()
    {
        return $this->siteConfig["sitename"]." | ".$this->siteConfig["admintitle"];
    }
    
    
    public function processMessage()
    {   
        if(isset($_GET["success"])){
            return $this->notifySuccess('<h4>İşlem Başarılı!</h4> Güncelleme işleminiz başarıyla gerçekleşmiştir.');
        } else if(isset($_GET["failed"])){
            return $this->notifyError('<h4>Hatalı İşlem!</h4> Lütfen daha sonra tekrar deneyiniz. Durumun tekrarlanması durumunda <a href="mailto:'. $this->siteConfig["adminemail"] .'">'. $this->siteConfig["adminemail"] .'</a>  email adresinden irtibata geçiniz.');
        } else if(isset($_GET["errorFile"])){
            return $this->notifyError('<h4>Hatalı İşlem!</h4> Yüklemek istediğiniz dosyanın boyutu sunucu ve yazılım güvenliği nedeniyle <b>2 MB</b>\'ı geçmemelidir.');
        }
  
    }
    
    
    public function issetDelete()
    {
        if(isset($_GET["delete"])){
            return true;
        }else{
            return false;
        }
    }
    
    
    public function getDeleteID(){
        
        if(isset($_GET["delete"])){
            $data = $_GET["delete"];
        }else{
            $data = "";
        }
        return $data;
    }
    
    
    public function forgotPass($data)
    {
        GLOBAL $recoveryMsg;
        $query = "SELECT * FROM md_administrator WHERE (admin_email = '". $data ."')";
        $result = $this->query($query);
        $numrows = $this->numrows($result);
        
        if($numrows >= "1"){
            
            $htmlMessage = "";
            
            $mail = new PHPMailer();
            $mail->IsSMTP();                                    // send via SMTP
            $mail->Host     = "mail.fikirkahvesi.com.tr";          // SMTP servers
            $mail->SMTPAuth = true;                             // turn on SMTP authentication
            $mail->Username = "noreply@fikirkahvesi.com.tr";       // SMTP username
            $mail->Password = "123456";                         // SMTP password
            $mail->From     = $this->siteConfig["ordermail"];
            $mail->Fromname = $this->siteConfig["sitename"];
            $mail->AddAddress($this->siteConfig["ordermail"],$this->siteConfig["sitename"]);
            $mail->Subject  =  $this->siteConfig["sitename"] . " Parola hatırlatma";
            $mail->Body     =  $htmlMessage;
            
            if(!$mail->Send()){
                $recoveryMsg =  $this->notifyError("<h4>Hata!</h4>Parolanız e-posta adresinize gönderilemedi. Tekrar deneyiniz.");
            }
            $recoveryMsg =  $this->notifySuccess("<h4>İşlem Başarılı!</h4>Parolanız e-posta adresinize gönderilmiştir.");
        }else{
            $recoveryMsg =  $this->notifyError("<h4>Hata!</h4>E-posta adresiniz sistemde kayıtlı değildir.");
        }
    }
    
    
    public function adminMenu()
    {
        GLOBAL $moduleInfo;
        $getModule = explode("/",$this->siteConfig["adminModule"]);
        $query = "SELECT * FROM md_module WHERE (module_enabled = '1') ORDER BY module_order ASC";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            $moduleDirectory = $row["module_directory"];
            include "../core/modules/" . $moduleDirectory . "/info.php";
            //print $page_module;
            $module = $moduleDirectory . "_module";
            $moduleMenu = $moduleDirectory . "_module_menu";
            
			if($getModule[0] == $moduleDirectory){
                $moduleTitle = $getModule[0] . "_module_" . $getModule[1];
            } elseif($getModule[0] == "profile"){
				include "../core/modules/" . $getModule[0] . "/info.php";
				$moduleTitle = $getModule[0] . "_module_" . $getModule[1];
			}
			
            array_push($this->adminMenu, $$moduleMenu);
        }
        
        $moduleInfo = $$moduleTitle;
        
        foreach($this->adminMenu as $value ){
            $data .= $value;
        }
        return $data;
    }
    
    
    public function groupList($module)
    {   
        $query = "SELECT * FROM md_". $module ."_group ORDER BY group_id ASC";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            
            $data .= '<tr>  
            <td>'. $row["group_id"] .'</td>  
            <td>'. unhtmlDBString($row["group_title1"]) .'</td>  
            <td style="text-align:center;"><a href="main.php?module='. $module .'/groupedit&id='. $row["group_id"] .'" class="btn btn-sm btn-info">Düzenle</a> &nbsp; <a href="#" class="removeData btn btn-sm btn-danger" data-id="'. $row["group_id"] .'" >Sil</a></td>  
          </tr>';
        }
        return $data;
    }
 
 

    public function tgroupList()
    {   
        $query = "SELECT * FROM md_page where page_group='12' and page_status='1' ORDER BY page_order ASC";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
			if($row["page_parent"]=="0"){
				$cstle='style="color:red;"';
			}else{
				$cstle='';
			}
            
            $data .= '<div><a href="main.php?module=page/pagedocument&id='.$row["page_id"].'" '.$cstle.'>'.$row["page_title1"].'</a></div>';
        }
        return $data;
    }

 
     public function userList()
    {

        $data = '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover" style="background:#FFF;">
        <thead>
          <tr>
            <th width="6%">ID</th>
            <th width="70%">Üye Adı</th>
            <th width="12%" style="text-align:center;">Üyelik Durumu</th>
            <th width="12%" style="text-align:center;">İşlemler</th>
          </tr>
        </thead>
        <tbody>';

        $userQuery = "SELECT * FROM md_user ORDER BY user_reg_date ASC";
        $userResult = $this->query($userQuery);
        while($userRow = $this->fetch_array($userResult)){
            
            $data .= '<tr>
            <td>'. $userRow["userID"] .'</td>
            <td>'. unhtmlDBString($userRow["usr_name"]) ."&nbsp;". unhtmlDBString($userRow["usr_surname"]) .'</td>
            <td style="text-align:center;">'. userStatus($userRow["user_status"]) .'</td>
            <td style="text-align:center;"><a href="main.php?module=user/useredit&id='. $userRow["userID"] .'" class="btn btn-mini btn-info">Düzenle</a> &nbsp; <a href="#" data-id="'. $userRow["userID"] .'" class="removeData btn btn-mini btn-danger">Sil</a></td>
            </tr>';     
        }
        
        $data .= '</table>';
        return $data;
    }

    
    
    public function pageList($gID)
    {
        $i = 0;
        $groupQuery = "SELECT * FROM md_page_group where (group_id != '".$gID."') AND (group_id != '2') ORDER BY group_id ASC";
        $groupResult = $this->query($groupQuery);
        while($groupRow = $this->fetch_array($groupResult)){
            $i++;
            if($i == 1){
                $activeClassli = ' class="active"';
                $activeClassdiv = ' active';
                $activeClassdivS = 'show';
            }else{
                $activeClassli = '';
                $activeClassdiv = '';
                $activeClassdivS = '';
            }
            $title .= '<li class="nav-item">
			<a class="nav-link '. $activeClassdiv .'" id="home-'. $groupRow["group_id"] .'" data-toggle="tab" href="#nav'. $groupRow["group_id"] .'" aria-controls="'. $groupRow["group_id"] .'" aria-expanded="true">'. unhtmlDBString($groupRow["group_title1"]) .'</a></li>';
            
            $content .= '<div class="tab-pane fade '. $activeClassdivS .' '. $activeClassdiv .'" id="nav' .$groupRow["group_id"] .'" role="tabpanel">'. $this->pageTreeList(0, $groupRow["group_id"], 8, 1) .'</div>';
        }
        
        $data = '<ul class="nav nav-tabs" id="myTab" role="tablist">'. $title .'</ul>';
        $data .= '<div class="tab-content" id="myTabContent"><br>'. $content .'</div>';
        return $data;
    }


    public function pageTreeList($parentID, $groupID, $value, $table)
    {
        if($parentID != 0){
            $value = ($value+20);
            $icon = "&raquo; ";
        }else{
            $icon = "";
        }
        
        $style = ' style="padding-left:'. $value .'px;"';
        
        if($table == 1){
            $data = '<table class="table table-striped table-bordered" id="dasdasd">
        <thead>
          <tr>
            <th width="6%" style="width:6%;">ID</th>
            <th width="70%" style="width:70%;">İçerik Adı</th>
            <th width="6%" style="text-align:center; width:6%;">Yayın</th>
            <th width="18%" style="text-align:center; width:18%;">İşlemler</th>
          </tr>
        </thead>
        <tbody>';
        }
        
        $query = "SELECT * FROM md_page WHERE (page_parent = '". $parentID ."') AND (page_group = '". $groupID ."') ORDER BY page_order ASC";
        $result = $this->query($query);
        $numrows = $this->numrows($result);
        while($row = $this->fetch_array($result)){
            
            $subQuery = "SELECT * FROM md_page WHERE (page_parent = '". $row["page_id"] ."') AND (page_group = '". $groupID ."') ORDER BY page_order ASC";
            $subResult = $this->query($subQuery);
            $subNumrows = $this->numrows($subResult);
            if($subNumrows >= 1){
                $class = 'disabled ';
            }else{
                $class = 'removeData ';
            }
            
            $data .= '<tr>
            <td>'. $row["page_id"] .'</td>
            <td '. $style .'>'. $icon . unhtmlDBString($row["page_title1"]) .'</td>
            <td style="text-align:center;">'. dataStatus($row["page_status"]) .'</td>
            <td style="text-align:center;"><a href="main.php?module=page/pageedit&id='. $row["page_id"] .'" class="btn btn-sm btn-info">Düzenle</a>  &nbsp; <a href="#" data-id="'. $row["page_id"] .'" class="'. $class .'btn btn-sm btn-danger">Sil</a></td>
            </tr>';     
            
            $data .= $this->pageTreeList($row["page_id"], $groupID, $value, 0); 
        
        }
        
        if($table == 1){ 
            if($numrows == 0){ 
                $data = $this->notifyWarning("<h4>Kayıt bulunamadı!</h4>İçerik yöneticisini kullanarak yeni içerik girişi yapabilirsiniz."); 
            }else{ 
                $data .= '<tbody></table>'; 
            } 
        }
        return $data;
    }


/**/



    public function homeTreeList($parentID, $groupID, $value, $table)
    {
        if($parentID != 0){
            $value = ($value+20);
            $icon = "&raquo; ";
        }else{
            $icon = "";
        }
        
        $style = ' style="padding-left:'. $value .'px;"';
        
        if($table == 1){
            $data = '<table class="table table-striped table-bordered" id="dasdasd">
        <thead>
          <tr>
            <th width="6%" style="width:6%;">ID</th>
            <th width="70%" style="width:70%;">İçerik Adı</th>
            <th width="6%" style="text-align:center; width:6%;">Yayın</th>
            <th width="18%" style="text-align:center; width:18%;">İşlemler</th>
          </tr>
        </thead>
        <tbody>';
        }
        
        $query = "SELECT * FROM md_page WHERE (page_parent = '". $parentID ."') AND (page_group = '". $groupID ."') ORDER BY page_order ASC";
        $result = $this->query($query);
        $numrows = $this->numrows($result);
        while($row = $this->fetch_array($result)){
            
            $subQuery = "SELECT * FROM md_page WHERE (page_parent = '". $row["page_id"] ."') AND (page_group = '". $groupID ."') ORDER BY page_order ASC";
            $subResult = $this->query($subQuery);
            $subNumrows = $this->numrows($subResult);
            if($subNumrows >= 1){
                $class = 'disabled ';
            }else{
                $class = 'removeData ';
            }
            
            $data .= '<tr>
            <td>'. $row["page_id"] .'</td>
            <td '. $style .'>'. $icon . unhtmlDBString($row["page_title1"]) .'</td>
            <td style="text-align:center;">'. dataStatus($row["page_status"]) .'</td>
            <td style="text-align:center;"><a href="main.php?module=home/homeedit&id='. $row["page_id"] .'" class="btn btn-sm btn-info">Düzenle</a>  &nbsp; <a href="#" data-id="'. $row["page_id"] .'" class="'. $class .'btn btn-sm btn-danger">Sil</a></td>
            </tr>';     
            
            $data .= $this->homeTreeList($row["page_id"], $groupID, $value, 0); 
        
        }
        
        if($table == 1){ 
            if($numrows == 0){ 
                $data = $this->notifyWarning("<h4>Kayıt bulunamadı!</h4>İçerik yöneticisini kullanarak yeni içerik girişi yapabilirsiniz."); 
            }else{ 
                $data .= '<tbody></table>'; 
            } 
        }
        return $data;
    }


/**/


    public function formTreeList($groupID)
    {
        
        
        $data = '<table class="table table-striped table-bordered" id="dasdasd">
        <thead>
          <tr>
            <th width="6%" style="width:6%;">ID</th>
            <th width="70%" style="width:36%;">Ad & Soyad</th>
            <th width="6%" style="text-align:center; width:24%;">Email</th>
            <th width="6%" style="text-align:center; width:24%;">Doğum Tarihi</th>
            <th width="18%" style="text-align:center; width:10%;">İşlemler</th>
          </tr>
        </thead>
        <tbody>';
        
        $query = "SELECT * FROM md_form";
        $result = $this->query($query);
        $numrows = $this->numrows($result);
        while($row = $this->fetch_array($result)){
            
            
            $data .= '<tr>
            <td>'. $row["id"] .'</td>
            <td>'. unhtmlDBString($row["ad"]) .'&nbsp;'. unhtmlDBString($row["soyad"]) .'</td>
            <td style="text-align:center;">'. unhtmlDBString($row["email"]) .'</td>
            <td style="text-align:center;">'. unhtmlDBString($row["dtarihi"]) .'</td>
            <td style="text-align:center;"><a href="main.php?module=forms/formedit&id='. $row["id"] .'" class="btn btn-sm btn-info">Düzenle</a>
			<a href="#" data-id="'. $row["id"] .'" class="'. $class .'btn btn-sm btn-danger">Sil</a>
			</td>
            </tr>';     
            
        
        }

		if($numrows == 0){ 
			$data = $this->notifyWarning("<h4>Kayıt bulunamadı!</h4>"); 
		}else{ 
			$data .= '<tbody></table>'; 
		} 

        return $data;
    }


/**/


    public function prodcutList($gID)
    {
        $i = 0;
        $groupQuery = "SELECT * FROM md_page_group where (group_id = '".$gID."') ORDER BY group_id ASC";
        $groupResult = $this->query($groupQuery);
        while($groupRow = $this->fetch_array($groupResult)){
            $i++;
            if($i == 1){
                $activeClassli = ' class="active"';
                $activeClassdiv = ' active';
                $activeClassdivS = 'show';
            }else{
                $activeClassli = '';
                $activeClassdiv = '';
                $activeClassdivS = '';
            }
            $title .= '<li class="nav-item">
			<a class="nav-link '. $activeClassdiv .'" id="home-'. $groupRow["group_id"] .'" data-toggle="tab" href="#nav'. $groupRow["group_id"] .'" aria-controls="'. $groupRow["group_id"] .'" aria-expanded="true">'. unhtmlDBString($groupRow["group_title1"]) .'</a></li>';
            
            $content .= '<div class="tab-pane fade '. $activeClassdivS .' '. $activeClassdiv .'" id="nav' .$groupRow["group_id"] .'" role="tabpanel">'. $this->productTreeList(0, $groupRow["group_id"], 8, 1) .'</div>';
        }
        
        $data = '<ul class="nav nav-tabs" id="myTab" role="tablist">'. $title .'</ul>';
        $data .= '<div class="tab-content" id="myTabContent"><br>'. $content .'</div>';
        return $data;
    }


    public function productTreeList($parentID, $groupID, $value, $table)
    {
        if($parentID != 0){
            $value = ($value+20);
            $icon = "&raquo; ";
        }else{
            $icon = "";
        }
        
        $style = ' style="padding-left:'. $value .'px;"';
        
        if($table == 1){
            $data = '<table class="table table-striped table-bordered" id="dasdasd">
        <thead>
          <tr>
            <th width="6%" style="width:6%;">ID</th>
            <th width="70%" style="width:70%;">İçerik Adı</th>
            <th width="6%" style="text-align:center; width:6%;">Yayın</th>
            <th width="18%" style="text-align:center; width:18%;">İşlemler</th>
          </tr>
        </thead>
        <tbody>';
        }
        
        $query = "SELECT * FROM md_page WHERE (page_parent = '". $parentID ."') AND (page_group = '". $groupID ."') AND (is_category = '0') ORDER BY page_order ASC";
        $result = $this->query($query);
        $numrows = $this->numrows($result);
        while($row = $this->fetch_array($result)){
            
            $subQuery = "SELECT * FROM md_page WHERE (page_parent = '". $row["page_id"] ."') AND (page_group = '". $groupID ."') AND (is_category = '0') ORDER BY page_order ASC";
            $subResult = $this->query($subQuery);
            $subNumrows = $this->numrows($subResult);
            if($subNumrows >= 1){
                $class = 'disabled ';
            }else{
                $class = 'removeData ';
            }
            
            $data .= '<tr>
            <td>'. $row["page_id"] .'</td>
            <td '. $style .'>'. $icon . unhtmlDBString($row["page_title1"]) .'</td>
            <td style="text-align:center;">'. dataStatus($row["page_status"]) .'</td>
            <td style="text-align:center;"><a href="main.php?module=product/pageedit&id='. $row["page_id"] .'" class="btn btn-sm btn-info">Düzenle</a>  &nbsp; <a href="#" data-id="'. $row["page_id"] .'" class="'. $class .'btn btn-sm btn-danger">Sil</a></td>
            </tr>';     
            
            $data .= $this->productTreeList($row["page_id"], $groupID, $value, 0); 
        
        }
        
        if($table == 1){ 
            if($numrows == 0){ 
                $data = $this->notifyWarning("<h4>Kayıt bulunamadı!</h4>İçerik yöneticisini kullanarak yeni içerik girişi yapabilirsiniz."); 
            }else{ 
                $data .= '<tbody></table>'; 
            } 
        }
        return $data;
    }





    public function categoryList($gID)
    {
        $i = 0;
        $groupQuery = "SELECT * FROM md_page_group where (group_id = '".$gID."') ORDER BY group_id ASC";
        $groupResult = $this->query($groupQuery);
        while($groupRow = $this->fetch_array($groupResult)){
            $i++;
            if($i == 1){
                $activeClassli = ' class="active"';
                $activeClassdiv = ' active';
                $activeClassdivS = 'show';
            }else{
                $activeClassli = '';
                $activeClassdiv = '';
                $activeClassdivS = '';
            }
            $title .= '<li class="nav-item">
			<a class="nav-link '. $activeClassdiv .'" id="home-'. $groupRow["group_id"] .'" data-toggle="tab" href="#nav'. $groupRow["group_id"] .'" aria-controls="'. $groupRow["group_id"] .'" aria-expanded="true">'. unhtmlDBString($groupRow["group_title1"]) .'</a></li>';
            
            $content .= '<div class="tab-pane fade '. $activeClassdivS .' '. $activeClassdiv .'" id="nav' .$groupRow["group_id"] .'" role="tabpanel">'. $this->categoryTreeList(0, $groupRow["group_id"], 8, 1) .'</div>';
        }
        
        $data = '<ul class="nav nav-tabs" id="myTab" role="tablist">'. $title .'</ul>';
        $data .= '<div class="tab-content" id="myTabContent"><br>'. $content .'</div>';
        return $data;
    }


    public function categoryTreeList($parentID, $groupID, $value, $table)
    {
        if($parentID != 0){
            $value = ($value+20);
            $icon = "&raquo; ";
        }else{
            $icon = "";
        }
        
        $style = ' style="padding-left:'. $value .'px;"';
        
        if($table == 1){
            $data = '<table class="table table-striped table-bordered" id="dasdasd">
        <thead>
          <tr>
            <th width="6%" style="width:6%;">ID</th>
            <th width="70%" style="width:70%;">Kategori Adı</th>
            <th width="6%" style="text-align:center; width:6%;">Yayın</th>
            <th width="18%" style="text-align:center; width:18%;">İşlemler</th>
          </tr>
        </thead>
        <tbody>';
        }
        
        $query = "SELECT * FROM md_page WHERE (page_parent = '". $parentID ."') AND (page_group = '". $groupID ."') AND (is_category = '1') ORDER BY page_order ASC";
        $result = $this->query($query);
        $numrows = $this->numrows($result);
        while($row = $this->fetch_array($result)){
            
            $subQuery = "SELECT * FROM md_page WHERE (page_parent = '". $row["page_id"] ."') AND (page_group = '". $groupID ."') AND (is_category = '1') ORDER BY page_order ASC";
            $subResult = $this->query($subQuery);
            $subNumrows = $this->numrows($subResult);
            if($subNumrows >= 1){
                $class = 'disabled ';
            }else{
                $class = 'removeData ';
            }
            
            $data .= '<tr>
            <td>'. $row["page_id"] .'</td>
            <td '. $style .'>'. $icon . unhtmlDBString($row["page_title1"]) .'</td>
            <td style="text-align:center;">'. dataStatus($row["page_status"]) .'</td>
            <td style="text-align:center;"><a href="main.php?module=product/categoryEdit&id='. $row["page_id"] .'" class="btn btn-sm btn-info">Düzenle</a>  &nbsp; <a href="#" data-id="'. $row["page_id"] .'" class="'. $class .'btn btn-sm btn-danger">Sil</a></td>
            </tr>';     
            
            $data .= $this->categoryTreeList($row["page_id"], $groupID, $value, 0); 
        
        }
        
        if($table == 1){ 
            if($numrows == 0){ 
                $data = $this->notifyWarning("<h4>Kayıt bulunamadı!</h4>İçerik yöneticisini kullanarak yeni içerik girişi yapabilirsiniz."); 
            }else{ 
                $data .= '<tbody></table>'; 
            } 
        }
        return $data;
    }


    public function categoryJumpList($parentID, $groupID, $value)
    {
        if($parentID != 0){
            $value = ($value+20);
            $icon = "&raquo; ";
        }else{
            $icon = "";
        }
        
        $style = ' style="padding-left:'. $value .'px;"';
        
         //$data .='<a href="main.php?module=product/pagelist&group=0" style="padding-left:10px;" class="dropdown-item">Kategorisi Olmayan Ürünler</a>';
        
        $query = "SELECT * FROM md_page WHERE (page_parent = '". $parentID ."') AND (page_group = '". $groupID ."') AND (is_category = '1') ORDER BY page_order ASC";
        $result = $this->query($query);
        $numrows = $this->numrows($result);
        while($row = $this->fetch_array($result)){
            
            $subQuery = "SELECT * FROM md_page WHERE (page_parent = '". $row["page_id"] ."') AND (page_group = '". $groupID ."') AND (is_category = '1') ORDER BY page_order ASC";
            $subResult = $this->query($subQuery);
            $subNumrows = $this->numrows($subResult);
            
            
            $data .= '
            <a href="main.php?module=product/pagelist&group='.$row["page_id"].'" '. $style .'  class="dropdown-item">'. $icon . unhtmlDBString($row["page_title1"]) .'</a>
            ';     
            
            $data .= $this->categoryJumpList($row["page_id"], $groupID, $value); 
        
        }
        
         
       
        return $data;
    }

    

    public function bannerTreeList()
    {   
        $query = "SELECT * FROM md_banner ORDER BY banner_order ASC";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            
            $data .= '<tr>  
            <td>'. $row["banner_id"] .'</td>  
            <td>'. unhtmlDBString($row["banner_name"]) .'</td>  
            <td style="text-align:center;"><a href="main.php?module=banner/banneredit&id='. $row["banner_id"] .'" class="btn btn-sm btn-info">Düzenle</a> &nbsp; <a href="#" class="removeData btn btn-sm btn-danger" data-id="'. $row["banner_id"] .'" >Sil</a></td>  
          </tr>';
        }
        return $data;
    }


    public function newProductList($parentID)
    {   
	
		$query = "SELECT md_page.* FROM md_page JOIN md_product_relationships ON (md_page.page_id = md_product_relationships.product_id) WHERE (md_product_relationships.category_id = '".$parentID."') order by md_page.page_order ASC";
        //$query = "SELECT * FROM md_page WHERE (page_parent = '".$parentID."') AND (is_category = '".$isCategory."') AND (page_group = '".$pageGroup."') ORDER BY page_order ASC";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            
            $data .= '<tr>
            <td>'. $row["page_id"] .'</td>
            <td>'. unhtmlDBString($row["page_title1"]) .'</td>
            <td style="text-align:center;">'. dataStatus($row["page_status"]) .'</td>
            <td style="text-align:center;">
			<a href="main.php?module=product/pageedit&id='. $row["page_id"] .'" class="btn btn-sm btn-info">Düzenle</a>  &nbsp; 
			<a href="#" data-id="'. $row["page_id"] .'" data-group="'. $parentID .'" class="btn btn-sm btn-danger removeData">Sil</a>
			</td>
            </tr>';     
        }
        return $data;
    }







    
    public function templateSelectBoxMenu($templateID)
    {
        $query = "SELECT * FROM md_template";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            $data .= '<option value="'. $row["template_id"] .'"';
            if($templateID == $row["template_id"]) { $data .= " selected"; }
            $data .= '>'. $row["template_title"] .'</option>';
        }
        return $data;
    }
    
    
    public function statusSelectBoxMenu($status)
    {
        $data = '<option value="1"';
        if($status == 1) { $data .= " selected"; }
        $data .= '>Aktif</option>';
        $data .= '<option value="0"';
        if($status == 0) { $data .= " selected"; }
        $data .= '>Pasif</option>';
        return $data;
    }
   
    public function homeSelectBoxMenu($status)
    {
        $data = '<option value="1"';
        if($status == 1) { $data .= " selected"; }
        $data .= '>Evet</option>';
        $data .= '<option value="0"';
        if($status == 0) { $data .= " selected"; }
        $data .= '>Hayır</option>';
        return $data;
    }
    
    
    public function groupSelectBox($groupID = "", $module)
    {
        $query = "SELECT * FROM md_". $module ."_group Where (group_id != '2') AND (group_id != '3')";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            $data .= '<option value="'. $row["group_id"].'"';
            if($groupID == $row["group_id"]){ $data .= ' selected'; }
            $data .= '>'. $row["group_title1"] .'</option>';
        
        }
        return $data;
    }


    public function typeSelectBox($groupID = "")
    {
        $query = "SELECT * FROM md_home_group";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            $data .= '<option value="'. $row["home_id"].'"';
            if($groupID == $row["home_id"]){ $data .= ' selected'; }
            $data .= '>'. $row["home_title"] .'</option>';
        
        }
        return $data;
    }


    public function helloThumb($file, $name, $pathle)
    {
        $thumbupload = new upload($file);
        $thumbupload->uploaded;
        $thumbupload->file_overwrite    	= true;
        $thumbupload->file_new_name_body    = $name;
    	
        /**/
        
        $thumbupload->image_resize          = true;
        $thumbupload->image_ratio_crop      = true;
        $thumbupload->image_y               = 140;
        $thumbupload->image_x               = 140;
    	
        /**/
        $thumbupload->image_convert = 'jpg'; 
        
        $thumbupload->process($pathle);
    	if ($thumbupload->processed){
    	    $thumbupload->clean();
    	}else{
    	        //echo 'Resim Yüklenemedi: '.$upload->error;
        }
      return $thumbupload;
	}

    
    public function pagethumb($file, $name)
    {
        $thumbupload = new upload($file);
        $thumbupload->uploaded;
        $thumbupload->file_overwrite    	= true;
        $thumbupload->file_new_name_body    = $name;
    	
        /**/
        
        $thumbupload->image_resize          = true;
        $thumbupload->image_ratio_crop      = true;
        $thumbupload->image_y               = 140;
        $thumbupload->image_x               = 140;
    	
        /**/
        if($thumbupload->file_src_name_ext != 'jpg'){
            $thumbupload->image_convert 	        	= 'jpg'; 
        }
        
        $thumbupload->process("../core/uploads/page/images/thumb/");
    	if ($thumbupload->processed){
    	    $thumbupload->clean();
    	}else{
    	        //echo 'Resim Yüklenemedi: '.$upload->error;
        }
      return $thumbupload;
	}
    
    public function pageImgControl()
    {
        if (file_exists("../core/uploads/page/images/thumb/" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/page/images/'. $this->siteConfig["getID"] .'.jpg" class="img-thumbnail myfancyImg" style="float:right; margin-right:50px;"><img src="../core/uploads/page/images/thumb/'. $this->siteConfig["getID"] .'.jpg" ></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=page/pageimage&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-sm" style="float:right; margin-right:80px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }

    public function pageImgControl2()
    {
        if (file_exists("../core/uploads/page/images/thumb/" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/page/images/'. $this->siteConfig["getID"] .'.jpg" class="img-thumbnail myfancyImg" style="float:right; margin-right:50px;"><img src="../core/uploads/page/images/thumb/'. $this->siteConfig["getID"] .'.jpg" ></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=product/pageimage&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-sm" style="float:right; margin-right:80px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }


    public function pageMenuImgControl()
    {
        if (file_exists("../core/uploads/page/images/thumb/pm_" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/page/images/pm_'. $this->siteConfig["getID"] .'.jpg" class="img-thumbnail myfancyImg" style="float:right; margin-right:50px;"><img src="../core/uploads/page/images/thumb/pm_'. $this->siteConfig["getID"] .'.jpg" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=page/menuimage&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-sm" style="float:right; margin-right:80px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }

    public function pageBgImgControl()
    {
        if (file_exists("../core/uploads/page/images/thumb/bg_" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/page/images/bg_'. $this->siteConfig["getID"] .'.jpg" class="img-thumbnail myfancyImg" style="float:right; margin-right:50px;"><img src="../core/uploads/page/images/thumb/bg_'. $this->siteConfig["getID"] .'.jpg" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=page/bgimage&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-sm" style="float:right; margin-right:80px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }


    public function bannerLBgImgControl($iname)
    {
        if (file_exists("../core/uploads/page/images/" . $iname)) {
	       return '<a href="../core/uploads/page/images/'. $iname .'" class="img-thumbnail myfancyImg" style="float:right; margin-right:50px;"><img src="../core/uploads/page/images/'.$iname .'" ></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=banner/layerimage&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-sm" style="float:right; margin-right:57px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }

    public function bannerBgImgControl()
    {
        if (file_exists("../core/uploads/page/images/thumb/bbg_" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/page/images/bbg_'. $this->siteConfig["getID"] .'.jpg" class="img-thumbnail myfancyImg" style="float:right; margin-right:50px;"><img src="../core/uploads/page/images/thumb/bbg_'. $this->siteConfig["getID"] .'.jpg" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=banner/bannerimage&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-sm" style="float:right; margin-right:80px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }


    public function groupImgControl()
    {
        if (file_exists("../core/uploads/page/images/thumb/gr_" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/page/images/gr_'. $this->siteConfig["getID"] .'.jpg" class="img-thumbnail myfancyImg" style="float:right; margin-right:50px;"><img src="../core/uploads/page/images/thumb/gr_'. $this->siteConfig["getID"] .'.jpg" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=page/groupedit&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-sm"  style="float:right; margin-right:80px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }

    
    public function galleryImgControl()
    {
        if (file_exists("../core/uploads/gallery/thumb/" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/gallery/'. $this->siteConfig["getID"] .'.jpg" class="img-thumbnail myfancyImg" style="float:right; margin-right:50px;"><img src="../core/uploads/gallery/thumb/'. $this->siteConfig["getID"] .'.jpg" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=gallery/gallerycover&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-sm"  style="float:right; margin-right:80px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }
    
    public function categoryImgControl()
    {
        if (file_exists("../core/uploads/product/thumb/category_" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/product/category_'. $this->siteConfig["getID"] .'.jpg" class="myfancyImg"><img src="../core/uploads/product/thumb/category_'. $this->siteConfig["getID"] .'.jpg" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=product/categoryimage&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-small" style="margin-right:27px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }
    
    public function productImgControl()
    {
        if (file_exists("../core/uploads/product/thumb/profil_" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/product/profil_'. $this->siteConfig["getID"] .'.jpg" class="myfancyImg"><img src="../core/uploads/product/thumb/profil_'. $this->siteConfig["getID"] .'.jpg" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    <a href="main.php?module=product/productimage&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-small" style="margin-right:27px;"><i class="icon-remove icon-white"></i> Resim Sil</a>';
        }
    }

    public function pageDocControl()

    {	
	
		$editData = $this->selectDB("md_doc","page_id",$this->siteConfig["getID"]); 

        if (file_exists("../core/uploads/page/document/" . $editData["doc_name"])) {
	       return '
		   <a href="../core/uploads/page/document/'. $editData["doc_name"] .'" class="btn btn-info btn-small" style="margin-right:20px; margin-top:13px;" target="_blank"><i class="icon-file icon-white"></i> '. $editData["doc_name"] .'</a>
			<a href="main.php?module=page/pagedocument&id='. $this->siteConfig["getID"] .'&delete" id="pageImgDel" class="btn btn-danger btn-small" style="margin-right:27px; margin-top:13px;"><i class="icon-remove icon-white"></i> Doküman Sil</a>';

        }

    }
    
    
    public function pageLogoControl($hover, $bg)
    {
        if (file_exists("../core/uploads/page/images/".$hover."_" . $this->siteConfig["getID"] . ".png")) {
	       return '<a href="../core/uploads/page/images/'.$hover.'_'. $this->siteConfig["getID"] .'.png" class="img-thumbnail myfancyImg" style="padding:15px; background:#'.$bg.';"><img src="../core/uploads/page/images/'.$hover.'_'. $this->siteConfig["getID"] .'.png" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    ';
        }
    }
    
    
    public function pageLogoControlN($hover, $bg)
    {
        if (file_exists("../core/uploads/page/images/".$hover."_" . $this->siteConfig["getID"] . ".jpg")) {
	       return '<a href="../core/uploads/page/images/'.$hover.'_'. $this->siteConfig["getID"] .'.jpg" class="img-thumbnail myfancyImg" style="padding:15px; background:#'.$bg.';"><img src="../core/uploads/page/images/'.$hover.'_'. $this->siteConfig["getID"] .'.jpg" class="img-polaroid" style= "width:100%;"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    ';
        }
    }

    public function pageContactControl($hover, $id)
    {
        if (file_exists("../core/uploads/page/contact/".$hover."_" . $id . ".jpg")) {
	       return '<a href="../core/uploads/page/contact/'.$hover.'_'. $id .'.jpg" class="img-thumbnail myfancyImg" style="padding:15px;"><img src="../core/uploads/page/contact/'.$hover.'_'. $id .'.jpg" class="img-polaroid" style="width:100%;"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    ';
        }
    }

    public function siteLogoControl($hover, $bg)
    {
        if (file_exists("../core/uploads/logo/site_logo.png")) {
	       return '<a href="../core/uploads/logo/site_logo.png" class="img-thumbnail myfancyImg" style="padding:15px; background:#'.$bg.';"><img src="../core/uploads/logo/site_logo.png" class="img-polaroid" style="width:100%;"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    ';
        }
    }

    public function siteLogoControlw($hover, $bg)
    {
        if (file_exists("../core/uploads/logo/site_logo_w.png")) {
	       return '<a href="../core/uploads/logo/site_logo_w.png" class="img-thumbnail myfancyImg" style="padding:15px; background:#'.$bg.';"><img src="../core/uploads/logo/site_logo_w.png" class="img-polaroid"></a><div class="clearfix" style="margin-bottom:15px;"></div>
    ';
        }
    }
		
    public function pageGroupUpdateDB($groupID, $parentID)
    {
		$query = "SELECT * FROM md_page WHERE (page_parent = '". $parentID ."')";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            $this->updateDB("md_page",$groupID,"page_id",$row["page_id"]);
            $this->pageGroupUpdateDB($groupID, $row["page_id"]);
        }
    }
        
    public function categoryGroupUpdateDB($groupID, $parentID)
    {
		$query = "SELECT * FROM md_product_categories WHERE (category_parent = '". $parentID ."')";
        $result = $this->query($query);
        while($row = $this->fetch_array($result)){
            $this->updateDB("md_product_categories",$groupID,"category_id",$row["category_id"]);
            $this->categoryGroupUpdateDB($groupID, $row["category_id"]);
        }
    }
    
    
    public function categorythumb($file, $name)
    {
        $thumbupload = new upload($file);
        $thumbupload->uploaded;
        $thumbupload->file_overwrite    	= true;
        $thumbupload->file_new_name_body    = $name;
    	
        /**/
        
        $thumbupload->image_resize          = true;
        $thumbupload->image_ratio_crop      = true;
        $thumbupload->image_y               = 140;
        $thumbupload->image_x               = 140;
    	
        /**/
        if($thumbupload->file_src_name_ext != 'jpg'){
            $thumbupload->image_convert 	        	= 'jpg'; 
        }
        
        $thumbupload->process("../core/uploads/product/thumb/");
    	if ($thumbupload->processed){
    	    $thumbupload->clean();
    	}else{
    	        //echo 'Resim Yüklenemedi: '.$upload->error;
        }
      return $thumbupload;
	}
   
    public function productthumb($file, $name)
    {
        $thumbupload = new upload($file);
        $thumbupload->uploaded;
        $thumbupload->file_overwrite    	= true;
        $thumbupload->file_new_name_body    = $name;
    	
        /**/
        
        $thumbupload->image_resize          = true;
        $thumbupload->image_ratio_crop      = true;
        $thumbupload->image_y               = 140;
        $thumbupload->image_x               = 140;
    	
        /**/
        if($thumbupload->file_src_name_ext != 'jpg'){
            $thumbupload->image_convert 	        	= 'jpg'; 
        }
        
        $thumbupload->process("../core/uploads/product/thumb/");
    	if ($thumbupload->processed){
    	    $thumbupload->clean();
    	}else{
    	        //echo 'Resim Yüklenemedi: '.$upload->error;
        }
      return $thumbupload;
	}

    public function gallerythumb($file, $name)
    {
        $thumbupload = new upload($file);
        $thumbupload->uploaded;
        $thumbupload->file_overwrite    	= true;
        $thumbupload->file_new_name_body    = $name;
        /**/
        $thumbupload->image_resize          = true;
        $thumbupload->image_ratio_crop      = true;
        $thumbupload->image_y               = 140;
        $thumbupload->image_x               = 140;
        /**/
        if($thumbupload->file_src_name_ext != 'jpg'){
            $thumbupload->image_convert 	        	= 'jpg'; 
        }
        
        $thumbupload->process("../core/uploads/gallery/thumb/");
    	if ($thumbupload->processed){
    	    $thumbupload->clean();
    	}else{
    		//echo 'Resim Yüklenemedi: '.$upload->error;
        }
      return $thumbupload;
	}
       
       
    
    
  

    
  /*#####################################*/
  
  
  
  
    
    
	public function getChartDate()
	{

		$before = array("1","2","3","4","5","6","7","8","9","10","11","12");
		$after = array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");

		if(isset($_POST["month"])){
			$this->charts["month"] = $_POST["month"];	
		} else {
			$this->charts["month"] = date("m");
		}

		$this->charts["month2"] = str_replace($before, $after, $this->charts["month"]);

		if(isset($_POST["year"])){
			$this->charts["year"] = $_POST["year"];	
		} else {
			$this->charts["year"] = date("Y");
		}

	}

	public function chartMonth()
	{
		GLOBAL $_POST;

		$m = array(	"01" => "Ocak", 
					"02" => "Şubat", 
					"03" => "Mart",
					"04" => "Nisan", 
					"05" => "Mayıs", 
					"06" => "Haziran", 
					"07" => "Temmuz", 
					"08" => "Ağustos", 
					"09" => "Eylül", 
					"10" => "Ekim", 
					"11" => "Kasım", 
					"12" => "Aralık");

		foreach($m as $key => $value){

			$data .= '<option value="' . $key . '"';	
			if($this->charts["month"] == $key){
				$data .= ' selected';
			}
			$data .= '>' . $value . '</option>';

		}

		return $data;

	}

	public function chartYear()
	{
		GLOBAL $_POST;

		$year = date("Y");
		for($i=2000;$i<=$year;$i++){
			$data .= '<option value="' . $i . '"';	
			if($this->charts["year"] == $i){
				$data .= ' selected';
			}

			$data .= '>' . $i . '</option>';

		}

		return $data;

	}

    
	
	public function gallerySelectBoxMenu($galleryID = ""){
	
		$query = "SELECT * FROM md_gallery ORDER BY gallery_order ASC";
		
		$result = $this->query($query);	
		
		while($row = $this->fetch_array($result)){
			
			$data .= '<option value="'. $row["gallery_id"] .'"';
            
			if($galleryID == $row["gallery_id"]){ $data .= ' selected'; }
            
			$data .= '>'. $row["gallery_title1"] .'</option>';
			
		}
		return $data; 
		
	}
    
    
    
    
    public function pageProductthumb($file, $name)
    {
        $thumbupload = new upload($file);
        $thumbupload->uploaded;
        $thumbupload->file_overwrite    	= true;
        $thumbupload->file_new_name_body    = $name;
        /**/
        $thumbupload->image_resize          = true;
        $thumbupload->image_ratio_crop      = true;
        $thumbupload->image_y               = 140;
        $thumbupload->image_x               = 140;
        /**/
        if($thumbupload->file_src_name_ext != 'jpg'){
            $thumbupload->image_convert 	        	= 'jpg'; 
        }

        $thumbupload->process("../core/uploads/page/gallery/thumb/");
    	if ($thumbupload->processed){
    	    $thumbupload->clean();
    	}else{
    	        //echo 'Resim Yüklenemedi: '.$upload->error;
        }
      return $thumbupload;
	}
    
    
    
    
    
	public function pageSlug($pageTitle,$lang = "1")
	{
		
	if($lang=="1"){
	$lang = "";
	}
	$pageSlug = "page_slug".$lang;


	$query = "SELECT page_slug FROM md_page WHERE ".$pageSlug." = '".$this->urlCleaner($pageTitle)."' OR ".$pageSlug." REGEXP '".$this->urlCleaner($pageTitle)."-[0-9]*'";
	$result = $this->query($query);
	$count = $this->numrows($result);
	



	if($count!="0"){

	while($row = $this->fetch_array($result)){
		$urlNum = explode("-",$row[$pageSlug]);
		$allUrlNum[] = preg_replace('/\D/', '', end($urlNum)) ;
	}
		$value = max($allUrlNum);
		
		$lastUrlNm = $value + 1;
		
		$pageURL = $this->urlCleaner($pageTitle)."-".$lastUrlNm;
		
	}else{
		
		$pageURL = $this->urlCleaner($pageTitle);
		
	}



		
		
		
		return $pageURL;
		
	}
    
    
    
    

	
    
    
    public function categorySelect($parent, $value = "", $groupID){
	
		GLOBAL $getData;
		
		if($parent != 0){ $value .= "->"; }
		
		$query = "SELECT * FROM md_page WHERE (page_group = '". $groupID ."') AND (is_category = '1') AND (page_parent = '". $parent ."') ORDER BY page_order DESC";
	
		$result = $getData->query($query);
		
		while($row = $getData->fetch_array($result)){
			
			if($parent == 0){
			
			$data .= '<option  value="'. $row["page_id"].'">'. $value ." ". unhtmlDBString($row["page_title1"]) .'</option>';
			
			} else {
			
			$data .= '<option  value="'. $row["page_id"].'">'. $value ." ". unhtmlDBString($row["page_title1"]) .'</option>';
				
			}
			
			$data .= $this->categorySelect($row["page_id"], $value, $groupID);
	
		}
		
		return $data;
	
	}

    
    public function categoryESelect($parent, $value = "", $groupID, $pageID){
	
		GLOBAL $getData;
		
		if($parent != 0){ $value .= "->"; }
		
		$query = "SELECT * FROM md_page WHERE (page_group = '". $groupID ."') AND (is_category = '1') AND (page_parent = '". $parent ."') ORDER BY page_order DESC";
		$result = $getData->query($query);
		while($row = $getData->fetch_array($result)){
			
			
			$selectQuery = "SELECT * FROM md_product_relationships WHERE (product_id = '". $pageID ."') AND (category_id = '".$row["page_id"]."')";
			$selectResult = $getData->query($selectQuery);
			$selectRow = $getData->fetch_array($selectResult);
			$selectCount = $this->numrows($selectResult);
			
			if($selectCount!="0"){
				$selecteD = "selected";
			}else{
				$selecteD = "";
			}
			
			
			if($parent == 0){
				$data .= '<option  value="'. $row["page_id"].'" '.$selecteD.'>'. $value ." ". unhtmlDBString($row["page_title1"]) .'</option>';
			} else {
				$data .= '<option  value="'. $row["page_id"].'" '.$selecteD.'>'. $value ." ". unhtmlDBString($row["page_title1"]) .'</option>';
			}
			
			$data .= $this->categoryESelect($row["page_id"], $value, $groupID, $pageID);
	
		}
		
		return $data;
	
	}
    
    
    
    
    
    
    
} //END CLASS

?>
