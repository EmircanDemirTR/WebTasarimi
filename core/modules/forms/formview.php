<?PHP
if(!is_numeric($getData->siteConfig["getID"])){
	redirect("main.php?module=forms/formlist");
}

$editData = $getData->selectDB("md_form","id",$getData->siteConfig["getID"]); 
?>

<div class="col-lg-12">

<div class="row">

<div class="col-lg-12">
  <div class="card">

	<div class="card-header d-flex align-items-center">
	  <h3 class="h4">İçerik Düzenle&nbsp;&nbsp;&nbsp;</h3>
	  
    
    <a href="main.php?module=forms/formlist" class="btn btn btn-sm btn-success" style="margin:0 0 0 2px;"><i class="icon-paper-airplane"></i> Form Listesi</a>
	  
	  
	</div>


<div class="card-body">
<?PHP print $adminEngine->processMessage(); ?>
</div>


</div>
</div>


<div class="col-lg-6">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Öğrenci Bilgileri</h3>
      </div>
      
<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">TC Kimlik No</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="TC Kimlik No" class="form-control" value="<?PHP print unhtmlDBString2($editData["e1"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">İsim Soyisim</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="İsim Soyisim" class="form-control" value="<?PHP print unhtmlDBString2($editData["e2"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Doğum Tarihi</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Doğum Tarihi" class="form-control" value="<?PHP print unhtmlDBString2($editData["e3"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Doğum Yeri</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Doğum Yeri" class="form-control" value="<?PHP print unhtmlDBString2($editData["e4"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">GSM</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="GSM" class="form-control" value="<?PHP print unhtmlDBString2($editData["e5"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Ev Adresi</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Ev Adresi" class="form-control" value="<?PHP print unhtmlDBString2($editData["e6"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Kan Grubu</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Kan Grubu" class="form-control" value="<?PHP print unhtmlDBString2($editData["e7"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Mail Adresi</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Mail Adresi" class="form-control" value="<?PHP print unhtmlDBString2($editData["e8"]);?>">
      </div>



      
</div>

</div>
</div>


<div class="col-lg-6">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Aile Bilgileri</h3>
      </div>

<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">Baba Adı</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Baba Adı" class="form-control" value="<?PHP print unhtmlDBString2($editData["e9"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Baba İş Unvanı</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Baba İş Unvanı" class="form-control" value="<?PHP print unhtmlDBString2($editData["e10"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Baba GSM</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Baba GSM" class="form-control" value="<?PHP print unhtmlDBString2($editData["e11"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Anne Adı</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Anne Adı" class="form-control" value="<?PHP print unhtmlDBString2($editData["e12"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Anne İş Unvanı</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Anne İş Unvanı" class="form-control" value="<?PHP print unhtmlDBString2($editData["e13"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Anne GSM</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Anne GSM" class="form-control" value="<?PHP print unhtmlDBString2($editData["e14"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Velisi</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Velisi" class="form-control" value="<?PHP print unhtmlDBString2($editData["e15"]);?>">
      </div>



</div>
</div>



</div>



<div class="col-lg-6">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Aile Dışında Ulaşılacak Kişi</h3>
      </div>
      
<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">İsim ve Soyisim</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="İsim ve Soyisim" class="form-control" value="<?PHP print unhtmlDBString2($editData["e16"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">Yakınlık Durumu</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="Yakınlık Durumu" class="form-control" value="<?PHP print unhtmlDBString2($editData["e17"]);?>">
      </div>
      <div class="form-group">
        <label class="form-control-label">GSM</label>
        <input name="p1" type="text" disabled="disabled" id="p1" placeholder="GSM" class="form-control" value="<?PHP print unhtmlDBString2($editData["e18"]);?>">
      </div>

      
</div>

</div>
</div>



<div class="col-lg-6">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Velinin Muvafakkatı</h3>
      </div>
      
<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">Yukarıda Açık Kimliği Bulunan ................................................ ATAŞEHİR GALATASARAY FUTBOL OKULU'nda ve yarışma gruplarında, antrenmanlara, müsabakalara, yurtiçi ve yurtdışı seyahatlere katılmasına, pasaport ve lisans çıkartmasına muvafakkat ederim.</label>
      </div>
      <?php if($editData["e19"]=="1"){ ?>
      <div class="form-group">
        <label class="form-control-label"><strong style="color:#0C0;">Kabul Etti</strong></label>
      </div>
      <?php }else{ ?>
      <div class="form-group">
        <label class="form-control-label"><strong style=" color:#F00;">Kabul Etmedi</strong></label>
      </div>
      <?php } ?>
      
</div>

</div>

  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Taahhütname</h3>
      </div>
      
<div class="card-body">

      <div class="form-group">
        <label class="form-control-label">GALATASARAY FUTBOL OKULU FAALİYETLERİ DOLASIYLA MEYDANA GELEBİLECEK HER TÜRLÜ YARALANMA, SAKATLANMA, HASTALANMA VE ÖLÜMDEN DOLAYI GALATASARAY SPOR KULÜBÜNÜ, ŞİRKETLERİNİ VE FUTBOL OKULUNU SORUMLU TUTMAYACAĞIMI, MADDİ VE MANEVİ HERHANGİ BİR TALEPTE BULUNMAYACAĞIMI KABUL, TAAHHÜT VE BEYAN EDERİM.</label>
      </div>
      <?php if($editData["e20"]=="1"){ ?>
      <div class="form-group">
        <label class="form-control-label"><strong style="color:#0C0;">Kabul Etti</strong></label>
      </div>
      <?php }else{ ?>
      <div class="form-group">
        <label class="form-control-label"><strong style=" color:#F00;">Kabul Etmedi</strong></label>
      </div>
      <?php } ?>
      
</div>

</div>


</div>





<div class="col-lg-12">

  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Okumadan İşaretlemeyiniz.*</h3>
      </div>
      
<div class="card-body">


      <div class="form-group">
        <label class="form-control-label">YUKARIDA YAZILANLARI OKUYUP KABUL ETTİĞİMİ FUTBOL OKULU SORUMLUSUNA BİLDİRİRİM.</label>
      </div>
      <?php if($editData["e21"]=="1"){ ?>
      <div class="form-group">
        <label class="form-control-label"><strong style="color:#0C0;">Kabul Etti</strong></label>
      </div>
      <?php }else{ ?>
      <div class="form-group">
        <label class="form-control-label"><strong style=" color:#F00;">Kabul Etmedi</strong></label>
      </div>
      <?php } ?>
      
</div>

</div>


</div>


</div>
</div>



