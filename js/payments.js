$(document).ready(function(){
	$('#btnAddpayments').click(function() {
									
		$.ajax({
			url: "pages/addpayments",
			type: "POST",
			data:  $("#payments_form").serialize(),
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الإضافة بنجاح');
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY