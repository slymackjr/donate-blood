<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
                <a class="nav-link active ps-4 pe-4 text-white" aria-current="page" href="{{route('staff.requestDonor')}}"><i class="fa-solid fa-house p-2"></i>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('staff.viewRequests')}}"><i class="fa-solid fa-list p-2"></i>Sent Requests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('staff.viewAcceptedRequests')}}">
                <i class="fa-solid fa-calendar-check p-2"></i>  Accepted Requests
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
                data-mdb-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user mx-1"></i>{{session('email')}}</a>
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

    @if(!is_null(session('success_message')))  
       <!-- Alert to be displayed -->
    <p class="text-center alert alert-success" id="myAlert"><strong>{{session('success_message')}}</strong></p>

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

            <div class="container-md d-flex justify-content-center align-items-center">
              <div class="card border-primary rounded-4 shadow-lg" style="max-width: 500px;">
                  <div class="card-body">
                      <h5 class="card-title text-center text-uppercase mb-4 text-primary">🌟 Donor Information 🌟</h5>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item"><strong>Donor ID:</strong> {{$donorDetails['donor_id']}}</li>
                          <li class="list-group-item"><strong>Donor Username:</strong> {{$donorDetails['username']}}</li>
                          <li class="list-group-item"><strong>Donor Full Name:</strong> {{$donorDetails['full_name']}}</li>
                          <li class="list-group-item"><strong>Donor Gender:</strong> {{$donorDetails['gender']}}</li>
                          <li class="list-group-item"><strong>Donor Blood Type:</strong> {{$donorDetails['blood_type']}}</li>
                          <li class="list-group-item"><strong>Donor Address:</strong> {{$donorDetails['address']}}</li>
                          <li class="list-group-item"><strong>Donor Phone Number:</strong> {{$donorDetails['phone_number']}}</li>
                          <li class="list-group-item"><strong>Donor Birthdate:</strong> {{$donorDetails['birthdate']}}</li>
                          <li class="list-group-item"><strong>Donor Email:</strong> {{$donorDetails['email']}}</li>
                          <li class="list-group-item"><strong>Donor Status:</strong> {{$donorDetails['status']}}</li>
                          <li class="list-group-item"><strong>Register Date:</strong> {{$donorDetails['register_date']}}</li>
                      </ul>
                      <form action="{{ route('staff.submitRequest') }}" method="POST">
                          @csrf
                          <input type="hidden" name="staff_email" value="{{ $staffemail }}">
                          <input type="hidden" name="donor_email" value="{{ $donorDetails['email'] }}">
                          <div class="mb-3">
                              <label for="appointment_date" class="form-label">Appointment Date</label>
                              <div class="input-group date" id="appointment_date_picker" data-target-input="nearest">
                                  <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control"/>
                              </div>
                          </div>
                          <div class="d-grid gap-2">
                              <button type="submit" class="btn btn-primary">🚀 Submit Request 🚀</button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>    
  </body>
</html>