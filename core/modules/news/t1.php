
<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">İçerik Yazıları (Türkçe)</h3>
    </div>
    
    <div class="card-body">
    
        
        <div class="form-group">
            <label class="form-control-label">İçerik Başlığı (Türkçe)</label>
            <input name="p1" type="text" id="p1" placeholder="İçerik Başlığı" class="form-control" value="<?PHP print unhtmlDBString2($editData["page_title1"]);?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">İçerik Özet (Türkçe)</label>
            <textarea name="p2" rows="5" class="form-control" id="p2" ><?PHP print unhtmlDBString($editData["page_content1"]);?></textarea>
        </div>
        
        
        <div class="form-group">
            <label class="form-control-label">İçerik Detay (Türkçe)</label>
            <textarea name="content" class="form-control" id="content"><?PHP print unhtmlDBString($editData["page_content_all1"]);?></textarea>
        </div>
        
        <div class="line"></div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>
