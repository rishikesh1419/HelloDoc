<!DOCTYPE html>
<html>
    <head>
        <title>HelloDoc</title>
        <link rel="stylesheet" href="css/app.css">
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
        <style>
            
            .sidenav {
    height: 100%; /* Full-height: remove this if you want "auto" height */
    width: 250px; /* Set the width of the sidebar */
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    background-color: #d8d3ff; /* Black #c4ffd7 #1ea1601a */
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: px;
}

.midblock {
  width: 50%;
  border: 2px solid black;
  margin-left: 300px;
  margin-bottom: 20px;
}

.pagehead {
  /* margin-top: 100px; */
  margin-bottom: 50px;
  margin-left: 300px;
}

.sidenav a {
    margin: 0 auto;
    margin-bottom: 10px;
    margin-top: 10px;
    border: 2px solid #343b48;
    width: 200px;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
    color: #343b48;
    display: block;
}

.sidenav div {
    text-align: center;
}

.sidenav a:hover {
  background-color: #aca7d3;
}

/* Style page content */
.main {
    margin-left: 160px; /* Same as the width of the sidebar */
    padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
} 
        </style>

    </head>
    <body>
                  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:0px;">
                    <div class="container">
                        <a href="#" class="navbar-left"><img src="images/hdoc2.png" style="margin-right:10px; margin-left:5px;"></a>
                        <a class="navbar-brand" href="#">HelloDoc</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                            </li>
                            </li>
                            
                          </ul>
                          <form class="form-inline my-2 my-lg-0" style="margin-right:200px;">
                            </form>
                          <span style="margin-left: 20px;"></span>
                          <a href="/docdash"><button class="navbar-right btn btn-light">Dashboard</button></a>
                          <form action="/dlogout">
                            <input type="submit" class="navbar-right btn btn-light" style="margin-left:20px;" value="Logout">
                          </form>
                        </div>
                    </div>
                      </nav>
                      <div class="container" style="top:0px;">
        <div class="sidenav">
            <div style="font-size: 20px; margin-top:100px; margin-bottom:30px;">
            <span>Dr. {{ session()->get('FNAME','Error') }} {{ session()->get('LNAME','Error') }}</span>
                <br>
                <span>{{session()->get('D_EMAIL','Error')}}</span>
                <br>
                <span>{{session()->get('D','Error')}} ( {{session()->get('SPL','Error')}} ) </span>
                <br>
                <span>{{session()->get('E','Error')}} yrs. experience</span>
            </div>
            <hr style="color:black; background-color:black; height:1px; border:none; width:90%;">
            <div style="margin-bottom:40px;"></div>
            <a href="/docpastapt">Past Appointments</a>
        </div>
        <p class="pagehead">
          <br>
          <br>
          <br>
          <h2 style="margin-left:300px;">Past Appointments</h2></p>
        

          @foreach(session()->get('apts','Error') as $apt)
          <div class="card w-50" style="margin-left:300px; margin-bottom:20px;">
            <div class="card-header">
            {{$apt['D']}} <span style="float:right;">Slot: {{ $apt['T'] }}</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Patient: {{$apt['Pna']}}</h5>
            <p class="card-text">{{ $apt['Cna'] }}</p>
            </div>
          </div>
        @endforeach


       


        <div>

        </div>
        <footer><span style="bottom:0; float:right; position:fixed; margin-left:15px;">    © 2018 HelloDoc Online Pvt Ltd</span></footer>
      </div> {{-- container ends --}}

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>