<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Donation</title>
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-icons/font/bootstrap-icons.min.css') }}">
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
                <a class="nav-link active ps-3 pe-1 text-white" aria-current="page" href="{{route('staff.requestDonor')}}"><i class="fa-solid fa-house p-1"></i>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-3 pe-1 text-white" href="{{route('staff.viewRequests')}}"><i class="fa-solid fa-list p-1"></i>Sent Requests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-3 pe-1 text-white" href="{{route('staff.viewAcceptedRequests')}}">
                <i class="fa-solid fa-calendar-check p-1"></i> Accepted Requests
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-3 pe-1 text-white" href="{{route('staff.aboutUs')}}">
                <i class="fa-solid fa-info p-1"></i>  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-3 pe-1 text-white" href="{{route('staff.contactUs')}}">
                <i class="fa-solid fa-phone p-1"></i>  Contact Us
                </a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle ps-3 pe-1 text-primary active" href="#" id="navbarDropdown" role="button"
                data-mdb-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user mx-1 p-1"></i>{{session('email')}}</a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{route('staff.profile')}}">My account</a>
                    </li>

                    <li>
                      @auth('staff')
                        <a class="dropdown-item" href="{{ route('logout.staff') }}">Log out</a>
                      @endauth 
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <form class="d-flex ps-3 pe-1" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success text-white" type="submit">Search</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      @if(!is_null(session('success')))  
       <!-- Alert to be displayed -->
    <p class="text-center alert alert-success" id="myAlert"><strong>{{session('success')}}</strong></p>

    <!-- Add this script at the end of the body tag -->
    <script>
        // Function to hide the alert after 2 seconds
        function hideAlert() {
            var alertDiv = document.getElementById('myAlert');
            alertDiv.style.display = 'none';
        }

        // Show the alert
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(hideAlert, 2000);
        });
    </script>
    @endif
    
        <div id="carouselExample" class="carousel">
          <div class="carousel-inner">
          </div>
        </div>
        <section style="background-color: #eee;" class="container mb-4">
          <div class="container py-5">
    {{--         <div class="row">
              <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                  </ol>
                </nav>
              </div>
            </div>
 --}}
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <img src="{{asset('img/splash1.jpg')}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">{{$staff->getFullName()}}</h5>
                    <p class="text-muted mb-1">{{$staff->getJobTitle()}}</p>
                    <p class="text-muted mb-4">{{$staff->getAddress()}}</p>
                    <div class="d-flex justify-content-center mb-2">
                      <button type="button" class="btn btn-primary">Active</button>
                      <button type="button" class="btn btn-outline-primary ms-1">Deactivate</button>
                    </div>
                  </div>
                </div>
                {{-- <div class="card mb-4 mb-lg-0">
                  <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fas fa-globe fa-lg text-warning"></i>
                        <p class="mb-0">https://mdbootstrap.com</p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                        <p class="mb-0">mdbootstrap</p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                        <p class="mb-0">@mdbootstrap</p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                        <p class="mb-0">mdbootstrap</p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                        <p class="mb-0">mdbootstrap</p>
                      </li>
                    </ul>
                  </div>
                </div> --}}
              </div>
              <div class="col-lg-8">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$staff->getFullName()}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$staff->getEmail()}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$staff->getPhoneNumber()}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Mobile</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$staff->getPhoneNumber()}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">{{$staff->getAddress()}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                      <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">assignment</span> Patient Status</p>
                        <p class="mb-1" style="font-size: .77rem;">Cure Patients</p>
                        <div class="progress rounded" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Operations</p>
                        <div class="progress rounded" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Appointments</p>
                        <div class="progress rounded" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Requests</p>
                        <div class="progress rounded" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Treatment</p>
                        <div class="progress rounded mb-2" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                      <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">Professional</span> Status</p>
                        <p class="mb-1" style="font-size: .77rem;">Supervised Students</p>
                        <div class="progress rounded" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Passed Students</p>
                        <div class="progress rounded" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Thesis</p>
                        <div class="progress rounded" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Assistance</p>
                        <div class="progress rounded" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Lecturers</p>
                        <div class="progress rounded mb-2" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-body-tertiary text-muted">
          <!-- Section: Social media -->
          <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
              <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
              <a href="" class="me-4">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="" class="me-4">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="me-4">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="me-4">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="" class="me-4">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="" class="me-4">
                <i class="fab fa-github"></i>
              </a>
            </div>
            <!-- Right -->
          </section>
          <!-- Section: Social media -->

          <!-- Section: Links  -->
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>JERRYCODE
                  </h6>
                  <p>
                    We are totally committed to bring your image of the application or 
                    software in your mind to life, with direct collaboration and front feedback from you. We make it happen for you.
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    Products
                  </h6>
                  <p>
                    <a href="#!" class="text-reset">Spring Boot</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">React</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Photoshop</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Laravel</a>
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    Useful links
                  </h6>
                  <p>
                    <a href="#!" class="text-reset">Pricing</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Settings</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Orders</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Help</a>
                  </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                  <p><i class="fas fa-home me-3"></i> Dar es Salaam, Posta - IFM</p>
                  <p>
                    <i class="fas fa-envelope me-3"></i>
                    info@example.com
                  </p>
                  <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                  <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row -->
            </div>
          </section>
          <!-- Section: Links  -->

          <!-- Copyright -->
          <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="fw-bold" href="#">JERRYCODE</a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>    
        
  </body>
</html>