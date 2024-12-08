<?PHP


 $banner_module = "Banner";
 
 $banner_module_bannerlist = '<li class="breadcrumb-item"><a href="#"> '. $banner_module .'</a></li> <li class="breadcrumb-item active"> Banner Listesi</li>';
 
 $banner_module_banneradd = '<li class="breadcrumb-item"><a href="#"> '. $banner_module .'</a></li> <li class="breadcrumb-item active"> Yeni Banner Ekle</li>';
 
 $banner_module_banneredit = '<li class="breadcrumb-item"><a href="#"> '. $banner_module .'</a></li> <li class="breadcrumb-item active"> Banner Düzenle</li>';
 
 
 $banner_module_menu = '<li><a href="#listBanner" aria-expanded="false" data-toggle="collapse"> <i class="icon-picture"></i>'. $banner_module .'</a>
          <ul id="listBanner" class="collapse list-unstyled">
		    <li><a href="main.php?module=banner/bannerlist">Banner Listesi</a></li>
            <li><a href="main.php?module=banner/banneradd">Yeni Banner Ekle</a></li>
          </ul>
        </li>';
 
?>