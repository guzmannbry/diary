<?php
session_start();
Class DBConnection{

    private $host = 'localhost';
    private $db = 'diary';
    private $user = 'root';
    private $pass = '';
    private $conn;

    function __construct(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function authLogin($data){
        $authStatus = false;
        $sql = "SELECT * FROM owners WHERE owner_username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($data[0]));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            if(password_verify($data[1], $user['owner_password'])){
                $_SESSION['logged_user'] = "{$user['owner_firstname']} {$user['owner_lastname']}";
                $_SESSION['logged_id'] = $user['owner_id'];
                $authStatus = true;
            }else{
                $authStatus = false;
            }
        }
        $this->conn = null;
        return $authStatus;
    }

    function authRegister($data,$table,$fields){
        $authStatus;
        $field = implode(",", $fields);
        $arrayString = array();
        foreach($data as $x) $arrayString[] = "?";
        $value = implode(",", $arrayString);
        $sql = "INSERT INTO $table($field) VALUES($value)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        if($stmt->rowCount() > 0){
            $_SESSION['logged_user'] = "{$data[0]} ${$data[1]}";
            $_SESSION['logged_id'] = $this->conn->lastInsertId();
            $authStatus = true;
        }
        return $authStatus;
    }

    function insert($data,$table,$fields){
        $insertStatus;
        $field = implode(",", $fields);
        $arrayString = array();
        foreach($data as $x) $arrayString[] = "?";
        $value = implode(",", $arrayString);
        $sql = "INSERT INTO $table($field) VALUES($value)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        if($stmt->rowCount() > 0){
            $insertStatus = true;
        }
        return $insertStatus;
    }

    function get($id,$field_id,$table){
        $sql = "SELECT * FROM $table WHERE $field_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($id);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getAll($data,$fieldId,$table){
        $sql = "SELECT * FROM $table WHERE $fieldId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function update($data,$table,$fields,$field_id){
        $authStatus;
        $fld = array();
        foreach($fields as $field){
            $fld[] = $field."=?";
        }
        $value = implode(",", $fld);
        $sql = "UPDATE $table SET $value WHERE $field_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        if($stmt->rowCount() > 0){
            $authStatus = true;
        }
        return $authStatus;
    }

    function delete($id,$table,$fieldId){
        $diaryStatus;
        $sql = "DELETE FROM $table WHERE $fieldId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($id);
        if($stmt->rowCount() > 0){
            $diaryStatus = true;
        }
        return $diaryStatus;
    }

/*
TODO
    function search($text,$field,$table,$field_id,$id){
        $fields = implode(",' ',",$field);
        $sql = "SELECT * FROM $table WHERE $field_id = ? CONCAT($fields) LIKE '%".$text."%'";
        $stmt = $this->prepare($sql);
        $stmt->execute($id);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }*/
}
