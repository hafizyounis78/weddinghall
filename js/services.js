// JavaScript Document// JavaScript Document
$(document).ready(function(){
	$('#btnAddservice').click(function() {
									
		$.ajax({
			url: "pages/Addservices",
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
/***********************delete***************/
function deleteservice(sev_code)
{
		$.ajax({
			url: "pages/deleteservice/"+sev_code,
			type: "POST",
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الحذف بنجاح');
					window.location.href="services";
			}
		});//END $.ajax
}