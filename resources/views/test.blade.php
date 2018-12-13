<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>LV</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/patternlock.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-4 m-auto text-center">
        <div class="card">
          <div class="card-header bg-success">
            <h4>PATTERN Login System</h4>
            <h5>Draw the correct pattern to get login</h5>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Enter Email Address" id="emailAddress">
              </div>
              <div class="form-group">
                <label>Pattern Password</label>
                <div id="patternPassword" class="m-auto"></div>
              </div>
              <button type="button" id="loginSubmitButton" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/patternlock.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
</body>
</html>
