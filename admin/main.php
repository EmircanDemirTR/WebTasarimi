<?PHP

/**
 * @author Fikir Kahvesi
 * @copyright 2013
 */

require_once("../core/class/init.php");

require_once("../core/admin/security.php");

$adminEngine = new adminEngine();

$adminEngine->getAdminTemplate();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?PHP print $adminEngine->adminTitle();?></title>
<?PHP print $getData->importLibCSS("fancybox2/css/fancybox.css"); ?>
<?PHP print $getData->importLibCSS("fancybox2/css/fancybox-thumbs.css"); ?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="../core/libraries/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../core/libraries/bootstrap/css/style.green.css">
    <link rel="stylesheet" href="../core/libraries/bootstrap/css/custom.css">
    <link rel="stylesheet" href="../core/libraries/bootstrap/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link rel="stylesheet" href="slim.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="../core/libraries/bootstrap/js/tether.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="../core/libraries/bootstrap/js/bootstrap.min.js"></script>
    <script src="../core/libraries/bootstrap/js/bootstrap-multiselect.js"></script>
    
	<script src="slim.kickstart.min.js"></script>
<script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap4.min.js"></script>
<style type="text/css">
.tab-content .container-fluid { padding:0;}
</style>
<script type="text/javascript">
$(document).ready(function(){
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})
});
</script>
</head>
<body>
<div class="page charts-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="/admin/main.php" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span><?PHP print $getData->siteConfig["sitename"]; ?> </span> <strong>Yönetim Paneli</strong></div>
                  <div class="brand-text brand-small"><strong>MAY</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                
               
                <!-- Logout    -->
                <li class="nav-item"><a href="index.php" class="nav-link logout">Çıkış<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="../core/libraries/bootstrap/img/avatar-1.png" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?PHP print $_SESSION["admin"]["admin_fname"] . " " . $_SESSION["admin"]["admin_lname"]?></h1>
              <p>Site Admin</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <?PHP print $adminEngine->adminMenu(); ?>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Tables</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
             	<li class="breadcrumb-item"><a href="/admin/main.php?module=dashboard/dashboard">Anasayfa</a></li>
				<?PHP //print $moduleInfo; ?>
            </div>
          </ul>
          <section class="tables forms">   
            <div class="container-fluid">
              <div class="row">
              	
              	<?PHP include $adminEngine->moduleTemplate; ?>
              	
              	
              </div>
            </div>
          </section>
          
          
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Copyright &copy; <?PHP print date("Y");?> <?PHP print $getData->siteConfig["sitename"];?>. </p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="http://www.yenicozum.com" class="external" target="_blank">Yeni Çözüm</a></p>
                </div>
              </div>
            </div>
          </footer>
          
          
          
          
        </div>
      </div>
    </div>
<script src="../core/libraries/bootstrap/js/jquery.cookie.js"> </script>
<script src="../core/libraries/bootstrap/js/jquery.validate.min.js"></script>
<script src="../core/libraries/bootstrap/js/front.js"></script>

<?PHP require_once "../core/admin/scripts.php";?>
</body>
</html>
<?PHP $getData->close(); ?>