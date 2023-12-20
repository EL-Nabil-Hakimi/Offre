<?php

if(isset($_GET["msgEmail"])){
    echo "
        <script> 
            alert('Email est deja existe'); 
        </script>
    ";
}
else if(isset($_GET["msgPass"])){

    echo "
        <script> 
            alert('La comfirmation de code est pas marche'); 
        </script>
    ";
}

?>



<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <link rel="stylesheet" href="assets/styles/registerstyle.css">
</head>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form action="?route=signUp" method="post"> 
            <div class="input-box">
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Create password" required>
            </div>
            <div class="input-box">
                <input type="password" name="c_password" placeholder="Confirm password" required>
            </div>
            <div class="policy">
                <input type="checkbox" required>
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" name="submit" value="Register Now">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="?route=login">Login now</a></h3>
            </div>
        </form>
    </div>
</body>

</html>