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
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th>RandSalt</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $users = $database->select("users","*");
                                foreach($users as $datas){
                                    ?>
                                
                                <tr>
                                    <td><?php echo $datas['user_id']; ?></td>
                                    <td><?php echo $datas['username']; ?></td>
                                    <td><?php echo $datas['user_firstname']; ?></td>
                                    <td><?php echo $datas['user_lastname']; ?></td>
                                    <td><?php echo $datas['user_password']; ?></td>
                                    <td><?php echo $datas['user_email']; ?></td>
                                    <td><?php echo $datas['user_image']; ?></td>
                                    <td><?php echo $datas['role']; ?></td>
                                    <td><?php echo $datas['randSalt']; ?></td>
                                    <td><a href="user.php?delete=<?php echo $datas['user_id']; ?>">Delete</a></td>
                                    
                                </tr>
                                    <?php } ?>
                                    <?php
                                if(isset($_GET['delete'])){
                                    $id=$_GET['delete'];
                                    $database->delete("users",[
                                        "AND"=>[
                                            "user_id"=>$id
                                        ]
                                    ]);
                                    header("Location: user.php");
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