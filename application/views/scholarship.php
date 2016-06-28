<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8"> 
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
	<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<!-- Optional: Include the jQuery library -->
	<script src="<?php echo base_url("assets/js/jquery-1.12.3.min.js"); ?>"></script>
	
<script type="text/javascript">

	$(document).ready(function(){
		$("#like").click(function(){
	  		$.post(
	  			"<?php echo site_url('scholarship/likes'); ?>",
	  			{
	  				scholarship_id:"<?php echo $res['scholarship']['id'];?>"//,
	  				//users_id:"<?php echo $res['loggingUser']['id'];?>"
	  			},
	  			function(data,status){
	  				//alert(data);
	  				var arr = JSON.parse(data);
	    			var like_status = arr['like_status'];
	    			if (like_status == 2) 
	    			{
	    				alert("you are already report this scholarship");
	    			}
	    			else
						{

							$("#interact-like").fadeOut(200, function(){
	    						var _text = arr['like_count']+" إعجاب";
	                            $("#interact-like").html(_text).fadeIn().delay(500);
                        	});

							var _text;
							if (like_status == 1) {

								_text = 'إلغاء الإعجاب <span class="glyphicon glyphicon-plus"></span>';
								//$('#report-text').html(_text);//.fadeOut.delay(500);
							}
							if (like_status == 0) {
								_text = 'إعجاب <span class="glyphicon glyphicon-plus"></span>';
								//$('#report-text').html(_text);//.fadeOut.delay(500);
							}

							//var _text = arr['like_status']+'<span class="glyphicon glyphicon-plus"></span>';
							$('#like-text').html(_text);//.fadeOut.delay(500);	
						}
					
	  			});
		});
	});

$(document).ready(function(){
	$("#save").click(function(){
		$.post(
			"<?php echo site_url('scholarship/saves'); ?>",
			{
	  			scholarship_id:"<?php echo $res['scholarship']['id'];?>",
	  			users_id:"<?php echo $res['loggingUser']['id'];?>"
	  		},
	  		function(data,status){
	  			//alert(data);
	  			var _text;
	  			if (data != 2) {
	  				if (data == 1) {
	  				_text = 'إلغاء الحفظ <span class="glyphicon glyphicon-save"></span>'
		  			}
		  			if (data == 0) {
		  				_text = 'حفظ <span class="glyphicon glyphicon-save"></span>'
		  			}
		  			$('#save-text').html(_text);
	  			}
	  			
	  		}
	  	);
	});
});


$(document).ready(function(){
		$("#report").click(function(){
	  		$.post(
	  			"<?php echo site_url('scholarship/reports'); ?>",
	  			{
	  				scholarship_id:"<?php echo $res['scholarship']['id'];?>",
	  				users_id:"<?php echo $res['loggingUser']['id'];?>"
	  			},
	  			function(data,status){
	  				var arr = JSON.parse(data);

						var report_status = arr['report_status'];
						if (report_status == 2) {
							alert("you are already like this scholarship");
							//return 0;
						}
						else
						{
							$("#interact-report").fadeOut(200, function(){
	    						var _text = arr['report_count']+" إبلاغ";
	                            $("#interact-report").html(_text).fadeIn().delay(500);
                        	});

							var _text;
							if (report_status == 1) {
								_text = 'إلغاء الإبلاغ <span class="glyphicon glyphicon-minus"></span>';
								//$('#report-text').html(_text);//.fadeOut.delay(500);
							}
							if (report_status == 0) {
								_text = 'إبلاغ <span class="glyphicon glyphicon-minus"></span>';
								//$('#report-text').html(_text);//.fadeOut.delay(500);
							}

							//var _text = arr['like_status']+'<span class="glyphicon glyphicon-plus"></span>';
							$('#report-text').html(_text);//.fadeOut.delay(500);	
						}
						
					//});
					
	  			});
		});
	});



</script>


	<style>


		html {
  			width: 100%;
  			height: 100%;
		}


		@font-face {
			font-family: JF Flat Regular;
			font-style: normal;
  			font-weight: normal;
			src: url(<?php echo base_url("assets/fonts/JF-Flat-regular.ttf"); ?>);
		}
	

		

		

		body {
			font-family: "JF Flat Regular","Open Sans",serif;
			background-color: #e0e0e0;
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

		#interact
		{
			background-color: #fff;
			border: 1px solid #e0e0e0;
			padding: 20px 20px 0 20px;
		}

		#interact ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#group {
    		padding: 20px;
    		color: black;
    		font-weight: bold;
    		background-color: #fff;
    		border: 1px solid #e0e0e0;
    	}


    	.heading::before {
    		content: '';
		    position: absolute;
		    left: 0px;
		    bottom: -9px;
		    width: 100%;
		    height: 4px;
		    border-bottom: 4px solid;
			border-color: #D84833 !important;
    	}


    	.heading {
    		position: relative;
    		font-size: 22px;
    		text-align: right;
    		margin: 0;
    		width: auto;
    		font-weight: normal;
    		display: inline-block;
		}

		#user {
			padding: 10px 15px;
			font-weight: normal;
			background-color: #fff;
		}

		#like-report
		{
			margin: 0;
			padding: 10px 15px;
			background-color: #fff;
		}

		#like-report-save
		{
			margin: 0;
			padding: 10px 15px;
			background-color: #fff;
		}

		#country, #url, #degree, #deadline{
			padding-right: 15px;
			padding-left: 0;
			font-weight: bold;
		}

		 #description{
		 	padding: 20px 15px 20px 0;
			font-weight: bold;
			line-height: 1.5;
		 }

		 #description p{
		 	padding: 0;
		 }

		#country a, #url a, #degree a{
			font-weight: normal;
		}


		#info {
    		margin-top: 20px;
    		margin-bottom: 20px;
    		border-right: 1px solid #000;
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
/*
		.btn {
			color: white;
			font-weight: 500;
			background-color: #481B2A;
			border-radius: 0;
			transition: all .1s linear;
		}
		*/
/*
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
*/
		

		p#degree{
			display: inline-block;
		}

		#degree a{
			background-color: #000;
			color: #fff;
		}

		#degree a:hover{
			background-color: #fff;
			color: #000;
			text-decoration: none;
		}

		p#save-text, p#report-text {
			padding: 0 10px 0 10px;
			display: inline-block;
			
		}

		p#like-text{
			padding: 0 0 0 10px;
			display: inline-block;
			
		}

		p#interact-report {
			padding: 0 15px;

			display:inline-block;
		}
		p#interact-like, p#interact-report {
			padding: 0 0 0 15px;

			display:inline-block;
		}

        a#share:hover, a#save:hover, a#like:hover, a#report:hover{
        	background-color: #99CCFF ;
        	text-decoration: none;
        	cursor: pointer;
        }

		p {
			padding-top: 20px;
			padding-bottom: 20px;
			margin: 0;
			border: 0;
		}

		p a {
  			font-style: italic;
		}

		hr {
			height: 0.5px;
			background-color: rgb(209,209,209);
		}

		#see-more, #see-more-content {
			padding: 20px;
			background-color: #fff;
			border: 1px solid #e0e0e0;
		}

		#see-more-header {
			margin: 0;
			text-align: center;
		}

		#see-more-content-header
		{
			margin: 0;
		}
				
		#degree-tag, #country-tag{
			line-height: 1.5;
			padding: 0;
		}


		#degree-tag a{
			background-color: #000;
			color: #fff;
			padding: 0 3px;
			margin: 1px;
			display: inline-block;
		}

		#degree-tag a:hover{
			background-color: #fff;
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		#country-tag a{
			background-color: #337ab7;
			color: #fff;
			padding: 0 3px;
			margin: 1px;
			display: inline-block;
		}

		#country-tag a:hover{
			background-color: #fff;
			color: #337ab7;
			text-decoration: none;
			cursor: pointer;
		}


.img-header {
    background-color: #1199ff; /* Green */
    color: #ffffff;
}


.container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
}

.img-circle {
	background-color: #fff;
}

#title-header {
	padding: 0 0 5px 0;
	border-bottom: 2px solid #c2c2c2;
	margin-bottom: 20px;
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
    	<div class="container">

    	

    		<div class="row">
    			
    		</div>
    		<div class="row">
    			<div class="col-xs-8" style="float: right;" >
    				
    				<div id="interact">
    					<ul>
    						<li id="title-header">
    							<h1 class="heading"><?php echo $res['scholarship']['name']; ?></h1>
    						</li>
    						<li style="margin-bottom: 5px;">
    							<img src="<?php echo base_url('assets/img/country').'/'.$res['country']['id'].'.gif'; ?>" class="img-rounded" style="width: 50%;">
    						</li>
    						<li>
    							<p id="user">تم النشر بواسطة: <a href=""><?php echo $res['user']['username'];?></a></p>
    						</li>
    						<li id="like-report">
    							<p id="interact-like"><?php  echo $res['scholarship']["likes"].' إعجاب';?></p>|
    							<p id="interact-report"><?php echo $res['scholarship']["reports"].' إبلاغ';?></p>
    						</li>
    						<?php
							if (isset($res['loggingUser']) && $type == 0) {
								// like status
								echo "<li id='like-report-save'>";
								echo "<a id='like'>
										<p id='like-text'>".
    			        					($res['loggingUser']['like']?'إلغاء الإعجاب ':'إعجاب ')
    			       						."<span class='glyphicon glyphicon-plus'></span>
    			       					</p>
    			        			  </a>";
    			        		// report status
    			        		echo "<a id='report'>
    									<p id='report-text'>".
    										($res['loggingUser']['report']?'إلغاء الإبلاغ ':'إبلاغ ')
    						 				."<span class='glyphicon glyphicon-minus'></span>
    						 			</p> 
    								  </a>";		  
    							// save status
    							echo "<a id='save'>
    									<p id='save-text'>".
    										($res['loggingUser']['saved']?'إلغاء الحفظ ':'حفظ ') 
    										."<span class='glyphicon glyphicon-save'></span>
    									</p> 
    								  </a>";
    							echo "</li>";
							}
						?>
    					</ul>
    					<!-- USER who Post this scholarship -->
    					
<!-- Interaction of logging user -->

    				</div>

    				<div id="group">

    					<div id="info">
    						<!-- COUNTRY of scholarship -->
    						<p id="country" style="color: #D84833; ">البلد: <a href=""><?php echo $res['country']['country'];?></a></p>

    						<!-- DESCRIPTION -->
    						<div id="description">
    							<p style="color: #D84833; display: inline-block;">الوصف: </p>
	    						<p style="display: inline; font-weight: normal;">
	    							<?php echo $res['scholarship']['description'];?>
	    						</p>	
    						</div>
    						
    						<!-- Deadline -->
    						<div>
	    						<p id="deadline" style="color: #D84833; display: inline-block;">تاريخ انتهاء التقدم للمنحة: 

	    						</p>
	    						<p style="display: inline-block; font-weight: normal;"><?php echo $res['scholarship']['deadline'];?></p>
    						</div>
    						<!-- URL -->
    						<p id="url" style="color: #D84833;">رابط المنحة من <a href="<?php echo $res['scholarship']['url'];?>">هنا</a></p>
    						<!-- DEGREES -->
    						<p id="degree" style="color: #D84833;">الدرجة العلمية: 
    						<?php foreach($res['degrees'] as $row): ?>
    						<?php echo  '<a href="">'; ?>
    						<?php echo $row["degree"].'</a>';?>
    						<?php endforeach;?>
    						</p>
    					
    					</div>
    					

    					<?php //var_dump($res['scholarship']); ?>
      					<?php //var_dump($res['user']); ?>
      					<?php //var_dump($res['loggingUser']); ?>
      					<?php //var_dump($res['country']); ?>			
      					<?php //var_dump($res['degrees']); ?>	
      					<?php //var_dump($res); ?>
    				</div>
    				
    			</div>

    			<div class="col-xs-4">
    				<div id="see-more" >
    					<h3 id="see-more-header" >شاهد أيضاً</h3>
    				</div>
    				<div id="see-more-content">
    					<h4 id="see-more-header-content">منحة رقم1	</h4>
    					<p id="degree-tag"> 
    						<a>درجة علمية</a>
    						<a>درجة علمية</a>
    					</p>
    					<p id="country-tag">
    						<a>بلد المنحة</a>
    					</p>
    				</div>
    				<div id="see-more-content">
    					<h4 id="see-more-header-content">منحة رقم2</h4>
    					<p id="degree-tag"> 
    						<a>تفاصيل المنح</a>
    						<a>تفاصيل المنح</a>
    					</p>
    					<p id="country-tag">
    						<a>بلد المنحة</a>
    					</p>
    				</div>
    				
    			</div>
    			
    		</div>

    		
    	</div>

      		
    	</div>
    </div>


  </body>
</html>