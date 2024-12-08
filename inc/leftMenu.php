                <div class="col-lg-4 col-md-12 rightSidebar">
                    <div class="all_services">
                        <ul>
<?php
$catQuery = "SELECT * FROM md_page WHERE (page_parent = '".$getData->pageData["page_parent"]."') AND (page_group = '1') AND (page_status = '1') ORDER BY page_date DESC";
$catResult = $getData->query($catQuery);
while($catRow = $getData->fetch_array($catResult)){
?>	
                        
  <li><a href="<?=$getData->urlCreate($catRow["page_id"],$catRow["page_title1"],"DP");?>" <?php if($getData->pageData["page_id"]==$catRow["page_id"]){ echo 'class="active"'; };?>><?=unhtmlDBString($catRow["page_title".contentLang()]);?></a></li>                                     
<?php } ?>							
                        </ul>
                    </div> 
                    

                </div>
