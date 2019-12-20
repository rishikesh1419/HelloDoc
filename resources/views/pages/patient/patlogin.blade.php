
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelloDoc</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/patlogin.css">
    <link rel="stylesheet" href="css/app.css">


    <style>
        .container {
        padding-bottom:0px;
        margin-top: 7px;
    }

    .login-form {
        padding:70px;
    }

    .signup-form {
        padding-bottom: 20px;
    }

    .form-check {
        margin-bottom: 0px;
    }

    form input {
        margin-bottom: 15px;
    }

    td {
        vertical-align: middle;
    }
    td input {
        vertical-align: top;
         
    }
    td label {
        margin-left: 3px;
    }
    </style>
</head>
<body>

    <div class="main">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="margin-bottom:0px; background-color: #1ea160">
                    <div style="margin-left: 120px;">
                        <a href="/patdash" class="navbar-left"><img src="images/hdoc2.png" style="margin-right:10px; margin-left:5px;"></a>
                        <a class="navbar-brand" href="/patash">HelloDoc</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
                            </li>
                            <li>
                            </li>
                            
                          </ul>
                          <form class="form-inline my-2 my-lg-0" action="/drsearch" style="margin-right:200px;" method="POST">
                            
                          </form>
                          {{-- <span style="margin-left: 20px;"></span>
                          <a href="/patdash"><button class="navbar-right btn btn-light">Dashboard</button></a> --}}
                          {{-- <form action="/plogout">
                            <input type="submit" class="navbar-right btn btn-light" style="margin-left:20px;" value="Logout">
                          </form> --}}
                        </div>
                    </div>
                      </nav>

        <div class="container" style="width:35%; height:80%; float:left; margin-left:120px; margin-top:100px;">
            <form method="POST" class="login-form" action="/logincheck">
                <h2>LOGIN</h2>
                <div class="form-group-1">

                        <input type="email" name="pemail" placeholder="Enter Email ID">
                        <input type="password" name="pswd" placeholder="Enter Password">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                </div>
                <div class="form-submit">
                    <input type="submit" class="btn btn-primary" value="Login" />
                </div>
                <a style="margin-left:60px;" href="/patsignup">New User? Sign Up For Free!</a>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>