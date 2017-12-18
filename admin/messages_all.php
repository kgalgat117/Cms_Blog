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
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>From</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $posts = $database->select("messages","*",["msg_to"=>$_SESSION['username']]);
                                foreach($posts as $datas){
                                    ?>
                                
                                <tr>
                                    <td><?php echo $datas['msg_id']; ?></td>
                                    <td><?php echo $datas['msg_from']; ?></td>
                                    <td><?php echo $datas['msg_title']; ?></td>
                                    <td><?php echo $datas['msg_content']; ?></td>
                                    <td><?php echo $datas['msg_date']; ?></td>
                                    <td><a href="messages_all.php?delete=<?php echo $datas['msg_id']; ?>">Delete</a></td>
                                    <td><a href="message_view.php?view=<?php echo $datas['msg_id']; ?>">View</a></td>
                                </tr>
                                    <?php } ?>
                                    <?php
                                if(isset($_GET['delete'])){
                                    $id=$_GET['delete'];
                                    $database->delete("messages",[
                                        "AND"=>[
                                            "msg_id"=>$id
                                        ]
                                    ]);
                                    header("Location: messages_all.php");
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