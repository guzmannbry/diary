<?php
include '../Models/Owner.php';

$auth = new Auth();
if(isset($_POST['register'])){
    $owner_firstname = $_POST['owner_firstname'];
    $owner_lastname = $_POST['owner_lastname'];
    $owner_mi = $_POST['owner_mi'];
    $owner_username = $_POST['owner_username'];
    $owner_password = $_POST['owner_password'];
    $hashed_password = password_hash($owner_password, PASSWORD_DEFAULT);
    $data = array($owner_firstname,$owner_lastname,$owner_mi,$owner_username,$hashed_password);
    $status = $auth->register($data);
    echo ($status) ? header('location:../resource/views/home.php') : header('location:../index.php?m=Error Registering Info');
}