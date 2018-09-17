<?php
require_once '../../Models/Diary.php';
require_once '../../Models/Owner.php';
$owner = new Auth();
$diary = new Diary();
if(isset($_GET['id'])){
	$data = $diary->getDiary(array($_GET['id']));
}else{
	$data = $diary->getDiaries(array($_SESSION['logged_id'])); 
	$ownerData = $owner->getOwner(array($_SESSION['logged_id']));
}