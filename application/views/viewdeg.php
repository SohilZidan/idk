
<!DOCTYPE html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 
    <link rel="stylesheet" href="<?php echo base_url("assets/cass/bootstrap.min.css"); ?>">
 
    <!-- Jquery Validation -->
  

    <link rel="stylesheet" media="screen"  type="text/css" href="<?php echo base_url("assets/cass/isotope.css"); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url("assests/jas/fancybox/jquery.fancybox.css");?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/cass/da-slider.css"); ?>">
    <script src="<?php echo base_url("assets/js/jquery-1.12.3.min.js"); ?>"></script>
    
    <link rel="stylesheet" href="<?php echo base_url ("assets/jas/owl-carousel/owl.carousel.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url ("assets/cass/styles.css"); ?>">
    
    <link rel="stylesheet" href="<?php echo base_url ("assets/font/cass/font-awesome.min.css"); ?>"> 

<script type="text/javascript">
    $(function(){
        $("#form").validate({
            rules:
            {
                email:
                {
                    required: true,
                    email: true
                },
                password: 
                {
                    required: true,
                    minlength: 8
                }
            },
            messages:
            {
                email:
                {
                    required: "مطلوب",
                    email: "يجب إدخال بريد إلكتروني"
                },
                password:
                {
                    required: "مطلوب",
                    minlength: "الرجاء إدخال 8 محارف على الأقل"
                }
            },
        
        submitHandler: function(form) {

            form.submit();
        }
        });
    });

    </script>
 
</head>

<body> 
        
     
               
                        <nav class="navbar navbar-default navbar-static-top" id="mynav" style="background-color: #481b2a; height: 10px;" >
      <div class="container style="background-color: #481b2a"">
        <div class="navbar-header" style="background-color: #481b2a height: 10px;" >
              
        </div>
       
<style> body {
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
        }
            float: right;

        .navbar-header {
            float: right;
        }

        
        
    </style>
        <div id="navbar" class="navbar-collapse collapse" style="background-color: #481b2a height:auto;">
          <ul class="nav navbar-nav style="background-color: #481b2a"">
            <li><a href="#">الصفحة الرئيسية</a></li>
            <li><a href="<?php echo site_url('institute/show_all_institute');?>">المعاهد</a></li>
            <li><a href="#">المنظمات</a></li>
            <li><a href="#">عن الموقع</a></li>      
            <li><?php
                if (isset($loggedin)) {
                    echo "<li><a href='".site_url("auth/logout")."'>Logout</a></li>";
                }
            ?> </li>
          </ul>   <a class="navbar-brand" style="padding-top: 10px; style="background-color: #481b2a"" href=""><img class="img-responsive" style="max-width: 70px;" src="<?php echo base_url('assets/img/logo.png') ?>"></a>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
                </div>
                <!--/.navbar-collapse-->
             
        </div>
        <!--/.container-->
  
    <!--/.header-->
    <div id="#top" style="background-color: #481b2a" ></div>
    <section style="background-color: #481b2a"  id="home">
        <div style="background-color: #481b2a"  class="banner-container">
            <img src="<?php echo base_url("assets/images/banner-bg.jpg");?>">
            <div class="container banner-content">
                <div id="da-slider" class="da-slider">
                    <div class="da-slide">
                        <h2>دليلك</h2>
                        <p> دليلك الشامل للمنح الدراسية</p>
                        <div class="da-img"></div>
                    </div>
                    <div class="da-slide">
                        <h2>الامتحانات</h2>
                        <p>محتار حول الامتحانات اللازمة للمنح؟ هنا تجد الحل!</p>
                        <div class="da-img"></div>
                    </div>
                    <div class="da-slide">
                        <h2>معاهد</h2>
                        <p>دليلك الشامل للمعاهد القريبة منك</p>
                        <div class="da-img"></div>
                    </div>
                    
                <!--  <nav class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </nav> -->
                </div>
            </div>
        </div>
    </section>
     <section id="portfolio" class="page-section section appear clearfix secPad">
        <div class="container">

            <div class="heading text-center">
               
            </div> 

            <div class="row">    <h2>   <?php
                if (isset($loggedin)) {
                    echo "<li><a href='".site_url("auth/logout")."'>تسجيل الخروج</a></li>";
                    echo "<li><a href='".site_url("scholarship/create_scholarship")."'>إضافة منحة</a></li>";
                }
                else
                {
                      echo "<li><a href='".site_url("auth/logout")."'>تسجيل الخروج</a></li>";
                    echo "<li><a href='".site_url("scholarship/create_scholarship")."'>إضافة منحة</a></li>"; 

                }


            ?>
                
          </h2>

                 

                        
                        </div>

                    </div>


                </div>
            </div>

        </div>
    </section>
      <section id="introText">
     <div class="container">

            <div class="heading text-center">
                <!-- Heading -->
                <h2>آخر الأخبار</h2>
          
            </div>

            <div class="row">
                <nav id="filter" class="col-md-12 text-center">
                    <ul>
                        <li><a href="#" class="current btn-theme btn-small" data-filter="*">الكل</a></li>
                        <li><a href="#" class="btn-theme btn-small" data-filter=".webdesign">كورسات</a></li>
                        <li><a href="#" class="btn-theme btn-small" data-filter=".photography">امتحانات</a></li>
                        <li><a href="#" class="btn-theme btn-small" data-filter=".print">منح</a></li>
                    </ul>
                </nav>
                <div class="col-md-12">
                    <div class="row">
                        <div class="portfolio-items isotopeWrapper clearfix" id="3">

                            <article class="col-sm-4 isotopeItem webdesign">
                                <div class="portfolio-item">
                                  
                                            <h5> <?php


$con=mysql_connect("localhost","root","") or
    die("Could not connect: " . mysql_error());
mysql_select_db("mydb");


$query="SELECT course.last_update,institute.institute,language.name FROM course,institute,language WHERE course.institute_id=institute.id AND course.language_id=language.id";


$result=mysql_query($query);
//$result = mysqli_query($con,"SELECT * FROM Persons");


$user=array();
echo "<b> كورسات</b><br>"; while ($row=mysql_fetch_array($result)) {
 
 echo "اللغة:".$row['name']."<br>";
 echo "المعهد:".$row['institute']."<br>";
 echo "تاريخ التسجيل:".$row['last_update']."<br>";
 echo '<center><a href="action.php" class="current btn-theme btn-small" >أقرأ المزيد</a></center>';
 echo '<hr id="hr">';
}
  


mysql_close($con);

?></h5>
                                </div>
                                    
                                
                            </article>

                            <article class="col-sm-4 isotopeItem photography">
                                <div class="portfolio-item">
                                 
                                 
                                      
                                                <h5><?php


$con=mysql_connect("localhost","root","") or
    die("Could not connect: " . mysql_error());
mysql_select_db("mydb");


$query="SELECT exam.date,institute.institute,language.name FROM exam,institute,language WHERE exam.institute_id=institute.id AND exam.language_id=language.id";


$result=mysql_query($query);
//$result = mysqli_query($con,"SELECT * FROM Persons");


$user=array();
echo "<b> امتحانات</b><br>"; while ($row=mysql_fetch_array($result)) {
 
 echo "اللغة:".$row['name']."<br>";
 echo "المعهد:".$row['institute']."<br>";
 echo "تاريخ التسجيل:".$row['date']."<br>";
 echo '<center><a href="action.php" class="current btn-theme btn-small" >أقرأ المزيد</a></center>';
echo '<hr id="hr">';
}
  


mysql_close($con);

?> </h5>
                                                
                                        </div>
                                  
                            </article>


                            <article class="col-sm-4 isotopeItem print">
                                <div class="portfolio-item">
                                 
                                        <div class="folio-info"> 
                                                <h5><?php


$con=mysql_connect("localhost","root","") or
    die("Could not connect: " . mysql_error());
mysql_select_db("mydb");

$query="SELECT scholarship.id,scholarship.name,scholarship_has_degree.scholarship_id,scholarship_has_degree.degree_id,country.country,degree.degree FROM scholarship,scholarship_has_degree,country,degree WHERE scholarship.id=scholarship_has_degree.scholarship_id AND degree.id=scholarship_has_degree.degree_id AND scholarship.fk_country=country.id";
//$query="SELECT scholarship.*,scholarship_has_degree.*,country.*,degree.* FROM scholarship,scholarship_has_degree,country,degree
//WHERE scholarship.id=scholarship_has_degree.scholarship_id AND degree.id=scholarship_has_degree.degree_id AND scholarhip.fk_country=country.id";


$result=mysql_query($query);
//$result = mysqli_query($con,"SELECT * FROM Persons");


$user=array();
echo "<b> منح </b><br>";
 while ($row=mysql_fetch_array($result)) {
 echo $row['id'];
 echo $row['name']."<br>";
 echo $row['country']."<br>";
 echo $row['degree']."<br>";
 
 echo '<hr id="hr">';
}
  


mysql_close($con);

?></h5>
                                               
                                        </div> 
                                    </div>
                                 
                            </article>


                  

                        
                        </div>

                    </div>


                </div>
            </div>

        </div>
            </div>

        </div>
                                               
                                        </div> 
                                    </div>
                                 
                            </article>


                  

                        
                        </div>

                    </div>


                </div>
            </div>

        </div>

    </section>
   
   
     
   
  
  <section id="skills" class="secPad white">
        <div class="container">
        <div class="heading text-center">
                <!-- Heading -->
                <h2>إحصائيات تخص الموقع</h2>
                <p>لأن رأيكم يهمنا</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h2>إحصائيات حول <strong>المنح</strong></h2>
                    <p class="mrgBtm20">
                        عند البدء بإنشاء تطبيق منحة، قمنا بطرح استبيان حول أهمية إنشاء موقع يقدم مثل هذه الخدمات، وكانت النتائج كالتالي
                
                    </p>
                    <div class="row">
                        <div class="col-md-2 skilltitle">هام جداً</div>
                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 skilltitle">هام </div>
                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                    <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 skilltitle">هام بعض الشء </div>
                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 8%;">
                                    <span class="sr-only">8% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 skilltitle">غير مهم </div>
                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 3%;">
                                    <span class="sr-only">3% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
                <div class="col-sm-6">
                    <h2>إحصاءات حول <strong>الامتحانات</strong></h2>
                    <p class="mrgBtm20">
                        قمنا بطرح سؤال وهو هل تجد الأمر صعباً عندما تريد العثور على معهد يقدم لك امتحاناً عليك تقديمه للتسجيل في منحة ما؟
                
                    </p>
                    <div class="row">
                        <div class="col-md-2 skilltitle">لا</div>
                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 skilltitle">بعض الشيء</div>
                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 15%;">
                                    <span class="sr-only">15% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 skilltitle">كلا</div>
                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                    <span class="sr-only">5% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>
    
    <!--Experience-->
   
    <!--Contact -->
    <section id="contactUs" class="page-section secPad">
        <div class="container">

            <div class="row">
                <div class="heading text-center">
                    <!-- Heading -->
                    <h2>اتصل بنا!</h2>
                    <p>يمكنك طرح أي سؤال علينا وسيتم تحويله إلى البريد الاكرتوني الخاص بمديري التطبيق</p>
                </div>
            </div>

            <div class="row mrgn30">

                <form method="post" action="" id="contactfrm" role="form" action="malito:judybarazi@gmail.com">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" title="Please enter your name (at least 2 characters)">
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الالكتروني</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" title="Please enter a valid email address">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="comments">االرسالة</label>
                            <textarea name="comment" class="form-control" id="comments" cols="3" rows="5" placeholder="Enter your message…" title="Please enter your message (at least 10 characters)"></textarea>
                        </div>
                        <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">إرسال</button>
                        <div class="result"></div>
                    </div>
                </form>
                
            </div>
        </div>
        <!--/.container-->
    </section>
    <footer>
        <div class="container">
            <div class="social text-center">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-flickr"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
            </div>

            <div class="clear"></div>
            <!--CLEAR FLOATS-->
        </div>
    </footer>
    <!--/.page-section-->
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                 جميع الحقوق محفوظة &copy أنس سخنيني - جودي برازي - سهيل زيدان
                </div>
            </div>
            <!-- / .row -->
        </div>
    </section>
    <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

    <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <script src="<?php echo base_url ("assets/jas/modernizr-latest.js"); ?>"></script>
    <script src="<?php echo base_url ("assets/jas/jquery-1.8.2.min.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url ("assets/jas/bootstrap.min.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_Url ("assets/jas/jquery.isotope.min.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url ("assets/jas/fancybox/jquery.fancybox.pack.js"); ?>"type="text/javascript"></script>
    <script src="<?php echo base_url ("assets/jas/jquery.nav.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_Url ("assets/jas/jquery.cslider.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url ("assets/jas/custom.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url ("assets/jas/owl-carousel/owl.carousel.js"); ?>"></script>
</body>
</html>
