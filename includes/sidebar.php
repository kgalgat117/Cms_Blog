 <!-- Blog Search Well -->
               <div class="col-md-4">
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search Here" required>
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                 <?php
                   if(empty($_SESSION['username'])){
                       
                   ?>
                 <div class="well">
                    <h4>Login Here</h4>
                    <form action="login.php" method="post">
                    <div class="form-group">
                       <input name="username" type="text" class="form-control" placeholder="Enter UserName" required>
                    </div>    
                      <div class="input-group">
                       
                        <input name="password" type="password" class="form-control" placeholder="Enter Password" required>
                        <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" type="submit">
                                Login
                        </button>
                        </span>
                    
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                 <?php } ?>
                  
                   <div class="well">
                    <h4>Just Type Your Name And Listen...</h4>
                    <div class="row">
                       
                           <iframe src="//typatone.com" width="350" height="560" frameborder="0" border="0" style="border: 6px solid #ccc; border-radius: 3px;"></iframe>
                       
                        <!-- /.col-lg-6 -->
                    
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
<!--
                <div class="well">
                    <h4></h4>
                                         <div class="row">

                      
                </div>
 </div>
-->
            </div>
