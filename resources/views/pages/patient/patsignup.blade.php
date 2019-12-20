<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelloDoc</title>

    
    <!-- Main css -->
    <link rel="stylesheet" href="css/patstyle.css">
    <link rel="stylesheet" href="css/app.css">
    <style>

    form * {
        margin-bottom:10px;
    }
    .container {
        padding-bottom:0px;
        margin-top: 7px;
    }

    .signup-form {
        padding-bottom: 30px;
    }

    .form-check {
        margin-bottom: 0px;
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
                        <a class="navbar-brand" href="/patdash">HelloDoc</a>
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

        <div class="container" style="width:35%; height:80%; float:left; margin-left:120px; ">
            <form method="POST" class="signup-form" action="/newdoc">
                <h2>SIGNUP</h2>
                <div class="form-group-1">

                    <input type="text" name="fname" id="fname" placeholder="First Name" required />

                    <input type="text" name="lname" id="lname" placeholder="Last Name" required />
                    <table>
                    <tr>
                        <td><input type="radio" name="gender" value="M" style="display:inline;"></td>
                        <td><label for="gender">Male</label></td>
                    </tr> 
                    <tr>
                    <td><input type="radio" name="gender" value="F" style="display:inline;"></td>
                    <td><label for="gender">Female </label></td>
                    </tr>
                    </table>
                    
                    <input type="number" name="age" placeholder="Age" required />

                    <input type="number" name="phn" placeholder="Phone Number" required />

                    <input type="email" name="pemail" placeholder="Email ID" required />

                    <input type="password" name="pswd" placeholder="Enter Password" required />
                    
                </div>
                
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="SIGN UP" style="margin:0 auto;"/>
                </div>

                <a href="/patlogin" style="margin-left:70px;">Already registered? Login!</a>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
</body>
</html>