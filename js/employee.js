// JavaScript Document// JavaScript Document
$(document).ready(function(){
	$('#btnAddemp').click(function() {
									
		$.ajax({
			url: "pages/addemp",
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
function deleteEmp(empId)
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
/**************************update******************/
function updateEmp(empId)
{						
		$.ajax({
			url: "pages/addemp/"+empId,
			type: "POST",
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
//					alert ('تمت عملية hgju بنجاح');
					//window.location.href="employee";
			}
		});//END $.ajax
}