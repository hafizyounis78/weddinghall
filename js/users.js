// JavaScript Document

$(document).ready(function(){
	var form = $( "#user_form" );
	form.on('beforeSubmit', function(e) {
		form.validate();
		alert('123');
   // Do your things
   if (cannotSubmitBecauseOfProblem)
      e.result = false; // Prevent form submission.
})
	$('#btnAdduser').click(function(event) {							
		event.preventDefault();
		var action = "adduser";
		if(document.getElementById('hdnAction').value == '1')
			action = "updateuser";
		
		$.ajax({
			url: "http://localhost/weddinghall/pages/"+action,
			type: "POST",
			data:  $("#user_form").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
				alert("pages/"+action);

			},
			beforeSend: function(){},
			complete: function(){},
			success: function(returndb){

					alert ('تمت العملية بنجاح');
					window.location.href="users";
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY
/***********************delete***************/
function deleteUser(username)
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
			url: "pages/deleteuser/"+username,
			type: "POST",
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(returndb){
				//	alert (returndb);
					alert ('تمت عملية الحذف بنجاح');
					window.location.href="users";
			}
		});//END $.ajax
}
}