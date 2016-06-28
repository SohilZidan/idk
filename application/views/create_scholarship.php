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
	
	<!-- Date Picker CSS -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/jquery-ui.css"); ?>">
	<script src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/jquery-ui.js"); ?>"></script>
	
	<script type="text/javascript">
		$(function(){
			//$("#deadline").datepicker({ dateFormat: 'dd-mm-yy' }).val();
			//var dateTypeVar = $('#deadline').datepicker('getDate');
			//$.datepicker.formatDate('dd-mm-yy', dateTypeVar);
			
			$('#deadline').datepicker({
        dateFormat: 'dd-mm-yy'
    });

			//$("#deadline").datepicker();

			//$.datepicker.formatDate( "yy-mm-dd", new Date( 2007, 1 - 1, 26 ) );
		});
	</script>

	<!-- Jquery Validation -->
	<script src="<?php echo base_url("assets/js/jquery-validate/additional-methods.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/jquery-validate/jquery.validate.min.js"); ?>"></script>
	<script type="text/javascript">
	$(function(){
		$.validator.addMethod(
			"dateValidate",
		    function(value, element) {
		        // put your own logic here, this is just a (crappy) example
		        return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
		    },
		    "التاريخ بالصيغة dd-mm-yyyy."
			);

		$("#form").validate({
			rules: {
				name: "required",
				country: "required",
				degree: "required",
				deadline: 
				{
					required: true,
					dateValidate: true
				},
				url: 
				{
					required: true,
					url: true
				}
			},
			messages: {
				name: "مطلوب",
				country: "مطلوب",
				degree: "مطلوب",
				deadline: {
					required: "مطلوب"
				},
				url: 
				{
					required: "مطلوب",
					url: "الرابط غير صحيح"
				}
			},
        
        submitHandler: function(form) {
            form.submit();
        }
		});
	});
		

	</script>

	  <!--link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css"-->

	<style>

		#name-error, #country-error, #degree-error, #deadline-error, #url-error{
			color: #CC2B2B;
			padding-top: 15px;
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

		

		#group {
    		margin: 40px 0 30px;
    		color: black;
    		font-weight: bold;
    	}

    	#heading {
    		font-size: 30px;
    		text-align: right;
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

		#form input ,select, textarea{
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

		.btn{
			color: white;
			font-weight: 500;
			background-color: #481B2A;
			border-radius: 0;
			transition: all .1s linear;
		}

		#scholarship{
			float: right;
		}

		#form input.btn {

  			width: auto;
		}

		input:focus ,select:focus, textarea:focus{
  			outline: 2px solid #481B2A;
		}

		#form input.btn:hover{
			color: #481B2A;
			background-color: #fff;
			border-color: #481B2A;
		}

		p {
			margin: 0;
			padding: 0;
			border: 0;
		}

		textarea {
			resize: none;
			width: 100%;
		}

		p a {
  			font-style: italic;
		}

		hr {
			height: 0.5px;
			background-color: rgb(209,209,209);
		}

		#login {
  			width: 530px;
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
          <ul class="nav navbar-nav">
        	<li><a href="#">الصفحة الرئيسية</a></li>
        	<li><a href="<?php echo site_url('institute/show_all_institute');?>">المعاهد</a></li>
        	<li><a href="<?php echo site_url('organization/show_all_organization');?>">المنظمات</a></li>
        	<li><a href="<?php echo site_url('scholarship/show_all_scholarship');?>">المنح</a></li>
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
              <h1 id="heading">إنشاء صفحة منحة</h1>
              <div id="infoMessage">
              	<p class="bg-primary"></p>
              </div>
              <form  id="form" role="form" action='<?php echo site_url("scholarship/insert_scholarship/1"); ?>' method="post" accept-charset="utf-8">

              	<label class="label">اسم المنحة *</label>
                <input id="name" name="name" type="text">
                <label class="label">الوصف</label>
                <textarea id="description" rows="8" name="description"></textarea>
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

                <label class="label">تاريخ انتهاء التقدم *</label>
                <input id="deadline" name="deadline" type="text">
                <label class="label">رابط المنحة *</label>
                <input id="url" name="url" placeholder="">
                <br>
                <!--input name="remember" value="1" id="remember" checked="" type="checkbox"-->
              <br><br>
                <input class="btn" value="تسجيل" name="submit" type="submit">
              </form>
            </div>
            <div id="rgstrhere">
              <p>لديك حساب؟ <a href="signup">قم بتسجيل الدخول</a></p>
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