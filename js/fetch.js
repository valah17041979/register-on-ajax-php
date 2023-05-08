
$(document).ready(function() {
   
    $('#check').click(function() {
        if ($('#password').attr('type') == 'text') {
        $('#password').attr('type', 'password');
        } else {
        $('#password').attr('type', 'text');
        }
    });
   
// register
	$('#butsave').on('click', function() {
        var v = document.getElementById("error");
        emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var name = $('#name').val();
        var email = $('#email').val();
       
		var username = $('#username').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();

        //setTimeout(function() { $("#error").fadeOut(0); }, 5000);

        if(name=="" && email=="" && password=="" ){
            $("#error").show();
            $('#error_show1').html('Please fill all the field!');
            v.className += " alert-danger";
        } 
        else if(! emailReg.test( email ) ){
            $("#error").show();
            $('#error_show1').html('Email is not valid!');
            v.className += " alert-danger";
        } 
        else if( password != confirm_password ){
            $("#error").show();
            $('#error_show1').html('Password is not same!');
            v.className += " alert-danger";
        }
        else if( !password.match(/([a-zA-Z])/) && password.match(/([0-9])/)){
            $("#error").show();
            $('#error_show1').html('Please use Both uppercase and lowercase in password!');
             v.className += " alert-danger";
        }
       else if( !password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
            $("#error").show();
            $('#error_show1').html('Please use special character!');
             v.className += " alert-danger";
        }
        else if( !password.length > 7){
            $("#error").show();
            $('#error_show1').html('Please use more than 8 Character!');
             v.className += " alert-danger";
        }
      
		else{
            
			$.ajax({
				url: "login_reg_insert.php",
				type: "POST",
				data: {
					name: name,
                    email: email,
                    username: username,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#error").show();
                        $('#error_show1').html('Registration successfull Go to Login !'); 	
                         v.className += " alert-success";

                         if(dataResult.statusCode==200){
						//location.href = "index.php";
                        $("#index").show();
                        $("#register_form").hide();
					}

					}
					else if(dataResult.statusCode==201){
						$("#error").show();
                        $('#error_show1').html('Email ID already exists !');
                         v.className += " alert-danger";
                        
                    }
                    else if(dataResult.statusCode==202){
						$("#error").show();
                        $('#error_show1').html('Username already exists !');
                         v.className += " alert-danger";
                    }
                    else if(dataResult.statusCode==203){
						$("#error").show();
                        $('#error_show1').html('Not Inserted !');
                         v.className += " alert-danger";
                        
                    }
                    else if(dataResult.statusCode==204){
						$("#error").show();
                        $('#error_show1').html('Please fill all the field!');
                         v.className += " alert-danger";
                        
					}
                    else if(dataResult.statusCode==205){
                        $("#error").show();
                        $('#error_show1').html('Your Email is not valid !!!');
                         v.className += " alert-danger";

                    }
					
				}
			});
		}
		
    });
});
