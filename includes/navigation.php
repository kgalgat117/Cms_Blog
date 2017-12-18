 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                   <?php 
                    $cats = $database->select("categories", "*");
                    foreach($cats as $data){
                        echo "
                    <li>
                        <a href='categories.php?cat_id={$data["cat_title"]}'>{$data["cat_title"]}</a>
                    </li>";
                    }
                    ?>
                       </ul>
                       <ul class="navbar-nav nav top-nav navbar-right">
                       
                       <?php 
                            if(empty($_SESSION['username'])){
                                ?>
                                
                                
                                     <li>
                                        <a href="register.php"><span class="label label-default">Create an Account?Click Here</span></a>
                                    </li>
                                
                                
                                
                                <?php
                            }
                else{
                        ?>
                        
                    <li>
                <a href="admin/index.php">Admin</a>
                </li>
                    <li class="dropdown navbar-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . " " ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                
                    <?php } ?>
                    </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>