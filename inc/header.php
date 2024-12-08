<body>
	<div class="page-wrapper">
		<!-- menu dropdown start-->
		<div class="menu-dropdown">
			<div class="menu-dropdown__inner" data-value="start">
				<div class="screen screen--start">
					<div class="menu-dropdown__close">
						<svg class="icon">
							<use xlink:href="#close"></use>
						</svg>
					</div>
					<div class="screen__item"><a class="screen__link" href="index.php"><?=$eksT13[systemLangg()];?></a></div>
					<div class="d-block d-lg-none bottom-20">
<?php
$query = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '1') AND (page_status = '1') AND (page_id != '1098') ORDER BY page_order ASC";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){
?>                        
						<div class="screen__item screen--trigger" data-category="screen-<?=$row["page_id"];?>"><span><?=unhtmlDBString($row["page_title".contentLang()]);?></span><span>
							<svg class="icon">
								<use xlink:href="#chevron-right"></use>
							</svg></span></div>
<?php }?>                        

					</div>
					<div class="menu-dropdown__block top-50"><span class="block__title">E-Posta</span><a class="screen__link" href="mailto:<?=$cDataa["x6"];?>"><?=$cDataa["x6"];?></a></div>
					<div class="menu-dropdown__block top-20"><span class="block__title">Telefon</span><a class="screen__link" href="tel:<?=phoneNumber($cDataa["x3"]);?>"><?=$cDataa["x3"];?></a><a class="screen__link" href="tel:<?=phoneNumber($cDataa["x7"]);?>"><?=$cDataa["x7"];?></a></div>
					<div class="menu-dropdown__block">
						<ul class="socials list--reset">
							<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["youtube"]?>">
								<svg class="icon">
									<use xlink:href="#youtube"></use>
								</svg></a></li>
							<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["facebook"]?>">
								<svg class="icon">
									<use xlink:href="#facebook"></use>
								</svg></a></li>
							<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["twitter"]?>">
								<svg class="icon">
									<use xlink:href="#twitter"></use>
								</svg></a></li>
							<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["linkedin"]?>">
								<svg class="icon">
									<use xlink:href="#linkedin"></use>
								</svg></a></li>
							<li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["insttagram"]?>">
								<svg class="icon">
									<use xlink:href="#inst"></use>
								</svg></a></li>
						</ul>
					</div>
					<div class="menu-dropdown__block top-50"><a class="button button--filled" href="<?=$getData->urlCreate("1098","","");?>"><?=$eksT6[systemLangg()];?></a>
					</div>
				</div>
			</div>
<?php
$query = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '1') AND (page_status = '1') AND (page_id != '1098') ORDER BY page_order ASC";
$result = $getData->query($query);
while($row = $getData->fetch_array($result)){
?>  
			<div class="menu-dropdown__inner" data-value="screen-<?=$row["page_id"];?>">
				<div class="screen screen--sub">
					<div class="screen__heading">
						<h6 class="screen__back">
							<svg class="icon">
								<use xlink:href="#chevron-left"></use>
							</svg> <span><?=unhtmlDBString($row["page_title".contentLang()]);?></span>
						</h6>
					</div>
                    
<?php if($row["page_id"]=="1095") { ?>
<?php
$queryyy = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '3') AND (page_status = '1') AND (is_category = '1') ORDER BY page_order ASC";
$resulttt = $getData->query($queryyy);
while($rowww = $getData->fetch_array($resulttt)){
?>                     
					<div class="screen__item"><a class="screen__link" href="<?=$getData->urlCreate($rowww["page_id"],"","");?>"><?=unhtmlDBString($rowww["page_title".contentLang()]);?></a></div>
<?php }?> 
                    
<?php }else{ ?>                     
<?php
$queryy = "SELECT * FROM md_page WHERE (page_parent = '".$row["page_id"]."') AND (page_group = '1') AND (page_status = '1') ORDER BY page_order ASC";
$resultt = $getData->query($queryy);
while($roww = $getData->fetch_array($resultt)){
?> 


   
                    
                    
					<div class="screen__item"><a class="screen__link" href="<?=$getData->urlCreate($roww["page_id"],"","");?>"><?=unhtmlDBString($roww["page_title".contentLang()]);?></a></div>
<?php }} ?>                    
				</div>
			</div>
<?php }?>            


		</div>

		<header class="page-header">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-8 col-md-6 col-lg-3 d-flex align-items-center">
						<!-- menu-trigger start-->
						<div class="hamburger d-none d-md-inline-block">
							<div class="hamburger-inner"></div>
						</div>
						<!-- menu-trigger end-->
						<div class="page-header__logo"><a href="index.php"><img src="/core/uploads/logo/site_logo.png" alt="logo" style="height:60px;"/></a></div>
					</div>
					<div class="col-lg-5 d-none d-lg-flex justify-content-center">
						<!-- main menu start-->
						<ul class="main-menu">
							<!--<li class="main-menu__item main-menu__item--active"><a class="main-menu__link" href="javascript:void(0);">Home</a></li>-->
							<?php print $getData->mainMenu();?>
						</ul>
					</div>
					<div class="col-4 col-md-6 col-lg-4 d-flex justify-content-end align-items-center">
						<div class="lang-block">
							<div class="lang-icon"><img class="img--contain" src="img/gbr.png" alt="img"/></div>
							<ul class="lang-select">
								<li class="lang-select__item lang-select__item--active">
                                    <?php if(systemLanggg() == "tr"){ ?>
                                    <span>EN</span>
                                    <?php }elseif(systemLanggg() == "en"){ ?>
                                    <span>TR</span>
                                    <?php }?>
									<ul class="lang-select__sub-list">
                                        <li><a href="<?php if($getData->pageData["page_id"]!=""){ echo "".$getData->urlCreateLang($getData->pageData["page_id"],"en"); }else{ echo "/en/";};?>">English</a></li>
										<li><a href="<?php if($getData->pageData["page_id"]!=""){ echo "".$getData->urlCreateLang($getData->pageData["page_id"],"tr"); }else{ echo "/tr/";};?>">Türkçe</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="hamburger d-inline-block d-md-none">
							<div class="hamburger-inner"></div>
						</div>
					</div>
				</div>
			</div>
		</header>