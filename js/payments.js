$(document).ready(function(){
	$('#btnAddpayments').click(function(event) {
		event.preventDefault();
		var payment_amount = $('#payment_amount').val();
		alert(payment_amount);
		$.ajax({
			url: "http://localhost/weddinghall/pages/addpayments",
			type: "POST",
			data:  $("#payments_form").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الإضافة بنجاح');
					window.location.href="http://localhost/weddinghall/payments";
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY

/********************emp payments***************/
$(document).ready(function(){
	$('#btnAddemppayments').click(function(event) {
		event.preventDefault();
		
		$.ajax({
			url: "http://localhost/weddinghall/pages/addemppayments",
			type: "POST",
			data:  $("#emppayments_form").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الإضافة بنجاح');
					window.location.href="http://localhost/weddinghall/emppayments";
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY