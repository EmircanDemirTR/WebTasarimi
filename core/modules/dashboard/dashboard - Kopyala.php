<?PHP 



$adminEngine->getChartDate();

$lastDayM = cal_days_in_month(CAL_GREGORIAN,$adminEngine->charts["month"],$adminEngine->charts["year"]); 

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

$profile = "111642814";

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
.tab-content .span6 {
	float:left;
}

.tab-content .span4 {
	float:right;
	width:293px;
	text-align:right;
}

.tab-content .span5 {
	float:right;
	text-align:right;
	margin-top:-20px;

}.tab-content .row {
	margin-left:0;
}

</style>

<div class="hero-unit">
  <div class="row-fluid">
    <div class="span6">
      <h2>İstatistikler</h2>
    </div>

    <div class="span6" style="text-align:right; margin-top:8px;">
      <form class="form-horizontal" action="main.php?module=dashboard/dashboard" method="post" enctype="multipart/form-data" name="chart">
        <div class="control-group">
          <select name="month" id="month" class="input-small">
            <?PHP print $adminEngine->chartMonth(); ?>
          </select>

          <select name="year" id="year" class="input-small">
            <?PHP print $adminEngine->chartYear(); ?>
          </select>

          <button class="btn" type="submit" id="refreshBtn"><i class="icon-refresh"></i> </button>

        </div>
      </form>
    </div>
  </div>
  <div id="chartHit" style="margin:0 auto;"></div>
</div>

<div class="row-fluid">

  <ul id="mdTabMenu" class="nav nav-tabs">
    <li  class="active"><a href="#anahtar" data-toggle="tab">Anahtar Kelimeler </a></li>
    <li><a href="#adwords" data-toggle="tab">Adwords Aramalar </a></li>
    <li class="dropdown"><a href="#demografi" class="dropdown-toggle" data-toggle="dropdown">Demografi <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#ulke" data-toggle="tab">Ülke / Bölge</a></li>
        <li><a href="#sehir" data-toggle="tab">Şehir</a></li>
      </ul>
    </li>

    <li class="dropdown"><a href="#sistem" class="dropdown-toggle" data-toggle="dropdown">Sistem <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#tarayici" data-toggle="tab">Tarayıcı</a></li>
        <li><a href="#isletimsistemi" data-toggle="tab">İşletim Sistemi</a></li>
      </ul>
    </li>

    <li><a href="#mobil" data-toggle="tab">Mobil </a></li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="anahtar">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover"  style="background:#FFF;" id="pageList1">
        <thead>
          <tr>
            <th width="83%" style="text-align:left; padding-left:15px;">Anahtar Kelimeler</th>
            <th width="17%" style="text-align:center;">Sorgu Sayısı</th>
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

    <div class="tab-pane" id="adwords">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover" style="background:#FFF;" >
        <thead>
          <tr>
            <th width="83%" style="text-align:left; padding-left:15px;">Anahtar Kelimeler</th>
            <th width="17%" style="text-align:center;">Sorgu Sayısı</th>
          </tr>
        </thead>

        <tbody>

		<?PHP 
			$results2 = getResults2($analytics,$profile, $slistDate, $elistDate);
			for($i=0;$i<count($results2["rows"]);$i++) {
				if($results2["rows"][$i][1]=="cpc"){
		?>

          <tr>
            <td style="text-align:left; padding-left:15px;"><?PHP print $results2["rows"][$i][0]; ?></td>
            <td style="text-align:center;"><?PHP print $results2["rows"][$i][3];; ?></td>
          </tr>

		<?PHP } } ?>

        <tbody>
      </table>
    </div>

    <div class="tab-pane" id="ulke">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover"  style="background:#FFF;">
        <thead>
          <tr>
            <th width="83%" style="text-align:left; padding-left:15px;">Ülke / Bölge</th>
            <th width="17%" style="text-align:center;">Ziyaret Sayısı</th>
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

    <div class="tab-pane" id="sehir">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover" style="background:#FFF;" >
        <thead>
          <tr>
            <th width="83%" style="text-align:left; padding-left:15px;">Şehir</th>
            <th width="17%" style="text-align:center;">Ziyaret Sayısı</th>
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

    <div class="tab-pane" id="tarayici">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover"  style="background:#FFF;">
        <thead>
          <tr>
            <th width="83%" style="text-align:left; padding-left:15px;">İnternet Tarayıcısı</th>
            <th width="17%" style="text-align:center;">Ziyaret Sayısı</th>
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

    <div class="tab-pane" id="isletimsistemi">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="background:#FFF;" >
        <thead>
          <tr>
            <th width="83%" style="text-align:left; padding-left:15px;">İşletim Sistemi</th>
            <th width="17%" style="text-align:center;">Ziyaret Sayısı</th>
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

    <div class="tab-pane" id="mobil">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover"  style="background:#FFF;">
        <thead>
          <tr>
            <th width="83%" style="text-align:left; padding-left:15px;">Mobil</th>
            <th width="17%" style="text-align:center;">Ziyaret Sayısı</th>
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

