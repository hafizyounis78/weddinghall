// JavaScript Document// JavaScript Document
$(document).ready(function(){
	$('#btnAddhall').click(function(event) {
		event.preventDefault();
		
		var action = "Addhall";
		if(document.getElementById('w_code').value != '')
			action = "updatehall";
		
		$.ajax({
			url: "http://localhost/weddinghall/pages/"+action,
			type: "POST",
			data:  $("#form_sample_3").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
				alert("pages/"+action);

			},
			beforeSend: function(){},
			complete: function(){},
			success: function(returndb){
				//alert (returndb);
				alert ('تمت العملية بنجاح');
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY
/***********************delete***************/
function deletehall(w_code)
{var r = confirm('هل انت متأكد من الإلفاء');
if (r == true) {
    x =1;
} else {
    x = 0;
}
if(x==1)
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
					window.location.href="hall";
			}
		});//END $.ajax
}
}