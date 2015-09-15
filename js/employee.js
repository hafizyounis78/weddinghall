
// JavaScript Document// JavaScript Document

$(document).ready(function(){
	$('#btnAddemp').click(function(event) {							
		event.preventDefault();
		var action = "addemp";
		
		if(document.getElementById('hdnAction').value == '1')
		{
			action = "updateemp";
		
		}
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
					window.location.href="employee";
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY

/***********************delete***************/
function deleteEmp(empId)
{		var r = confirm('هل انت متأكد من الإلفاء');
if (r == true) {
    x =1;
} else {
    x = 0;
}
if(x==1)
{				
		$.ajax({
			url: "pages/delemp/"+empId,
			type: "POST",
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الحذف بنجاح');
					window.location.href="employee";
			}
		});//END $.ajax
}
}
/**************************update******************/
