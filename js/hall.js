// JavaScript Document// JavaScript Document

//	$('#btnAddhall').click(function(event) {
	//	event.preventDefault();
function addhall(){		
		var action = "Addhall";
		if(document.getElementById('w_code').value != '')
			action = "updatehall";
		
		$.ajax({
			url: baseURL+"pages/"+action,
			type: "POST",
			data:  $("#hall_form").serialize(),
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
}// END CLICK

/***********************delete***************/
function deletehall(w_code){
	var r = confirm('هل انت متأكد من الإلفاء');
if (r == true) {
    x =1;
} else {
    x = 0;
}
if(x==1)
{
		$.ajax({
			url: baseURL+"pages/deletehall/"+w_code,
			type: "POST",
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الحذف بنجاح');
					window.location.href=baseURL+"hall";
			}
		});//END $.ajax
}}
//--------------------------------
var HallFormValidation = function () {
 var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#hall_form');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
					w_name: {
                        minlength: 2,
                        required: true
                    },
                    
					address: {
                        required: true
                    },
					w_emp: {
                        required: true
                    }
					
                },

               messages: { // custom messages for radio buttons and checkboxes
                    w_name: {
						minlength: "لايمكن ادخال الصالة اسم اقل من حرفين",
                        required: "الرجاء ادخل الاسم"
                    },
                    
					address: {
						required: "الرجاء ادخال العنوان"
                    },
					w_emp: {
                        required: "الرجاء ادخال سم مشرف الصالة"
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
					addhall();
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