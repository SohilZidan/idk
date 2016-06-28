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
	
	<style>


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
			padding-right: 0;
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
			padding: 0 20px;
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



    	#heading {
    		font-size: 30px;
    		text-align: right;
    		margin: 20px;
    		font-weight: bold;
    		//border-bottom: 1px solid #e0e0e0;
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

		#description, #url, #degree, #deadline{
			padding-right: 15px;
			padding-left: 15px;
			font-weight: normal;
		}

		#address-description {
			padding: 0 20px;
			font-weight: normal;
			line-height: 1.5;
		}

		#phone {
			display: block;
			padding: 0 20px;
			line-height: 1.5;
			font-weight: bold;
			text-decoration: underline;
		}

		#degree-tag, #country-tag, #city-tag, #location-tag{
			line-height: 1.5;
			padding: 0;
			display: inline-block;
		}

		#country, #city, #location {
			line-height: 1.5;
			padding: 0;
			display: inline-block;
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

		#city-tag a{
			background-color: #009900;
			color: #fff;
			padding: 0 3px;
			margin: 1px;
			display: inline-block;
		}

		#city-tag a:hover{
			background-color: #fff;
			color: #009900;
			text-decoration: none;
			cursor: pointer;
		}

		#location-tag a{
			background-color: #9933cc;
			color: #fff;
			padding: 0 3px;
			margin: 1px;
			display: inline-block;
		}

		#location-tag a:hover{
			background-color: #fff;
			color: #9933cc;
			text-decoration: none;
			cursor: pointer;
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

		#see-more{
			padding: 20px;
			background-color: #fff;
			border: 1px solid #e0e0e0;
		}

		#see-more-content {
			padding: 0;
			background-color: #fff;
			border: 1px solid #e0e0e0;
		}

		#see-more-content div {
			padding: 5px 20px 10px 20px;
		}

		#see-more-header-content {
			margin: 0;
			padding: 0;
		}

		#course-link {
			padding: 10px 20px;
			display: block;
			color: inherit;

		}

		#course-link:hover {
			background-color: #d88432;
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		#address-content {

			
			padding: 10px 20px;
			background-color: #fff;
			/*border-right: 3px solid #e0e0e0;
			border-left: 3px solid #e0e0e0;
			/*border-bottom: 3px solid #e0e0e0;*/
			font-weight: normal;
		}

		#see-more-header {
			margin: 0;
			text-align: center;
		}

		#see-more-content-header
		{
			margin: 0;
		}

		#content-header {
			font-weight: 600;
			padding: 20px 10px 10px 10px;
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

#back-img {
	background-image: url("<?php echo base_url('assets/img/country/4.gif'); ?>");
	background-size: 50% 100%;
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
    			<h1 id="heading"><?php echo $organization['organization_name']; ?></h1>
    		</div>
    		<div class="row">
    			<div class="col-xs-8" style="float: right;" >
    				
    				<div id="group">
    					<img src="<?php echo base_url('assets/img/country').'/'.$organization['organization_country_id'].'.gif'; ?>" class="img-rounded" style="width: 50%;">
    					<div id="info">
    						<!-- DESCRIPTION -->
    						<p id="description">الوصف: <?php echo $organization['organization_description'];?></p>
    						
    						<!-- ADDRESS -->
    						
    							<?php
				    				
				    					echo '
				    						<div id="address-content">
												
												<p id="country-tag">البلد: 
													<a href="'.
													site_url("organization/show_organization").'/'.$organization['organization_country_id']
													.'">'.
													$organization['organization_country_name']
													.'</a>
												</p>	
											';
    							?>
    					
    					</div>
    				</div>
    				</div>
    			</div>

    			<div class="col-xs-4">
    				<div id="see-more" >
    					<h3 id="see-more-header" >منحها</h3>
    				</div>
    				<?php
    					if ($scholarship == 0) {
    						echo "
    							<div id='see-more-content'>
	    							<h4 id='see-more-header-content'>
	    								لا يوجد منح حاليا
	    							</h4>
    							</div>
    						";
    					}
    					else
    					{
    						echo '
    							<div id="see-more-content">
			    					<h4 id="see-more-header-content">
			    						<a id="course-link" href="'.
			    							site_url('scholarship/show_scholarship').'/'.$scholarship['scholarship_id']
			    						.'">'.
			    						$scholarship['scholarship_name']
			    						.'</a>
			    					</h4>
			    					<div id="course-details">';
			    			foreach ($scholarship['degree'] as $degree) {
			    				echo '
			    					<p id="degree-tag"> 
			    						<a>'.$degree['degree_name'].'</a>
				    				</p>
			    				';
			    			}
			    			echo "</div>
			    				</div>";	
			    					
    						
    					}
    				?>
    				
    				
    			</div>
    			
    		</div>

    		
    	</div>

      		
    	</div>
    </div>


  </body>
</html>