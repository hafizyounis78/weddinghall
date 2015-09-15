// JavaScript Document// JavaScript Document
$(document).ready(function(){
	var cnt =0;
	
	$('#btnAddbooking').click(function(event) {							
		event.preventDefault();
		var action = "Addbooking";
		if(document.getElementById('hdnAction').value == '1')
			action = "updatebooking";
		$.ajax({
			url: "http://localhost/weddinghall/pages/"+action,
			type: "POST",
			data:  $("#form_sample_3").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
	
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(result){
	
				document.getElementById('hdnBookingcode').value = result;
				alert ('تمت العملية بنجاح');

			}
		});//END $.ajax
	}); // END CLICK
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
			url: "http://localhost/weddinghall/pages/get_booking_date/"+booking_date+"/"+w_code,
			type: "POST",
			data: function(){},
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
	
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(result){
				
			//	if(result==1)
			//alert(result.name);
			if (result.name== null )
				{
				//document.getElementById('booking_date').value = '';
				
			//	alert ('هذا اليوم محجوز');
				
				}
			}
		});//END $.ajax	
		
	}); // END CLICK
 	$('#sev_code').change(function(event) {							
		event.preventDefault();
		var sev_code = $(this).find('option:selected').val();
		
		$.ajax({
			url: "http://localhost/weddinghall/pages/service_price/"+sev_code,
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
			}
		});//END $.ajax	
		
	});
	$('#btnAddbooking_details').click(function(event) {							
		event.preventDefault();
	
	var length=document.getElementById("serv_body").rows.length;
	var new_sev_code=document.getElementById('sev_code').value;
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
			url: "http://localhost/weddinghall/pages/addbooking_details",
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
					alert ('تمت عملية اضافة خدمة بنجاح');
			
               //$( "#serv_body" ).load( " Addbooking #serv_body" );
			   $( "#serv_body" ).html(data);
			   document.getElementById('total_price').value = $('#serv_body #tdTotal').html();

				//var sev_index =document.getElementById("sev_code").selectedIndex;
//			   	var sev_index = $(sev_code).item(index);
			//alert(sev_index);
			//   alert($('#service_form #sev_code').html());
   				
				document.getElementById("sev_code").selectedIndex = "0";
						document.getElementById("sev_price").value= 0;

//				document.getElementById("sev_code").options.remove(sev_index)
	//			document.getElementById("sev_code").caption="";
				//$('#sev_code').prop('selectedIndex',0);
				
				
				//document.getElementById("sev_code").selectedIndex="0";
				//document.getElementById("sev_code").text='Select';				
				//document.getElementById("sev_price").text=0;
				
				

			}
		});//END $.ajax
	});
	$('#btnSaveprice').click(function(event) {							
		event.preventDefault();
		
		var booking_code = $('#hdnBookingcode').val();
		
		$.ajax({
			url: "http://localhost/weddinghall/pages/addbooking_price/"+booking_code,
			type: "POST",
			data:  $("#price_form").serialize(),
			error: function(xhr, status, error) {
  				alert(xhr.responseText);
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(data){
					//alert(data);
				alert ('تمت عملية اضافة السعر بنجاح');
				window.location.href="http://localhost/weddinghall/addpayments/"+booking_code;
			}
		});//END $.ajax
	}); // END CLICK

//-*********************** functions ***********************--/
	function deleteselectedservice(sev_code)
	{
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
				url: "http://localhost/weddinghall/pages/delete_selectedservice/"+sev_code+"/"+booking_code,
				type: "POST",
				data:  $("#serv_body").serialize(),
				error: function(){
					alert('error');
				},
				beforeSend: function(){},
				complete: function(){},
				success: function(data){
						alert ('تمت عملية الحذف بنجاح');
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
	
	function deletebooking(booking_code)
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
				
				url: "pages/deletebooking/"+booking_code,
				type: "POST",
				error: function(){
					alert('error');
				},
				beforeSend: function(){},
				complete: function(){},
				success: function(){
						alert ('تمت عملية الإلغاء بنجاح');
						
				}
			});//END $.ajax
	}
	}
}); // END READY