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
                if(isset($_POST['submit']))
                {
                    $search = $_POST['search'];
                    if($search=="" || empty($search)){
                        echo "Field Cannot be Empty";
                    }
                    else
                    {
                $per_page = 6;
                $page_query = $database->count("posts");
                $pages = ceil($page_query/$per_page);
                $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                $start = ($page-1) * $per_page;
                $posts = $database->select("posts","*",["post_tags[~]"=>$search,"LIMIT"=>[$start, $per_page]]);
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
                }
                ?>
                    
                <!-- Pager -->
                <?php
                    $prev = $page - 1;
                    $next = $page + 1;
                ?>
                <ul class="pager">
                <?php
                if(!($prev<1)){
                    
                ?>
                
                    <li class="previous">
                        <a href="index.php?page=<?php echo $prev; ?>">&larr; Older</a>
                    </li>
                    <?php
                }
                    ?>
                    <?php 
                        if($pages >= 1){
                            for($x=1;$x<=$pages;$x++){
                                if($x==$page){
                                    echo "<b><a href='?page={$x}'>{$x} </a></b>";    
                                }
                                else{
                                echo "<a href='?page={$x}'>{$x} </a>";
                                }
                            }
                        } 
                    
                    ?>
                    <?php
                if(!($next>$pages)){
                    
                ?>
                    <li class="next">
                        <a href="index.php?page=<?php echo $next; ?>">Newer &rarr;</a>
                    </li>
                    <?php }}} ?>
                </ul>

            </div>
            

            <!-- Blog Sidebar Widgets Column -->
            

               

                <!-- Blog Categories Well -->
                <?php include "includes/sidebar.php"; ?>

        
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php"; ?>
