<?PHP



$page_module = "Sayfalar";

 $page_module_pagelist = '<li class="breadcrumb-item"><a href="#"> '. $page_module .'</a></li> <li class="breadcrumb-item active"> İçerik Listesi</li>';
 $page_module_pageadd = '<li class="breadcrumb-item"><a href="#"> '. $page_module .'</a></li> <li class="breadcrumb-item active"> Yeni İçerik Ekle</li>';
 $page_module_pageedit = '<li class="breadcrumb-item"><a href="#"> '. $page_module .'</a></li> <li class="breadcrumb-item active"> İçerik Düzenle</li>';
 $page_module_pageimage = '<li class="breadcrumb-item"><a href="#"> '. $page_module .'</a></li> <li class="breadcrumb-item active"> İçerik Düzenle</li>';
 $page_module_grouplist = '<li class="breadcrumb-item"><a href="#"> '. $page_module .'</a></li> <li class="breadcrumb-item active"> Grup Listesi</li>';
 $page_module_groupadd = '<li class="breadcrumb-item"><a href="#"> '. $page_module .'</a></li> <li class="breadcrumb-item active"> Yeni Grup Ekle</li>';
 $page_module_groupedit = '<li class="breadcrumb-item"><a href="#"> '. $page_module .'</a></li> <li class="breadcrumb-item active"> Grup Düzenle</li>';

 $page_module_menu = '<li><a href="#listPage" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>'. $page_module .'</a>
  <ul id="listPage" class="collapse list-unstyled"> ';
		  

$page_module_menu .= '<li><a href="main.php?module=page/pagelist">İçerik Listesi</a></li>
		              <li><a href="main.php?module=page/pageadd">Yeni İçerik Ekle</a></li>';



 if(loginUserID() == "1"){

 $page_module_menu .= '<li><a href="main.php?module=page/grouplist">Grup Listesi</a></li>
            		   <li><a href="main.php?module=page/groupadd">Yeni Grup Ekle</a></li>';
 }

 $page_module_menu .= '</ul></li>';

 

?>