<section class="section pb-5 mb-5">
    <div class="container">
        <div class="row bottom-50">
            <div class="col-12">
                <div class="heading heading--center">
                    <h3 class="heading__title"><?=$getData->pageData["page_title".contentLang()];?></h3>
                </div>
            </div>
        </div>
        <div class="row offset-50">
<?php
$query = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '50') AND (page_status = '1') ORDER BY page_date DESC";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){

$nocQuery = "SELECT * FROM md_doc WHERE (page_id='".$row["page_id"] ."')";
$docResult = $getData->query($nocQuery);
$docRow = $getData->fetch_array($docResult);


$tarih2 = explode("-",$row["page_date"]);
?>        
            <div class="col-md-6 col-lg-4">
                <div class="downloads">
                    <h4 class="downloads__title"><?=unhtmlDBString($row["page_title".contentLang()]);?></h4><a class="downloads__icon" href="core/uploads/page/document/<?php echo $docRow["doc_name"] ;?>" download="download">
                        <svg class="icon">
                            <use xlink:href="core/uploads/page/document/<?php echo $docRow["doc_name"] ;?>"></use>
                        </svg></a>
                    <p class="downloads__text"><?=unhtmlDBString($row["page_content".contentLang()]);?></p>
                    <div class="downloads__details"><?=$tarih2[2];?>/<?=$tarih2[1];?>/<?=$tarih2[0];?></div>
                </div>
            </div>
<?php } ?>            
        </div>
    </div>
</section>
