<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.name','HelloDoc')}}</title>
        <style>
            #heading {
    color: #343b48;
    margin: 0 auto;
    margin-top: 50px;
    text-align: center;
    padding-bottom: 30px;
    padding-top: 30px;
    margin-bottom: 30px;
}

body {
    font-family: sans-serif;
}

.home {
    width: 50%;
    float: left;
    padding-bottom: 50px;
    padding-top: 70px;
    color: white;
    text-align: center;
}

#cntr {
    max-width: 900px;
    margin: 0 auto;
    padding-top: 20px;
}

#patlog {
    background-color: #1ea160;
}

#doclog {
    background-color: #343b48;
}

.toptitle {
    display: inline-block;
}

#hellodoc {
    font-size: 40px;
    font-weight: bold;
}

#welcome {
    font-size: 30px;
    font-weight: 500;
}

h3 {
    font-weight: 900;
    font-size: 23px;
    margin-bottom: 30px;
}

h2 {
    margin: 8px;
    font-weight: 500;
    font-size: 27px;
}

h2 + h2 {
    margin-bottom: 50px;
}

.hbtn {
    padding-bottom: 10px;
    padding-top: 10px;
    padding-left: 60px;
    padding-right: 60px;
    margin: 40px auto;
    margin-top: 30px;
    border: 2px solid rgba(255,255,255,0.8);
    background-color: rgba(255,255,255,0.18);
    color: white;
    font-family: sans-serif;
}

a:hover {
    background-color: rgba(255,255,255,0.35);
}

a {
    text-decoration: none;
    font-family: sans-serif;
    font-weight: bold;
}
        </style>
    </head>
    <body>
        <div id="heading">
            <div class="toptitle" id="welcome">Welcome To  </div>
            <div class="toptitle"><img src="images/hdoc2.png" alt="HelloDoc"></div>
            <div class="toptitle" id="hellodoc"> HelloDoc</div>
        </div>
        <div id="cntr">
            <div id="patlog" class="home">
                <img src="images/pat.png" alt="Patient">
                <h3>I'm a patient</h3>
                <h2>Find your doctor and book</h2>
                <h2>an appointment online</h2>
                <a href="/patsignup" class="hbtn">Book now</a>
            </div>

            <div id="doclog" class="home">
                <img src="images/pra.png" alt="Practice">
                <h3>I'm a practice</h3>
                <h2>Connect to your patients</h2>
                <h2>and build loyalty</h2>
                <a href="/docsignup" class="hbtn">Learn More</a>
            </div>
        </div>
    </body>
</html>