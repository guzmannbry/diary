<?php
require_once 'DBConnect.php';
// session_start();
Class Diary extends DBConnection{
	private $table = 'diaries';
	private $fields = array(
		'diary_label',
		'owner_id'
	);

	private $uniqueField = 'diary_id';
	private $connectedField = 'owner_id';

	function __construct()
	{
		return DBConnection::__construct();
	}

	function addDiary($data){
		return DBConnection::insert($data,$this->table,$this->fields);
	}

	function getDiary($id){
        return DBConnection::get($id,$this->uniqueField,$this->table);
    }

	function getDiaries($data){
		return DBConnection::getAll($data,$this->connectedField,$this->table);
	}
	
	function updateDiary($data,$updateField){
        return DBConnection::update($data,$this->table,$updateField,$this->uniqueField);
    }

    function deleteDiary($id){
    	return DBConnection::delete($id,$this->table,$this->uniqueField);
    }

    /*
    TODO
    function searchDiary($text,$id){
    	return DBConnection::search($text,$field,$table,$field_id,$id);
    }*/
}