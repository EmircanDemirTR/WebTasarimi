<?php
$query = "SELECT * FROM md_page WHERE (page_parent = '0') AND (page_group = '44') AND (page_status = '1') ORDER BY page_date DESC";
$result = $getData->query($query);
$numrows = $getData->numrows($result);
while($row = $getData->fetch_array($result)){


$tarih2 = explode("-",$row["page_date"]);

?>

                  <h3 class="font-weight-600"><?=$row["page_title".contentLang()];?></h3>
                  <p> 
                      <?=unhtmlDBString($row["page_content_all".contentLang()])?>
                  </p>
                  
                  
                  <div class="m-b0">
                      <div class="mt-divider divider-1px  bg-black"><i class="icon-dot c-square"></i></div>
                  </div>                                

                                
<?php  } ?>                                
