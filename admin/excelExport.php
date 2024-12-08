<?php 
require_once("../core/class/init.php");
require_once("../core/admin/security.php");
include 'Classes/PHPExcel/IOFactory.php';


$adminEngine = new adminEngine();



//echo($lastDayM);
//exit;

$Excel = new PHPExcel();
  
// Oluşturacağımız Excel Dosyasının ayarlarını yapıyoruz.
// Bu bilgiler O kadar önenli değil kafanıza göre doldurabilirsiniz.
$Excel->getProperties()->setCreator("Raporlar")
->setLastModifiedBy("Raporlar")
->setTitle("Raporlar")
->setSubject("Raporlar")
->setDescription("Raporlar")
->setKeywords("Raporlar")
->setCategory("Raporlar");
  
//Excel Dosyasının Sayfasını Adını Belirliyoruz.Ben varsayılan olarak gelen Sayfa1 ' i tercih ettim.
$Excel->getActiveSheet()->setTitle('Sayfa1');
 
 
 			$checKquery = "SELECT * FROM md_form WHERE (eType = '".$_GET["type"]."')";
			$checKresult = $adminEngine->query($checKquery);
			$checKCount = $adminEngine->numrows($checKresult);
 

$lt1 = "Ad & Soyad";
$lt2 = "Kurum";
$lt3 = "Ünvan";
$lt4 = "E-Posta";
$lt5 = "Telefon";
$lt6 = "Şehir";
$lt7 = "KVKP Onay";
$lt8 = "Mesaj";



$count = count($_POST);

for ($a = 1; $a <= $count; $a++) {

//echo $a;

$ltg = 'lt'.$a;
 
 echo $lt.$a;
 
 if($ltg=="lt1"){ $Excel->getActiveSheet()->setCellValue('A1', 'Ad & Soyad'); }
 if($ltg=="lt2"){ $Excel->getActiveSheet()->setCellValue('B1', 'Ad & Soyad'); }
 if($ltg=="lt3"){ $Excel->getActiveSheet()->setCellValue('C1', 'Ad & Soyad'); }
 if($ltg=="lt4"){ $Excel->getActiveSheet()->setCellValue('D1', 'Ad & Soyad'); }
 if($ltg=="lt5"){ $Excel->getActiveSheet()->setCellValue('E1', 'Ad & Soyad'); }
 if($ltg=="lt6"){ $Excel->getActiveSheet()->setCellValue('F1', 'Ad & Soyad'); }
 if($ltg=="lt7"){ $Excel->getActiveSheet()->setCellValue('G1', 'Ad & Soyad'); }
 if($ltg=="lt8"){ $Excel->getActiveSheet()->setCellValue('H1', 'Ad & Soyad'); }

 
}
//Başlıklar



 
//veriler


/*$tur = 2;//her tursa bir alt satira gececegimiz icin sayac kullanıcaz
$lfcr = "\n";


for ($m = 01; $m <= $checKCount; $m++) {

	
	
	$Excel->getActiveSheet()->setCellValue("A$tur", $newDate);
	$Excel->getActiveSheet()->setCellValue("B$tur", $totalNumrows);
	$Excel->getActiveSheet()->setCellValue("C$tur", $mobilNumrows);
	$Excel->getActiveSheet()->setCellValue("D$tur", $webNumrows);



 
    //sayac arttırma
    $tur++;
}
 */
 
//olusturulan excel dosyası kaydediliyor

$Kaydet = PHPExcel_IOFactory::createWriter($Excel, 'Excel5');
$Kaydet->save("aylik_kayit_raporlari.xls");
 
//kullanıcı excel dosyasına yonlendiriliyor
//header("location:aylik_kayit_raporlari.xls");



?>