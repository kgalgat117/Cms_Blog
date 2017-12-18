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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Post Id</th>
                                    <th>Status</th>
                                    <th>Contents</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $posts = $database->select("comments","*");
                                foreach($posts as $datas){
                                    $datss = $database->select("posts","*",["post_id"=>$datas['comment_post_id']]);
                                    foreach($datss as $dss){
                                        if($dss["post_author"]==$_SESSION['username']){
                                     
                                    ?>
                                
                                <tr>
                                    <td><?php echo $datas['comment_id']; ?></td>
                                    <td><?php echo $datas['comment_author']; ?></td>
                                    <td><?php echo $datas['comment_email']; ?></td>
                                    <td><?php echo $datas['comment_post_id']; ?></td>
                                    <td><?php echo $datas['comment_status']; ?></td>
                                    <td><?php echo $datas['comment_content']; ?></td>
                                    <td><?php echo $datas['comment_date']; ?></td>
                                    <td><a href="comments.php?delete=<?php echo $datas['comment_id']; ?>">Delete</a></td>
                                </tr>
                                    <?php }}} ?>
                                    <?php
                                if(isset($_GET['delete'])){
                                    $id=$_GET['delete'];
                                    $database->delete("comments",[
                                        "AND"=>[
                                            "comment_id"=>$id
                                        ]
                                    ]);
                                    header("Location: comments.php");
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