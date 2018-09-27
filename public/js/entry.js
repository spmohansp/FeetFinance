$(document).ready(function () {

	$(".DateChange").on("change paste keyup", function(e) {
		e.preventDefault();
		var dateFrom=$('#entry-dateFrom').val();
		var dateTo=$('#entry-dateTo').val();
		if(dateFrom!=''){
			$("#entry-dateTo").prop('min',dateFrom);
		}
		if(dateTo!=''){
			$("#entry-dateFrom").removeAttr("max")
			$("#entry-dateFrom").prop('max',dateTo);
		}
	});

	$(".CalculateKm").on("change paste keyup", function(e) {
		e.preventDefault();
		var startkm=$('#entry-startkm').val();
		var endkm=$('#entry-endkm').val();
		var totalkm=parseInt(endkm)-parseInt(startkm);
		$('#entry-totalkm').val(totalkm);
		if(totalkm<=0){
			$('#ErrorTotal').html('<p style="color:red">Check KM Value Entered</p>');
		}else{
			$('#ErrorTotal').html('');
		}
	});

	$(".calculateEntryValue").on("change paste keyup", function(e) {
		e.preventDefault();
		var billAmount=$('#entry-billAmount').val();
		var advance=$('#entry-advance').val();
		var comission=$('#entry-comission').val();
		var loadingMamool=$('#entry-loadingMamool').val();
		var unLoadingMamool=$('#entry-unLoadingMamool').val();		
		console.log('Calculate Value');
	});
})