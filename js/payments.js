$(document).ready(function(){
	$('#btnAddpayments').click(function(event) {
		event.preventDefault();
		var payment_amount = $('#payment_amount').val();
		var Total = $('#payments_footer #tdTotal').html();
		var final_price= $('#payments_body #final_price_td').html();
		var payment_amount_old=$('#payments_body #payment_amount_td').html();
		var new_total=0;
		var action = "addpayments";
if(document.getElementById('hdnAction').value == '1')
{
action = "updatepayments";

new_total=parseInt(Total)+parseInt(payment_amount)-parseInt(payment_amount_old);
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
		else if (parseInt(new_total)<parseInt(final_price))
				document.getElementById('booking_status').value =2;
		if (parseInt(new_total)==parseInt(final_price))
		document.getElementById('booking_status').value =3;
		
		$.ajax({
			url: "http://localhost/weddinghall/pages/"+action,
			type: "POST",
			data:  $("#payments_form").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الإضافة بنجاح');
					window.location.href="http://localhost/weddinghall/searchpaymentsajax";
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY
/***********************update payments**************************/
function updatepayemnts()
{
	

$('payments_date').datepicker('setDate',$('#payments_body #payment_date_td').val());
		document.getElementById('payment_date').value =$('#payments_body #payment_date_td').html();
		document.getElementById('payment_amount').value = $('#payments_body #payment_amount_td').html();
		document.getElementById('invoice_no').value =$('#payments_body #invoice_no_td').html();
	    document.getElementById('p_code').value =$('#payments_body #p_code_td').html();
		    document.getElementById('hdnAction').value =1;
		
}//end function 


/********************emp payments***************/
$(document).ready(function(){
	$('#btnAddemppayments').click(function(event) {
		event.preventDefault();
		
		$.ajax({
			url: "http://localhost/weddinghall/pages/addemppayments",
			type: "POST",
			data:  $("#emppayments_form").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(){
					alert ('تمت عملية الإضافة بنجاح');
					window.location.href="http://localhost/weddinghall/searchpaymentsajax";
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY