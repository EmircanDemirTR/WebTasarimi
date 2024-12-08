<?PHP



$home_module = "Anasayfa";

 $home_module_pagelist = '<li class="breadcrumb-item"><a href="#"> '. $home_module .'</a></li> <li class="breadcrumb-item active"> İçerik Listesi</li>';
 $home_module_pageadd = '<li class="breadcrumb-item"><a href="#"> '. $home_module .'</a></li> <li class="breadcrumb-item active"> Yeni İçerik Ekle</li>';
 $home_module_pageedit = '<li class="breadcrumb-item"><a href="#"> '. $home_module .'</a></li> <li class="breadcrumb-item active"> İçerik Düzenle</li>';
 $home_module_pageimage = '<li class="breadcrumb-item"><a href="#"> '. $home_module .'</a></li> <li class="breadcrumb-item active"> İçerik Düzenle</li>';
 $home_module_grouplist = '<li class="breadcrumb-item"><a href="#"> '. $home_module .'</a></li> <li class="breadcrumb-item active"> Grup Listesi</li>';
 $home_module_groupadd = '<li class="breadcrumb-item"><a href="#"> '. $home_module .'</a></li> <li class="breadcrumb-item active"> Yeni Grup Ekle</li>';
 $home_module_groupedit = '<li class="breadcrumb-item"><a href="#"> '. $home_module .'</a></li> <li class="breadcrumb-item active"> Grup Düzenle</li>';

 $home_module_menu = '<li><a href="#listHome" aria-expanded="false" data-toggle="collapse"> <i class="icon-home"></i>'. $home_module .'</a>
  <ul id="listHome" class="collapse list-unstyled"> ';
		  

$home_module_menu .= '<li><a href="main.php?module=home/homelist">İçerik Listesi</a></li>
		              <li><a href="main.php?module=home/homeadd">Yeni İçerik Ekle</a></li>';




 $home_module_menu .= '</ul></li>';

 

?>