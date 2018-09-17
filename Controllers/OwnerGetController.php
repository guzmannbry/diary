<?php
require_once '../../Models/Owner.php';

$owner = new Auth();
if(isset($_GET['id'])){
	$data = $owner->getOwner(array($_GET['id']));
}