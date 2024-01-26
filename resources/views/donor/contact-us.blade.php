<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  </head>
  <body>
      <div class="text-center p-3 container-md ">
        <img src="img/logo1.png" class="h-25 w-50 rounded" alt="...">
      </div>
      <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active ps-4 pe-4 text-white" aria-current="page" href="{{route('donor.showRequests')}}"><i class="fa-solid fa-house p-2"></i>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('donor.showAppointments')}}">
                <i class="fa-solid fa-calendar-check p-2"></i>  Appointments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('donor.aboutUs')}}">
                <i class="fa-solid fa-info p-2"></i>  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-primary" href="{{route('donor.contactUs')}}">
                <i class="fa-solid fa-phone p-2"></i>  Contact Us
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                data-mdb-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user mx-1"></i>{{$username}}</a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#">My account</a>
                    </li>

                    <li>
                      @auth('donors')
                        <a class="dropdown-item" href="{{ route('logout.donor') }}">Log out</a>
                      @endauth 
                    </li>
                </ul>
            </li>
            </ul>
          </div>
        </div>
      </nav>
{{-- 
       <div class="container">
        <div class="row">
            <!--Section: Contact v.2-->
            <section class="mb-4">

                <!--Section heading-->
                <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                    a matter of hours to help you.</p>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-9 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label for="name" class="">Your name</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="email" name="email" class="form-control">
                                        <label for="email" class="">Your email</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="subject" name="subject" class="form-control">
                                        <label for="subject" class="">Subject</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                        <label for="message">Your message</label>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->

                        </form>

                        <div class="text-center text-md-left">
                            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                        </div>
                        <div class="status"></div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-3 text-center">
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                <p>San Francisco, CA 94126, USA</p>
                            </li>

                            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                <p>+ 01 234 567 89</p>
                            </li>

                            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                <p>contact@mdbootstrap.com</p>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                </div>

            </section>
            <!--Section: Contact v.2-->
        </div>
       </div>     --}}  
       
       <div id="carouselExample" class="carousel">
        <div class="carousel-inner">
        </div>
      </div>

       <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-primary rounded-3 shadow">
                    <div class="card-header bg-primary text-white">
                        Contact Us
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Feel free to reach out to us. Our team is ready to assist you.</h5>
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <label for="name">Your Name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <label for="email">Your Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <label for="subject">Subject</label>
                                        <input type="text" id="subject" name="subject" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <label for="message">Your Message</label>
                                        <textarea id="message" name="message" rows="4" class="form-control md-textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-md-left">
                                <button class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                        <div class="status"></div>
                    </div>
                    <div class="card-footer text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4"><i class="fas fa-map-marker-alt fa-2x"></i>
                                <p>San Francisco, CA 94126, USA</p>
                            </li>
                            <li class="list-inline-item me-4"><i class="fas fa-phone mt-4 fa-2x"></i>
                                <p>+01 234 567 89</p>
                            </li>
                            <li class="list-inline-item"><i class="fas fa-envelope mt-4 fa-2x"></i>
                                <p>contact@yourwebsite.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>    
        
  </body>
</html>