<?php

class User{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUser($data){
        $this->db->query('SELECT * FROM user WHERE username = :username');
        $this->db->bind('username', $data['username']);
        return $this->db->single();
    }

    public function getUserById($id){
        $this->db->query('SELECT * FROM user WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function setAkun($data){
        
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind('email', $data['email']);

        if($this->db->single()){
            return false;
        }


        $this->db->query('SELECT * FROM user WHERE username = :username');
        $this->db->bind('username', $data['username']);

        if( $this->db->single()){
            return false;
        }


        if($data['password'] != $data['password2']){
            return false;
        }


        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO user VALUES ('', :first_name, :last_name, :sex, :email, :username, :password, '/assets/img/user/default.png')");

        $this->db->bind('first_name', $data['first_name']);
        $this->db->bind('last_name', $data['last_name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $password);
        $this->db->bind('username', $data['username']);
        $this->db->bind('sex', $data['gender']);

        $this->db->execute();
        var_dump($data);
        return $this->db->rowCount();

    }

    public function getUserByIdJoinFriend(){
        
    }

}