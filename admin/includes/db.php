<?php
require '../vendor/autoload.php';
// Using Medoo namespace
use Medoo\Medoo;
// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'cms',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);
?>