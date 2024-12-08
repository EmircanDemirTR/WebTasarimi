<?PHP

/**
 * @author Fikir Kahvesi
 * @copyright 2013
 */

require_once("../core/class/init.php");

require_once("../core/libraries/mailer/class.phpmailer.php");

$adminEngine = new adminEngine();

$_SESSION["admin"] = "";

switch($_POST["login"]){
	
	case "user":

	$loginCSS = '';
	
	$recoveryCSS = '';


	$adminEmail = htmlDBString($_POST["email"]);
	
	$adminPass = htmlDBString($_POST["pass"]);
	
	if($adminEmail != "" && $adminPass != ""){
	
		$login = $getData->selectDB("md_administrator","admin_email",$adminEmail);
		
		if ($login ["admin_pass"] != $adminPass || $login ["admin_enabled"] == 0) {
			
			$loginMsg = $adminEngine->notifyError("<h4>Hatalı giriş!</h4> Lütfen kullanıcı bilgilerinizi kontrol ediniz...");
	
		} else {
			
			$data = array("admin_login" => $getData->getDate());
			
			$getData->updateDB("md_administrator", $data, "admin_id", $login["admin_id"]);
			
			unset($login["admin_pass"]);
				
			$_SESSION["admin"]["login"] = true;
			
			$_SESSION["admin"] = $login;
			
			redirect("main.php");
			
		}
	
	} else {
		
		$loginMsg = $adminEngine->notifyError("<h4>Hatalı giriş!</h4> Formdaki tüm alanların doldurulması gerekmektedir.");
	}
	
	break;
	
	/**/
	
	case "recovery":

	$loginCSS = 'style="display:none;"';
	
	$recoveryCSS = 'style="display:block;"';


	$recoveryEmail = htmlDBString($_POST["recovery"]);
	
	if($recoveryEmail != ""){
		
		$adminEngine->forgotPass($recoveryEmail);
	
	} else {
		
		$recoveryMsg =  $adminEngine->notifyError("<h4>Hata!</h4>Lütfen e-posta adresini giriniz.");
	}
		
	
	break;
	
	/**/
	
	default:
	
	break;
	
}

?>
<!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?PHP print $adminEngine->adminTitle();?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="../core/libraries/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../core/libraries/bootstrap/css/style.blue.css">
    <link rel="stylesheet" href="../core/libraries/bootstrap/css/custom.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

</head>
<body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1><?PHP print $getData->siteConfig["sitename"];?></h1>
                  </div>
                  <p>Yönetici Girişi</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <?PHP print $loginMsg; ?>
                  <form id="login-form" method="post" action="">
                    <div class="form-group">
                      <input id="email" type="text" name="email" required="" class="input-material">
                      <label for="login-username" class="label-material">E-posta adresiniz</label>
                    </div>
                    <div class="form-group">
                      <input id="pass" type="password" name="pass" required="" class="input-material">
                      <label for="login-password" class="label-material">Parola</label>
                      <input type="hidden" name="login" id="login" value="user" />
                    </div><input type="submit" class="btn btn-primary" value="Giriş" /><br><br>
                  </form><a href="#" class="forgot-pass">Şifremi Unuttum!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">

      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../core/libraries/bootstrap/js/tether.min.js"></script>
    <script src="../core/libraries/bootstrap/js/bootstrap.min.js"></script>
    <script src="../core/libraries/bootstrap/js/popper.js"></script>
    <script src="../core/libraries/bootstrap/js/jquery.cookie.js"> </script>
    <script src="../core/libraries/bootstrap/js/jquery.validate.min.js"></script>
    <script src="../core/libraries/bootstrap/js/front.js"></script>

</body>
</html>