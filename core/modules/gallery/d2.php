<div class="col-lg-12">
<form class="form-horizontal" method="post" enctype="multipart/form-data" action="main.php?module=gallery/galleryimages&id=<?PHP print $getData->siteConfig["getID"]; ?>"  >
<?PHP print $adminEngine->processMessage(); ?>

<div class="row">

    <div class="col-lg-4">
    
        <div class="card">
        
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">Resim Yükle (Türkçe)</h3>
        </div>
        
        
        
        <div class="card-body">
            <div class="form-group">
                <label class="form-control-label">Resim Başlık</label>
                <input name="p1" type="text" id="p1" class="form-control" placeholder="Resim Başlık" value="<?PHP print unhtmlDBString2($editImage["image_title1"]);?>">
            </div>
            
            <div class="form-group">
                <label class="form-control-label">Resim Açıklama</label>
                <textarea name="p2" class="form-control" id="p2" placeholder="Resim Açıklama" rows="3"><?PHP print $editImage["image_desc1"];?></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-control-label">Resim Link</label>
                <input name="p3" type="text" id="p3" class="form-control" placeholder="Resim Link" value="<?PHP print $editImage["image_link1"];?>">
            </div>
            
            <div class="line"></div>
            
            <div class="form-group">
                <input name="p4" type="hidden" id="p4" value="<?PHP print $editImage["image_id"]; ?>">
                <input name="edit" type="hidden" id="edit">
            
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
        
        
        </div>

	</div>



    <div class="col-lg-4">
    
        <div class="card">
        
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">Resim Yükle (İngilizce)</h3>
        </div>
        
        
        
        <div class="card-body">
            <div class="form-group">
                <label class="form-control-label">Resim Başlık (İngilizce)</label>
                <input name="p1En" type="text" id="p1En" class="form-control" placeholder="Resim Başlık (İngilizce)" value="<?PHP print unhtmlDBString2($editImage["image_title2"]);?>">
            </div>
            
            <div class="form-group">
                <label class="form-control-label">Resim Açıklama (İngilizce)</label>
                <textarea name="p2En" class="form-control" id="p2En" placeholder="Resim Açıklama (İngilizce)" rows="3"><?PHP print $editImage["image_desc2"];?></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-control-label">Resim Link (İngilizce)</label>
                <input name="p3En" type="text" id="p3En" class="form-control" placeholder="Resim Link (İngilizce)" value="<?PHP print $editImage["image_link2"];?>">
            </div>
            
        </div>
        
        
        </div>

	</div>



    <div class="col-lg-4">
    
        <div class="card">
        
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">Resim Yükle (İspanyolca)</h3>
        </div>
        
        
        
        <div class="card-body">
            <div class="form-group">
                <label class="form-control-label">Resim Başlık (İspanyolca)</label>
                <input name="p1Ar" type="text" id="p1Ar" class="form-control" placeholder="Resim Başlık (İspanyolca)" value="<?PHP print unhtmlDBString2($editImage["image_title3"]);?>">
            </div>
            
            <div class="form-group">
                <label class="form-control-label">Resim Açıklama (İspanyolca)</label>
                <textarea name="p2Ar" class="form-control" id="p2Ar" placeholder="Resim Açıklama (İspanyolca)" rows="3"><?PHP print $editImage["image_desc3"];?></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-control-label">Resim Link (İspanyolca)</label>
                <input name="p3Ar" type="text" id="p3Ar" class="form-control" placeholder="Resim Link (İspanyolca)" value="<?PHP print $editImage["image_link3"];?>">
            </div>
            
        </div>
        
        
        </div>

	</div>



</div>










</form>
</div>