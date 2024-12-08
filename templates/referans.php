<section class="section bg--dgray"><img class="bg--center" src="img/certifications-bg.png" alt="bg"/>
    <div class="container">
        <div class="row bottom-50">
            <div class="col-12">
                <div class="heading heading--center heading--white">
                    <h3 class="heading__title"><?=$getData->pageData["page_title".contentLang()];?></h3>
                </div>
            </div>
        </div>
<?php  
$x = 0;
$query = "SELECT * FROM md_images where image_gallery='".$getData->pageData["page_gallery"]."' ORDER BY image_order ASC";
$result = $getData->query($query);
while($row = $getData->fetch_array($result)){
$x++;	
$image = $row["image_name"];
	
	
?>         
        <div class="row offset-50">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="certificate">
                    <div class="certificate__img"><img src="core/uploads/gallery/<?php echo $image;?>" alt="certificate"/></div>
                    <h6 class="certificate__title"><a href="#"><?=$row["image_title".contentLang()];?></a></h6>
                    <p><?=$row["image_desc".contentLang()];?></p>
                </div>
            </div>
            
        </div>
<?php } ?>        
    </div>
</section>
