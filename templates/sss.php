				<section class="section faq">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-12">
										<h3 class="faq__title"><?=$getData->pageData["page_title".contentLang()];?></h3>
<?php
$query = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '52') AND (page_status = '1') ORDER BY page_date DESC";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){


$tarih2 = explode("-",$row["page_date"]);

?>                                        
										<div class="accordion accordion--primary">
											<div class="accordion__title-block">
												<h5 class="accordion__title"><?=$row["page_title".contentLang()];?></h5><span class="accordion__close"></span>
											</div>
											<div class="accordion__text-block">
												<p><?=unhtmlDBString($row["page_content_all".contentLang()])?></p>
											</div>
										</div>
<?php  } ?>                                        

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
