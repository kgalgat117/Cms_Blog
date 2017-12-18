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
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $posts = $database->select("posts","*",["post_author"=>$_SESSION['username']]);
                                foreach($posts as $datas){
                                    ?>
                                
                                <tr>
                                    <td><?php echo $datas['post_id']; ?></td>
                                    <td><?php echo $datas['post_author']; ?></td>
                                    <td><?php echo $datas['post_title']; ?></td>
                                    <td><?php echo $datas['post_category_id']; ?></td>
                                    <td><?php echo $datas['post_status']; ?></td>
                                    <td><?php echo $datas['post_image']; ?></td>
                                    <td><?php echo $datas['post_tags']; ?></td>
                                    <td><?php echo $datas['post_comment_count']; ?></td>
                                    <td><?php echo $datas['post_date']; ?></td>
                                    <td><a href="post.php?delete=<?php echo $datas['post_id']; ?>">Delete</a></td>
                                    <td><a href="edit_post.php?edit=<?php echo $datas['post_id']; ?>">Edit</a></td>
                                </tr>
                                    <?php } ?>
                                    <?php
                                if(isset($_GET['delete'])){
                                    $id=$_GET['delete'];
                                    $database->delete("posts",[
                                        "AND"=>[
                                            "post_id"=>$id
                                        ]
                                    ]);
                                    header("Location: post.php");
                                }
                                ?>
                            </tbody>
                        </table>
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