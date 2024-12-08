<?php 

include "core/libraries/mailer/PHPMailerAutoload.php";

$process = $_GET["p"];

if($process=="contact"){
		
		include "form-contact-send.php";

}

$cData = $getData->selectDB("md_contact","id","1");
$bData = $getData->selectDB("md_contact","id","2");
$aData = $getData->selectDB("md_contact","id","3");
;?>


<?php if($process=="fail"){ ?>
<div class="siteErr"><strong>HATA!</strong> Lütfen tüm alanları doldurarak tekrar deneyiniz.</div>
<?php }elseif($process=="success"){ ?>
<div class="siteOk">Mesajınız başarıyla kaydedilmiştir.</div>
<?php } ?>

<section class="section contacts pb-0"><img class="contacts__bg" src="img/contacts-map.png" alt="map"/>
<div class="container">
  <div class="row">

      
      <div class="col-md-6">
          <h5 class="contacts__title"><?=$eksT6[systemLangg()];?></h5>
          <div class="contacts-item">
              <div class="contacts-item__img">
                  <svg class="icon">
                      <use xlink:href="#phone"></use>
                  </svg>
              </div>
              <div class="contacts-item__details"><a class="contacts-item__link" href="tel:<?=phoneLink($cData["x6"]);?>"><?=$cData["x6"];?></a>
              <a class="contacts-item__link" href="tel:<?=phoneLink($cData["x7"]);?>"><?=$cData["x7"];?></a></div>
          </div>
          <div class="contacts-item">
              <div class="contacts-item__img">
                  <svg class="icon">
                      <use xlink:href="#mail"></use>
                  </svg>
              </div>
              <div class="contacts-item__details"><a class="contacts-item__link" href="mailto:<?=$cData["x6"];?>"><?=$cData["x6"];?></a></div>
          </div>
          <div class="contacts-item">
              <div class="contacts-item__img">
                  <svg class="icon">
                      <use xlink:href="#pin"></use>
                  </svg>
              </div>
              <div class="contacts-item__details"><span><?=nl2br($cData["x2"]);?></span></div>
          </div>
          <div class="contacts-item">
              <div class="contacts-item__img">
                  <svg class="icon">
                      <use xlink:href="#share"></use>
                  </svg>
              </div>
              <div class="contacts-item__details">
                  <ul class="socials socials--dark list--reset">
                      <li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["facebook"]?>">
                          <svg class="icon">
                              <use xlink:href="#facebook"></use>
                          </svg></a>
                      </li>
                      <li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["twitter"]?>">
                          <svg class="icon">
                              <use xlink:href="#twitter"></use>
                          </svg></a>
                      </li>
                      <li class="socials__item"><a class="socials__link" href="<?=$getData->siteConfig["linkedin"]?>">
                          <svg class="icon">
                              <use xlink:href="#linkedin"></use>
                          </svg></a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="col-lg-6">
          <form class="form contact-form" method="post" action="<?=$getData->urlCreateLang("1098",systemLanggg());?>?p=contact" method="post" autocomplete="off">
              <div class="row">
                  <div class="col-12">
                      <h5 class="contact-form__subtitle"><?=$eksT15[systemLangg()];?></h5>
                  </div>
                  <div class="col-md-6">
                      <input name="e1" type="text" class="form__field" id="e1" placeholder="<?=$eksT7[systemLangg()];?>"/>
                  </div>
                  <div class="col-md-6">
                      <input name="e2" type="email" class="form__field" id="e2" placeholder="<?=$eksT14[systemLangg()];?>"/>
                  </div>
                  <div class="col-md-6">
                      <input name="e3" type="tel" class="form__field" id="e3" placeholder="<?=$eksT8[systemLangg()];?>"/>
                  </div>
                  <div class="col-md-6">
                      <input name="e4" type="text" class="form__field" id="e4" placeholder="<?=$eksT9[systemLangg()];?>"/>
                  </div>
                  <div class="col-12">
                      <textarea name="e5" class="form__field form__message message--large" id="e5" placeholder="<?=$eksT10[systemLangg()];?>"></textarea>
                  </div>
                  <div class="col-12">
                      <button class="button button--green" type="submit"><span><?=$eksT11[systemLangg()];?></span> 
                          <svg class="icon">
                              <use xlink:href="#arrow"></use>
                          </svg>
                      </button>
                  </div>
                  
              </div>
          </form>
      </div>
  </div>
</div>
</section>

<section class="section">
<div class="container">
  <div class="row flex-column-reverse flex-lg-row">
      <div class="col-lg-12">
          <?=unhtmlDBString($cData["x8"]);?>
      </div>							
  </div>
</div>
</section>
