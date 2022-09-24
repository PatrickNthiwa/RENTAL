<?php
class HomeModel{
    public $db;


    public function checkUserLogin($username,$password){
        $query="SELECT count(*) FROM users WHERE username='{$username}' AND password='{$password}'";
        $stmt-$this->db->prepare($query)->execute();
        print_r($stmt);
        exit;
        return $stmt;

    }
public function UserRegister($username,$password){
    $query="INSERT INTO users(username,password) VALUES('".$username."','".$password."')";
    $stmt=$this->db->query($query);
    return 1;
}

}