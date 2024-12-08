				<section class="section">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-xl-5"><img class="w-100 bottom-50" src="core/uploads/page/images/<?=$getData->pageData["page_id"];?>.jpg" alt="img"/>
								<div class="img-badge"><img class="img-badge__img" src="img/badge-img.png" alt="img"/>
									<h3 class="img-badge__title bottom-0">Deneyimli &<br/>Profesyonel</h3>
								</div>
							</div>
							<div class="col-lg-6 col-xl-6 offset-xl-1">
								<div class="heading bottom-20"><span class="heading__pre-title"><?=$getData->pageData["page_title".contentLang()];?></span>
									<h3 class="heading__title"><?=$getData->pageData["page_content".contentLang()];?></h3>
								</div>
								<?=unhtmlDBString($getData->pageData["page_content_all".contentLang()])?> 
							</div>
						</div>
					</div>
				</section>
