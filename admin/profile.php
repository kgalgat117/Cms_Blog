<?php
include "includes/session.php";
ob_start();
?>
<?php
include "includes/db.php";
    include "includes/header.php";
     include "includes/navigation.php";
?>

        <!-- Navigation -->
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the admin
                            <small><?php echo $_SESSION['firstname'] ?></small>
                        </h1>
                    
                       
                        <?php
                            $vals = $database->select("users","*",["username"=>$_SESSION['username']]);
                        foreach($vals as $val){
                        
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                               <label for="title">First Name</label>
                               <input value="<?php echo $val['user_firstname']; ?>" name="title" type="text" class="form-control">
                           </div>
                            <div class="form-group">
                                <label for="post_category_id">Last Name</label>
                                <input name="post_category_id" type="text" value="<?php echo $val['user_lastname']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="post_author">UserName</label>
                                <input value="<?php echo $val['username']; ?>" name="post_author" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="post_status">Email</label>
                                <input value="<?php echo $val['user_email']; ?>" name="post_status" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="post_tags">Passwords</label>
                                <input value="<?php echo $val['user_password']; ?>" name="post_tags" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="post_image">User Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="post_date">Role</label>
                                <input value="<?php echo $val['role']; ?>" name="post_date" type="text" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-primary" name="update" value="Update Profile">
                        </form>
                        <?php } ?>
                    </div>
                </div>
                 <?php
                        if(isset($_POST['update'])){
                            $title = $_POST['title'];
                            $cat_id = $_POST['post_category_id'];
                            $author = $_POST['post_author'];
                            $status = $_POST['post_status'];
                            $tags = $_POST['post_tags'];
                            $image = $_FILES['image']['name'];
                            $image_temp = $_FILES['image']['tmp_name'];
                            $content = "dfdgfdg";
                            $date = $_POST['post_date'];
                            move_uploaded_file($image_temp,"../images/$image");
                            $data = $database->update("users",[
                               "user_lastname"=>$cat_id,
                                "user_firstname"=>$title,
                                "username"=>$author,
                                "role"=>$date,
                                "user_image"=>$image,
                                "randSalt"=>$content,
                                "user_password"=>$tags,
                                "user_email"=>$status
                            ],["username"=>$_SESSION['username']]);
                            header("location:index.php");
                        }
                        ?>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php
        include "includes/footer.php";
?>