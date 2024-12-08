<?PHP

/**
 * @author Fikir Kahvesi
 * @copyright 2013
 */
 
 $gallery_module = "Galeri";
 
 $gallery_module_gallerylist = '<li class="breadcrumb-item"><a href="#"> '. $gallery_module .'</a></li> <li class="breadcrumb-item active"> Galleri Listesi</li>';
 
 $gallery_module_galleryadd = '<li class="breadcrumb-item"><a href="#"> '. $gallery_module .'</a></li> <li class="breadcrumb-item active"> Yeni Galeri Ekle</li>';
 
 $gallery_module_galleryedit = '<li class="breadcrumb-item"><a href="#"> '. $gallery_module .'</a></li> <li class="breadcrumb-item active"> Galeri Düzenle</li>';
 
 $gallery_module_gallerycover = '<li class="breadcrumb-item"><a href="#"> '. $gallery_module .'</a></li> <li class="breadcrumb-item active"> Galeri Düzenle</li>';
 
 $gallery_module_galleryimages = '<li class="breadcrumb-item"><a href="#"> '. $gallery_module .'</a></li> <li class="breadcrumb-item active"> Galeri Düzenle</li>';
 
 $gallery_module_menu = '<li><a href="#listGallery" aria-expanded="false" data-toggle="collapse"> <i class="icon-picture"></i>'. $gallery_module .'</a>
          <ul id="listGallery" class="collapse list-unstyled">
		    <li><a href="main.php?module=gallery/gallerylist">Galeri Listesi</a></li>
            <li><a href="main.php?module=gallery/galleryadd">Yeni Galeri Ekle</a></li>
          </ul>
        </li>';
 
?>