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
                        if(isset($_GET['edit'])){
                            $edit_id = $_GET['edit'];
                            $datas = $database->select("posts","*");
                            foreach($datas as $data)
                            if($data['post_id']==$edit_id){
                            
                                $title = $data['post_title'];
                            $cat_id = $data['post_category_id'];
                            $author = $data['post_author'];
                            $status = $data['post_status'];
                            $tags = $data['post_tags'];
                            $image = $data['post_image'];
                        
                            $content = $data['post_content'];
                            $date = $data['post_date'];
                            $comment_count = $data['post_comment_count'];
                            
                        
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                               <label for="title">Post Title</label>
                               <input value="<?php echo $title; ?>" name="title" type="text" class="form-control" required>
                           </div>
                            <div class="form-group">
                                <label for="post_category_id">Post Category Id</label>
                                <input value="<?php echo $cat_id; ?>" name="post_category_id" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="post_category_id">Post Author</label>
                                <input value="<?php echo $author; ?>" name="post_author" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="post_status">Post Status</label>
                                <input value="<?php echo $status;?>" name="post_status" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="post_tags">Post Tags</label>
                                <input value="<?php echo $tags;?>" name="post_tags" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <img width="100" src="../images/<?php echo $image;?>" alt="">
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="post_content">Post Content</label>
                                <textarea class="form-control" name="post_content" id="" cols="30" rows="10" required><?php echo $content;?>
                                </textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" name="update" value="Update Post">
                        </form>
                        
                        <?php }} ?>
                        <?php
                        if(isset($_POST['update'])){
                             $title = $_POST['title'];
                            $cat_id = $_POST['post_category_id'];
                            $author = $_POST['post_author'];
                            $status = $_POST['post_status'];
                            $tags = $_POST['post_tags'];
                            $image = $_FILES['image']['name'];
                            $image_temp = $_FILES['image']['tmp_name'];
                            $content = $_POST['post_content'];
                            $date = date('y-m-d');
                            $comment_count = 4;
                            move_uploaded_file($image_temp,"../images/$image");
                            
                            if(empty($image)){
                                $imgs = $database->select("posts","*");
                                foreach($imgs as $fas){
                                    $image = $fas['post_image'];
                                }
                            }
                            
                            $data = $database->update("posts", [
                                "post_category_id"=>$cat_id,
                                "post_title"=>$title,
                                "post_author"=>$author,
                                "post_date"=>$date,
                                "post_image"=>$image,
                                "post_content"=>$content,
                                "post_tags"=>$tags,
                                "post_comment_count"=>$comment_count,
                                "post_status"=>$status
                            ], [
                                "post_id" => $edit_id 
                            ]);
                            
                            header("Location:post.php");
                            
                        }
                        ?>
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