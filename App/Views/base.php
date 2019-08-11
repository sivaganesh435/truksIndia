<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Truks India</title>
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- fonts -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap"> -->
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Owl Carousel Css -->
  <link rel="stylesheet" type="text/css" href="{{ base_url }}css/owl.carousel.min.css">
  <!-- Flaticon Css-->
  <link rel="stylesheet" type="text/css" href="{{ base_url }}css/flaticon.min.css">
  <!-- custom styles -->
  <link rel="stylesheet" href="{{ base_url }}style.css">

</head>

<body>
  <header>
    <div class="topbar d-none btn-grad d-md-block">
      <div class="container">
        <div class="header-topbarbox-2">
          <div class="header-contact text-right">
            <div class="header-contact-item"><i class="icon fa fa-phone"></i>+91 7075575239</div>
            <div class="header-contact-item"><i class="icon fa fa-envelope-o"></i> info@truksindia.com</div>
            <div class="header-contact-item"><i class="icon fa fa-clock-o"></i> Mon to Sat : 07:00 - 18:00</div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="{{ base_url }}img/Truksindia-logo.png" class="img-fluid">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse main-menu" id="collapsibleNavbar">
          <ul class="navbar-nav text-right" >
            <li class="nav-item home ">
              <a class="nav-link hvr-underline-from-left" href="/">Home</a>
            </li>
            <li class="nav-item enterprise">
              <a class="nav-link hvr-underline-from-left" href="/pages/enterprise">Enterprise</a>
            </li>
            <li class="nav-item driver">
              <a class="nav-link hvr-underline-from-left" href="/pages/driver">Drivers</a>
            </li>
            <li class="nav-item vendor ">
              <a class="nav-link hvr-underline-from-left" href="/pages/vendor">Vendors</a>
            </li>
            <li class="nav-item packersandmovers">
              <a class="nav-link hvr-underline-from-left" href="/pages/packersandmovers">Packers & Movers</a>
            </li>
            <li class="nav-item cabs">
              <a class="nav-link hvr-underline-from-left" href="/pages/cabs">Corporate Cabs</a>
            </li>
            <li class="nav-item about">
              <a class="nav-link hvr-underline-from-left" href="/pages/about">About</a>
            </li>
            <li class="nav-item contact">
               
              <a class="nav-link hvr-underline-from-left" href="/pages/contact">Contact</a>
            </li>
            {% if session.user == TRUE %}
            
                {% if session.isAdmin == 1 %}
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ session.name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="/pages/adminPanel">Dashboard</a>
                    </div>
                  </div>
                </li>
                {% else %}
                <li class="nav-item">
                  <a class="nav-link hvr-underline-from-left" href="#" data-toggle="modal" data-target="#loginmodal">{{ session.name }}</a>
                </li>
                {% endif %}
            <button type="button" class="btn btn-outline-warning" id="logout">Logout</button>
            {% else %}
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="#" data-toggle="modal" data-target="#loginmodal">Login</a>
            </li>
            <button type="button" class="btn btn-outline-warning" data-toggle="modal"
              data-target="#signupmodal">Signup</button>
            {% endif %}
          </ul>
        </div>
    </div>
  </nav>
  
  <div class="modal signup-modal" id="loginmodal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <article class="card-body">
              <h4 class="card-title text-center mt-3">Sign in</h4>
              <p class="text-center">Secure login into truks india</p>
              <!-- <hr> -->
              <!-- <p class="text-success text-center">Some message goes here</p> -->
              <p id="signinError"></p>
              <form action="#" method="POST" id="signin">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email or login" type="email">
                  </div> <!-- input-group.// -->
                </div> <!-- form-group// -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                      <input class="form-control" name="password" placeholder="******" type="password">
                  </div> <!-- input-group.// -->
                </div> <!-- form-group// -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-grad btn-block"> Login </button>
                </div> <!-- form-group// -->
                <!--<p class="text-center"><a href="#" data-toggle="modal" data-target="#loginmodal" class="btn">Forgot password?</a></p>-->
              </form>
            </article>
          </div>
        </div>
      </div>
    </div>
  
  <!-- The signup Modal -->
    <div class="modal signup-modal" id="signupmodal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <article class="card-body mx-auto" style="max-width: 400px;">
              <h4 class="card-title mt-3 text-center">Create Account</h4>
              <p class="text-center">Get started with your free account</p>
              <p id="signupError"></p>
                    
                <form action="#" method="POST" id="signUp">
                    <input type="hidden" name="id" id="signUpId">
                    <input type="hidden" name="originalPass" id="sinUpPass">
                <div class="form-group input-group">
                  <div class="input-group-prepend"> 
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                    <input name="name" class="form-control" id="signUpName" placeholder="Full name" type="text" required="">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                    <input name="email" class="form-control" id="signUpEmail" placeholder="Email address" type="email" required="">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                  </div>
                    <input name="phone" class="form-control" placeholder="Phone number" id="signUpPhone" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                    <input class="form-control "name="password" placeholder="Create password" type="password" >
                </div> <!-- form-group// -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-grad btn-block"> Create Account </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="">Log In</a> </p>
              </form>
            </article>
          </div>

        </div>
      </div>
    </div>
    
    <div class="modal signup-modal" id="enquirymodal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <article class="mx-auto" style="max-width: 500px;">
              <h4 class="card-title mt-5 pb-3 text-center">Enquiry</h4>
              <div id="enquiryStatus" style="display:none">
                  <div class="alert alert-success">
                    <strong>Success!</strong> Your enquiry succesfully submitted.
                </div>
              </div>
              <form class="px-lg-5" action="#" id="enquiryForm">
                <input name="type" class="form-control"  id="enquiryType" type="hidden">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                    <input name="fullname" class="form-control" placeholder="Full name" id="enquiryName" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                  </div>
                    <input name="phone" class="form-control" placeholder="Phone number" id="enquiryPhone" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" id="enquiryEmail">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-file-text"></i> </span>
                  </div>
                    <input name="subject" class="form-control" placeholder="Subject" id="enquirySub" type="text" >
                </div> <!-- form-group// -->
                <div class="form-group">
                  <textarea class="form-control" name="feedback-message" id="enquiryMessage" rows="5"
                    placeholder="Write your message"></textarea>
                </div>
                <div class="form-group mb-5">
                    <button type="submit" id="enquirybutton" style="display: block" class="btn btn-primary btn-grad btn-block"> Submit Enquiry</button>
                </div> <!-- form-group// -->
              </form>
            </article>
          </div>
        </div>
      </div>
    </div>

  <main>
    <!-- The login Modal -->
    
    {% block body %}
    {% endblock %}
    <!-- slider -->

  </main>

  <!-- footer -->
<footer class="site-footer">
   
    <!-- Footer Top Part -->
    <div class="footer-top pt-5 pb-5">
      <div class="container">
        <div class="row">
          <!-- About -->
          <div class="col-lg-4 col-md-4">
            <div class="widget widget-about">
              <h4 class="widget-title">About Company</h4>
 <p>We are India’s first largest vendor management company providing a comprehensive logistics solutions catering the needs of our logistics partners. Headquartered in Hyderabad,Truks India are an on-demand logistics service provider that takes care of all customer's intra & intercity logistic business requirements.</p>
              <ul>
                <li> <i class="fa fa-phone"></i> <b class="text-uppercase">Tel :</b>+91-7075575239
                </li>
                <li><i class="fa fa-envelope"></i> <b class="text-uppercase">Email :
                  </b>info@truksindia.com</li>
                <li><i class="fa fa-location-arrow"></i> <b class="text-uppercase">Corporate Office :</b>
                  IO BUSINESS CENTER, Unit No.406,B3,4th Floor, Manjeera Trinity Corporate, Kukatpally, Hyderabad-500072
                </li>
              </ul>
            </div>
          </div>
          <!-- Useful Links -->
          <div class="col-lg-3 col-md-3">
            <div class="widget widget-services">
              <h4 class="widget-title">Useful links</h4>
              <ul>
                <li><a href="/pages/enterprise">Enterprise</a></li>
                <li><a href="/pages/driver">Drivers</a></li>
                <li><a href="/pages/vendor">Vendors</a></li>
                <li><a href="/pages/packersandmovers">Packers & Movers</a></li>
                <li><a href="/pages/about">About</a></li>
                <li><a href="/pages/contact">Contact</a></li>
              </ul>
            </div>
          </div>
          <!-- Footer social icons -->
          <div class="col-md-5 col-lg-4 offset-lg-1">
            <div class="widget widget-social">
              <h4 class="widget-title">Reach us on social media</h4>
              <ul>
                <li>
                  <a href="#" class="fa fa-facebook">
                  </a>
                </li>
                <li>
                  <a href="#" class="fa fa-twitter">
                  </a>
                </li>
                <li>
                  <a href="#" class="fa fa-youtube-play">
                  </a>
                </li>
                <li>
                  <a href="#" class="fa fa-instagram">
                  </a>
                </li>
                <li>
                  <a href="#" class="fa fa-pinterest">
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Copyright Part -->
    <div class="footer-bottom">
      <div class="container pt-4 pb-4">
        <div class="text-center">
          <span class="copyrights-text">© 2019 Truksindia. All Rights Reserved. Designed By <a href='http://www.telvitechnologies.com' >Telvi</a></span>
        </div>
      </div>
    </div>
  </footer>

  <!-- scripts -->
  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="{{ base_url }}js/owl.carousel.min.js"></script>
  <script src="{{ base_url }}js/custom.js"></script>
  <script>
      $(document).ready(function()
      {
          console.log("hii");
          console.log({{ session.user }})
          var pageURL = $(location).attr("href");
          var URL =pageURL.split('/');
          console.log(URL[4]);
          if(URL[4] == undefined)
          {
              $(".main-menu").find('.home').addClass('active');
          }
          $(".main-menu").find('.'+URL[4]).addClass('active');
          $("#signUp").submit(function(e) {
              e.preventDefault(); 
               var form = $(this);
               html ='';
                $.ajax({
                    type: "POST",
                    url: "{{ base_url}}home/signUpForm",
                    data: form.serialize(),
                    success: function(data)
                    {
                        res = JSON.parse(data);
                        if(res.success)
                        {
                        location.reload(true);
                        }
                        else
                        {
                            console.log(res.error);
                           html="<div class='alert alert-danger'>"+res.error+"</div>";
                           $("#signupError").html(html);
                        }
                        
                    }
                  });
            });
            $("#signin").submit(function(e) {
              e.preventDefault(); 
               var form = $(this);
               console.log($("#signin").serialize());
               console.log($("#signin:input[name='email']"));
                $.ajax({
                    type: "POST",
                    url: "{{ base_url}}home/loginForm",
                    data: $("#signin").serialize(), 
                    success: function(data)
                    {
                        res = JSON.parse(data);
                        if(res.success)
                        {
                        location.reload(true);
                        }
                        else
                        {
                            console.log(res.error);
                           html="<div class='alert alert-danger'>"+res.error+"</div>";
                           $("#signinError").html(html);
                        }
                    }
                  });
            });
            $("#logout").on('click',function(e)
            {
                e.preventDefault(); 
                 $.ajax({
                    type: "POST",
                    url: "{{ base_url}}home/logout",
                    data: '', 
                    success: function(data)
                    {
                         window.location.href='/';
                    }
                 });
            });
                
            $("#enterpriseForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ base_url}}enquiries/enquiryForm",
                    data: $("#enterpriseForm").serialize(), 
                    success: function(data)
                    {
                        res=JSON.parse(data);
                        $("#enquiryType").val(res.type);
                        $("#enquiryName").val(res.name);
                        $("#enquiryPhone").val(res.phone);
                        $("#enquiryEmail").val(res.email);
                        $("#enquirymodal").modal('show');
                        $("#enterpriseForm").trigger("reset");
                        
                    }
                  });
            });
            $("#driverForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ base_url}}enquiries/enquiryForm",
                    data: $("#driverForm").serialize(), 
                    success: function(data)
                    {
                        res=JSON.parse(data);
                        $("#enquiryType").val(res.type);
                        $("#enquiryName").val(res.name);
                        $("#enquiryPhone").val(res.phone);
                        $("#enquiryEmail").val(res.email);
                        $("#enquirymodal").modal('show');
                        $("#driverForm").trigger("reset");
                    }
                  });
            });
            $("#vendorForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ base_url}}enquiries/enquiryForm",
                    data: $("#vendorForm").serialize(), 
                    success: function(data)
                    {
                        res=JSON.parse(data);
                        $("#enquiryType").val(res.type);
                        $("#enquiryName").val(res.name);
                        $("#enquiryPhone").val(res.phone);
                        $("#enquiryEmail").val(res.email);
                        $("#enquirymodal").modal('show');
                        $("#vendorForm").trigger("reset");
                    }
                  });
            });
            $("#demandForm").submit(function(e){
                e.preventDefault();
               $.ajax({
                    type: "POST",
                    url: "{{ base_url}}enquiries/enquiryForm",
                    data: $("#demandForm").serialize(), 
                    success: function(data)
                    {
                        res=JSON.parse(data);
                        $("#enquiryType").val(res.type);
                        $("#enquiryName").val(res.name);
                        $("#enquiryPhone").val(res.phone);
                        $("#enquiryEmail").val(res.email);
                        $("#enquirymodal").modal('show');
                        $("#demandForm").trigger("reset");
                    }
                  });
            });
            $("#cabsForm").submit(function(e){
                e.preventDefault();
               $.ajax({
                    type: "POST",
                    url: "{{ base_url}}enquiries/enquiryForm",
                    data: $("#cabsForm").serialize(), 
                    success: function(data)
                    {
                        res=JSON.parse(data);
                        $("#enquiryType").val(res.type);
                        $("#enquiryName").val(res.name);
                        $("#enquiryPhone").val(res.phone);
                        $("#enquiryEmail").val(res.email);
                        $("#enquirymodal").modal('show');
                        $("#cabsForm").trigger("reset");
                    }
                  });
            });
            $("#enquiryForm").submit(function(e){
               e.preventDefault();
               $.ajax({
                    type: "POST",
                    url: "{{ base_url}}enquiries/saveEnquiry",
                    data: $("#enquiryForm").serialize(), 
                    success: function(data)
                    {
                        res=JSON.parse(data);
                        $("#enquiryForm").trigger("reset");
                        $("#enquiryStatus").css('display','block');
                    }
                  });
            });
            $("#contactForm").submit(function(e)
            {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ base_url}}enquiries/contactForm",
                    data: $("#contactForm").serialize(), 
                    success: function(data)
                    {
   //                     res=JSON.parse(data);
                        $("#contactForm").trigger("reset");
                        $("#contactStatus").css('display','block');
                    }
                });
            });
            $("#feedbackForm").submit(function(e)
            {
                e.preventDefault();
                $.ajax
                ({
                    type: "POST",
                    url: "{{ base_url}}feedback/saveFeedback",
                    data: $("#feedbackForm").serialize(), 
                    success: function(data)
                    {
   //                     res=JSON.parse(data);
                        $("#feedbackForm").trigger("reset");
                        $("#feedbackStatus").css('display','block');
                    }
               });
            });
      
      usersPage(1);
      enquirypage(1);
      feedbackPage(1);
      
      $("#mutliforms").on('slid.bs.carousel', function(e){
          console.log("hiii");
        $('.carousel-item.active ul li ').find(".active").removeClass('active');
        e.preventDefault()
        var carousel_item =  $(".carousel-item.active").data('value');
        console.log($(".carousel-item.active ul li").find('.'+carousel_item));
        console.log(carousel_item);
        $(".carousel-item.active ul li a").find('.'+carousel_item).addClass('active');
     });
      
      
      
    });
  </script>
</body>

</html>
