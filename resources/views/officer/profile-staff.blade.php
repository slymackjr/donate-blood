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
                <div class="col-xl-4">    
                  <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">    
                      <img src="img/lable.jpg" alt="Profile" class="rounded-circle img-fluid w-50 w-50">
                      <h2 class="display-7 fw-bold text-primary">{{ session('name') }}</h2>
                      <h3 class="text-muted">{{ session('job_title') }}</h3>                  
                      <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-8">
                  <div class="card">
                    <div class="card-body pt-3">
                      <!-- Bordered Tabs -->
                      <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>
                        <li class="nav-item">
                          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>
                        <li class="nav-item">
                          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>
                      </ul>
                      <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                          <h5 class="card-title display-6 mb-4 text-primary">Profile Details</h5>
                      
                          <div class="row mb-3">
                              <div class="col-lg-3 col-md-4 label h6 text-muted">Full Name</div>
                              <div class="col-lg-9 col-md-8 h6">{{ session('name') }}</div>
                          </div>
                      
                          <div class="row mb-3">
                              <div class="col-lg-3 col-md-4 label h6 text-muted">University</div>
                              <div class="col-lg-9 col-md-8 h6">Institute Of Finance Management</div>
                          </div>
                      
                          <div class="row mb-3">
                              <div class="col-lg-3 col-md-4 label h6 text-muted">Job</div>
                              <div class="col-lg-9 col-md-8 h6">{{ session('job_title') }}</div>
                          </div>
                      
                          <div class="row mb-3">
                              <div class="col-lg-3 col-md-4 label h6 text-muted">Department</div>
                              <div class="col-lg-9 col-md-8 h6">{{ session('staff_department') }}</div>
                          </div>
                      
                          <div class="row mb-3">
                              <div class="col-lg-3 col-md-4 label h6 text-muted">Faculty</div>
                              <div class="col-lg-9 col-md-8 h6">{{ session('staff_faculty') }}</div>
                          </div>
                      
                          <div class="row mb-3">
                              <div class="col-lg-3 col-md-4 label h6 text-muted">Staff ID</div>
                              <div class="col-lg-9 col-md-8 h6">{{ session('staff_id') }}</div>
                          </div>
                      
                          <div class="row mb-3">
                              <div class="col-lg-3 col-md-4 label h6 text-muted">Email</div>
                              <div class="col-lg-9 col-md-8 h6">{{ session('email') }}</div>
                          </div>
                      
                          <br>
                      </div>
                      
                       
                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">   
                          <!-- Profile Edit Form -->
                          <form method="post" action="{{route('update-account')}}">
                            @csrf
                            <div class="row mb-3">
                              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                              <div class="col-md-8 col-lg-9">
                                <img src="img/lable.jpg" alt="Profile" class="rounded-circle img-fluid w-50">
                                <div class="pt-2">
                                  <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                  <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="name" type="text" class="form-control" value="{{session('name')}}">
                              </div>
                            </div>    
                              <div class="row mb-3">
                                  <label for="Username" class="col-md-4 col-lg-3 col-form-label">Staff ID</label>
                                  <div class="col-md-8 col-lg-9">
                                      <input name="staff_id" type="text" class="form-control" value="{{session('staff_id')}}">
                                  </div>
                              </div>      
                            <div class="row mb-3">
                              <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="job_title" type="text" class="form-control" value="{{session('job_title')}}">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Department</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="staff_department" type="text" class="form-control" value="{{session('staff_department')}}">
                              </div>
                            </div>    
                            <div class="row mb-3">
                              <label for="Address" class="col-md-4 col-lg-3 col-form-label">Faculty</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="staff_faculty" type="text" class="form-control" value="{{session('staff_faculty')}}">
                              </div>
                            </div>      
                            <div class="row mb-3">
                              <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" value="{{session('email')}}">
                              </div>
                            </div>    
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
                            </div>
                          </form><!-- End Profile Edit Form -->    
                        </div>    
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                          <!-- Change Password Form -->
                          <form method="post" action="{{route('update-password')}}">
                            @csrf
                            <div class="row mb-3">
                              <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="password" type="password" class="form-control">
                              </div>
                            </div>    
                            <div class="row mb-3">
                              <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="newpassword" type="password" class="form-control">
                              </div>
                            </div>       
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary" name="changePassword">Change Password</button>
                            </div>
                          </form><!-- End Change Password Form -->
                        </div>   
                      </div><!-- End Bordered Tabs -->    
                    </div>
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