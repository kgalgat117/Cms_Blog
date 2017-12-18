<?php
include "includes/session.php";
ob_start(); ?>
<?php
include "includes/db.php";
include "includes/header.php";
?>
    
        <!-- Navigation -->
        <?php
            include "includes/navigation.php";
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the admin
                            <small><?php echo $_SESSION['firstname'] ?></small>
                        </h1>
                        
                        <div class="col-xs-6">
                           <?php
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];
                                    if($cat_title=="" || empty($cat_title)){
                                        echo "Field can not be Empty";
                                    } else{
                                        $database->insert("categories",["cat_title"=>$cat_title]);
                                    }
                                header("Location:categories.php");
                            }
                            ?>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat_title">Add Categories</label>
                                    <input type="text" name="cat_title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                            </form>
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat_title">Edit Categories</label>
                                   <?php
                                    if(isset($_GET['edit'])){
                                        $cat_id = $_GET['edit'];
                                        $cats = $database->select("categories","*");
                                        foreach($cats as $datas){
                                            if($datas['cat_id']==$cat_id){
                                                ?>
                                                <input value='<?php echo $datas["cat_title"]; ?>' type='text' name='cat_title1' class='form-control' required>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <?php
                            if(isset($_POST['update'])){
                                $cat_title1 = $_POST['cat_title1'];
                                if($cat_title1=="" || empty($cat_title1)){
                                    echo "Field can not be Empty";
                                } else{
                                    $data = $database->update("categories", [
                                        "cat_title" => $cat_title1
                                    ], [
                                        "cat_id" => $cat_id
                                    ]);
                                header("Location:categories.php");
                                }
                            
                            }
                            ?>
                                    
                                </div>
                                <div class="form-group">
                            
                                    <input type="submit" class="btn btn-primary" name="update" value="Edit Category">
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                               <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    $cats = $database->select("categories","*");
                                    foreach($cats as $datas){
                                        ?>
                                    
                                    <tr>
                                        <td><?php echo $datas["cat_id"]; ?></td>
                                        <td><?php echo $datas["cat_title"]; ?></td>
                                        <td><a href="categories.php?delete=<?php echo $datas['cat_id']; ?>">Delete</a></td>
                                        <td><a href="categories.php?edit=<?php echo $datas['cat_id']; ?>">Edit</a></td>
                                    </tr>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                    if(isset($_GET['delete'])){
                                        $cat_id = $_GET['delete'];
                                        $database->delete("categories", [
                                            "AND" => [
                                                "cat_id" => $cat_id  
                                            ]
                                        ]);
                                    header("Location: categories.php");
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        
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