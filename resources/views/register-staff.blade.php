<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Donation</title>
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
                <a class="nav-link active ps-4 pe-4 text-white" aria-current="page" href="{{route('index.home')}}"><i class="fa-solid fa-house p-2"></i>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('index.home')}}"><i class="fa-solid fa-list p-2"></i>Requests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('index.home')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-calendar-check p-2"></i>  Appointments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('index.home')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-info p-2"></i>  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('index.home')}}p" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-phone p-2"></i>  Contact Us
                </a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success text-white" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <div id="intro-example" class="p-5 text-center bg-image align-items-center">
        <section>
            <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                      <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Staff Register here</p>
                          @if(session('error'))
                          <p class="text-center text-danger mb-5 mx-1 mx-md-4 mt-4">{{ session('error') }}!</p>
                          @endif

                          <form class="mx-1 mx-md-4" method="post" action="{{ route('register.staff.method') }}">
                            @csrf
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" name="name" id="form3Example1c" class="form-control" placeholder="Your Name" value="{{old('name')}}"/>
                                @error('name')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" name="username" id="form3Example1c" class="form-control" placeholder="Your Username" value="{{old('username')}}"/>
                                @error('username')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" name="address" id="form3Example1c" class="form-control" placeholder="Your Address" value="{{old('address')}}"/>
                                @error('address')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="number" name="phone" id="form3Example1c" class="form-control" placeholder="Your Phone Number" value="{{old('phone')}}"/>
                                @error('phone')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-house fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" name="department" id="form3Example1c" class="form-control" placeholder="Your Department Name" value="{{old('department')}}"/>
                                @error('department')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-house fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="text" name="jobTitle" id="form3Example1c" class="form-control" placeholder="Your Hospital title"  value="{{old('jobTitle')}}"/>
                                @error('jobTitle')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-house fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="number" name="hospital" id="form3Example1c" class="form-control" placeholder="Your Hospital ID"  value="{{old('hospital')}}"/>
                                @error('hospital')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-person fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <select name="gender" id="form3Example1c" class="form-control">
                                  <option selected>Your Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                            </div>
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="email" name="email" id="form3Example3c" class="form-control" placeholder="Your email" value="{{old('email')}}"/>
                                @error('email')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="password" name="password" id="form3Example4c" class="form-control" placeholder="Password" value="{{old('password')}}"/>
                                @error('password')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>
          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="password" name="password_confirmation" id="form3Example4cd" class="form-control" placeholder="Confirm Password" value="{{old('password_confirmation')}}"/>
                                @error('password_confirmation')
                                <span class="text-center text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>
          
                            <div class="form-check d-flex justify-content-center mb-5">
                              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                              <label class="form-check-label" for="form2Example3">
                                I agree all statements in <a href="#!">Terms of service</a>
                              </label>
                            </div>
          
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <p class="small mb-0">Already have an account? <a href="{{route('login.staff')}}">login at your account</a></p>
                            </div>
                          </form>
          
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
          
                          <img src="img/lable.jpg"
                            class="img-fluid rounded-4" alt="Sample image">
          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>    
    
  </body>
</html>


