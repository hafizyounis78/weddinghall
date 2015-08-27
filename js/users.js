// JavaScript Document
$(document).ready(function(){
	$('#btnAdduser').click(function(event) {							
		event.preventDefault();
		var action = "adduser";
		if(document.getElementById('hdnAction').value == '1')
			action = "updateuser";
		
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
					alert (returndb);
					alert ('تمت عملية الاضافة بنجاح');
					window.location.href="users";
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY
/***********************delete***************/
function deleteUser(username)
{
		$.ajax({
			url: "pages/deleteuser/"+username,
			type: "POST",
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(returndb){
					alert (returndb);
					alert ('تمت عملية الحذف بنجاح');
					window.location.href="users";
			}
		});//END $.ajax
}