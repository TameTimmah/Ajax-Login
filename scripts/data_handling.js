


function check_login(){
   	$.ajax({
        type: 'POST',
        url: 'data/login_form.php',
        data: "username=" + $('#username').val() + "&password=" + $('#password').val(),
        success: function(response){
            if(response === 'Correct'){
               window.location = "home.php"
            }
            else if(response === 'napproved'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('Your account has not yet been validated.')
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else if(response === 'Incorrect'){
           		    $('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('The login information you have entered is incorrect.')
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
	           	 		           	 	         
	        }
	        else if(response === 'nusername'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('Please enter a username.')
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else if(response === 'npassword'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('Please enter a password')
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	      	        $('.messageText').append('There was an unknown error.  Please try again later.')
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)            
           }
       }  
    });
 

};

function registerUser(){
   

    $.ajax({
        type: 'POST',
        url: 'data/register_form.php',
        data: "username=" + $('#registerUsername').val() + "&password=" + $('#registerPassword').val() + "&email=" + $('#registerEmail').val() + "&task=register",
        success: function(response){
            if(response === 'Correct'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('Please check your email for a validation link.');
	           	 	$(".messageImage").append('<img src="images/success.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
	           	 	$('#registerUsername').empty()
	           	 	$('#registerPassword').empty()
	           	 	$('#registerEmail').empty()
            }
            else if(response === 'utaken'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('That username is already taken.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else if(response === 'eused'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('That email address is already registered.');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else if(response === 'nusername'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('Please enter a username.');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else if(response === 'npassword'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('Please enter a password.');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else if(response === 'nemail'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('Please enter an email address.');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('There was an unknown error.  Please try again later.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)	            
            }            
       }
    });
};

function forgot(){
   	$.ajax({
        type: 'POST',
        url: 'data/forgot_form.php',
        data: "email=" + $('#forgotEmail').val(),
        success: function(response){
            if(response === 'Correct'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('Please check your email for a reset link.');
	           	 	$(".messageImage").append('<img src="images/success.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
	           	 	$('#forgotEmail').empty()
            }
            else if(response === 'nemail'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('Please enter an email address.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else if(response === 'enot'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('That email address is not registered.');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	      	        $('.messageText').append('There was an unknown error.  Please try again later.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)	            
           }
       }
    });
 };

function reset_password(){
   	$.ajax({
        type: 'POST',
        url: 'data/reset_form.php',
        data: "ticket=" + $('#ticket').val() + "&newPassword=" + $('#newPassword').val() + "&email=" + $('#email').val(),
        success: function(response){
            if(response === 'reset'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('Your new password is <i style="color:#00bfff;">"' + $('#newPassword').val() + '"</i>');
	           	 	$(".messageImage").append('<img src="images/success.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
	           	 	$('#newPassword').empty()
            }
            if(response === 'npassword'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('Please enter a new password.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
	           	 	$('#newPassword').empty()
            }
            else if(response === 'brequest'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('Bad reset request.  Please apply for new reset link.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	      	        $('.messageText').append('There was an unknown error.  Please try again later.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)	            
           }
       }
    });
 };

function change_password(){
   	$.ajax({
        type: 'POST',
        url: 'data/change_form.php',
        data: "ticket=" + $('#ticket').val() + "&newPassword=" + $('#newPassword').val() + "&username=" + $('#username').val(),
        success: function(response){
            if(response === 'reset'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('Your new password is <i style="color:#00bfff;">"' + $('#newPassword').val() + '"</i>');
	           	 	$(".messageImage").append('<img src="images/success.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
	           	 	$('#newPassword').empty()
            }
            if(response === 'npassword'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('Please enter a new password.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)
	           	 	$('#newPassword').empty()
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	      	        $('.messageText').append('There was an unknown error.  Please try again later.');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(10000).fadeOut(400)	            
           }
       }
    });
 };
