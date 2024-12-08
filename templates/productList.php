<div class="shop__backdrop"></div>

<section class="section catalog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="row offset-30">
                    
<?php

	
$caTquery = "SELECT * FROM md_page WHERE (page_group = '3') AND (is_category = '1') AND (page_parent = '".$getData->pageData["page_id"]."') ORDER BY page_order ASC";
$caTresult = $getData->query($caTquery);
$caTcount = $getData->numrows($caTresult);

if($caTcount!="0"){
	

?>
                    
                    
  <?php
        $query = "SELECT * FROM md_page WHERE (page_parent = '".$getData->pageData["page_id"]."') AND (page_group = '3') AND (is_category = '1') ORDER BY page_order ASC";
        $result = $getData->query($query);
        $numrows = $getData->numrows($result);
        while($row = $getData->fetch_array($result)){
?>
                  
                    
                      <div class="col-sm-6 col-xl-4">
                        <div class="shop-item text-center">
                            <div class="shop-item__img"><img class="img--contain" src="core/uploads/page/images/<?=$row["page_id"];?>.jpg" alt="img"/></div>
                            <h6 class="shop-item__title"><a href="<?=$getData->urlCreate($row["page_id"],"","");?>"><?=unhtmlDBString($row["page_title".contentLang()]);?></a></h6>
                        </div>
                    </div>
                  
                    
                    
<?php

} 
}else{
    
$proQuery = "SELECT md_page.* FROM md_page JOIN md_product_relationships ON (md_page.page_id = md_product_relationships.product_id) WHERE (md_product_relationships.category_id = '".$getData->pageData["page_id"]."') order by md_page.page_order ASC";
$proResult = $getData->query($proQuery);
while($proRow = $getData->fetch_array($proResult)){

?>                
                    <div class="col-sm-6 col-xl-4">
                        <div class="shop-item text-center">
                            <div class="shop-item__img"><img class="img--contain" src="core/uploads/page/images/<?=$proRow["page_id"];?>.jpg" alt="img"/></div>
                            <h6 class="shop-item__title"><a href="<?=$getData->urlCreate($proRow["page_id"],"","");?>"><?=unhtmlDBString($proRow["page_title".contentLang()]);?></a></h6>
                        </div>
                    </div>
<?php }} ?>                    
                    
                </div>
                
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="aside-holder">
                    <div class="shop__aside-close">
                        <svg class="icon">
                            <use xlink:href="#close"></use>
                        </svg>
                    </div>
                    <div class="shop-aside">
                        <div class="row">
                            
                            <div class="col-lg-12 bottom-50">
                                <h5 class="catalog__title"><?=$eksT38[systemLangg()];?></h5>
                                <ul class="category-list list--reset">
                                
<?php
if($caTcount!="0"){                                    
$catQuery = "SELECT * FROM md_page WHERE (page_parent = '".$getData->pageData["page_id"]."') AND (page_group = '3') AND (page_status = '1') AND (is_category = '1') ORDER BY page_date DESC";
}else{
$catQuery = "SELECT * FROM md_page WHERE (page_parent = '".$getData->pageData["page_parent"]."') AND (page_group = '3') AND (page_status = '1') AND (is_category = '1') ORDER BY page_date DESC";}
$catResult = $getData->query($catQuery);
while($catRow = $getData->fetch_array($catResult)){
?>	                                    
                                    <li class="category-list__item <?php if($getData->pageData["page_id"]==$catRow["page_id"]){ echo 'item--active'; };?>"> <a class="category-list__link" href="<?=$getData->urlCreate($catRow["page_id"],"","");?>"><?=unhtmlDBString($catRow["page_title".contentLang()]);?></a></li>
<?php } ?>                                    
                                </ul>
                            </div>
                            <div class="col-lg-12">
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
        </div>
    </div>
</section>
<!-- catalog end-->
