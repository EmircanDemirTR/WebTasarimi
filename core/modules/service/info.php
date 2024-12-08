<?PHP



$product_module = "Ürünler";

 $product_module_pagelist = '<li class="breadcrumb-item"><a href="#"> '. $product_module .'</a></li> <li class="breadcrumb-item active"> Ürün Listesi</li>';
 $product_module_pageadd = '<li class="breadcrumb-item"><a href="#"> '. $product_module .'</a></li> <li class="breadcrumb-item active"> Yeni Ürün Ekle</li>';
 $product_module_pageedit = '<li class="breadcrumb-item"><a href="#"> '. $product_module .'</a></li> <li class="breadcrumb-item active"> Ürün Düzenle</li>';
 $product_module_pageimage = '<li class="breadcrumb-item"><a href="#"> '. $product_module .'</a></li> <li class="breadcrumb-item active"> Ürün Düzenle</li>';
 $product_module_grouplist = '<li class="breadcrumb-item"><a href="#"> '. $product_module .'</a></li> <li class="breadcrumb-item active"> Grup Listesi</li>';
 $product_module_groupadd = '<li class="breadcrumb-item"><a href="#"> '. $product_module .'</a></li> <li class="breadcrumb-item active"> Yeni Grup Ekle</li>';
 $product_module_groupedit = '<li class="breadcrumb-item"><a href="#"> '. $product_module .'</a></li> <li class="breadcrumb-item active"> Grup Düzenle</li>';

 $product_module_menu = '<li><a href="#listPro" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation"></i>'. $product_module .'</a>
  <ul id="listPro" class="collapse list-unstyled"> ';
		  

$product_module_menu .= '<li><a href="main.php?module=product/pagelist">Ürün Listesi</a></li>
		              <li><a href="main.php?module=product/pageadd">Yeni Ürün Ekle</a></li>
					  <li><a href="main.php?module=product/categoryList">Kategori Listesi</a></li>
					  <li><a href="main.php?module=product/catAdd">Yeni Kategori Ekle</a></li>
					  ';





 $product_module_menu .= '</ul></li>';

 

?>