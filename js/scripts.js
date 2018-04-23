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
	    }).fail(function(error){
	        console.log(error.statusText);
	    });
	    event.preventDefault();

    });




});