<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $pswd = $_POST['pswd'];
    $gender = $_POST['gender'];
    $phn = $_POST['phn'];
    $pemail = $_POST['pemail'];


    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "dp_portal";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO patient (P_EMAIL, PSWD, AGE, FNAME, LNAME, GENDER, PHONE) VALUES('" . $_POST['pemail'] . "','" . $_POST['pswd'] . "'," . $_POST['age'] . ",'" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['gender'] . "'," . $_POST['phn'] . ");";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);
?>


@php
            $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "dp_portal";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO patient (P_EMAIL, PSWD, AGE, FNAME, LNAME, GENDER, PHONE) VALUES('" . $_POST['pemail'] . "','" . $_POST['pswd'] . "'," . $_POST['age'] . ",'" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['gender'] . "'," . $_POST['phn'] . ");";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);
    @endphp