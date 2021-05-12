<?php 
 require('./db.php');
    session_start();
    if($_SESSION['all']==''){
        header('location:login.php');
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        session_destroy();
        header('location:login.php');
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
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">    
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style>
    /* body {
        background:#9378c3;
    } */
    .pull{
        position:absolute;
        right:0px;
        bottom:-20px;
        color:red;
        font-weight:bolder;
    }

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
            <div class="col-md-3"></div>
            <div class="col-md-6">
        <button class="btn btn-success" onclick="window.print()">Print <i class="fa fa-print"></i></button>
                <div class="card">
                    <div class="card-header bg-info ">
                        <h2 class="text-white text-center">Staff's Dashboard</h2>
                    </div>
                    <div class="card body">
                            <div class="row p-3">
                                <img src="../asset/photo/<?=$_SESSION['all'][0]['photo']?>" alt="" height="400px" class="rounded img-responsive w-100">
                                <p class="pull"><?=$_SESSION['all'][0]['email']?></p>
                            </div>
                        </div>
                        <div class="card-footer bg-info">
                            <div class="col-md-12 text-white text-center">
                                <h3><?=$_SESSION['all'][0]['surname'].' '.$_SESSION['all'][0]['other_name']?></h3>
                            </div>
                        </div>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-danger mt-5 p-2">LogOut</button>
                        </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>