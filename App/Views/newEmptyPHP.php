<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Truks India</title>
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
    <div class="topbar d-none d-md-block">
      <div class="container">
        <div class="header-topbarbox-2">
          <div class="header-contact text-right">
            <div class="header-contact-item"><i class="icon fa fa-phone"></i> 7075575239</div>
            <div class="header-contact-item"><i class="icon fa fa-envelope-o"></i> inquiry@truksindia.com</div>
            <div class="header-contact-item"><i class="icon fa fa-clock-o"></i> Mon to Fri : 07:00 - 18:00</div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ base_url }}img/Truksindia-logo.png" class="img-fluid">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav text-right">
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="/pages/enterprise">Enterprise</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="/pages/driver">Drivers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="/pages/vendor">Vendors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="/pages/packersandmovers">Packers & Movers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="/pages/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="/pages/contact">Contact</a>
            </li>
            {% if session.user %}
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-left" href="#" data-toggle="modal" data-target="#loginmodal">{{ session.user[0].name }}</a>
            </li>
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
              <form action="home/loginForm" method="POST">
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
                <p class="text-center"><a href="#" data-toggle="modal" data-target="#loginmodal" class="btn">Forgot password?</a></p>
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
              {% if success == true %}
                    <div class="alert alert-success">
                        <strong>Success!</strong> Your have successfully registered.
                    </div>
                {% endif %}
              <form action="home/signUpForm" method="POST">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                    <input name="name" class="form-control" placeholder="Full name" type="text" required="">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" required="">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                  </div>
                  <input name="phone" class="form-control" placeholder="Phone number" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                    <input class="form-control "name="password" placeholder="Create password" type="password" required="">
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
              <p>Lorem ipsum this is dummy text dolor sit amet check this text, consecte tura dipiscing elit, sed do
                eiusmod tempor doler is incididunt. </p>
                <ul>
                  <li> <i class="fa fa-phone"></i> <b class="text-uppercase">Tel :</b> 7075575239
                  </li>
                  <li><i class="fa fa-envelope"></i> <b class="text-uppercase">Email :
                    </b>info@truksindia.com</li>
                  <li><i class="fa fa-location-arrow"></i> <b class="text-uppercase">Location :</b>
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
                <li><a href="#">Drive</a></li>
                <li><a href="#">Deliver</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
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
          <span class="copyrights-text">© 2019 Truksindia. All Rights Reserved. Designed By Harish</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="{{ base_url }}js/owl.carousel.min.js"></script>
  <script src="{{ base_url }}js/custom.js"></script>
</body>

</html>