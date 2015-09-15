// JavaScript Document// JavaScript Document
$(document).ready(function(){
	$('#btnAddservice').click(function(event) {
		event.preventDefault();
		
		var action = "Addservices";
		if(document.getElementById('sev_code').value != '')
			action = "updateservices";
			
		$.ajax({
			url: "http://localhost/weddinghall/pages/"+action,
			type: "POST",
			data:  $("#form_sample_3").serialize(),
			error: function(xhr, status, error) {
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(returndb){
				//alert (returndb);
				alert ('تمت عملية الإضافة بنجاح');
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY
/***********************delete***************/
function deleteservice(sev_code)
{
	var r = confirm('هل انت متأكد من الإلفاء');
if (r == true) {
    x =1;
} else {
    x = 0;
}
if(x==1)
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
}