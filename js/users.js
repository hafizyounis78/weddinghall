// JavaScript Document
$(document).ready(function(){
	$('#btnAdduser').click(function() {
									
		$.ajax({
			url: "pages/adduser",
			type: "POST",
			data:  $("#form_sample_3").serialize(),
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
