// JavaScript Document// JavaScript Document
function checkdate (){
	if(document.getElementById('booking_date').value !='')
	{
		document.getElementById('booking_date').value='' ;
	}
	}
function addbocking(){

	var cnt =0;
	var bstatus='';
	var action = "Addbooking";
	if(document.getElementById('hdnAction').value == '1')
		action = "updatebooking";
	if(document.getElementById('booking_status').value == 4)
		 bstatus= 1;
	$.ajax({
		url: baseURL+"pages/"+action,
		type: "POST",
		data:  $("#booking_form").serialize(),
		error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
	
			},
		beforeSend: function(){},
		complete: function(){},
		success: function(result){
				if(document.getElementById('hdnAction').value == 0)
					document.getElementById('hdnBookingcode').value = result;
			
				document.getElementById('btnAddbooking').disabled=true;
			//	alert ('تمت العملية بنجاح');
				document.getElementById('dvServices').style.display = "block";
//				document.getElementById('hdnOldcust').value	=0;
				if(bstatus == 1)
		 		document.getElementById('b_desc').value ="حجز فقط";
				//alert(document.getElementById('hdnBookingcode').value);
				

			}
	});//END $.ajax
} // END addbocking
$(document).ready(function(){


$('#btnisnew').click(function(event){
	var r = confirm('سيتم استبدال بيانات الزبون,هل انت متأكد من هذه العملية');
	if (r == true) {
		x =1;
	} else {
		x = 0;
	}
	if(x==1)
	{
	
document.getElementById('cut_id_no').value=null;
document.getElementById('name').value=null;
document.getElementById('tel').value=null;
document.getElementById('mobile').value=null;
document.getElementById('address').value=null;
document.getElementById('notes').value=null;
document.getElementById('isnew').value=1;
	}
});



/**************************************/

	$('#booking_date').change(function(event) {							
		event.preventDefault();
		
		var booking_date= document.getElementById('booking_date').value;
		var w_code=$('#w_code').val();
		if (w_code== null || w_code == ""|| w_code == 0)
		{
			document.getElementById('booking_date').value = '';
			document.getElementById("w_code").focus();	
			alert ('يجب اختيار الصالة قبل اختيار التاريخ');
			return;
			
		}
				//var d = new Date("03-25-2015"); 
				//alert(Date().get);
		
		var date = new Date();
		
		var day = date.getDate();
		if (day>= 1 && day <= 9) 
			day = '0' + day;
			
		var month = date.getMonth()+1;
		if (month >= 1 && month <= 9)
			month = '0' + month;
		
		var year = date.getFullYear();
		
		
		var d = year+'-'+month+'-'+day;
		
		var bookingDate = new Date(booking_date);
		var today = new Date(d);
		//alert ("bookingDate: "+bookingDate);
		//alert ("today: "+today);
		if (bookingDate <= today)
		{
			alert ('يجب ان يكون تاريخ الحجز اكبر من تاريخ اليوم');
			document.getElementById('booking_date').value = '';
			return;
		}
		
		$.ajax({
			url: baseURL+"pages/get_booking_date",
			type: "POST",
			data: {booking_date:booking_date, w_code:w_code},
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
	
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(result){
				
					if (result>=1 ){
				document.getElementById('booking_date').value = '';
				
				alert ('هذا اليوم محجوز  ');
				return;
				}
			}
			});//END $.ajax	
	}); // END CLICK

}); // END READY*/



function sev_code_change(){	
 	var sev_code = $('#sev_code').find('option:selected').val();
		document.getElementById('btnAddbooking_details').disabled=true;
		$.ajax({
			url: baseURL+"pages/service_price/"+sev_code,
			type: "POST",
			data: function(){},
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
	
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(result){
				//alert (result);
				document.getElementById('sev_price').value = result;
				document.getElementById('btnAddbooking_details').disabled=false;
				
			}
		});//END $.ajax	
		}
function addbooking_details(){		
	
	
	var length=document.getElementById("serv_body").rows.length;
//	alert(document.getElementById('hdnBookingcode').value);
		var new_sev_code=document.getElementById('sev_code').value;
	document.getElementById('btnAddbooking_details').disabled=true;
//	document.getElementById("sev_code").selectedIndex = "0"
   if(new_sev_code==0)
   {
		alert('يجب اختيار خدمة جديدة');
   		return;
   }
	for (i = 1; i < length; i++)
		{ sev_code_rec=$('#serv_body #sev_code_td'+i).html();
			if (new_sev_code==sev_code_rec)
			{
			alert('تم اضافة الخدمة مسبقاً, الرجاء اختيار خدمة أخرى');
			return;
			}
		}
		$.ajax({
			url: baseURL+"pages/addbooking_details",
			type: "POST",
			data:  $("#service_form").serialize(),
			error: function(xhr, status, error) {
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(data){
					//alert(returndb);
				//	$('#service_table table > tbody:first').html(data);
					//alert ('تمت عملية اضافة خدمة بنجاح');
			
               //$( "#serv_body" ).load( " Addbooking #serv_body" );
			   $( "#serv_body" ).html(data);
			   document.getElementById('total_price').value = $('#serv_body #tdTotal').html();

				//var sev_index =document.getElementById("sev_code").selectedIndex;
//			   	var sev_index = $(sev_code).item(index);
			//alert(sev_index);
			//   alert($('#service_form #sev_code').html());
   				
				document.getElementById("sev_code").selectedIndex = "0";
				document.getElementById("sev_price").value= 0;
				var ar=document.getElementById("sev_code").selectedIndex;
				 $('#sev_code').prop('selectedIndex', index);
				alert(ar);

//				document.getElementById("sev_code").options.remove(sev_index)
	//			document.getElementById("sev_code").caption="";
				//$('#sev_code').prop('selectedIndex',0);
				
				
				//document.getElementById("sev_code").selectedIndex="0";
				//document.getElementById("sev_code").text='Select';				
				//document.getElementById("sev_price").text=0;
				
				

			}
		});//END $.ajax
	}
function saveprice(){
	
		
		var booking_code = $('#hdnBookingcode').val();
		
		$.ajax({
			url: baseURL+"pages/addbooking_price/"+booking_code,
			type: "POST",
			data:  $("#price_form").serialize(),
			error: function(xhr, status, error) {
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(data){
					//alert(data);
		//		alert ('تمت عملية اضافة السعر بنجاح');
				window.location.href=baseURL+"addpayments/"+booking_code;
			}
		});//END $.ajax
		}// END CLICK
/*var formid=0;
$('#btnAddbooking').click(function(event) {	
formid=1;
alert(formid);
alert('btnAddbooking');

});*/
function deleteselectedservice(sev_code){
	booking_code= document.getElementById('hdnBookingcode').value;
	
	var r = confirm('هل انت متأكد من عملة الحذف');
	if (r == true) {
		x =1;
	} else {
		x = 0;
	}
	if(x==1)
	{
	
			$.ajax({
				url: baseURL+"pages/delete_selectedservice/"+sev_code+"/"+booking_code,
				type: "POST",
				data:  $("#serv_body").serialize(),
				error: function(){
					alert('error');
				},
				beforeSend: function(){},
				complete: function(){},
				success: function(data){
					//	alert ('تمت عملية الحذف بنجاح');
					$( "#serv_body" ).html(data);
					if ( $('#serv_body #tdTotal').html()!='')
					   document.getElementById('total_price').value = $('#serv_body #tdTotal').html();
					else
					   document.getElementById('total_price').value = 0;
	
					
						//window.location.href="users";
				}
			});//END $.ajax
	}
	}
function deletebooking(booking_code){
	
	
	//	alert(booking_code);
	var r = confirm('هل انت متأكد من الإلفاء');
	if (r == true) {
		x =1;
	} else {
		x = 0;
	}
	if(x==1)
	{
			$.ajax({
				
				url: baseURL+"pages/deletebooking/"+booking_code,
				type: "POST",
				error: function(){
					alert('error');
				},
				beforeSend: function(){},
				complete: function(){},
				success: function(){
						//alert ('تمت عملية الإلغاء بنجاح');
			document.getElementById("reload").click(); 			
				}
			});//END $.ajax
	}	}
	
var bookingFormValidation = function () {
 var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#booking_form');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
					w_code: {
                        required: true
                    },
					booking_date: {
                        required: true
                    },
					cut_id_no: {
                        digits: true,
                       
                    },
					name: {
                        minlength: 2,
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
                    }
                },

               messages: { // custom messages for radio buttons and checkboxes
                    w_code: {
						required: "الرجاء اختيار الصالة"
                    }, 
					booking_date: {
						required: "الرجاء اختيار التاريخ"
                    }, 
					 cut_id_no: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						
                    },
					name: {
						minlength: "لايمكن ادخال اسم اقل من حرفين",
                        required: "الرجاء ادخل الاسم"
                    },
                    tel: {
						minlength: "رقم الهاتف يجب ان يكون 7 ارقام",
						digits: "الرجـاء ادخـال ارقـام فقط"
                    },
					mobile: {
						minlength: "رقم الجوال يجب ان يكون 10 ارقام مبدوء ب 059",
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجـاء ادخـل رقـم الجـوال"
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
                    addbocking();
					success3.show();
                    error3.hide();
	//				if(formid==1)
					
									
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

var bookingdetailsFormValidation = function () {
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
					sev_code: {
                        required: true
                    },
					sev_price: {
                        digits: true,
					    required: true
                    }
                },

               messages: { // custom messages for radio buttons and checkboxes
                    sev_code: {
						required: "الرجاء اختيار الخدمة"
                    }, 
					sev_price: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجاء ادخال سعر الخدمة"
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
					addbooking_details();
                    success3.show();
                    error3.hide();


					
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
var bookingpriceFormValidation = function () {
 var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#price_form');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
					final_price: {
                        digits: true,
					    required: true
                    }
                },

               messages: { // custom messages for radio buttons and checkboxes
                   final_price: {
						digits: "الرجـاء ادخـال ارقـام فقط",
						required: "الرجاء ادخال المبلغ المطلوب"
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
					saveprice();
                    success3.show();
                    error3.hide();

					
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