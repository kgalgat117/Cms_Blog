<?php
ob_start();
include "includes/db.php";
session_start();
?>
<?php
if(isset($_POST['login'])){
    $count = $database->count("users",["username"=>$_POST['username']]);
    if($count!=0){
        $datas = $database->select("users","*",["username"=>$_POST['username']]);
        foreach($datas as $data){
            //echo $data['user_password'] . "<br>" . $_POST['password'];  
            if($data['user_password']==md5($_POST['password'])){
                $_SESSION['username']=$data['username'];
                //echo $_SESSION['username'];
                $_SESSION['firstname']=$data['user_firstname'];
                $_SESSION['lastname']=$data['user_lastname'];
                
                header("location:admin/index.php");
            }
            else{
                
                header("location:index.php");
            }
        }
        
    }
    else{
        
        header("location:index.php");
    } 
}
?>