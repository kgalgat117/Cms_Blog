<?php
ob_start();
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>


    <!-- Navigation -->
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php
                if(isset($_GET['post_id'])){
                    $post_id = $_GET['post_id'];
                    $datas = $database->select("posts","*",[
                        "post_id" => $post_id
                    ]);
                }
                foreach($datas as $data){
                    
                
                ?>
                

                <!-- Title -->
                <h1><?php echo $data["post_title"]; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $data["post_author"]; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $data["post_date"]; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $data["post_image"]; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $data["post_content"]; ?></p>

                <hr>
                
                <?php } ?>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                           <label for="comm_author">Name</label>
                            <input type="text" class="form-control" name="comm_author">
                        </div>
                          <div class="form-group">
                           <label for="comm_email">E-mail</label>
                            <input type="email" class="form-control" name="comm_email">
                        </div>
                           <div class="form-group">
                           <label for="comm_content">Comment</label>
                            <textarea class="form-control" rows="3" name="comm_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
                <?php 
                    if(isset($_POST['submit'])){
                        $database->insert("comments",[
                            "comment_post_id"=>$post_id,
                            "comment_author"=>$_POST['comm_author'],
                            "comment_email"=>$_POST['comm_email'],
                            "comment_content"=>$_POST['comm_content'],
                            "comment_status"=>"approved",
                            "comment_date"=>date('y-m-d')
                        ]);
                        $counts = $database->select("posts","*",["post_id"=>$post_id]);
                        foreach($counts as $count){
                            $cou = $count['post_comment_count'];
                        }
                        $cou++;
                        $data = $database->update("posts", [
                            "post_comment_count" => $cou
                        ], [
                            "post_id" => $post_id
                        ]);
                        header("location:post.php?post_id={$post_id}");
                    }
                ?>

                <hr>

                <!-- Posted Comments -->
                <?php
                    $comms = $database->select("comments","*",["comment_post_id"=>$post_id]);
                    foreach($comms as $comm){
                        
                    
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comm['comment_author']; ?>
                            <small><?php echo $comm['comment_date']; ?></small>
                        </h4>
                        <?php echo $comm['comment_content']; ?>
                    </div>
                </div>
                <?php } ?>

               <?php
                
                /*
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>
                */
                ?>

            </div>
            

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
     <?php include "includes/footer.php"; ?>
