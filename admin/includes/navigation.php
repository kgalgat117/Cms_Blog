<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                <a href="../index.php">HOME</a>
                </li>
                   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                       
                       <?php 
                            $msgs = $database->select("messages","*",["msg_to"=>$_SESSION['username'],"msg_view"=>"0"]);
                            foreach($msgs as $msg){
                            
                        ?>
                        <li class="message-preview">
                            <a href="message_view.php?view=<?php echo $msg['msg_id']; ?>">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong><?php echo $msg['msg_from']; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i><?php echo $msg['msg_date']; ?></p>
                                        <p><?php echo $msg['msg_content']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                        
                        <li class="message-footer">
                            <a href="messages_all.php">Read All Messages</a>
                        </li>
                    </ul>
                </li>
<!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . " " ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="messages_all.php"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
<!--
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
-->
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts" class="collapse">
                            <li>
                                <a href="post.php">View All Posts</a>
                            </li>
                            <li>
                                <a href="add_post.php">Add New Post</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        $ads = $database->select("users","*",["username"=>$_SESSION['username']]);
                        foreach($ads as $ad){
                            if($ad['role']=="admin"){
                         
                    ?>
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    <?php }} ?>
                    <li class="active">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <?php
                        $ads = $database->select("users","*",["username"=>$_SESSION['username']]);
                        foreach($ads as $ad){
                            if($ad['role']=="admin"){
                         
                    ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="user.php">View All Users</a>
                            </li>
                            <li>
                                <a href="user_add.php">Add Users</a>
                            </li>
                        </ul>
                    </li>
                    <?php }} ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#messages"><i class="fa fa-fw fa-arrows-v"></i> Messages <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="messages" class="collapse">
                            <li>
                                <a href="messages_all.php">View All Messages</a>
                            </li>
                            <li>
                                <a href="message_send.php">Send New Message</a>
                            </li>
                        </ul>
                    </li>
                       <li>
                        <a href="profile.php"><i class="fa fa-fw fa-wrench"></i> Profile</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>