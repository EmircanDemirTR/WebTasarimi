<?PHP 

if($getData->siteConfig["googleAnalyticsDash"]==""){
?>

<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<div class="card">
  <div class="card-header d-flex align-items-center">&nbsp;</div>
  <div class="card-body">
      <div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>UYARI!</h4> Lütfen Google Analytics Ayarlarını Yapın</div>
  </div>
</div>
</div>
</div>
</div>

<?PHP 

}else{

$adminEngine->getChartDate();


$dateToTest = $adminEngine->charts["year"].'-'.$adminEngine->charts["month"].'-01';
$lastDayM = date('t',strtotime($dateToTest));

//$lastDayM = cal_days_in_month(CAL_GREGORIAN,$adminEngine->charts["month"],$adminEngine->charts["year"]); 

$slistDate = $adminEngine->charts["year"]."-".$adminEngine->charts["month"]."-01";
$elistDate = $adminEngine->charts["year"]."-".$adminEngine->charts["month"]."-".$lastDayM;

function getService()
{

  require_once ('../core/class/src/Google/autoload.php'); 

  $service_account_email = 'sayac-veriler@analytics-data-1215.iam.gserviceaccount.com';
  $key_file_location = 'Analytics-Data-675f5c28a320.p12';

  $client = new Google_Client();
  $client->setApplicationName("Test");
  $analytics = new Google_Service_Analytics($client);



  $key = file_get_contents($key_file_location);
  $cred = new Google_Auth_AssertionCredentials(
      $service_account_email,
      array(Google_Service_Analytics::ANALYTICS_READONLY),
      $key
  );

  $client->setAssertionCredentials($cred);
  if($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
  }

  return $analytics;

}


function getResults(&$analytics, $profileId, $slistDate, $elistDate) {

   $optParams = array(
      'dimensions' => 'ga:day',
	  'metrics' => 'ga:pageviews,ga:sessions',
      );

   return $analytics->data_ga->get(
       'ga:' . $profileId,
       $slistDate,
       $elistDate,
       'ga:sessions',$optParams);
}

$analytics = getService();

$profile = $getData->siteConfig["googleAnalyticsDash"];

$results = getResults($analytics,$profile, $slistDate, $elistDate);

for($i=0;$i<count($results["rows"]);$i++) {
	$cogul[] = $results["rows"][$i][1];
	$tekil[]= $results["rows"][$i][2];
}

function getResults2(&$analytics, $profileId, $slistDate, $elistDate) {

   $optParams = array(
      'dimensions' => 'ga:keyword,ga:medium',
	  'metrics' => 'ga:pageviews,ga:sessions',
      );

   return $analytics->data_ga->get(
       'ga:' . $profileId,
       $slistDate,
       $elistDate,
       'ga:sessions',$optParams);
}


function getResults3(&$analytics, $profileId, $slistDate, $elistDate) {

   $optParams = array(
      'dimensions' => 'ga:country',
	  'metrics' => 'ga:pageviews,ga:sessions',
      );

   return $analytics->data_ga->get(
       'ga:' . $profileId,
       $slistDate,
       $elistDate,
       'ga:sessions',$optParams);
}


function getResults4(&$analytics, $profileId, $slistDate, $elistDate) {

   $optParams = array(
      'dimensions' => 'ga:city,ga:countryIsoCode',
	  'metrics' => 'ga:pageviews,ga:sessions',
      );

   return $analytics->data_ga->get(
       'ga:' . $profileId,
       $slistDate,
       $elistDate,
       'ga:sessions',$optParams);
}


function getResults5(&$analytics, $profileId, $slistDate, $elistDate) {

   $optParams = array(
      'dimensions' => 'ga:browser',
	  'metrics' => 'ga:pageviews,ga:sessions',
      );

   return $analytics->data_ga->get(
       'ga:' . $profileId,
       $slistDate,
       $elistDate,
       'ga:sessions',$optParams);
}


function getResults6(&$analytics, $profileId, $slistDate, $elistDate) {

   $optParams = array(
      'dimensions' => 'ga:operatingSystem',
	  'metrics' => 'ga:pageviews,ga:sessions',
      );

   return $analytics->data_ga->get(
       'ga:' . $profileId,
       $slistDate,
       $elistDate,
       'ga:sessions',$optParams);
}


function getResults7(&$analytics, $profileId, $slistDate, $elistDate) {

   $optParams = array(
      'dimensions' => 'ga:mobileDeviceBranding',
	  'metrics' => 'ga:pageviews,ga:sessions',
      );

   return $analytics->data_ga->get(
       'ga:' . $profileId,
       $slistDate,
       $elistDate,
       'ga:sessions',$optParams);
}

//print_r($results7);

?>
<style type="text/css">
.dashboard-header { padding:20px 0;}
</style>


<div class="col-lg-6">
  <div class="card">

<div class="card-header d-flex align-items-center">
  <h3 class="h4">İstatistikler&nbsp;&nbsp;&nbsp;</h3>
</div>
<div class="card-body">

<section class="dashboard-header">
  <div class="container-fluid">
    <div class="row">
      <!-- Line Chart            -->
      <div class="col-lg-12 col-12">
      	<div class="col-lg-12 col-12">
              <form class="form-horizontal" action="main.php?module=dashboard/dashboard" method="post" enctype="multipart/form-data" name="chart">
        
             <div class="form-group row">
             	<div class="col-lg-3 col-12 offset-sm-5">
                  <select name="month" id="month" class="form-control">
                    <?PHP print $adminEngine->chartMonth(); ?>
                  </select>
                </div> 
             	<div class="col-lg-3 col-12">
                  <select name="year" id="year" class="form-control">
                    <?PHP print $adminEngine->chartYear(); ?>
                  </select>
                </div> 
                <div class="col-lg-1 col-12"> 
                  <button class="btn btn-primary" type="submit" id="refreshBtn"><i class="fa fa-refresh"></i> </button>
                </div>  
                  
              </div>
              
              
              </form>
        </div>
        
        <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
          <canvas id="lineCahrt"></canvas>
        </div>
        
        
        <br><r>
      </div>
    </div>
  </div>
</section>
</div>
</div>
</div>





<div class="col-lg-6">
  <div class="card">

    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Google Aramalar&nbsp;&nbsp;&nbsp;</h3>
    </div>
    <div class="card-body">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="home-info" data-toggle="tab" href="#1" aria-controls="1" aria-expanded="true">Anahtar Kelimeler</a></li>
    </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="1">
        <div class="clearfix" style="height: 20px;"></div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover"  style="background:#FFF;" id="pageList1">
            <thead>
              <tr>
                <th width="78%" style="text-align:left; padding-left:15px;">Anahtar Kelimeler</th>
                <th width="22%" style="text-align:center;">Sorgu Sayısı</th>
              </tr>
            </thead>
            <tbody>
    
            <?PHP 
                $results2 = getResults2($analytics,$profile, $slistDate, $elistDate);
                for($i=0;$i<count($results2["rows"]);$i++) {
                    if($results2["rows"][$i][1]=="organic"){
            ?>
              <tr>
                <td style="text-align:left; padding-left:15px;"><?PHP print $results2["rows"][$i][0]; ?></td>
                <td style="text-align:center;"><?PHP print $results2["rows"][$i][3];; ?></td>
              </tr>
            <?PHP } } ?>
    
            <tbody>
          </table>
        </div>
      </div>


	</div>
  </div>
</div>

<!--- ---->


<div class="col-lg-6">
  <div class="card">

    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Demografi&nbsp;&nbsp;&nbsp;</h3>
    </div>
    <div class="card-body">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="home-ulke" data-toggle="tab" href="#ulke" aria-controls="1" aria-expanded="true">Ülke / Bölge</a></li>
    <li class="nav-item"><a class="nav-link" id="home-sehir" data-toggle="tab" href="#sehir" aria-controls="1" aria-expanded="true">Şehir</a></li>
    </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="ulke">
        <div class="clearfix" style="height: 20px;"></div>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover"  style="background:#FFF;">
                <thead>
                  <tr>
                    <th width="78%" style="text-align:left; padding-left:15px;">Ülke / Bölge</th>
                    <th width="22%" style="text-align:center;">Ziyaret Sayısı</th>
                  </tr>
                </thead>
                <tbody>
        
                <?PHP 
                    $results3 = getResults3($analytics,$profile, $slistDate, $elistDate);
                    for($i=0;$i<count($results3["rows"]);$i++) {
                ?>
        
                  <tr>
                    <td style="text-align:left; padding-left:15px;"><?PHP print $results3["rows"][$i][0]; ?></td>
                    <td style="text-align:center;"><?PHP print $results3["rows"][$i][2]; ?></td>
                  </tr>
        
                <?PHP } ?>
        
                <tbody>
              </table>
        </div>

        <div class="tab-pane fade" id="sehir">
        <div class="clearfix" style="height: 20px;"></div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover" style="background:#FFF;" >
            <thead>
              <tr>
                <th width="78%" style="text-align:left; padding-left:15px;">Şehir</th>
                <th width="22%" style="text-align:center;">Ziyaret Sayısı</th>
              </tr>
            </thead>
    
            <tbody>
    
            <?PHP 
                $results4 = getResults4($analytics,$profile, $slistDate, $elistDate);
                for($i=0;$i<count($results4["rows"]);$i++) {
                    if($results4["rows"][$i][1]=="TR"){
            ?>
    
              <tr>
                <td style="text-align:left; padding-left:15px;"><?PHP print $results4["rows"][$i][0]; ?></td>
                <td style="text-align:center;"><?PHP print $results4["rows"][$i][3]; ?></td>
              </tr>
    
            <?PHP }}  ?>
    
            <tbody>
          </table>
        </div>

      </div>


	</div>
  </div>
</div>


<!--- ---->


<div class="col-lg-6">
  <div class="card">

    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Sistem&nbsp;&nbsp;&nbsp;</h3>
    </div>
    <div class="card-body">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="home-tarayici" data-toggle="tab" href="#tarayici" aria-controls="1" aria-expanded="true">Tarayıcı</a></li>
    <li class="nav-item"><a class="nav-link" id="home-isistem" data-toggle="tab" href="#isistem" aria-controls="1" aria-expanded="true">İşletim Sistemi</a></li>
    <li class="nav-item"><a class="nav-link" id="home-mobil" data-toggle="tab" href="#mobil" aria-controls="1" aria-expanded="true">Mobil</a></li>
    </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tarayici">
        <div class="clearfix" style="height: 20px;"></div>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover"  style="background:#FFF;">
                <thead>
                  <tr>
                    <th width="78%" style="text-align:left; padding-left:15px;">İnternet Tarayıcısı</th>
                    <th width="22%" style="text-align:center;">Ziyaret Sayısı</th>
                  </tr>
                </thead>
        
                <tbody>
        
                <?PHP 
                    $results5 = getResults5($analytics,$profile, $slistDate, $elistDate);
                    for($i=0;$i<count($results5["rows"]);$i++) {
                ?>
        
                  <tr>
                    <td style="text-align:left; padding-left:15px;"><?PHP print $results5["rows"][$i][0]; ?></td>
                    <td style="text-align:center;"><?PHP print $results5["rows"][$i][2]; ?></td>
                  </tr>
        
                <?PHP }?>
        
                <tbody>
              </table>
        </div>


        <div class="tab-pane fade" id="isistem">
        <div class="clearfix" style="height: 20px;"></div>

              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover" style="background:#FFF;" >
                <thead>
                  <tr>
                    <th width="78%" style="text-align:left; padding-left:15px;">İşletim Sistemi</th>
                    <th width="22%" style="text-align:center;">Ziyaret Sayısı</th>
                  </tr>
                </thead>
        
                <tbody>
        
                <?PHP 
                    $results6 = getResults6($analytics,$profile, $slistDate, $elistDate);
                    for($i=0;$i<count($results6["rows"]);$i++) {
                ?>
        
                  <tr>
                    <td style="text-align:left; padding-left:15px;"><?PHP print $results6["rows"][$i][0]; ?></td>
                    <td style="text-align:center;"><?PHP print $results6["rows"][$i][2]; ?></td>
                  </tr>
        
                <?PHP } ?>
        
                <tbody>
              </table>
        
        
        </div>


        <div class="tab-pane fade" id="mobil">
        <div class="clearfix" style="height: 20px;"></div>
        
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover"  style="background:#FFF;">
            <thead>
              <tr>
                <th width="78%" style="text-align:left; padding-left:15px;">Mobil</th>
                <th width="22%" style="text-align:center;">Ziyaret Sayısı</th>
              </tr>
            </thead>
    
            <tbody>
    
            <?PHP 
                $results7 = getResults7($analytics,$profile, $slistDate, $elistDate);
                for($i=0;$i<count($results7["rows"]);$i++) {
                if($results7["rows"][$i][0] != "(not set)") {
            ?>
    
              <tr>
                <td style="text-align:left; padding-left:15px;"><?PHP print $results7["rows"][$i][0]; ?></td>
                <td style="text-align:center;"><?PHP print $results7["rows"][$i][2]; ?></td>
              </tr>
    
            <?PHP } } ?>
    
            <tbody>
          </table>

        
        </div>

        

      </div>


	</div>
  </div>
</div>


<?php } ?>