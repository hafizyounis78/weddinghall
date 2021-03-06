﻿
var Calendar = function() {


    return {
        //main function to initiate the module
        init: function() {
            Calendar.initCalendar();
        },

        initCalendar: function() {

            if (!jQuery().fullCalendar) {
                return;
            }

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var h = {};

            if (Metronic.isRTL()) {
                if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        right: 'title, prev, next',
                        center: '',
                        left: 'agendaDay, agendaWeek, month, today'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        right: 'title',
                        center: '',
                        left: 'agendaDay, agendaWeek, month, today, prev,next'
                    };
                }
            } else {
                if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        left: 'title, prev, next',
                        center: '',
                        right: 'today,month,agendaWeek,agendaDay'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        left: 'title',
                        center: '',
                        right: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                }
            }

            var initDrag = function(el) {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim(el.text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                el.data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                el.draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            };

            var addEvent = function(title) {
                title = title.length === 0 ? "Untitled Event" : title;
                var html = $('<div class="external-event label label-default">' + title + '</div>');
                jQuery('#event_box').append(html);
                initDrag(html);
            };

            $('#external-events div.external-event').each(function() {
                initDrag($(this));
            });

            $('#event_add').unbind('click').click(function() {
                var title = $('#event_title').val();
                addEvent(title);
            });

            //predefined events
            $('#event_box').html("");

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            $('#calendar').fullCalendar({ //re-initialize the calendar
                header: h,
                defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/ 
                slotMinutes: 15,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.className = $(this).attr("data-class");

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: function(start, end, timezone, callback){
						var hall = document.getElementById('w_code').value;
//						var baseurl = "<?php echo base_url(); ?>";
						$.ajax({
    						url: baseURL+"pages/booking_calender",
    						type: "POST",
							data: {hall:hall},
    						success:function(retrieved_data){
         					// Your code here.. use something like this
							//alert(retrieved_data.length);
         					//var Obj = JSON.parse(retrieved_data);
							
							var arr = [{title: 'All Day Event',
                    		 start: new Date(y, m, 1),
                    			backgroundColor: Metronic.getBrandColor('yellow')
                			}];
							//alert(arr[0]['start']);
							
         					// Since your controller produce array of object you can access the value by using this one :
         					var events = [];
							for(var a=0; a< retrieved_data.length; a++){
              				//	alert("the value with id : " + retrieved_data[a]['title'] + "is " + retrieved_data[a]['start']);
         						events.push({
											title:retrieved_data[a]['title'],
											start:retrieved_data[a]['start'],
											url:retrieved_data[a]['url'],
											textColor:retrieved_data[a]['textColor'],
											backgroundColor:Metronic.getBrandColor(retrieved_data[a]['backgroundColor'])
											});
							}//END FOR
							
							callback(events);
    					} //END SUCCESS
						
					});//END AJAX
				},//END FUN EVENT
				dayClick: function(date, jsEvent, view) {
					if (document.getElementById('w_code').value == 0)
					{
						alert('الرجاء أدخل رقم الصالة');
						return;
					}
					
					var booking_date = date;
					var tdate = new Date();
		
					var day = tdate.getDate();
					if (day>= 1 && day <= 9) 
						day = '0' + day;
						
					var month = tdate.getMonth()+1;
					if (month >= 1 && month <= 9)
						month = '0' + month;
					
					var year = tdate.getFullYear();
					
					
					var d = year+'-'+month+'-'+day;
					
					var bookingDate = new Date(booking_date);
					var today = new Date(d);
					//alert ("bookingDate: "+bookingDate);
					//alert ("today: "+today);
					if (bookingDate <= today)
					{
						alert ('يجب ان يكون تاريخ الحجز اكبر من تاريخ اليوم');
						return;
					}
					
					// Check Events
					var events = $('#calendar').fullCalendar('clientEvents',function(evt) {
    					return evt.start.format()==date.format();
					});
					
					if (events != null && events != '')
					{
						alert('الصالة محجوزة');
						return;
						
					}
					//-----------
					
					$.ajax({
    						url:baseURL+"pages/sendBookingData",
    						type: "POST",
							data: { date: date.format(), hall: document.getElementById('w_code').value },
    						success:function(){
								window.location.href=baseURL+"addbooking";
							}
						   });

    			},// END dayClick
				eventClick: function(event) {
					  if (event.url) {
						  window.location.href = baseURL+event.url;
						  return false;
					  }
    			},//END eventClick
				dayRender: function (date, cell) {
					var date = new Date(date);
					
				  var today = new Date();
				  var month = date.getMonth()+1;
				  var Tmonth = today.getMonth()+1;
				  if (date.getDate() == today.getDate()) {
					  if(month==Tmonth){
					  cell.css("background-color", "#A0E339");
					   
					  }
				  }
			  }//END dayRender
            }); //END fullCalendar

        }// END IF RTL

    }; // END initCalendar

}();
//----
$(document).ready(function(){
	
	$('#w_code').change(function(event) {							
		event.preventDefault();
		
		Calendar.initCalendar();
	
	}); // END ON CHANGE

})// END DOCUMENT