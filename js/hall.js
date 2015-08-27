// JavaScript Document// JavaScript Document
$(document).ready(function(){
	$('#btnAddhall').click(function() {
									
		$.ajax({
			url: "pages/Addhall",
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
/*function deletehall(w_code)
{
		$.ajax({
			url: "pages/deletehall/"+w_code,
			type: "POST",
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الحذف بنجاح');
					window.location.href="users";
			}
		});//END $.ajax
}*/