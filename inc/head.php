<?php 
$cDataa = $getData->selectDB("md_contact","id","1");
$beforee = array("+"," ","(",")");
$afterr = array("","","","");
$whatsss = str_replace($beforee,$afterr,$cDataa["x3"]);
$whatssss = str_replace($beforee,$afterr,$cDataa["x4"]);

include "inc/standartCon.php";
?> 
<!DOCTYPE html>
<html lang="en">
	
<head>
    <base href="/" />

	<meta charset="UTF-8"/>
	<meta name="description" content="description"/>
	<meta name="keywords" content="keywords"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<link rel="shortcut icon" href="img/favicon.ico"/>
    <?php include ("core/html/title.php");?>
	<link rel="stylesheet" href="css/styles.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

	<script>
		WebFontConfig = {
			google: {

				families: ['Inter:300,400,500,700', 'Open+Sans:700'],

			}
		}

		function font() {

			var wf = document.createElement('script')

			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
			wf.type = 'text/javascript'
			wf.async = 'true'

			var s = document.getElementsByTagName('script')[0]

			s.parentNode.insertBefore(wf, s)

		}

		font()
	</script>

	<?=unhtmlDBString3($getData->siteConfig["googleWebMaster"]);?>
    <?=unhtmlDBString3($getData->siteConfig["googleTagManager"]);?>
    
</head>
