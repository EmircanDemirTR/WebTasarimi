<div class="promo">
<div class="promo-slider"><?php  
$x = 0;
$query = "SELECT * FROM md_images where image_gallery='71' ORDER BY image_order ASC";
$result = $getData->query($query);
while($row = $getData->fetch_array($result)){
$x++;	
	$image = $row["image_name"];
	$imageTitle = $row["image_title1"];
	$imageTitle2 = $row["image_title2"];
	$imageContent = nl2br(unhtmlDBString($row["image_desc"]));
	$imageLink = $row["image_link"];
	$getChar = strlen($imageTitle);
	
	
	
	
?>     
					
						<div class="promo-slider__item">
							<div class="promo-slider__layout"></div>
							<picture>
								<source srcset="core/uploads/gallery/<?php echo $image;?>" media="(min-width: 992px)"/><img class="img--bg" src="core/uploads/gallery/<?php echo $image;?>" alt="img"/>
							</picture>
							<div class="align-container">
								<div class="align-container__item">
									<div class="container">
										<div class="row">
											<div class="col-lg-9 col-xl-7">
												<div class="promo-slider__wrapper-1"><span class="promo-slider__overlay">Solo</span>
													<h2 class="promo-slider__title"><?=$row["image_title".contentLang()];?></h2>
												</div>
												<div class="promo-slider__wrapper-2">
													<p class="promo-slider__subtitle"><?=$row["image_desc".contentLang()];?></p>
												</div>
												<div class="promo-slider__wrapper-3"><a class="button button--promo" href="<?=$getData->urlCreateLang("1098",systemLanggg());?>"><span><?=$eksT15[systemLangg()];?></span> 
													<svg class="icon">
														<use xlink:href="#arrow"></use>
													</svg></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<?php } ?>                        
						
						
					</div>
					<div class="promo__lower">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-md-5 col-lg-7 col-xl-8 d-flex align-items-start">
									<div class="promo-slider__nav"></div>
									<div class="promo-slider__count"></div>
								</div>
								<div class="col-md-7 col-lg-5 col-xl-4 top-20 top-md-0">
									<form class="tracking-form" action="javascript:void(0);" autocomplete="off">
										<label class="tracking-form__label">
											<input class="tracking-form__input" type="text" name="tracking" required="required"/><span class="tracking-form__placeholder"><a href="hakkimizda.php" style="text-decoration: none;">Hakkımızda</a></span>
										</label>
										<button class="tracking-form__submit" type="submit">
											<svg class="icon">
												<use xlink:href="#arrow"></use>
											</svg>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>