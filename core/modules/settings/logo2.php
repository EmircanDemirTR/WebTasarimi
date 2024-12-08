
<div class="col-lg-12">

<form class="form-horizontal" action="main.php?module=settings/logo2&id=<?PHP print $getData->siteConfig["getID"]; ?>"  method="post" style="display:inline;">
<div class="row">


<div class="col-lg-7">
<div class="card">
<div class="card-header d-flex align-items-center">
  <h3 class="h4">Logo</h3>
</div>
<div class="card-body">


    <div class="form-group">
        <label class="form-control-label">Logo Yönlendirme Url</label>
        <input name="p1" type="text" id="p1" placeholder="Logo Yönlendirme Url" class="form-control" value="<?PHP print $getData->siteConfig["logourl"];?>">
    </div>
    
    
    
    <div class="line"></div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </div>

      
</div>
</div>
</div>



<div class="col-lg-5">

<div class="card">
<div class="card-header d-flex align-items-center">
    <h3 class="h4">Logo Resim</h3>
</div>
<div class="card-body">


<div class="form-group row">
 
<div class="col-md-12">
  <label class="form-control-label">Logo</label>
  <div class="slim" data-fetcher="fetch.php">
      <input type="file"/>
  </div>
</div>


 
</div>  

  
<div class="form-group row">
 
<div class="col-md-12">
 <label class="form-control-label">Logo Önizleme</label>
 <?PHP print $adminEngine->siteLogoControlw("0", "333");?>
</div> 
 
</div>






      
</div>
</div>



</div>




</div>
</form>
</div>




<?PHP
if($_POST){
		include_once('../core/class/upload.php');
		
		$userID = "site_logo_w";
		$write_dir = "../core/uploads/logo/";
		$thumbDir = $write_dir.'thumb';
		

		
		$postAry = $_POST["slim"]["0"];
		$pExp = explode('"output":{"name":"',$postAry);
		$pExp = explode(',"image":',$pExp["1"]);
		$pExp = explode('"}',$pExp["1"]);
		
		$dataR = $pExp["0"];
		$profileImg = $dataR;
		
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[ 1 ] ) );
			fclose( $ifp ); 
			return $output_file; 
		}	

		$image = base64_to_jpeg( $profileImg, $write_dir.'temp_'.$userID.'.png' );
		
		$temp_code = "temp_".$userID.".png";


		
		$upload = new upload($write_dir.$temp_code);
		if($upload->file_src_error == 0){
			if ($upload->uploaded){
				$upload->file_overwrite 	= true;
				$upload->file_new_name_body = $userID;
				
				
				
				$upload->process($write_dir);
				//$upload->image_watermark = 'watermark.png';
				$adminEngine->helloThumb($write_dir.$temp_code, $userID, $thumbDir);
				if ($upload->processed){
					
					
					$data = array(	"logourl" => $_POST["p1"],
									
									 );
					
					
					foreach($data as $fieldName => $fieldData){
						
						if(!$adminEngine->updateFieldDB("md_system", "data", $fieldData, "name", $fieldName)){
							
							redirect("main.php?module=settings/logo2&failed&" . $fieldData);
							
						}
							
					}	
					
					redirect("main.php?module=settings/logo2&success");
					$upload->clean();
				}else{
					redirect("main.php?module=settings/logo2&success");
				}
			}
		}else{
			redirect("main.php?module=settings/logo2&errorFile");
		}

} 
?>
