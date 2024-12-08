<?php
$etaDataa = $getData->selectDB("md_page","page_id",$getData->pageData["page_parent"]);
?>
<section class="section service-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9"><img class="service-details__img" src="core/uploads/page/images/<?=$getData->pageData["page_id"];?>.jpg" alt="img"/>
                <h4 class="service-details__title"><?=$getData->pageData["page_title".contentLang()];?></h4>
                <p>
                    <?=unhtmlDBString($getData->pageData["page_content_all".contentLang()])?> 
                </p>
                
            </div>
            <div class="col-lg-4 col-xl-3 top-50 top-lg-0">
                <div class="row">
                    <div class="col-md-6 col-lg-12 bottom-50">
                        <h5 class="service-details__subtitle"><?=$etaDataa["page_title".contentLang()];?></h5>
                        <ul class="category-list list--reset">
<?php
$catQuery = "SELECT * FROM md_page WHERE (page_parent = '".$getData->pageData["page_parent"]."') AND (page_group = '1') AND (page_status = '1') ORDER BY page_date DESC";
$catResult = $getData->query($catQuery);
while($catRow = $getData->fetch_array($catResult)){
?>                            
                            <li class="category-list__item <?php if($getData->pageData["page_id"]==$catRow["page_id"]){ echo 'item--active'; };?>"> <a class="category-list__link" href="<?=$getData->urlCreate($catRow["page_id"],"","");?>"><?=unhtmlDBString($catRow["page_title".contentLang()]);?></a></li>
<?php } ?>                            
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="contact-trigger contact-trigger--style-2"><img class="contact-trigger__img" src="img/contact_background.png" alt="img"/>
                            <h4 class="contact-trigger__title"><?=$eksT33[systemLangg()];?></h4>
                                <p class="contact-trigger__text"><?=$eksT34[systemLangg()];?> </p><a class="button button--white" href="<?=$getData->urlCreateLang("1098",systemLanggg());?>"><span><?=$eksT6[systemLangg()];?></span> 
                                    <svg class="icon">
                                        <use xlink:href="#arrow"></use>
                                    </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
