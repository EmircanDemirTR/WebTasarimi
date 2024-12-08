<?php
$tarih2 = explode("-",$getData->pageData["page_date"]);
?>
<section class="section blog-post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12"><img class="blog-post__img" src="core/uploads/page/images/<?=$getData->pageData["page_id"];?>.jpg" alt="img" style="width:100%;"/>
                        <h4 class="blog-post__title"><?=$getData->pageData["page_title".contentLang()];?></h4>
                        <?=unhtmlDBString($getData->pageData["page_content_all".contentLang()])?>
                    </div>
                </div>
                <div class="row top-20">
                    <div class="col-6">
                        <div class="blog-post__date"><?=$tarih2[2];?>/<?=$tarih2[1];?>/<?=$tarih2[0];?></div>
                    </div>
                </div>								
            </div>
        </div>
    </div>
</section>
