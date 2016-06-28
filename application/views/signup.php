<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8"> 
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<!-- Optional: Include the jQuery library -->
	<script src="<?php echo base_url("assets/js/jquery-1.12.3.min.js"); ?>"></script>
	<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
	<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<!-- Date Picker CSS >
	<link rel="stylesheet" href="<?php echo base_url("assets/css/jquery-ui.css"); ?>">
	<script src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/jquery-ui.js"); ?>"></script-->
	<!-- Jquery Validation -->
	<script src="<?php echo base_url("assets/js/jquery-validate/additional-methods.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/jquery-validate/jquery.validate.min.js"); ?>"></script>

	<!-- AJAX -->
	<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->

	<script type="text/javascript">
/*
	$(document).ready(function(){

		});
		$(document).ready(function(){
			$('#username').change(function(){
				var data =username: $('input[name=username]').val(); 

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("auth/check_username"); ?>',
					data: {username: data},
					datatyp: 'json',
					encode: true,
					success: function(data)
					{
						alert(data);
						var result = JSON.parse(data);
						if (result.length == 1) 
						{
							if (result['available'] == true) 
								$('#usernam-warning').remove();
							else
								$(this).after("<span id='usernam-warning'>Warning here</span>");
						}
					}
				});/*.done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });
			});
		});
*/


$(document).ready(function(){
	$("#username").change(function(){
		$.post(
			"<?php echo site_url('auth/check_username'); ?>",
			{
	  			username: $("input[name=username]").val()
	  		},
	  		function(data,status){
	  			var arr = JSON.parse(data);
	  			// field is empty
	  			if (arr.length===0) 
	  				{
	  					$("#username-warning").remove();	
	  					$("#username").attr("style","border-color: #d9d7d5");
	  				}
	  			else
	  			{
	  				// if username is available
	  				if (arr.available === false) 
	  					{
	  						$("#username-warning").remove();
	  						$("#username").after('<span id="username-warning">غير متاح</span>');	
	  						$("#username").attr("style","border-color: rgb(249, 58, 58)");
	  					}
	  				// un available
	  				else
	  					{
	  						$("#username-warning").remove();
	  						$("#username").attr("style","border-color: rgb(43, 187, 204)");
	  					}
	  				
	  			}
	  		}
	  	);
	});
});

		$(function() {
			$("#form").validate({
				rules:
				{
					email:
					{
						required: true,
						email: true
					},
					firstname:'required',
					lastname:'required',
					username:'required',
					password:
					{
						required: true,
						minlength: 8
					},
					country:'required',
					degree:'required'
				},
				submitHandler:function(form){
					form.submit();
				}
			});
		});

	</script>
	<style>

		#email-error, #pass-error, #fname-error, #lname-error, #country-error, #degree-error, 
		#username-error, #username-warning{
			color: #CC2B2B;
			padding-top: 15px;
			display: inline-block;
		}

		html {
  			width: 100%;
  			height: 100%;
		}


		@font-face {
			font-family: Droid Arabic Kufi;
			font-style: normal;
  			font-weight: normal;
			src: url(<?php echo base_url("assets/fonts/JF-Flat-regular.ttf"); ?>);
		}
	

		

		

		body {
			font-family: "Droid Arabic Kufi","Open Sans",serif;
			background-color: #2d2d2d;
			font-size: 14px;
			font-weight: 500;
			direction: rtl;
		  	width: 100%;
  			height: 100%;
  			line-height: 1;
  			box-sizing: border-box;
  			display: block;
  			color:#00000
		}

		.navbar-default .navbar-nav > li  {
			float: right;
		}

		.navbar-default .navbar-nav > li > a {
    		color: white;
		}

		.navbar-default .navbar-nav > li > a:hover{
			color: #80304a;
			background-color: #fff;
		}

		.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
 		    color: #fff;
 		    /*background-color: #428bca;*/
    		background-color: #80304a;

		}

		.navbar-default .navbar-nav > .active {
			border-width: 5px;
    		border-color: #481B2A;
		}

		#mynav {
			background-color: #481B2A;
			
			margin-bottom: 0px;
		}

		#navbar {
			float: right;
		}

		.navbar-header {
			float: right;
		}

		div {
			vertical-align: baseline;
		}

		#page {
			position: relative;
			display: block;
			max-width: 100%;
  			min-height: 100%;
			background-color: #e0e0e0;
		}

		#wrapper {
  			padding-top: 27px;
		}

		#login {
  			width: 530px;
		}

		#group {
    		margin: 40px 0 30px;
    		color: black;
    		font-weight: bold;
    	}

    	#heading {
    		font-size: 30px;
    		text-align: center;
    		margin-bottom: 25px;
		}

		#infoMessage {
    		text-align: center;
		    font-size: 17px;
    		color: rgb(255, 82, 82);
    		direction: ltr;
		}

		#form {
    		margin: 0 auto;
    		text-align: center;
		}

		.label {
    		display: block;
		    padding-bottom: 10px;
    		padding-top: 20px;
    		text-align: right;
    		font-size: 14px;
    		color: black;
		}

		#form input {
    		width: 100%;
    		border: 2px solid #d9d7d5;
    		direction: ltr;
    		text-align: center;
    		font-size: 15px;
  			padding-top: 7px;
  			padding-bottom: 7px;
		}

		#email ,#pass{
    		background-color: white;
		}

		#rgstrhere {
			text-align: center;
		}

		.btn {
			color: white;
			font-weight: 500;
			background-color: #481B2A;
			border-radius: 0;
			transition: all .1s linear;
		}

		#form input.btn {
  			width: auto;
		}

		input:focus {
  			outline: 2px solid #481B2A;
		}

		#form input.btn:hover {
			color: #481B2A;
			background-color: #fff;
			border-color: #481B2A;
		}

		p {
			margin: 0;
			padding: 0;
			border: 0;
		}

		p a {
  			font-style: italic;
		}

		hr {
			height: 0.5px;
			background-color: rgb(209,209,209);
		}

		
	</style>

  </head>
  <body>
  	<nav class="navbar navbar-default navbar-static-top" id="mynav">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" style="padding-top: 10px;" href=""><img class="img-responsive" style="max-width: 70px;" src="<?php echo base_url('assets/img/logo.png') ?>"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="padding-right: 0;">
            <li><a href="#">الصفحة الرئيسية</a></li>
        	<li><a href="<?php echo site_url('institute/show_all_institute');?>">المعاهد</a></li>
        	<li><a href="<?php echo site_url('organization/show_all_organization');?>">المنظمات</a></li>
        	<li><a href="<?php echo site_url('scholarship/show_all_scholarship');?>">المنح</a></li>
        	
        	<?php
        		
        			echo "<li><a href='".site_url('scholarship/create_scholarship')."'>إنشاء منحة</a></li>";
        		
        	?>
        	<?php
        		if (isset($loggedin)) {
        			echo "<li><a href='".site_url("auth/logout")."'>تسجيل الخروج</a></li>";
        		}
        		else
        		{
        			echo "<li><a href='".site_url("auth/login")."'>تسجيل الدخول</a></li>";	
        		}

        	?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div id="page">  
    <div id="wrapper">
      <div class="container" id="login">
        <div class="row">
          <div class="col-xs-12">
            <div id="group">
              <h1 id="heading">إنشاء حساب</h1>
              <div id="infoMessage"></div>

              <form id="form" role="form" action='<?php echo site_url("auth/user_signup"); ?>' method="post" accept-charset="utf-8">
              	<?php
              		if (isset($message_display)) {
              			echo "<div class='alert alert-danger fade in'>
              					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              					<strong>$message_display</strong>
							  </div>";
              		}
              	?>
              	<label class="label">الاسم الأول *</label>
                <input id="fname" name="firstname" type="text">
                <label class="label">اللقب *</label>
                <input id="lname" name="lastname" type="text">
                <label class="label">اسم المستخدم *</label>
                <input id="username" name="username" type="text">
                <label class="label">بريدك الإلكتروني *</label>
                <input id="email" name="email" type="text">
                <label class="label">كلمة المرور *</label>
                <input id="pass" name="password" placeholder="" type="password">
                <label class="label">البلد *</label>
                	<select class="form-control" id="country" name="country">
                		<?php foreach($country as $row ):?>
                		<?php echo "<option value=$row->id>$row->country</option>"; ?>
                		<?php endforeach; ?>
				  	</select>
                <label class="label">الدرجة العلمية *</label>
                	<select class="form-control" id="degree" name="degree">
                		<?php foreach($degree as $row ):?>
                		<?php echo "<option value=$row->id>$row->degree</option>"; ?>
                		<?php endforeach; ?>
				  	</select>
                <br>
                <!--input name="remember" value="1" id="remember" checked="" type="checkbox"-->
              <br><br>
                <input class="btn" value="تسجيل" name="submit" type="submit">
              </form>

            </div>
            <div id="rgstrhere">
              <p>لديك حساب؟ <a href='<?php echo site_url("auth/user_login"); ?>'>قم بتسجيل الدخول</a></p>
            </div>
            <br>
            <hr id="hr">
          </div>
        </div> 
      </div>
        
      </div>
    </div>


  </body>
</html>