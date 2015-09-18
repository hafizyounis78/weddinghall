// JavaScript Document// JavaScript Document
/*$(document).ready(function(){
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
}); // END READY*/

function addservices()
{
	var action = "Addservices";
		if(document.getElementById('sev_code').value != '')
			action = "updateservices";
			
		$.ajax({
			url: "http://localhost/weddinghall/pages/"+action,
			type: "POST",
			data:  $("#service_form").serialize(),
			error: function(xhr, status, error) {
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(returndb){
				//alert (returndb);
				alert ('تمت عملية الإضافة بنجاح');
				window.location.href="http://localhost/weddinghall/services/";
			}
		});//END $.ajax
}
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
					window.location.href="http://localhost/weddinghall/services/";
			}
		});//END $.ajax
	}
}
//--------------------------------
var ServiceFormValidation = function () {
 var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#service_form');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
					sev_desc: {
						required: true
                    },
                    
					sev_price: {
						digits: true,
                        required: true
                    }
					
                },

               messages: { // custom messages for radio buttons and checkboxes
                    sev_desc: {
						required: "الرجاء ادخل الخـدمـة"
                    },
                    
					sev_price: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجاء ادخل سـعـر الخـدمـة"
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
					addservices();
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