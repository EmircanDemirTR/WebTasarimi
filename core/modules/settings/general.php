<div class="col-lg-12">
<form class="form-horizontal" action="main.php?module=settings/general" data-nextpage="" enctype="application/x-www-form-urlencoded" method="post">
<?PHP print $adminEngine->processMessage(); ?>

<div class="row">

<div class="col-lg-4">


<div class="card">

    <div class="card-header d-flex align-items-center">
        <h3 class="h4">Firma Bilgileri</h3>
    </div>
    
    <div class="card-body">


        <div class="form-group">
            <label class="form-control-label">Firma Resmi Adı</label>
            <input name="companyname" type="text" id="companyname" class="form-control" placeholder="Firma Resmi Adı" value="<?PHP print $getData->siteConfig["companyname"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Yetkili Kişi</label>
            <input name="companyperson" type="text" id="companyperson" class="form-control" placeholder="Yetkili Kişi" value="<?PHP print $getData->siteConfig["companyperson"];?>">
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


        <div class="form-group">
            <label class="form-control-label">Email (Genel)</label>
            <input name="companyemail" type="email" id="companyemail" class="form-control" placeholder="Email" value="<?PHP print $getData->siteConfig["companyemail"];?>">
        </div>
        
        
        <div class="form-group">
            <label class="form-control-label">Form Email (Form Maillerinin Gideceği)</label>
            <input name="frmmail" type="email" id="frmmail" class="form-control" placeholder="Form Email" value="<?PHP print $getData->siteConfig["frmmail"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Email Adres (Form Mailleri Gönderirken Kullanılacak)</label>
            <input name="sendmailaddress" type="email" id="sendmailaddress" class="form-control" placeholder="Email Adres" value="<?PHP print $getData->siteConfig["sendmailaddress"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Email Parola (Form Mailleri Gönderirken Kullanılacak)</label>
            <input name="sendmailpass" type="password" id="sendmailpass" class="form-control" placeholder="Email Parola" value="<?PHP print $getData->siteConfig["sendmailpass"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Email Sunucu (POP3) (Form Mailleri Gönderirken Kullanılacak)</label>
            <input name="sendmailserver" type="text" id="sendmailserver" class="form-control" placeholder="Email Sunucu (POP3)" value="<?PHP print $getData->siteConfig["sendmailserver"];?>"> 
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
            <input name="owner" type="text" id="owner" class="form-control" placeholder="Developer" value="<?PHP print $getData->siteConfig["owner"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Developer Email</label>
            <input name="adminemail" type="email" id="adminemail" class="form-control" placeholder="Developer Email" value="<?PHP print $getData->siteConfig["adminemail"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Site URL</label>
            <input name="siteurl" type="text" id="siteurl" class="form-control" placeholder="Site URL" value="<?PHP print $getData->siteConfig["siteurl"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Dizin</label>
            <input name="directory" type="text" id="directory" class="form-control" placeholder="Dizin" value="<?PHP print $getData->siteConfig["directory"];?>">
        </div>
        
        <div class="form-group">
            <label class="form-control-label">Google Analytics</label>
            <textarea name="analytics" rows="5" class="form-control" id="analytics" ><?PHP print $getData->siteConfig["analytics"];?></textarea>
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



<?PHP

if($_POST){
	
	$data = array(	"companyname" => $_POST["companyname"],
					"companyperson" => $_POST["companyperson"],
					"companyemail" => $_POST["companyemail"],
					"frmmail" => $_POST["frmmail"],
					"sendmailaddress" => $_POST["sendmailaddress"],
					"sendmailpass" => $_POST["sendmailpass"],
					"sendmailserver" => $_POST["sendmailserver"],
					"owner" => $_POST["owner"],
					"adminemail" => $_POST["adminemail"],
					"siteurl" => $_POST["siteurl"],
					"directory" => $_POST["directory"],
					"analytics" => $_POST["analytics"],
					 );
	
	
	
	foreach($data as $fieldName => $fieldData){
		
		if(!$adminEngine->updateFieldDB("md_system", "data", $fieldData, "name", $fieldName)){
			
			redirect("main.php?module=settings/general&failed&" . $fieldData);
			
		}
			
	}	
	
	redirect("main.php?module=settings/general&success");
	
}

?>