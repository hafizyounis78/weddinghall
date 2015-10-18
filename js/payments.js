function addpayments(){

	/*----------------------------*/
	var payment_amount = $('#payment_amount').val();
	var Total = $('#payments_body #tdTotal').html();
	var final_price=   $('#final_price').val();
	var payment_amount_old=$('#payment_amount_old').val();
	var new_total=0;
	var action = "addpayments";
	/*alert('final_price: '+ final_price);
	alert('Total: '+ Total);
	alert('payment_amount_old: '+ payment_amount_old);*/
		
	if(document.getElementById('hdnAction').value == '1')
	 { 
		action = "updatepayments";
		new_total=parseInt(Total)+parseInt(payment_amount)-parseInt(payment_amount_old);
//	alert('new_total: '+ new_total);
	 }
	else
	 {
		new_total=parseInt(Total)+parseInt(payment_amount);	
		
	 }
	
	if (parseInt(new_total)>parseInt(final_price))
	 {
		alert('قيمة الدفعات تجوازت المبلغ المطلوب من ,الرجاء التحقق من القيمة المدخلة');
		return;
	 }
	if (parseInt(new_total)<parseInt(final_price)){

		document.getElementById('booking_status').value =2;
		document.getElementById('b_desc').value ="حجز عليه دفعات مالية";
		
	}
	if (parseInt(new_total)==parseInt(final_price))
	{

		document.getElementById('booking_status').value =3;
		document.getElementById('b_desc').value ="حجز مسدد كامل الدفعات";
	}
	$.ajax({
			url: baseURL+"pages/"+action,
			type: "POST",
			data:  $("#payments_form").serialize(),
			error: function(xhr, status, error) {
				//var err = eval("(" + xhr.responseText + ")");
				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(data){
					alert ('تمت العملية بنجاح');
					$( "#payments_body" ).html(data);
						document.getElementById('payment_date').value ="";
						document.getElementById('payment_amount').value ="";
						document.getElementById('payment_amount_old').value ="";
					//	document.getElementById('final_price').value ="";
						document.getElementById('invoice_no').value ="";
	//					document.getElementById('notes').value ="";
						document.getElementById('p_code').value ="";
						document.getElementById('hdnAction').value =0;
						
						
				//	$( "#payments_footer" ).empty();
					//	window.location.href=baseURL+"searchpaymentsajax";
//				document.location.reload(true);
			}
		  });//END $.ajax
		  } // END addpayments

/***********************update payments**************************/
function updatepayemnts(i){
//	var rowid=document.getElementById('payment_date').value =$('#payments_body #payment_date_td'+i).html();
	$('payments_date').datepicker('setDate',$('#payments_body #payment_date_td'+i).val());
	document.getElementById('payment_date').value =$('#payments_body #payment_date_td'+i).html();
	document.getElementById('payment_amount').value = $('#payments_body #payment_amount_td'+i).html();
	document.getElementById('payment_amount_old').value = $('#payments_body #payment_amount_td'+i).html();
//	document.getElementById('notes').value = $('#notes_td');
	document.getElementById('invoice_no').value =$('#payments_body #invoice_no_td'+i).html();
	document.getElementById('p_code').value =$('#payments_body #p_code_td'+i).html();
	document.getElementById('hdnAction').value =1;
		}//end function 
function updatempepayemnts(i){
//	var rowid=document.getElementById('payment_date').value =$('#payments_body #payment_date_td'+i).html();
	$('payments_date').datepicker('setDate',$('#payments_body #payment_date_td'+i).val());
	document.getElementById('payment_date').value =$('#emppayments_body #payment_date_td'+i).html();
	document.getElementById('payment_amount').value = $('#emppayments_body #payment_amount_td'+i).html();
	document.getElementById("payment_type").selectedIndex  = $('#emppayments_body #payment_type_td'+i).html();
	document.getElementById("payment_type")
	//document.getElementById('payment_amount_old').value = $('#payments_body #payment_amount_td'+i).html();
//	document.getElementById('notes').value = $('#notes_td');
	document.getElementById('invoice_no').value =$('#emppayments_body #invoice_no_td'+i).html();
	document.getElementById('ep_code').value =$('#emppayments_body #ep_code_td'+i).html();
	document.getElementById('hdnAction').value =1;
	
		}//end function 

/********************emp payments***************/
function addemppayments(){
	var action = "addemppayments";
	if(document.getElementById('hdnAction').value == '1')
	 { 
		action = "updateemppayments";
	 }
	$.ajax({
			url: baseURL+"pages/"+action,
			type: "POST",
			data:  $("#emppayments_form").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(data){
					alert ('تمت عملية الإضافة بنجاح');
//					document.location.reload(true);

					$( "#emppayments_body" ).html(data);
						document.getElementById('payment_date').value ="";
						document.getElementById('payment_amount').value ="";
					//document.getElementById('payment_type').value ="";
					$("payment_type").val(0);
//						document.getElementById('payment_type').caption ="";
					//	document.getElementById('final_price').value ="";
						document.getElementById('invoice_no').value ="";
	//					document.getElementById('notes').value ="";
						document.getElementById('ep_code').value ="";
						document.getElementById('hdnAction').value =0;
					
			}
		});//END $.ajax
	} // END addemppayments
//--------------------------------
function deletepayments(p_code,i)
{
	/**********************************************/
	var Total = $('#payments_body #tdTotal').html();
	var final_price=   $('#final_price').val();
	var payment_amount=$('#payments_body #payment_amount_td'+i).html();
	var new_total=0;
	var b_status=0;
	var b_code=document.getElementById('booking_code').value ;
	

	new_total=parseInt(Total)-Math.abs(parseInt(payment_amount));

	 
	
	
	if (parseInt(new_total)>parseInt(final_price))
	 {
		alert('قيمة الدفعات تجوازت المبلغ المطلوب من ,الرجاء التحقق من القيمة المدخلة');
		return;
	 }
	if (parseInt(new_total)<parseInt(final_price))
	{
	b_status=2;
	document.getElementById('b_desc').value ="حجز عليه دفعات مالية";

	}
	if (parseInt(new_total)==parseInt(final_price))
{
	b_status=3;
		document.getElementById('b_desc').value ="حجز مسدد كامل الدفعات";
}
	/*******************************************/

var r = confirm('هل انت متأكد من الإلفاء');
if (r == true) {
    x =1;
} else {
    x = 0;
}
if(x==1)
{
		$.ajax({
			url: baseURL+"pages/deletepayments",
			type: "POST",
			data:   {p_code:p_code,booking_code:b_code,booking_status:b_status},
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(data){
				//alert ('تمت عملية الإضافة بنجاح');
				//	window.location.href=baseURL+"searchpaymentsajax";
//				document.location.reload(true);
					$( "#payments_body" ).html(data);
			}
		});//END $.ajax
}
}
//--------------------------------
function deletempepayments(ep_code)
{
	
	var emp_code=document.getElementById('emp_code').value;
var r = confirm('هل انت متأكد من الإلفاء');
if (r == true) {
    x =1;
} else {
    x = 0;
}
if(x==1)
{
		$.ajax({
			url: baseURL+"pages/deleteemppayments",
			type: "POST",
			data:   {ep_code:ep_code,emp_code:emp_code},
			error: function(){
				alert('error');
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(data){
				//alert ('تمت عملية الإضافة بنجاح');
				//	window.location.href=baseURL+"searchpaymentsajax";
//				document.location.reload(true);
					$( "#emppayments_body" ).html(data);
			}
		});//END $.ajax
}
}
//--------------------------------
	

var paymentsFormValidation = function () {
 var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#payments_form');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
					payment_date: {
                        required: true
                    },
					payment_amount: {
                        digits: true,
					    required: true
                    },
					invoice_no: {
                        digits: true,
					    required: true
                    }
                },

               messages: { // custom messages for radio buttons and checkboxes
                    payment_date: {
						required: "الرجاء ادخال تاريخ الدفعة"
                    }, 
					payment_amount: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجاء ادخال قيمة الدفعة المالية"
                    },
					invoice_no: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجاء ادخال رقم الوصل"
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
					addpayments();

					
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
var emppaymentsFormValidation = function () {
 var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#emppayments_form');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
					payment_date: {
                        required: true
                    },
					payment_amount: {
                        digits: true,
					    required: true
                    },
					payment_type: {
                        required: true
                    },
					invoice_no: {
                        digits: true,
					    required: true
                    }
                },

               messages: { // custom messages for radio buttons and checkboxes
                    payment_date: {
						required: "الرجاء ادخال تاريخ الدفعة"
                    }, 
					payment_amount: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجاء ادخال قيمة الدفعة المالية"
                    },
					payment_type: {
						required: "الرجاء ادخال نوع الدفعة المالية"
                    },
					invoice_no: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجاء ادخال رقم الوصل"
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
					addemppayments();

					
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
