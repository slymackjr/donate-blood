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
                <a class="nav-link ps-4 pe-4 text-white" href="{{route('index.home')}}"><i class="fa-solid fa-list p-2"></i>Request Donor</a>
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
                <a class="nav-link  ps-4 pe-4 text-white" href="{{route('index.home')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
     
      <div id="intro-example" class="p-5 text-center bg-image">
      <div class="mask">
        <div class="d-flex justify-content-center align-items-center h-100">
          <div class="text-black">
            <h1 class="mb-3">Welcome to the Blood donation platform.</h1>
            <h5 class="mb-4">
             Join us to help others save lives and bring joy to families through your contribution of blood.
            </h5>
            <a class="btn btn-outline-dark btn-lg m-2" href="{{route('login.staff')}}"
              role="button" rel="nofollow">Login Staff</a>
            <a class="btn btn-outline-dark btn-lg m-2" href="{{route('index.home')}}"
               role="button">Login Donor</a>
          </div>
        </div>
      </div>
    </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>    
    
  </body>
</html>




