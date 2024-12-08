<?php if($getData->siteConfig["template"]!="home.php"){ ?>

<?php

$bgID = $getData->pageData["page_id"];


if(file_exists("core/uploads/page/images/bg_" . $bgID .".jpg")){
	$bgImg = "core/uploads/page/images/bg_".$bgID.".jpg";
}else{
	$bgImg = "img/service-details.jpg";
}

?>


          <section class="hero-block">
              <picture>
                  <source srcset="<?=$bgImg;?>" media="(min-width: 992px)"/><img class="img--bg" src="<?=$bgImg;?>" alt="img"/>
              </picture>
              <div class="hero-block__layout"></div>
              <div class="container">
                  <div class="row">
                      <div class="col-12">
                          <div class="align-container">
                              <div class="align-container__item"><span class="hero-block__overlay">Solo</span>
                                  <h1 class="hero-block__title"><?=$getData->pageData["page_title".contentLang()];?></h1>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>



<?php }else{ ?>

	<?php include "inc/slider.php";?>            

<?php } ?>