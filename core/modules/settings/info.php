<?PHP

/**
 * @author Fikir Kahvesi
 * @copyright 2013
 */
 
 $settings_module = "Ayarlar";
 
 $settings_module_define = '<li class="breadcrumb-item"><a href="#">'. $settings_module .'</a></li> <li class="breadcrumb-item active"> Tanımlamalar</li>';
 
 $settings_module_seo = '<li class="breadcrumb-item"><a href="#">'. $settings_module .'</a></li> <li class="breadcrumb-item active"> SEO</li>';
 
 $settings_module_socialmedia = '<li class="breadcrumb-item"><a href="#">'. $settings_module .'</a></li> <li class="breadcrumb-item active"> Sosyal Medya</li>';
 
 $settings_module_general = '<li class="breadcrumb-item"><a href="#">'. $settings_module .'</a></li> <li class="breadcrumb-item active"> Genel Ayarlar</li>';
  
 $settings_module_menu = '<li><a href="#listSettings" aria-expanded="false" data-toggle="collapse"> <i class="icon-bars"></i>'. $settings_module .'</a>
          <ul id="listSettings" class="collapse list-unstyled">
            <li><a href="main.php?module=settings/define">Tanımlamalar</a></li>
			<li><a href="main.php?module=settings/google">Google Servis Kodları</a></li>
            <li><a href="main.php?module=settings/seo">SEO</a></li>
            <li><a href="main.php?module=settings/socialmedia">Sosyal Medya</a></li>
            
            <li><a href="main.php?module=settings/contact">İletişim</a></li>
			';
 
 if(loginUserID() == "1"){
 		
 $settings_module_menu .= '<li><a href="main.php?module=settings/general">Genel Ayarlar</a></li>';
 
 }
 
  $settings_module_menu .= '<li><a href="main.php?module=settings/logo">Logo</a></li>';

 
 $settings_module_menu .= '</ul> </li>';
 
?>