<?php
include '../Models/Owner.php';

$owner = new Auth();
if(isset($_POST['update'])){
	$owner_firstname = $_POST['owner_firstname'];
	$owner_lastname = $_POST['owner_lastname'];
	$owner_mi = $_POST['owner_mi'];
	$data = array($owner_firstname,$owner_lastname,$owner_mi,$_GET['id']);
	$updateFields = array(
        'owner_firstname',
        'owner_lastname',
        'owner_mi'
    );
	$status = $owner->updateOwner($data,$updateFields);
	echo ($status) ? header('location:../resource/views/profile.php?id='.$_GET['id'].'&m=Updated successfully') : header('location:../resource/views/profile.php?id='.$_GET['id'].'&e=Error updating successfully');	
}

if(isset($_POST['updatePassword'])){
	$currentPassword = $_POST['currentPassword'];
	$newPassword = $_POST['newPassword'];
	$confirmPassword = $_POST['confirmPassword'];
	$owner_data = $owner->getOwner(array($_GET['id']));
	if(password_verify($currentPassword, $owner_data['owner_password'])){
		if($newPassword == $confirmPassword){
			$hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
			$data = array($hashPassword, $_GET['id']);
			$updateFields = array(
        		'owner_password'
    		);
    		$owner->updateOwner($data, $updateFields);
			header('location:../resource/views/profile.php?id='.$_GET['id'].'&m=Password updated');
		}else{
		header('location:../resource/views/profile.php?id='.$_GET['id'].'&e=Password does not match');
		}
	}else{
		header('location:../resource/views/profile.php?id='.$_GET['id'].'&e=Invalid current password');
	}
}