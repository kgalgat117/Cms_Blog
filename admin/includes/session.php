<?php
session_start();
if(empty($_SESSION['username']))
{
    //echo "session not set";
    header("location:../index.php");
}
?>