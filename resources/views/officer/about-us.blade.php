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
                <a class="nav-link ps-3 pe-1 text-white" aria-current="page" href="{{route('staff.requestDonor')}}"><i class="fa-solid fa-house p-1"></i>Home</a>
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
                <a class="nav-link  ps-3 pe-1 text-primary active" href="{{route('staff.aboutUs')}}">
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
            
            <div id="carouselExample" class="carousel">
              <div class="carousel-inner">
              </div>
            </div>

            <!-- About 1 - Bootstrap Brain Component -->
            <section class="py-3 py-md-5 py-xl-8">
                <div class="container">
                    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                        <div class="col-12 col-lg-6 col-xl-5">
                            <img class="img-fluid rounded" loading="lazy" src="./img/team.jpg" alt="">
                        </div>
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="row justify-content-xl-center">
                                <div class="col-12 col-xl-11">
                                    <h2 class="h1 mb-3">About Our Software Engineering Team</h2>
                                    <p class="lead fs-4 text-secondary mb-3">
                                        We are a passionate team of software engineers dedicated to building exceptional digital solutions.
                                        Our goal is to provide innovative and reliable software that meets the needs of our clients and users.
                                        We leverage cutting-edge technologies and best practices to deliver high-quality software products.
                                    </p>
                                    <p class="mb-5">
                                        At our core, we believe in the power of technology to transform businesses and improve lives.
                                        Whether it's developing robust web applications, creating scalable mobile solutions, or implementing
                                        cloud-based systems, our team is committed to excellence in software engineering.
                                    </p>
                                    <div class="row gy-4 gy-md-0 gx-xxl-5X">
                                        <div class="col-12 col-md-6">
                                            <div class="d-flex">
                                                <div class="me-4 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="mb-3">Innovative Solutions</h4>
                                                    <p class="text-secondary mb-0">We focus on crafting innovative software solutions that solve real-world challenges.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="d-flex">
                                                <div class="me-4 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                                                        <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="mb-3">Digital Excellence</h4>
                                                    <p class="text-secondary mb-0">We strive for digital excellence, ensuring our software meets the highest standards of quality and performance.</p>
                                                </div>
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