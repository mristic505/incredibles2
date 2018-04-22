jQuery(document).ready(function($){


	// process the form
    $('form').submit(function(event) {


        $.ajax({
	        type: 'GET',
	        url: 'http://juicyjuicegame.com/incredibles2/process.php',
	        data: {
	            firstName : $('#firstName').val(),
	            lastName : $('#lastName').val()
	        },
	        dataType: 'jsonp',
	        crossDomain: true,
	    }).done(function(response){
	        console.log(response[0]['message']);
	    }).fail(function(error){
	        console.log(error.statusText);
	    });
	    event.preventDefault();

    });




});