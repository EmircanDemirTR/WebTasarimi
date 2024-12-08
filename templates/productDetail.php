				<section class="section shop-product pb-0">
					<div class="container">
						<div class="row">
							<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0">
								<div class="dual-slider">
									<div class="main-slider">
<?php 
$x = 0;
$galleryMQuery = "select * from md_page_image WHERE (image_product = '".$getData->pageData["page_id"]."') order by image_order ASC";
$galleryMResult = $getData->query($galleryMQuery);
while($galleryMRow = $getData->fetch_array($galleryMResult)){
$x++;
?>                                      
										<div class="main-slider__item">
											<div class="main-slider__img"><img class="img--contain" src="core/uploads/page/gallery/<?=$galleryMRow["image_name"];?>" alt="single"/></div>
										</div>
<?php } ?>                                        
									</div>
									<div class="nav-slider">
<?php 
$x = 0;
$galleryMQuery = "select * from md_page_image WHERE (image_product = '".$getData->pageData["page_id"]."') order by image_order ASC";
$galleryMResult = $getData->query($galleryMQuery);
while($galleryMRow = $getData->fetch_array($galleryMResult)){
$x++;
?>                                       
										<div class="nav-slider__item">
											<div class="nav-slider__img"><img class="img--contain" src="core/uploads/page/gallery/<?=$galleryMRow["image_name"];?>" alt="single"/></div>
										</div>
<?php }?>                                        
										
									</div>
								</div>

							</div>
							<div class="col-lg-6">
								<div class="shop-product__top">
									<h3 class="shop-product__name"><?=$getData->pageData["page_title".contentLang()]?></h3>									
								</div>
								<div class="shop-product__description">
									<p><?=unhtmlDBString($getData->pageData["page_content".contentLang()])?></p>
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xl-12">
								<div class="tabs horizontal-tabs shop-product__tabs">
									<ul class="horizontal-tabs__header">
										<li><a href="#horizontal-tabs__item-1"><span><?=$eksT35[systemLangg()];?></span></a></li>
									</ul>
									<div class="horizontal-tabs__content">
										<div class="horizontal-tabs__item" id="horizontal-tabs__item-1">
											<p><strong><?=$eksT36[systemLangg()];?></strong></p>
											<?=unhtmlDBString($getData->pageData["page_content_all".contentLang()])?>  
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>




				<section class="section">
					<div class="container">
						<div class="row bottom-70">
							<div class="col-12">
								<div class="heading"><span class="heading__pre-title">&nbsp;</span>
									<h3 class="heading__title"><?=$eksT37[systemLangg()];?></h3>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="bests-slider">
<?php 
$subCatQuery = "select * from md_product_relationships WHERE (product_id = '".$getData->pageData["page_id"]."')";
$subCatResult = $getData->query($subCatQuery);
$subCatRow = $getData->fetch_array($subCatResult);


$subProQuery = "SELECT md_page.* FROM md_page JOIN md_product_relationships ON (md_page.page_id = md_product_relationships.product_id) WHERE (md_product_relationships.category_id = '".$subCatRow["category_id"]."') order by md_page.page_order ASC";
$subProResult = $getData->query($subProQuery);
while($subProRow = $getData->fetch_array($subProResult)){
?>                                    
									<div class="bests-slider__item">
										<div class="shop-item text-center">
											<div class="shop-item__img"><img class="img--contain" src="core/uploads/page/images/<?=$subProRow["page_id"];?>.jpg" alt="img"/></div>
											<h6 class="shop-item__title"><a href="<?=$getData->urlCreate($subProRow["page_id"],"","");?>"><?=unhtmlDBString($subProRow["page_title".contentLang()]);?></a></h6>
										</div>
									</div>
<?php } ?>                                    

								</div>
								<div class="bests-slider__nav"></div>
							</div>
						</div>
					</div>
				</section>
