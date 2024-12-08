<?php
$etaData = $getData->selectDB("md_page","page_id","1114");
?>

				<section class="section">
					<div class="container">
						<div class="row bottom-70">
							<div class="col-lg-4">
								<div class="heading bottom-40"><span class="heading__pre-title"><?=$etaData["page_title".contentLang()];?></span>
									<h3 class="heading__title"><?=$etaData["page_title".contentLang()];?></h3><span class="heading__layout"><?=$etaData["page_title".contentLang()];?></span>
								</div><a class="button button--green d-none d-lg-inline-block" href="<?php print $getData->urlCreateLang("1094",systemLanggg());?>"><span><?=$eksT39[systemLangg()];?></span> 
								<svg class="icon">
									<use xlink:href="#arrow"></use>
								</svg></a>
							</div>
							<div class="col-lg-8">
								<?=unhtmlDBString($etaData["page_content_all".contentLang()]);?>
							</div>
						</div>
                        
						<div class="row offset-50">
<?php
$x=0;
$query = "SELECT * FROM md_page WHERE (page_parent = '1094') AND (page_group = '1') AND (page_status = '1') ORDER BY page_date DESC limit 4";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){
$x++;

$tarih2 = explode("-",$row["page_date"]);



?>                          
							<div class="col-sm-6 col-xl-3">
								<div class="count-item">
									<h6 class="count-item__title"><span class="count-item__count">0<?=$x;?></span> <span><a href="<?=$getData->urlCreate($row["page_id"],"","");?>" text-decoration: none;> <?=unhtmlDBString($row["page_title".contentLang()]);?></a></span></h6>
								</div>
							</div>
<?php } ?>                            

						</div>
                        
						<div class="row top-70 d-flex d-lg-none">
							<div class="col-12 text-center"><a class="button button--green" href="<?php print $getData->urlCreateLang("1094",systemLanggg());?>"><span><?=$eksT39[systemLangg()];?></span> 
								<svg class="icon">
									<use xlink:href="#arrow"></use>
								</svg></a></div>
						</div>
					</div>
				</section>












<?php
$etaDataa = $getData->selectDB("md_page","page_id","1116");
?>


				<section class="section front-about">
					<div class="front-about__bg"><img class="section--bg t50 r0" src="img/testimonials-bg.png" alt="img"/></div>
					<div class="front-about__img"><img class="img--bg" src="core/uploads/page/images/<?=$etaDataa["page_id"];?>.jpg" alt="img"/></div>
					<div class="container">
						<div class="row">
							<div class="col-xl-4 offset-xl-1 d-none d-xl-flex offset-50">
								<div class="counter counter--filled">
									<div class="counter__top"><span class="js-counter counter__count">20</span><span class="counter__subject"><?=$eksT40[systemLangg()];?></span></div>
									<div class="counter__lower"><span class="counter__details"><?=$eksT41[systemLangg()];?></span></div>
								</div>
							</div>
							<div class="col-xl-7">
								<div class="heading heading--white"><span class="heading__pre-title"><?=$etaDataa["page_content".contentLang()];?></span>
									<h3 class="heading__title"><?=$etaDataa["page_title".contentLang()];?></h3>
								</div>
								<?=unhtmlDBString($etaDataa["page_content_all".contentLang()]);?>
                                
                                <a class="button button--white" href="<?php print $getData->urlCreateLang("1094",systemLanggg());?>"><span><?=$eksT16[systemLangg()];?></span> 
									<svg class="icon">
										<use xlink:href="#arrow"></use>
									</svg></a>
							</div>
						</div>
					</div>
				</section>



















				<section class="section front-gallery">
					<div class="container">
						<div class="row align-items-end bottom-60">
							<div class="col-lg-8">
								<div class="heading"><span class="heading__pre-title"><?=$eksT42[systemLangg()];?></span>
									<h3 class="heading__title"><?=$eksT42[systemLangg()];?></h3><span class="heading__layout"><?=$eksT42[systemLangg()];?></span>
								</div>
							</div>
							<div class="col-lg-4 text-right d-none d-lg-block"><a class="button button--green" href="urunler.php"><span><?=$eksT39[systemLangg()];?></span> 
								<svg class="icon">
									<use xlink:href="#arrow"></use>
								</svg></a>
							</div>
						</div>
					</div>
					<div class="gallery">
						<div class="row no-gutters">
<?php

$proQuery = "SELECT * FROM md_page WHERE (is_category = '0') AND (page_group = '3') AND (page_firsat = '1') ORDER BY page_order ASC";
$proResult = $getData->query($proQuery);
while($proRow = $getData->fetch_array($proResult)){

?>                        
							<div class="col-md-6 col-lg-4 col-xl-3">
								<a class="gallery__item" href="<?=$getData->urlCreate($proRow["page_id"],"","");?>">
									<span class="overlay"></span>
									<img class="img--bg" src="core/uploads/page/images/<?=$proRow["page_id"];?>.jpg" alt="img"/>
									<span class="gallery__description"><?=unhtmlDBString($proRow["page_title".contentLang()]);?></span>
								</a>
							</div>
<?php } ?>                            

						</div>
						<div class="row top-50 d-block d-lg-none">
							<div class="col-12 text-center"><a class="button button--green" href="<?=$getData->urlCreate("1095","","");?>"><span><?=$eksT39[systemLangg()];?></span> 
								<svg class="icon">
									<use xlink:href="#arrow"></use>
								</svg></a>
							</div>
						</div>
					</div>
				</section>













				<section class="section bg--lgray front-blog">
					<div class="container">
						<div class="row">
							<div class="col-xl-4 d-flex flex-column align-items-start">
								<div class="heading"><span class="heading__pre-title">Blog</span>
									<h3 class="heading__title"><?=$eksT29[systemLangg()];?></h3><span class="heading__layout layout--lgray">Blog</span>
								</div><a class="d-none d-xl-inline-block button button--green" href="<?=$getData->urlCreate("1103","","");?>"><span><?=$eksT39[systemLangg()];?></span> 
									<svg class="icon">
										<use xlink:href="#arrow"></use>
									</svg></a>
								<div class="articles-slider__nav"></div>
							</div>
							<div class="col-xl-8">
								<div class="articles-slider-wrapper">
									<div class="articles-slider">
										
<?php
$query = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '48') AND (page_status = '1') ORDER BY page_date DESC";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){


$tarih2 = explode("-",$row["page_date"]);



?>                                        
										<div class="articles-slider__item">
											<div class="article">
												<div class="article__img"><img class="img--bg" src="core/uploads/page/images/<?=$row["page_id"];?>.jpg" alt="img"/></div>
												<div class="article__lower">
													<h6 class="article__title"><a href="blog-detay.php"><?=unhtmlDBString($row["page_title".contentLang()]);?></a></h6>
													<p class="article__text"><?=unhtmlDBString($row["page_content".contentLang()]);?></p>
													<div class="article__details"><span><?=$tarih2[2];?>/<?=$tarih2[1];?>/<?=$tarih2[0];?></span></div>
												</div>
											</div>
										</div>
<?php } ?>


									</div>
								</div>
								<div class="row top-50 d-block d-xl-none">
									<div class="col-12 text-center"><a class="button button--green" href="<?=$getData->urlCreate("1103","","");?>"><span><?=$eksT39[systemLangg()];?></span> 
										<svg class="icon">
											<use xlink:href="#arrow"></use>
										</svg></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>











				<section class="section pt-0 bg--lgray">
					<div class="container">
						<div class="row bottom-70">
							<div class="col-12">
								<div class="heading heading--center"><span class="heading__pre-title"><?=$eksT43[systemLangg()];?></span>
									<h3 class="heading__title"><?=$eksT43[systemLangg()];?></h3><span class="heading__layout layout--lgray"><?=$eksT44[systemLangg()];?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="logos-slider">
<?php  
$query = "SELECT * FROM md_images where image_gallery='98' ORDER BY image_order ASC";
$result = $getData->query($query);
while($row = $getData->fetch_array($result)){
$image = $row["image_name"];
	
	
?>                                 
									<div class="logos-slider__item"><img src="core/uploads/gallery/<?php echo $image;?>" alt="logo"/></div>
<?php } ?>                                    
								</div>
								<div class="logos-slider__dots"></div>
							</div>
						</div>
					</div>
				</section>

