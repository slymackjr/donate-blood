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
                <a class="nav-link active ps-4 pe-4 text-primary" aria-current="page" href="{{route('donor.showRequests')}}"><i class="fa-solid fa-house p-2"></i>Home</a>
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
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('donor.contactUs')}}">
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
    {{-- 
        <div id="carouselExample" class="carousel">
          <div class="carousel-inner">
          @foreach ($fewDonors as $row)
            <div class="carousel-item p-2">
              <div class="card border-white rounded-4 trasparent">
                <div class="card-body">
                  <h5 class="card-title text-center">DONOR</h5>
                  <p class="card-text"><Span>NAME: </Span>{{$row['full_name']}}</p>
                  <p class="card-text"><Span>GENDER: </Span>{{$row['gender']}}</p>
                  <p class="card-text"><Span>LOCATION: </Span>{{$row['address']}}</p>
                  <p class="card-text"><Span>BLOOD GROUP: </Span>{{$row['blood_type']}}</p>
                  <p class="card-text"><Span>HEALTH: </Span>{{$row['status']}}</p>
                  <form action="{{ route('staff.createRequest') }}" method="POST">
                    @csrf
                    <input type="hidden" name="donor_email" value="{{ $row['email'] }}">
                    <p class="card-text text-center">
                        <button type="submit" class="btn link-secondary">More...</button>
                    </p>
                  </form>
                  <form action="{{ route('staff.createRequest') }}" method="POST">
                    @csrf
                    <input type="hidden" name="donor_email" value="{{ $row['email'] }}">
                    <p class="card-text text-center">
                        <button type="submit" class="btn btn-primary">Request</button>
                    </p>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div> --}}
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
                    <h5 class="card-title text-center text-uppercase mb-4 text-primary">HOSPITAL OFFICER REQUEST</h5>
                    <ul class="list-unstyled">
                        <li><strong>HospitalOfficer Name:</strong> {{$donor['full_name']}}</li>
                        <li><strong>Gender:</strong> {{$donor['gender']}}</li>
                        <li><strong>HospitalOfficer Phone:</strong> {{$donor['phone_number']}}</li>
                        <li><strong>Hospital Location:</strong> {{$donor['hospital_name']}}</li>
                        <li><strong>Hospital Address:</strong> {{$donor['hospital_address']}}</li>
                        <li><strong>Hospital Contact:</strong> {{$donor['hospital_contact']}}</li>
                        <li><strong>Hospital Email:</strong> {{$donor['hospital_email']}}</li>
                        <li><strong>Appointment Time:</strong> {{$donor['appointment_date']}}</li>
                    </ul>
                    <div class="d-flex justify-content-between mt-3">
                      <form action="{{-- {{ route('donor.rejectRequest') }} --}}" method="POST">
                        @csrf
                        <input type="hidden" name="request_id" value="{{ $donor['request_id'] }}">
                        <button type="submit" class="btn btn-danger">Cancel</button>
                      </form>
              
                      <form action="{{-- {{ route('donor.approveRequest') }} --}}" method="POST">
                        @csrf
                        <input type="hidden" name="request_id" value="{{ $donor['request_id'] }}">
                        <button type="submit" class="btn btn-success">Accept</button>
                      </form>
                    </div>
                </div>
            </div>
          </article>
            <!-- .card -->
            @endforeach
        
          </div>
        </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>    
        
  </body>
</html>