<?php
require_once 'DBConnect.php';
Class Auth extends DBConnection{
    private $table = "owners";
    private $fields = array(
        'owner_firstname',
        'owner_lastname',
        'owner_mi',
        'owner_username',
        'owner_password'
    );

    private $uniqueField = "owner_id"; 

    function __construct(){
        return DBConnection::__construct();
    }

    function login($data){
        return DBConnection::authLogin($data);
    }

    function register($data){
        return DBConnection::authRegister($data,$this->table,$this->fields);
    }

    function getOwner($id){
        return DBConnection::get($id,$this->uniqueField,$this->table);
    }

    function updateOwner($data,$updateField){
        return DBConnection::update($data,$this->table,$updateField,$this->uniqueField);
    }
}