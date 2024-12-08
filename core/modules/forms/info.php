<?PHP



$forms_module = "Üye";

 $forms_module_pagelist = '<li class="breadcrumb-item"><a href="#"> '. $forms_module .'</a></li> <li class="breadcrumb-item active"> Üye Listesi</li>';
 $forms_module_pageview = '<li class="breadcrumb-item"><a href="#"> '. $forms_module .'</a></li> <li class="breadcrumb-item active"> Üye Gürüntüle</li>';

 $forms_module_menu = '<li><a href="#listForm" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>'. $forms_module .'</a>
  <ul id="listForm" class="collapse list-unstyled"> ';
		  

$forms_module_menu .= '<li><a href="main.php?module=forms/formlist">Üye Listesi</a></li>';
$forms_module_menu .= '<li><a href="main.php?module=forms/kitapKod">Kod Listesi</a></li>';
$forms_module_menu .= '<li><a href="main.php?module=forms/kodUret">Kod Üret</a></li>';


 if(loginUserID() == "1"){

 //$forms_module_menu .= '<li><a href="main.php?module=forms/excel">Excel Export</a></li>';
 }



 $forms_module_menu .= '</ul></li>';

 

?>