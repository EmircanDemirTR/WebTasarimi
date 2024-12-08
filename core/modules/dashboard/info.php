<?PHP



 $dashboard_module = "Analytics";

 $dashboard_module_dashboard = '<li class="breadcrumb-item active">İstatislikler</li>';
 $dashboard_module_settings = '<li class="breadcrumb-item"><a href="#"> '. $dashboard_module .'</a></li> <li class="breadcrumb-item active"> Analytics Ayarlar</li>';

 $dashboard_module_menu = '<li><a href="#listDashboard" aria-expanded="false" data-toggle="collapse"> <i class="icon-line-chart"></i>'. $dashboard_module .'</a>
  <ul id="listDashboard" class="collapse list-unstyled"> ';
		  

$dashboard_module_menu .= '<li><a href="main.php?module=dashboard/dashboard">Analytics Veriler</a></li>
		              <li><a href="main.php?module=dashboard/settings">Analytics Ayarlar</a></li>';




 $dashboard_module_menu .= '</ul></li>';

 

?>