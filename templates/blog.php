<section class="section blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="row">
<?php
$query = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '48') AND (page_status = '1') ORDER BY page_date DESC";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){


$tarih2 = explode("-",$row["page_date"]);



?> 
<?php
$etaDataa = $getData->selectDB("md_page_group","group_id",$row["page_group"]);
?>               
    <div class="col-md-6 col-xl-4">
        <div class="blog-item">
            <div class="blog-item__img"><img class="img--bg" src="core/uploads/page/images/<?=$row["page_id"];?>.jpg" alt="img"/></div><span class="blog-item__category"><?=$etaDataa["group_title1"];?></span>
            <h6 class="blog-item__title"> <a href="<?=$getData->urlCreate($row["page_id"],$row["page_title1"],"DP");?>"><?=unhtmlDBString($row["page_title".contentLang()]);?></a></h6>
            <div class="blog-item__text"><?=unhtmlDBString($row["page_content".contentLang()]);?></div>
            <div class="blog-item__details"><span><?=$tarih2[2];?>/<?=$tarih2[1];?>/<?=$tarih2[0];?></span></div>
        </div>
    </div>
<?php } ?>                    
                </div>
                <!--<div class="row">
                    <div class="col-12">
                        <ul class="pagination list--reset">
                            <li class="pagination__item pagination__item--prev"><span>Önceki</span></li>
                            <li class="pagination__item pagination__item--active"><span>1</span></li>
                            <li class="pagination__item"><span>2</span></li>
                            <li class="pagination__item"><span>3</span></li>
                            <li class="pagination__item"><span>4</span></li>
                            <li class="pagination__item"><span>5</span></li>
                            <li class="pagination__item pagination__item--next"><span>Sonraki</span></li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</section>
