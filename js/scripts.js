jQuery(document).ready(function($){


	// process the form
    $('form').submit(function(event) {


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
	        		alert('Duplicate codes submitted');
	        	}
	        	if(response[0]['message'] == "already_used") {
	        		alert('One or more codes have been already used');
	        	}
	        	if(response[0]['message'] == "codes_not_found") {
	        		alert('One or more codes are invalid');
	        	}
	        	if(response[0]['message'] == "all_codes_found_entry_made") {
	        		window.location.href = "?page=thank-you";
	        	}

	        }

	        
	    }).fail(function(error){
	        console.log(error.statusText);
	    });
	    event.preventDefault();

    });


    $('#phoneNumber').mask('(000) 000-0000');
    $('#firstCode').mask('AAAAAAAAA');
    $('#secondCode').mask('AAAAAAAAA');
    $('#thirdCode').mask('AAAAAAAAA');

});
