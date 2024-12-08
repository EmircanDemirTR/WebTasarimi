<?php
$etaDataa = $getData->selectDB("md_page","page_id",$getData->pageData["page_parent_root"]);
?>

<section class="section" id="services-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="services-detail-img">
                    <img src="core/uploads/page/images/<?=$getData->pageData["page_id"];?>.jpg" alt="services detail image" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 services-detail-inner-wrap">
                <div class="services-detail-inner">
                    <h6><?=$etaDataa["page_title".contentLang()];?></h6>
                    <h2><?=$getData->pageData["page_title".contentLang()];?></h2>
                    <?=unhtmlDBString($getData->pageData["page_content_all".contentLang()])?> 
                </div>
            </div>
        </div>
    </div>
</section>


