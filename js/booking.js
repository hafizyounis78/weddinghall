// JavaScript Document// JavaScript Document
$(document).ready(function(){
	$('#btnAddbooking').click(function(event) {							
		event.preventDefault();
		
		$.ajax({
			url: "pages/Addbooking",
			type: "POST",
			data:  $("#form_sample_3").serialize(),
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
	
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(result){
				alert (result);
				document.getElementById('hdnBookingcode').value = result;
					alert ('تمت عملية الإضافة بنجاح');
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY


/*********************check booking date*******************/
$(document).ready(function(){
	$('#booking_date').change(function(event) {							
		event.preventDefault();
		var booking_date= document.getElementById('booking_date').value;
		
		$.ajax({
			url: "http://localhost/weddinghall/pages/get_booking_date/"+booking_date,
			type: "POST",
			data: function(){},
			error: function(xhr, status, error) {
  				//var err = eval("(" + xhr.responseText + ")");
  				alert(xhr.responseText);
	
			},
			beforeSend: function(){},
			complete: function(){},
			success: function(result){
				alert (result);
				//document.getElementById('sev_price').value = result;
			}
		});//END $.ajax	
		
	}); // END CLICK
}); // END READY		

/*********************booking_details*******************/
$(document).ready(function(){
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
		
	}); // END CLICK
}); // END READY		
$(document).ready(function(){
	$('#btnAddbooking_details').click(function(event) {							
		event.preventDefault();
		
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
   				

			}
		});//END $.ajax
	}); // END CLICK
}); // END READY

/***********************delete***************/

function deletebooking(w_code)
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
					alert ('تمت عملية الحذف بنجاح');
					window.location.href="booking";
			}
		});//END $.ajax
}
/*********************Service Price*******************/
$(document).ready(function(){
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
			}
		});//END $.ajax
	}); // END CLICK
}); // END READY
/*******************delete selected service************************/
function deleteselectedservice(sev_code)
{
booking_code= document.getElementById('hdnBookingcode').value;

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