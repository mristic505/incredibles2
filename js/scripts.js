jQuery(document).ready(function($){


	// process the form
    $('form').submit(function(event) {

    	$('.form__field-holder').each(function(){    		
    		$(this).removeClass('has-error');
    	});
    	$('.error_message').each(function(){
    		$(this).remove();
    	});

        $.ajax({
	        type: 'GET',
	        url: 'http://juicyjuicegame.com/incredibles2/process.php',
	        data: {
	            firstName : $('#firstName').val(),
	            lastName : $('#lastName').val(),
	            email : $('#email').val(),
	            confirmEmail : $('#confirmEmail').val(),
	            phoneNumber : $('#phoneNumber').val(),
	            firstCode : $('#firstCode').val(),
	            secondCode : $('#secondCode').val(),
	            thirdCode : $('#thirdCode').val(),
	            ageCheck : $('#ageCheck').val(),
	            emailOptIn : $('#emailOptIn').val(),
	            sweepOptIn : $('#sweepOptIn').val(),
	            recaptcha: grecaptcha.getResponse()
	        },
	        dataType: 'jsonp',
	        crossDomain: true,
	    }).done(function(response){
	        console.log(response);
	        if(response[0]['success']=true) {
	        	if(response[0]['message'] == "duplicate_codes_submitted") {
	        		$('.form__first-code').append('<div class="error_message">Duplicate codes submittedd</div>');
	        		$('.form__first-code').addClass('has-error');
	        	}
	        	if(response[0]['message'] == "already_used") {
	        		$('.form__first-code').append('<div class="error_message">One or more codes have been already used</div>');
	        		$('.form__first-code').addClass('has-error');
	        	}
	        	if(response[0]['message'] == "codes_not_found") {
	        		// alert('One or more codes are invalid');
	        		$('.form__first-code').append('<div class="error_message">One or more codes are invalid</div>');
	        		$('.form__first-code').addClass('has-error');
	        	}
	        	if(response[0]['message'] == "all_codes_found_entry_made") {
	        		window.location.href = "?page=thank-you";
	        	}	        	
	        	if (typeof response[0]['errors'] != "undefined") {
				   if(response[0]['errors']['email'] == "Emails_do_not_match") {
		        		$('.form__email').append('<div class="error_message">Emails do not match</div>');
		        		$('.form__email').addClass('has-error');
		        	}
				}
	        }
	        
	    }).fail(function(error){
	        console.log(error.statusText);
	    });
	    event.preventDefault();

	    $( document ).ajaxComplete(function() {
	    	if($('.has-error').length > 0) {
	    		$('html, body').animate({
    				scrollTop: ($('.has-error').offset().top)
				},500);
			}		  	
		});

    });


    $('#phoneNumber').mask('(000) 000-0000');
    $('#firstCode').mask('AAAAAAAAA');
    $('#secondCode').mask('AAAAAAAAA');
    $('#thirdCode').mask('AAAAAAAAA');

});
