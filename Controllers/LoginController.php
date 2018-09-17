<?php
include '../Models/Owner.php';

$auth = new Auth();
if(isset($_POST['login'])){
    $owner_username = $_POST['owner_username'];
    $owner_password = $_POST['owner_password'];
    $data = array($owner_username,$owner_password);
    $status = $auth->login($data);
    echo ($status) ? header('location:../resource/views/home.php') : header('location:../index.php?m=Invalid Credentials');
}