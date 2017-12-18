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
                        if(isset($_POST['submit'])){
                            $title = $_POST['title'];
                            $cat_id = $_POST['post_category_id'];
                            $author = $_SESSION['username'];
                            $status = $_POST['post_status'];
                            $tags = $_POST['post_tags'];
                            $image = $_FILES['image']['name'];
                            $image_temp = $_FILES['image']['tmp_name'];
                            $content = $_POST['post_content'];
                            $date = date('y-m-d');
                            $comment_count = 4;
                            move_uploaded_file($image_temp,"../images/$image");
                            $data = $database->insert("posts",[
                               "post_category_id"=>$cat_id,
                                "post_title"=>$title,
                                "post_author"=>$author,
                                "post_date"=>$date,
                                "post_image"=>$image,
                                "post_content"=>$content,
                                "post_tags"=>$tags,
                                "post_comment_count"=>$comment_count,
                                "post_status"=>$status
                            ]);
                            header("location:add_post.php");
                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                               <label for="title">Post Title</label>
                               <input name="title" type="text" class="form-control" required>
                           </div>
                            <div class="form-group">
                                <label for="post_category_id">Post Category</label>
                                <input name="post_category_id" type="text" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="post_status">Post Status</label>
                                <input name="post_status" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="post_tags">Post Tags</label>
                                <input name="post_tags" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="post_content">Post Content</label>
                                <textarea class="form-control" name="post_content" id="" cols="30" rows="10" required>
                                </textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Publish Post">
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php
        include "includes/footer.php";
?>