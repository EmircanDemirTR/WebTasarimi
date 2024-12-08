
<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">İçerik Yazıları (İspanyolca)</h3>
    </div>
    
    <div class="card-body">
    
        
        <div class="form-group">
            <label class="form-control-label">İçerik Başlığı (İspanyolca)</label>
            <input name="p1ar" id="p1ar" type="text" placeholder="İçerik Başlığı (İspanyolca)" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title3"]);?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">İçerik Özet (İspanyolca)</label>
            <textarea name="p2ar" id="p2ar" rows="5" class="form-control" ><?PHP print unhtmlDBString($editData["page_content3"]);?></textarea>
        </div>
        
        
        <div class="form-group">
            <label class="form-control-label">İçerik Detay (İspanyolca)</label>
            <textarea name="contentar" id="contentar" class="form-control"><?PHP print unhtmlDBString($editData["page_content_all3"]);?></textarea>
        </div>
        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>
