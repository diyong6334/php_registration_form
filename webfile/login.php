<?php 
 require('./db.php');
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
       
       
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $destination = '../asset/photo/';
       //post data to the database
        $sql = "SELECT * FROM staff WHERE email = '$email' AND password = '$pass'";
        $execute = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($execute);
        if($check > 0){
           $_SESSION['all'] = mysqli_fetch_all($execute, MYSQLI_ASSOC);
           header('location:dashboard.php');
        }else{
            echo "<script>alert('invalid Login Parameters')</script>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style>
    /* body {
        background:#9378c3;
    } */

    </style>
</head>
<body>
    <nav class="navbar navbar-inverse bg-info mb-5">
        <img src="../asset/images/cloud.png" alt="" class="rounded" height="50px">
        <div class="container">
            <h1 class="text-white text-center">Welcome To NewHorizons Registration Platform</h1>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header bg-info ">
                        <h2 class="text-white text-center">Login </h2>
                    </div>
                    <div class="card body">
                            <div class="row p-3">
                               
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <input type="text"  required placeholder="Email"  name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <input type="text"  required placeholder="Password"  name="pass" class="form-control">
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" name="submit" type="submit">Login</button>
                                </div>
                            </div>
                            <p> if you do not have an account Please <a href="registration.php">Register</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>