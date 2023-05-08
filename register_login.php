<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register System</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
    <?php include("header.php");?>
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/login_style.css"/>
</head>
<body class="form-v2 page-content">
		<div class="form-v2-content">
            <div class="form-detail " >

              <div class="alert " id="error" role="alert" style="display:none;">
                <div>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
               </div>
                      <div class="error_show" id="error_show1"></div>
              </div>

                <form id="register_form" name="form1" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Ім’я" name="name" >
                    </div>
                    <div class="form-group">
                        <input type="username" class="form-control" id="username" placeholder="Прізвище" name="username" >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email@email.com" name="email" required>
                    </div>

                    
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <div class="form-group ">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id='check'  style="width: 3%; -webkit-appearance: checkbox;">
                        <label class="form-check-label" for="gridCheck">
                            Show Password
                        </label>
                        </div>
                    </div> 
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" name="confirm_password">
                    
                    <div class="mb-3"></div>
                    <input type="button" name="save" class="btn btn-primary" value="Register" id="butsave">
                </form>


             <div id="index"  style="display:none;">
                <div class=" display-1 text-center"  style="font-family: 'Sigmar One', cursive;">Hello, Sir</div>
                <div class=" display-4 text-center"  style="font-family: 'Sigmar One', cursive;">How are you</div>
                <div class="btn btn-primary btn-outline-primary rounded-pill btn-lg font-weight-bolder">
                    <a href="logout.php"  class="text-white text-center"  >
                    <p>LOGOUT</p>
                    </a>

                </div>
             </div>
           </div>
	</div>

</body>
</html>
<script src="js/fetch.js"></script>