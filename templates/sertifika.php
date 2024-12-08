<section class="section bg--dgray"><img class="bg--center" src="img/certifications-bg.png" alt="bg"/>
    <div class="container">
        <div class="row bottom-50">
            <div class="col-12">
                <div class="heading heading--center heading--white">
                    <h3 class="heading__title"><?=$getData->pageData["page_title".contentLang()];?></h3>
                </div>
            </div>
        </div>
        <div class="row offset-50">
<?php
$query = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '51') AND (page_status = '1') ORDER BY page_date DESC";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){

$nocQuery = "SELECT * FROM md_doc WHERE (page_id='".$row["page_id"] ."')";
$docResult = $getData->query($nocQuery);
$docRow = $getData->fetch_array($docResult);


?>        
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="certificate">
                    <div class="certificate__img"><img src="core/uploads/page/images/<?=$row["page_id"];?>.jpg" alt="certificate"/></div>
                    <h6 class="certificate__title"><a href="core/uploads/page/document/<?php echo $docRow["doc_name"] ;?>"><?=unhtmlDBString($row["page_title".contentLang()]);?></a></h6>
                    <p><?=unhtmlDBString($row["page_content".contentLang()]);?></p>
                </div>
            </div>
<?php } ?>
        </div>
    </div>
</section>
