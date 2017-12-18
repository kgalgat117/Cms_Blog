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
                            <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>
                      <?php 
                        if(isset($_GET['view'])){
                            $id = $_GET['view'];
                            $database->update("messages",["msg_view"=>"1"],["msg_id"=>$id]);
                            $msgs = $database->select("messages","*",["msg_id"=>$id]);
                            foreach($msgs as $msg){
                         
                        ?>
                        <h3>
                        <label for="" class="label label-primary">From : <?php echo $msg['msg_from']; ?></label>
                        </h3>
                        
                        <h3>
                        <label for="" class="label label-primary">Title : <?php echo $msg['msg_title']; ?></label>
                        </h3>
                        <h3>
                        <label for="" class="label label-primary">Date : <?php echo $msg['msg_date']; ?></label>
                        </h3>
                        <h3>
                        <label for="" class="label label-primary">Content : <?php echo $msg['msg_content']; ?></label>
                        </h3>
                        <?php }} ?>
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