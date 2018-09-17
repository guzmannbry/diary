<?php
require_once '../Models/Diary.php';
$diary = new Diary();
if(isset($_GET['id'])){
	$data = $diary->getDiary(array($_GET['id']));
	echo json_encode($data);
}