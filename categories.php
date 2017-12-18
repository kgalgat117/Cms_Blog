<?php
session_start();
include "includes/db.php";
?>
<?php
include "includes/header.php";
?>
    <!-- Navigation -->
   <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
<!--
                <h1 class='page-header'>
                    Page Heading
                    <small>Secondory Heading</small>
                </h1>
-->
                <?php
                if(isset($_GET['cat_id'])){
                    $cat_id=$_GET['cat_id'];
                $posts = $database->select("posts","*",["post_category_id"=>$cat_id]);
                foreach($posts as $data){
                    
                    echo "
                

                <!-- First Blog Post -->
                <h2>
                    <a href='post.php?post_id={$data["post_id"]}'>{$data["post_title"]}</a>
                </h2>
                <p class='lead'>
                    by <a href='index.php'>{$data["post_author"]}</a>
                </p>
                <p><span class='glyphicon glyphicon-time'></span> Posted on {$data["post_date"]}</p>
                <hr>
                <img class='img-responsive' src='images/{$data["post_image"]}' alt=''>
                <hr>
                <p>{$data["post_content"]}</p>
                <a class='btn btn-primary' href='post.php?post_id={$data["post_id"]}'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                <hr>" ;
                }}
                ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
            

            <!-- Blog Sidebar Widgets Column -->
            

               

                <!-- Blog Categories Well -->
                <?php include "includes/sidebar.php"; ?>

        
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php"; ?>
