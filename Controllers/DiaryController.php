<?php
session_start();
include '../Models/Diary.php';

$diary = new Diary();
if(isset($_POST['addDiary'])){
	$diaryLabel = $_POST['diaryLabel'];
	$data = array($diaryLabel, $_SESSION['logged_id']);
	$status = $diary->addDiary($data);
	echo ($status) ? header('location:../resource/views/diaries.php?m=Added successfully') : header('location:../resource/views/diaries.php?e=Error adding diary');	
}

if(isset($_POST['updateDiary'])){
	$diaryLabel = $_POST['diaryLabel'];
	$diaryId = $_POST['diaryId'];
	$data = array($diaryLabel, $diaryId);
	$updateFields = array(
        'diary_label'
    );
	$status = $diary->updateDiary($data, $updateFields);
	echo ($status) ? header('location:../resource/views/diaries.php?m=Updated successfully') : header('location:../resource/views/diaries.php?e=Error updating diary');		
}

if(isset($_POST['deleteDiary'])){
	$diaryId = $_POST['diaryId'];
	$status = $diary->deleteDiary(array($diaryId));
	echo ($status) ? header('location:../resource/views/diaries.php?m=Deleted successfully') : header('location:../resource/views/diaries.php?e=Error deleting diary');		

}