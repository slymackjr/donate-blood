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
                <a class="nav-link active ps-4 pe-4 text-primary" aria-current="page" href="{{route('staff.requestDonor')}}"><i class="fa-solid fa-house p-2"></i>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('staff.viewRequests')}}"><i class="fa-solid fa-list p-2"></i>Sent Requests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('staff.viewAcceptedRequests')}}">
                <i class="fa-solid fa-calendar-check p-2"></i> Accepted Requests
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('staff.aboutUs')}}">
                <i class="fa-solid fa-info p-2"></i>  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('staff.contactUs')}}">
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
                      @auth('staff')
                        <a class="dropdown-item" href="{{ route('logout.staff') }}">Log out</a>
                      @endauth 
                    </li>
                </ul>
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
          @foreach ($allDonors as $donor)
            <article class="col-md-4 col-lg-3">
              <div class="card bg-light rounded-4 shadow">
                  <div class="card-body">
                      <h5 class="card-title text-center text-uppercase mb-4 text-primary">Donor Information</h5>
                      <ul class="list-unstyled">
                          <li><strong>Name:</strong> {{$donor['full_name']}}</li>
                          <li><strong>Gender:</strong> {{$donor['gender']}}</li>
                          <li><strong>Location:</strong> {{$donor['address']}}</li>
                          <li><strong>Blood Group:</strong> {{$donor['blood_type']}}</li>
                          <li><strong>Health:</strong> {{$donor['status']}}</li>
                      </ul>
                      <div class="d-grid gap-2 mt-4">
                          <form action="{{ route('staff.createRequest') }}" method="POST">
                              @csrf
                              <input type="hidden" name="donor_email" value="{{ $donor['email'] }}">
                              <p class="card-text text-center">
                                <button type="submit" class="btn link-secondary">More...</button>
                              </p>
                          </form>
                          <form action="{{ route('staff.createRequest') }}" method="POST">
                              @csrf
                              <input type="hidden" name="donor_email" value="{{ $donor['email'] }}">
                              <p class="card-text text-center">
                                <button type="submit" class="btn btn-primary">Request</button>
                              </p>
                          </form>
                      </div>
                  </div>
              </div>
            </article>
          
            <!-- .card -->
            @endforeach       
          </div>
        </div> 
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>     
        
  </body>
</html>