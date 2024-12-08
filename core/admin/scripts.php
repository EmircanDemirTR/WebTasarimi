<?PHP print $getData->importLibJS("fancybox2/js/fancybox.js?v=2.1.4"); ?>
<?PHP print $getData->importLibJS("fancybox2/js/fancybox-thumbs.js?v=1.0.7"); ?>
<?PHP print $getData->importLibJS("ckeditor/ckeditor.js"); ?>



<?PHP 
if($adminEngine->siteConfig["adminModule"] == "product/productgallery" || $adminEngine->siteConfig["adminModule"] == "gallery/galleryimages" || $adminEngine->siteConfig["adminModule"] == "gallery/galleryvideos" || $adminEngine->siteConfig["adminModule"] == "page/productgallery"){
	print $getData->importLibJS("jquery/jquery-ui.min.js");
}

if($adminEngine->siteConfig["adminModule"] == "dashboard/dashboard" || $adminEngine->siteConfig["adminModule"] == ""){
echo '<script src="Chart.min.js"></script>';
}



?>



<script type="text/javascript">

<?PHP if($adminEngine->siteConfig["adminModule"] == "dashboard/dashboard" || $adminEngine->siteConfig["adminModule"] == ""){ ?>

    'use strict';


    // ------------------------------------------------------- //
    // Charts Gradients
    // ------------------------------------------------------ //
    var ctx1 = $("canvas").get(0).getContext("2d");
    var gradient1 = ctx1.createLinearGradient(150, 0, 150, 300);
    gradient1.addColorStop(0, 'rgba(133, 180, 242, 0.91)');
    gradient1.addColorStop(1, 'rgba(255, 119, 119, 0.94)');

    var gradient2 = ctx1.createLinearGradient(146.000, 0.000, 154.000, 300.000);
    gradient2.addColorStop(0, 'rgba(104, 179, 112, 0.85)');
    gradient2.addColorStop(1, 'rgba(76, 162, 205, 0.85)');


    // ------------------------------------------------------- //
    // Line Chart
    // ------------------------------------------------------ //
    var LINECHARTEXMPLE   = $('#lineChartExample');
    var lineChartExample = new Chart(LINECHARTEXMPLE, {
        type: 'line',
        options: {
            legend: {labels:{fontColor:"#777", fontSize: 12}},
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
            datasets: [
                {
                    label: "Tekil Hit",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: gradient1,
                    borderColor: gradient1,
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 3,
                    pointBorderColor: gradient1,
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 3,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: gradient1,
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 4,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [<?php echo implode(",",$tekil);?>],
                    spanGaps: false
                },
                {
                    label: "Çoğul Hit",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: gradient2,
                    borderColor: gradient2,
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 3,
                    pointBorderColor: gradient2,
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 3,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: gradient2,
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 4,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [<?php echo implode(",",$cogul);?>],
                    spanGaps: false
                }
            ]
        }
    });




/******************************/



    'use strict';

    // ------------------------------------------------------- //
    // Line Chart
    // ------------------------------------------------------ //
    var legendState = true;
    if ($(window).outerWidth() < 576) {
        legendState = false;
    }

    var LINECHART = $('#lineCahrt');
    var myLineChart = new Chart(LINECHART, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: legendState
            }
        },
        data: {
            labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
            datasets: [
                {
                    label: "Tekil Hit",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "transparent",
                    borderColor: '#f15765',
                    pointBorderColor: '#da4c59',
                    pointHoverBackgroundColor: '#da4c59',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 3,
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 3,
                    pointHoverRadius: 5,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 4,
                    pointRadius: 3,
                    pointHitRadius: 0,
                    data: [<?php echo implode(",",$tekil);?>],
                    spanGaps: false
                },
                {
                    label: "Çoğul Hit",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "transparent",
                    borderColor: "#54e69d",
                    pointHoverBackgroundColor: "#44c384",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 3,
                    pointBorderColor: "#44c384",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 3,
                    pointHoverRadius: 5,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 4,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [<?php echo implode(",",$cogul);?>],
                    spanGaps: false
                }
            ]
        }
    });




<?PHP } ?>


// TAB MENU

$('#mdTabMenu a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})



$('#uploadbtn').click(function() {
	$("#uploadbtn").addClass('disabled');
});



$('#refreshBtn').click(function() {
	$("#refreshBtn").addClass('disabled');
});



$('#pageImgDel').click(function() {
	$("#pageImgDel").addClass('disabled');
});


<?PHP if($adminEngine->siteConfig["adminModule"] == "product/productgallery"){ ?>
$("#gallery").sortable()
$("#click").click(function(){
    var data = $("#gallery").sortable("serialize")
	$.ajax({
		type:"post",
		url:"main.php?module=product/productgalleryorder",
		data:"sort=" + data,
		success:function(data){
			$("#data").fadeOut(3000).html('<span class="alert alert-success">Sıralama işleminiz başarıyla güncellenmiştir.</span>');
		}
	});
	$("#data").fadeIn().html();
});
<?PHP } ?>


<?PHP if($adminEngine->siteConfig["adminModule"] == "page/productgallery"){ ?>
$("#gallery").sortable()
$("#click").click(function(){
    var data = $("#gallery").sortable("serialize")
	$.ajax({
		type:"post",
		url:"main.php?module=page/productgalleryorder",
		data:"sort=" + data,
		success:function(data){
			$("#data").fadeOut(3000).html('<span class="alert alert-success">Sıralama işleminiz başarıyla güncellenmiştir.</span>');
		}
	});
	$("#data").fadeIn().html();
});
<?PHP } ?>	

<?PHP if($adminEngine->siteConfig["adminModule"] == "gallery/galleryimages" || $adminEngine->siteConfig["adminModule"] == "gallery/galleryvideos"){ ?>
$("#gallery").sortable()
$("#click").click(function(){
    var data = $("#gallery").sortable("serialize")
	$.ajax({
		type:"post",
		url:"main.php?module=gallery/galleryorder",
		data:"sort=" + data,
		success:function(data){
			$("#data").fadeOut(124124141243000).html('<span class="alert alert-success">Sıralama işleminiz başarıyla güncellenmiştir.</span>');
		}
	});

	$("#data").fadeIn().html();

});
<?PHP } ?>

<?PHP if($adminEngine->siteConfig["adminModule"] == "product/productadd" || $adminEngine->siteConfig["adminModule"] == "product/productedit"){ ?>
$("#p8").click(function () {
	$('#p9').attr("disabled", !$(this).is(':checked'));
});
<?PHP } ?>



// DELETE MODAL

$(".removeData").click(function(){ 

$('#modal_dat_remove a:nth-child(1)').data('delete', $(this).data('id'));
<?PHP if($getData->siteConfig["adminModule"] == "product/productlist"){ ?>
	$('#modal_dat_remove a:nth-child(1)').data('group', $(this).data('rel'));
<?PHP } else if($getData->siteConfig["adminModule"] == "product/productgallery" || $getData->siteConfig["adminModule"] == "page/productgallery" || $adminEngine->siteConfig["adminModule"] == "gallery/galleryimages" || $adminEngine->siteConfig["adminModule"] == "gallery/galleryvideos"){ ?>
	$('#modal_dat_remove a:nth-child(1)').data('file', $(this).data('rel'));
<?PHP }elseif($getData->siteConfig["adminModule"] == "forms/formlist"){ ?>
	$('#modal_dat_remove a:nth-child(1)').data('moduletype', $(this).data('moduletype'));
<?php } ?>

//show the modal

$('#modal_dat_remove').modal('show');

	return false;

});



//click delete button in the modal

$("#deleteID").click(function(e){   

	<?PHP if($getData->siteConfig["adminModule"] == "product/productlist"){ ?>

	document.location = "main.php?module=<?PHP print $getData->siteConfig["adminModule"]; ?>&group=" + $(this).data('group') + "&delete=" + $(this).data('delete');

	<?PHP } else if($getData->siteConfig["adminModule"] == "product/productgallery" || $adminEngine->siteConfig["adminModule"] == "gallery/galleryimages" || $adminEngine->siteConfig["adminModule"] == "gallery/galleryvideos" || $adminEngine->siteConfig["adminModule"] == "page/productgallery") { ?>

	document.location = "main.php?module=<?PHP print $getData->siteConfig["adminModule"]; ?>&id=<?PHP print $getData->siteConfig["getID"]; ?>&file=" + $(this).data('file') + "&delete=" + $(this).data('delete');

	<?PHP } elseif($getData->siteConfig["adminModule"] == "forms/formlist") { ?>

	document.location = "main.php?module=<?PHP print $getData->siteConfig["adminModule"]; ?>&delete=" + $(this).data('delete') + "&moduletype=" + $(this).data('moduletype');

	<?PHP }else { ?>

	document.location = "main.php?module=<?PHP print $getData->siteConfig["adminModule"]; ?>&delete=" + $(this).data('delete');

	<?PHP } ?>

});






// SELECT MENU



<?PHP if($adminEngine->siteConfig["adminModule"] == "page/pageedit"){ ?>
$(document).ready(function(){
	var getid = "<?PHP print $editData["page_id"];?>";
	var parent = "<?PHP print $editData["page_parent"];?>";
	var group = "<?PHP print $editData["page_group"];?>";
	$.ajax({
		type:"post",
		url:"../core/modules/page/request.php",
		data:"id=" + getid + "/" + parent + "/" + group + "&proc=edit",
		success:function(data){
			  $("#p4").html(data);
		}
	});

	$("#p3").change(function(){
		var country = $("#p3").val();
		$.ajax({
		  	type:"post",
		  	url:"../core/modules/page/request.php",
		  	data:"id=" + getid + "/" + parent + "/" + country + "&proc=edit",
			success:function(data){
				$("#p4").html(data);
			}
		});
	});

});
<?PHP } ?>





<?PHP if($adminEngine->siteConfig["adminModule"] == "page/pageadd"){ ?>
$(document).ready(function(){
	$.ajax({
		type:"post",
		url:"../core/modules/page/request.php",
		data:"id=1&proc=add",
		success:function(data){
			  $("#p3").html(data);
		}
	});
	   

	$("#p2").change(function(){
		var country = $("#p2").val();
		$.ajax({
		  	type:"post",
		  	url:"../core/modules/page/request.php",
		  	data:"id=" + country + "&proc=add",
			success:function(data){
				$("#p3").html(data);
			}
		});
	});
});
<?PHP } ?>



<?PHP if($adminEngine->siteConfig["adminModule"] == "product/pageedit" or $adminEngine->siteConfig["adminModule"] == "product/categoryEdit"){ ?>
$(document).ready(function(){
	var getid = "<?PHP print $editData["page_id"];?>";
	var parent = "<?PHP print $editData["page_parent"];?>";
	var group = "<?PHP print $editData["page_group"];?>";
	$.ajax({
		type:"post",
		url:"../core/modules/product/request.php",
		data:"id=" + getid + "/" + parent + "/" + group + "&proc=edit",
		success:function(data){
			  $("#p4").html(data);
		}
	});

	$("#p3").change(function(){
		var country = $("#p3").val();
		$.ajax({
		  	type:"post",
		  	url:"../core/modules/product/request.php",
		  	data:"id=" + getid + "/" + parent + "/" + country + "&proc=edit",
			success:function(data){
				$("#p4").html(data);
			}
		});
	});

});
<?PHP } ?>



<?PHP if($adminEngine->siteConfig["adminModule"] == "product/pageaddaaaaa"){ ?>
$(document).ready(function(){
	$.ajax({
		type:"post",
		url:"../core/modules/product/request.php",
		data:"id=3&proc=add",
		success:function(data){
			  $("#p3").html(data);
		}
	});
	   

	$("#p2").change(function(){
		var country = $("#p2").val();
		$.ajax({
		  	type:"post",
		  	url:"../core/modules/product/request.php",
		  	data:"id=" + country + "&proc=add",
			success:function(data){
				$("#p3").html(data);
			}
		});
	});
});
<?PHP } ?>

<?PHP if($adminEngine->siteConfig["adminModule"] == "product/catAdd"){ ?>
$(document).ready(function(){
	$.ajax({
		type:"post",
		url:"../core/modules/product/requestCat.php",
		data:"id=3&proc=add",
		success:function(data){
			  $("#p3").html(data);
		}
	});
	   

	$("#p2").change(function(){
		var country = $("#p2").val();
		$.ajax({
		  	type:"post",
		  	url:"../core/modules/product/requestCat.php",
		  	data:"id=" + country + "&proc=add",
			success:function(data){
				$("#p3").html(data);
			}
		});
	});
});
<?PHP } ?>




<?PHP if($adminEngine->siteConfig["adminModule"] == "home/homeadd"){ ?>
$(document).ready(function(){
	$.ajax({
		type:"post",
		url:"../core/modules/home/request.php",
		data:"id=2&proc=add",
		success:function(data){
			  $("#p3").html(data);
		}
	});

	$("#p2").change(function(){
		var country = $("#p2").val();
		$.ajax({
		  	type:"post",
		  	url:"../core/modules/home/request.php",
		  	data:"id=" + country + "&proc=add",
			success:function(data){
				$("#p3").html(data);
			}
		});
	});
});
<?PHP } ?>











// PAGE FANCYBOX

$(document).ready(function() {
	$('.fancybox').fancybox();
	$(".myfancyImg").fancybox({
		openEffect  : 'none',
		closeEffect	: 'none',
		helpers : {
			title : {
				type : 'inside'
			}
		}
	});
});





// CKEDITOR

<?PHP if($adminEngine->siteConfig["adminModule"] == "page/pageedit" or $adminEngine->siteConfig["adminModule"] == "page/pageedit2" or $adminEngine->siteConfig["adminModule"] == "home/homeedit"){ ?>
// CKEDITOR
CKEDITOR.replace('content');
CKEDITOR.add 
CKEDITOR.replace('contenten');
CKEDITOR.add 
CKEDITOR.replace('contentar');
CKEDITOR.add 
CKEDITOR.config.autoParagraph = false;
<?php } ?>

<?PHP if($adminEngine->siteConfig["adminModule"] == "product/pageedit" ){ ?>
// CKEDITOR
CKEDITOR.replace('p3');
CKEDITOR.add 
CKEDITOR.config.autoParagraph = false;
// CKEDITOR
CKEDITOR.replace('p3en');
CKEDITOR.add 
CKEDITOR.config.autoParagraph = false;
// CKEDITOR
CKEDITOR.replace('p3ar');
CKEDITOR.add 
CKEDITOR.config.autoParagraph = false;
<?php } ?>


$(document).ready(function() {
	$('table').dataTable( {
	  "autoWidth": false,
	  "pageLength": 50,
	  "order": []
	});
});

$(document).ready(function() {
$('.multiS').multiselect({
	enableCaseInsensitiveFiltering: true,
	buttonWidth: '100%',
});
});


</script>

