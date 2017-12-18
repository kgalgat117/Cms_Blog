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
                            $title = trim($title);
                            $content = $_POST['message_content'];
                            $content = trim($content);
                            $date = date('y-m-d');
                            $to = $_POST['to'];
                            $data = $database->insert("messages",[
                                "msg_title"=>$title,
                                "msg_to"=>$to,
                                "msg_from"=>$_SESSION['username'],
                                "msg_content"=>$content,
                                "msg_date"=>$date
                            ]);
                            header("location:message_send.php");
                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                               <label for="to">Send To</label>
                               <input name="to" type="text" class="form-control" required>
                           </div>
                              <div class="form-group">
                               <label for="title">Message Title</label>
                               <input name="title" type="text" class="form-control" required>
                           </div>
                            <div class="form-group">
                                <label for="message_content">Message Content</label>
                                <textarea class="form-control" name="message_content" id="" cols="30" rows="10" required>
                                </textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Send">
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