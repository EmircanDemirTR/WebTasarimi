<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=settings/define" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">
<?PHP print $adminEngine->processMessage(); ?>

<div class="row">

<div class="col-lg-4">


<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">Firma Bilgileri</h3>
    </div>
    
    <div class="card-body">


        <div class="form-group row">
            <label class="form-control-label">Firma Resmi Adı</label>
            <input name="p1" type="text" id="p1" class="form-control" placeholder="Firma Resmi Adı" value="<?PHP print $getData->siteConfig["companyname"];?>">
        </div>
        
        <div class="form-group row">
            <label class="form-control-label">Yetkili Kişi</label>
            <input name="p2" type="text" id="p2" class="form-control" placeholder="Yetkili Kişi" value="<?PHP print $getData->siteConfig["companyperson"];?>">
        </div>
        
        <div class="line"></div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>	
    
    
</div>

<!---- -->


<div class="col-lg-4">


<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">Email Ayarlar</h3>
    </div>
    
    <div class="card-body">


        <div class="form-group row">
            <label class="form-control-label">Email </label>
            <input name="p7" type="email" id="p7" class="form-control" placeholder="Email" value="<?PHP print $getData->siteConfig["companyemail"];?>">
        </div>
        
        
        <div class="form-group">
            <label class="form-control-label">Form Email </label>
            <input name="pn4" type="email" id="pn4" class="form-control" placeholder="Form Email" value="<?PHP print $getData->siteConfig["frmmail"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Email Adres</label>
            <input name="p5" type="email" id="p5" class="form-control" placeholder="Email Adres" value="<?PHP print $getData->siteConfig["sendmailaddress"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Email Parola</label>
            <input name="p6" type="password" id="p6" class="form-control" placeholder="Email Parola" value="<?PHP print $getData->siteConfig["sendmailpass"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Email Sunucu (POP3)</label>
            <input name="p7" type="text" id="p7" class="form-control" placeholder="Email Sunucu (POP3)" value="<?PHP print $getData->siteConfig["sendmailserver"];?>"> 
        </div>


        
        <div class="line"></div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>	
    
    
</div>

<!--- -->

<div class="col-lg-4">


<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">Site Ayarları</h3>
    </div>
    
    <div class="card-body">

        <div class="form-group">
            <label class="form-control-label">Developer</label>
            <input name="p1" type="text" id="p1" class="form-control" placeholder="Developer" value="<?PHP print $getData->siteConfig["owner"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Developer Email</label>
            <input name="p2" type="email" id="p2" class="form-control" placeholder="Developer Email" value="<?PHP print $getData->siteConfig["adminemail"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Site URL</label>
            <input name="p3" type="text" id="p3" class="form-control" placeholder="Site URL" value="<?PHP print $getData->siteConfig["siteurl"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Dizin</label>
            <input name="p4" type="text" id="p4" class="form-control" placeholder="Dizin" value="<?PHP print $getData->siteConfig["directory"];?>">
        </div>
        
        <div class="line"></div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    
          
    </div>

</div>	
    
    
</div>

<!---- -->





</div>

</form>
</div>
