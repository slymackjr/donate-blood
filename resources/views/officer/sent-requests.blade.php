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
                <a class="nav-link active ps-3 pe-1 text-white" aria-current="page" href="{{route('staff.requestDonor')}}"><i class="fa-solid fa-house p-1"></i>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-3 pe-1 text-primary" href="{{route('staff.viewRequests')}}"><i class="fa-solid fa-list p-1"></i>Sent Requests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-3 pe-1 text-white" href="{{route('staff.viewAcceptedRequests')}}">
                <i class="fa-solid fa-calendar-check p-1"></i>  Accepted Requests
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-3 pe-1 text-white" href="{{route('staff.aboutUs')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-info p-1"></i>  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-3 pe-1 text-white" href="{{route('staff.contactUs')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-phone p-1"></i>  Contact Us
                </a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle ps-3 pe-1 text-white" href="#" id="navbarDropdown" role="button"
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
        <!-- cards viewers-->
        <div class="container">
          <div class="row">
            @if($allDonors)
            @foreach ($allDonors as $donor)
            <article class="col-md-4 col-lg-3">
              <div class="card bg-light rounded-4 shadow">
                  <div class="card-body">
                      <h5 class="card-title text-center text-uppercase mb-4 text-primary">Donor Request</h5>
                      <ul class="list-unstyled">
                          <li><strong>Name:</strong> {{$donor['full_name']}}</li>
                          <li><strong>Gender:</strong> {{$donor['gender']}}</li>
                          <li><strong>Location:</strong> {{$donor['address']}}</li>
                          <li><strong>Blood Group:</strong> {{$donor['blood_type']}}</li>
                          <li><strong>Phone Number:</strong> {{$donor['phone_number']}}</li>
                          <li><strong>Appointment Date:</strong> {{$donor['request_date']}}</li>
                          <li><strong>Email:</strong> {{$donor['email']}}</li>
                      </ul>
                      <form action="{{ route('staff.cancelRequest') }}" method="POST">
                          @csrf
                          <input type="hidden" name="request_id" value="{{ $donor['request_id'] }}">
                          <div class="d-grid mt-4">
                              <button type="submit" class="btn btn-danger btn-lg">Cancel Requests</button>
                          </div>
                      </form>
                  </div>
              </div>
          </article>                  
            <!-- .card -->
            @endforeach
            @endif
          </div>
        </div> 
        <!-- Pagination links -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item {{ ($allDonors->currentPage() == 1) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $allDonors->previousPageUrl() }}">Previous</a>
                  </li>
                  @for ($i = max(1, $allDonors->currentPage() - 1); $i <= min($allDonors->currentPage() + 1, $allDonors->lastPage()); $i++)
                    <li class="page-item {{ ($allDonors->currentPage() == $i) ? 'active' : '' }}">
                      <a class="page-link" href="{{ $allDonors->url($i) }}">{{ $i }}</a>
                    </li>
                  @endfor
                  <li class="page-item {{ ($allDonors->currentPage() == $allDonors->lastPage()) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $allDonors->nextPageUrl() }}">Next</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>    
        
  </body>
</html>