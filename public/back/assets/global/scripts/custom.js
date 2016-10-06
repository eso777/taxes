$(document).ready(function() {

	//*  Settings Page [ back-end ] * //
	//*  Settings Page [ back-end ] * //

	/* Services Page */
		
	$('.conf').click(function(event) {
		
		event.preventDefault() ;
		var form = $(this).parent() ;
		
		swal({ title: $(this).attr('data-val-title'),   text: $(this).attr('data-val-text'),  
		type: "warning",   
		showCancelButton: true, 
		confirmButtonColor: "#DD6B55",  
		confirmButtonText: "استكمال الحذف!",   
		cancelButtonText: "الغاء",   closeOnConfirm: false,   closeOnCancel: false }, 

		function(isConfirm){  
			(isConfirm) ? form.submit() : swal("Cancelled", "تم الألغاء ", "error");  
		});
	});
	/* Services Page */
	function deleted_alert(text) {
		swal(text) ;
	}
	/* Services Page */

/* Start Messages page */

// To scroll to last msg in chat after relode ( after send and redirect back )  
$('.msgs-wrap').animate({ scrollTop: $('.msgs-wrap').prop("scrollHeight")},1000);
	
	$('#message').keydown(function (event) {
		var msg = $('#message').val();
		if(msg.trim() !== ''){
		    if(event.shiftKey && event.keyCode == 13 ) {
	          
	        }else if(event.keyCode == 13){
	        	event.preventDefault();
	        	$('#message').val(msg.trim());
	        	$('#message').attr( 'disabled' );
	            $('form').submit();
	        }
		}
    });

    $('#send').click(function(event) {
    	var msg = $('#message').val();
    	$('#message').val(msg.trim());
		if(msg.trim() == ''){
           event.preventDefault();
		}
    });

    $(".msgs-wrap").niceScroll({
    	'cursorcolor' : '#FFF' ,
    	'cursorborder' : 'rgb(241, 243, 250)' ,
    });

/* End Messages page */


/* Start Users Page Search area */

/* End Users Page Search area */

 
	
}); // End Dcounment ready 

/*
  * Start function Json Data 
  * This Function Take parametr url
  * this url connect as a function get data from data base and type this data JSON
  * in case success jsonData will be return all data to send it Jsfiddle .
 */


/*var jsonData;

function jsonTable(url) {
"use strict";
	$.ajax({
	    async: false,
	    dataType: "json",
	    url: url,
	    success: function(result) {
	        jsonData = result;
	    }
	});
	
	return jsonData ;
}
*/
/* End Function jsonData; */