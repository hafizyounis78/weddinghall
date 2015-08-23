// JavaScript Document
$(document).ready(function(){
	$('#btnAdduser').click(function() {
		alert($("#frmAdduser").serialize());
		var input = $("#frmAdduser").serialize();
		
		$.ajax({
			url: "pages/adduser/",
			type: "POST",
			data:  $("#frmAdduser").serialize(),
			error: function(){},
			beforeSend: function(){},
			complete: function(){},
			success: function(){}
		});//$.ajax
	}); // END CLICK
}); // END READY
