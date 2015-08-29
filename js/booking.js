// JavaScript Document// JavaScript Document
$(document).ready(function(){
	$('#btnAddbooking').click(function(event) {							
		event.preventDefault();
		
		$.ajax({
			url: "pages/Addbooking",
			type: "POST",
			data:  $("#form_sample_3").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
	
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(result){
				alert (result);
					alert ('تمت عملية الإضافة بنجاح');
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY

/*********************booking_details*******************/
$(document).ready(function(){
	$('#btnAddbooking_details').click(function() {
									
		$.ajax({
			url: "pages/addbooking_details",
			type: "POST",
			data:  $("#service_form").serialize(),
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

function deletebooking(w_code)
{
		$.ajax({
			url: "pages/deletebooking/"+booking_code,
			type: "POST",
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الحذف بنجاح');
					window.location.href="booking";
			}
		});//END $.ajax
}