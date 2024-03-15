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
        <a href="{{route('index.home')}}">
          <img src="img/logo1.png" class="rounded" alt="...">
        </a>
      </div>
      <div id="intro-example" class="text-center bg-image align-items-center">
        <section>
            <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                      <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome Back Our beloved Blood Donor!</p>
                          @if(session('error'))
                          <p class="text-center text-danger mb-5 mx-1 mx-md-4 mt-4">{{ session('error') }}!</p>
                         @endif                     
                          <form class="mx-1 mx-md-4" method="post" action="{{ route('login.donor.method') }}">
                            @csrf
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="email" name="email" id="form3Example3c" class="form-control" placeholder="Your email"/>
                              </div>
                            </div>          
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <input type="password" name="password" id="form3Example4c" class="form-control" placeholder="Password"/>
                              </div>
                            </div>         
                            <div class="form-check d-flex justify-content-center mb-5">
                              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                              <label class="form-check-label" for="form2Example3">
                                I agree all statements in <a href="#!">Terms of service</a>
                              </label>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <p class="small mb-0">Don't have account? <a href="{{route('register.donor')}}">Create an account</a></p>
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
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>      
    
  </body>
</html>


