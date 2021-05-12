<?php 
 require('./db.php');
    
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
       
        $name = $_POST['name'];
        $other = $_POST['other'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $photoName = $_FILES['photo']['name'];

        //process the photo
        $destination = '../asset/photo/';

        //validate image
        $accepted_image = ['jpg', 'png', 'gif', 'jpeg'];
        $ext = explode('.', $_FILES['photo']['name']);
       if(!in_array(end($ext), $accepted_image)){
            echo "<script>alert('Only Images Are Accepted')</script>";
            header('location:registration.php');
            // exit();
       }
       if(strlen($_POST['pass']) < 6){
        echo "<script>alert('password is too short')</script>";
        // exit();
       }else{
       //post data to the database
       $sql = "INSERT INTO `staff`(`surname`, `other_name`, `email`, `password`, `photo`, `phone`, `address`, `dob`) 
                VALUES ('$name', '$other','$email', '$pass', '$photoName', '$phone', '$address', '$dob')";
        $execute = mysqli_query($conn, $sql);
        if($execute){
            echo "<script>alert('Record Inserted Successfully')</script>";
            move_uploaded_file($_FILES['photo']['tmp_name'], $destination.$photoName);
            header('location:login.php');
        }else{
            echo "<script>alert('Unable to Insert record')</script>";
        }
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
                        <h2 class="text-white text-center">Register A Staff</h2>
                    </div>
                    <div class="card body">
                            <div class="row p-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        PHOTO:<input type="file"  required placeholder="Photo"  name="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text"  required placeholder="Surname"  name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text"  required placeholder="Othername"  name="other" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text"  required placeholder="Email"  name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text"  required placeholder="Password"  name="pass" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date"  required placeholder="Date Of Birth"  name="dob" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text"  required placeholder="Phone Number"  name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="address" id="" placeholder="Enter Staff Address" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" name="submit" type="submit">Save User</button>
                                </div>
                            </div>
                            <p> If you already Have an account please <a href="login.php">LogIN</a></p>
                        </div>
                    </form>
                </div>
            </div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate dolorum provident nostrum architecto in nihil, est, optio tempore iusto error omnis voluptates numquam deleniti. Velit sed culpa soluta tenetur incidunt.
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>