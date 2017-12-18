<?php
session_start();
ob_start();
include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="register.php" method="post" id="login-form" name="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">First Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
                        </div>
                           <div class="form-group">
                            <label for="username" class="sr-only">Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
                        </div>
                           <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="uname" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" onclick="validatePassword()" value="Register">
                    </form>
                 <?php 
                    if(isset($_POST['submit'])){
                        $database->insert("users",[
                            "user_firstname"=>$_POST['fname'],
                            "user_lastname"=>$_POST['lname'],
                            "user_email"=>$_POST['email'],
                            "username"=>$_POST['uname'],
                            "user_password"=>md5($_POST['password']),
                            "role"=>"user",
                            "randSalt"=>"dsfsdf"
                        ]);
                        //
                        if(strlen($database->error()[2]) == 0){
                            //
                            echo "you have successfully registered";
                            //exit;
                        }else{
                            echo $database->error()[2];
                            //exit;
                        }
                        //header("location:register.php");
                    }
                    ?>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>