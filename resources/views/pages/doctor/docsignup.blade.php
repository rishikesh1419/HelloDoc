<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HelloDoc</title>

    
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/app.css">
    <style>
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

    form * {
        margin-bottom: 10px;
    }
    </style>
</head>
<body>

    <div class="main">
        

            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                    <div style="margin-left:120px;">
                        <a href="#" ><img src="images/hdoc2.png" style="margin-right:10px; margin-left:5px;"></a>
                        <a class="navbar-brand" href="#">HelloDoc</a>
                    </div>
                      </nav>


        <div class="container" style="width:35%; height:80%; float:left; margin-left:120px; ">
            <form method="POST" class="signup-form" id="signup-form" action="/newdoc">
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
                    <input type="text" name="spl" id="spl" placeholder="Specialization" required />
                    <input type="text" name="d1" placeholder="Degree" required />
                    <input type="text" name="exp" placeholder="Experience (Years)" required />
                    <input type="number" name="fees" placeholder="Approx Fees" required />
                    <input type="number" name="cid" placeholder="Clinic ID" required />
                    <input type="email" name="demail" placeholder="Email ID" required />
                    <input type="password" name="pswd" placeholder="Password" required />
                    
                </div>
                
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="SIGN UP" style="margin:0 auto;"/>
                </div>

                <a href="/doclogin" style="margin-left:70px;">Already registered? Login!</a>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
</body>
</html>