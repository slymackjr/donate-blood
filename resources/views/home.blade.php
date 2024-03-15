<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Donation</title>
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
      /* CSS style to set background image for the div */
      .background-image {
          background-image: url('img/card1.png'); /* URL of the image */
          background-size: cover; /* Cover the entire background */
          background-position: center; /* Center the background image */
      }
  </style>
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
                  <div class="card text-black  background-image" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                      <div class="row justify-content-center">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome to the Blood donation platform.</p>
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                          <div class="text-black">
                            <h5 class="mb-4">
                             Join us to help others save lives and bring joy to families through your contribution of blood.
                            </h5>
                            <a class="btn btn-outline-dark btn-lg m-2" href="{{route('login.staff')}}"
                              role="button" rel="nofollow">Login Staff</a>
                            <a class="btn btn-outline-dark btn-lg m-2" href="{{route('login.donor')}}"
                               role="button">Login Donor</a>
                          </div>
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




