jQuery(document).ready(function($){


	// process the form
    $('form').submit(function(event) {

    	$('.form__field-holder').each(function(){    		
    		$(this).removeClass('has-error');
    	});
    	$('.error_message').each(function(){
    		$(this).remove();
    	});
    	$('.loader').css('opacity', 1);


        $.ajax({
	        type: 'GET',
	        url: 'https://juicyjuicegame.com/incredibles2/process.php',
	        data: {
	            firstName : $('#firstName').val(),
	            lastName : $('#lastName').val(),
	            email : $('#email').val(),
	            confirmEmail : $('#confirmEmail').val(),
	            phoneNumber : $('#phoneNumber').val(),
	            firstCode : $('#firstCode').val(),
	            secondCode : $('#secondCode').val(),
	            thirdCode : $('#thirdCode').val(),
	            ageCheck : $('#ageCheck:checked').val(),
	            emailOptIn : $('#emailOptIn:checked').val(),
	            sweepOptIn : $('#sweepOptIn:checked').val(),
	            recaptcha: grecaptcha.getResponse()
	        },
	        dataType: 'jsonp',
	        crossDomain: true,
	    }).done(function(response){
	    	$('.loader').css('opacity', 0);
	        console.log(response);
	        if(response[0]['success']=true) {
	        	
	        	// if error messages exist	        	
	        	if (typeof response[0]['errors'] != "undefined") {
				   if(response[0]['errors']['email'] == "Emails_do_not_match") {
		        		$('.form__email').append('<div class="error_message">Emails do not match</div>');
		        		$('.form__email').addClass('has-error');
		        	}
		        	// If no first name
		        	if (typeof response[0]['errors']['firstName'] != "undefined") {
		        		$('.form__first-name').append('<div class="error_message">'+response[0]['errors']['firstName']+'</div>');
		        		$('.form__first-name').addClass('has-error');
		        	}
		        	// If no last name
		        	if (typeof response[0]['errors']['lastName'] != "undefined") {
		        		$('.form__last-name').append('<div class="error_message">'+response[0]['errors']['lastName']+'</div>');
		        		$('.form__last-name').addClass('has-error');
		        	}
		        	// If no email 
		        	if (typeof response[0]['errors']['email'] != "undefined") {
		        		$('.form__email').append('<div class="error_message">'+response[0]['errors']['email']+'</div>');
		        		$('.form__email').addClass('has-error');
		        	}
		        	// If no form__confirm-email 
		        	if (typeof response[0]['errors']['confirmEmail'] != "undefined") {
		        		$('.form__confirm-email').append('<div class="error_message">'+response[0]['errors']['confirmEmail']+'</div>');
		        		$('.form__confirm-email').addClass('has-error');
		        	}
		        	// If no firstCode 
		        	if (typeof response[0]['errors']['firstCode'] != "undefined") {
		        		$('.form__first-code').append('<div class="error_message">'+response[0]['errors']['firstCode']+'</div>');
		        		$('.form__first-code').addClass('has-error');
		        	}
		        	// If no second code
		        	if (typeof response[0]['errors']['secondCode'] != "undefined") {
		        		$('.form__second-code').append('<div class="error_message">'+response[0]['errors']['secondCode']+'</div>');
		        		$('.form__second-code').addClass('has-error');
		        	}
		        	// If no third code
		        	if (typeof response[0]['errors']['thirdCode'] != "undefined") {
		        		$('.form__third-code').append('<div class="error_message">'+response[0]['errors']['thirdCode']+'</div>');
		        		$('.form__third-code').addClass('has-error');
		        	}
		        	// If no age confirmation
		        	if (typeof response[0]['errors']['ageCheck'] != "undefined") {
		        		$('.form__age-check').append('<div class="error_message">'+response[0]['errors']['ageCheck']+'</div>');
		        		$('.form__age-check').addClass('has-error');
		        	}
		        	// If no sweepstakes acknowledgment
		        	if (typeof response[0]['errors']['sweepOptIn'] != "undefined") {
		        		$('.form__sweep-opt-in').append('<div class="error_message">'+response[0]['errors']['sweepOptIn']+'</div>');
		        		$('.form__sweep-opt-in').addClass('has-error');
		        	}
		        	// If captcha was not ckecked
		        	if (typeof response[0]['errors']['recaptcha'] != "undefined") {
		        		$('.g-recaptcha > div').append('<div class="error_message">'+response[0]['errors']['recaptcha']+'</div>');
		        		$('.form__captcha').addClass('has-error');
		        	}
				}
				else {
					if(response[0]['message'] == "duplicate_codes_submitted") {
		        		$('.form__codes-container').append('<div style="overflow:hidden;display:block;" class="error_message">Duplicate codes submittedd</div>');
		        		$('.form__codes-container').addClass('has-error');
		        	}
		        	if(response[0]['message'] == "already_used") {
		        		$('.form__codes-container').append('<div style="overflow:hidden;display:block;" class="error_message">One or more codes have been already used</div>');
		        		$('.form__codes-container').addClass('has-error');
		        	}
		        	if(response[0]['message'] == "codes_not_found") {
		        		$('.form__codes-container').append('<div style="overflow:hidden;display:block;" class="error_message">One or more codes are invalid</div>');
		        		$('.form__codes-container').addClass('has-error');
		        	}
		        	if(response[0]['message'] == "all_codes_found_entry_made") {
		        		window.location.href = "?page=thank-you";
		        	}
		        	if(response[0]['message'] == "played_4_times_this_month") {
		        		$('.form__codes-container').append('<div style="overflow:hidden;display:block;" class="error_message">You already entered 4 times this month.</div>');
		        		$('.form__codes-container').addClass('has-error');
		        	}
		        	// If recpatcha expired
		        	if(response[0]['message'] == "robot_verification_failed") {
		        		$('.g-recaptcha > div').append('<div class="error_message">reCaptcha verification failed.</div>');
		        		$('.form__captcha').addClass('has-error');
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
