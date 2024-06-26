<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script defer src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">TODA System</h2>
            <div class="text-center mb-5 text-dark">___________</div>
            <div class="card my-5">

              <form class="card-body cardbody-color p-lg-5">

                <div class="text-center">
                  <img src="{{ asset('images/TrikGo-logo.png') }}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-5"
                    width="200px" alt="profile">
                </div>

                <div class="mb-3">
                  <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                    placeholder="User Name">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" id="password" placeholder="password">
                </div>
                <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                  Registered? <a href="#" class="text-dark fw-bold"> Create an
                    Account</a>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

</body>
</html>
