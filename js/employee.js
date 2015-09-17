
// JavaScript Document// JavaScript Document

/*$(document).ready(function(){
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
			data:  $("#employee_form").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
				//alert("pages/"+action);

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
}); // END READY*/

function employee()
{
	var action = "addemp";
		
		if(document.getElementById('hdnAction').value == '1')
		{
			action = "updateemp";
		
		}
		$.ajax({
			url: "http://localhost/weddinghall/pages/"+action,
			type: "POST",
			data:  $("#employee_form").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
				//alert("pages/"+action);

			},
			beforeSend: function(){},
			complete: function(){},
			success: function(returndb){
				alert (returndb);
					alert ('تمت عملية الاضافة بنجاح');
					window.location.href="employee";
			}
		});//END $.ajax
}
/***********************delete***************/
function deleteEmp(empId)
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
//--------------------------------
var EmpFormValidation = function () {
 var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#employee_form');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
					emp_id: {
						digits: true,
                        minlength: 9,
						maxlength: 9,
                        required: true
                    },
					name: {
                        minlength: 2,
                        required: true
                    },
                    sex: {
                        required: true
                    },
					tel: {
						digits: true,
						minlength: 7
                    },
					mobile: {
						digits: true,
						minlength: 10,
						required: true
                    },
					job: {
                        required: true
                    },
                    contract_code: {
                        required: true
                    },
					salary: {
                        required: true,
						digits: true
                    }
                },

               messages: { // custom messages for radio buttons and checkboxes
                    emp_id: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						minlength: "الرجاء ادخل رقم الهوية 9 ارقام",
						maxlength: "الرجاء ادخل رقم الهوية 9 ارقام",
                        required: "الرجاء ادخل رقم الهوية"
                    },
					name: {
						minlength: "لايمكن ادخال اسم اقل من حرفين",
                        required: "الرجاء ادخل الاسم"
                    },
                    sex: {
                        required: "الرجـاء اختر ذكر/انثى"
                    },
					tel: {
						minlength: "رقم الهاتف يجب ان يكون 7 ارقام",
						digits: "الرجـاء ادخـال ارقـام فقط"
                    },
					mobile: {
						minlength: "رقم الجوال يجب ان يكون 10 ارقام مبدوء ب 059",
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجـاء ادخـل رقـم الجـوال"
                    },
					job: {
                        required: "الرجـاء اختـر الوظيـفة"
                    },
                    contract_code: {
                         required: "الرجـاء اختـر نوع العـقد"
                    },
					salary: {
                        required: "الرجـاء ادخـل الـراتب",
						digits: "الرجـاء ادخـال ارقـام فقط"
                    }
					
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success3.show();
                    error3.hide();
					employee();
                    //form[0].submit(); // submit the form
                }

            });
    }
return {
        //main function to initiate the module
        init: function () {
            handleValidation3();

        }

    };

}();