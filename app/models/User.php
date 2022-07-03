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

    public function getUserByEmail($email){
        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind('email', $email);
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
            $_SESSION['temp']['email'] = true;
            return false;
        }


        $this->db->query('SELECT * FROM user WHERE username = :username');
        $this->db->bind('username', $data['username']);

        if( $this->db->single()){
            $_SESSION['temp']['username'] = true;
            return false;
        }


        if($data['password'] != $data['password2']){
            $_SESSION['temp']['password'] = true;
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
        return $this->db->rowCount();

    }

    public function updateUser($data){
        $this->db->query("UPDATE user SET first_name = :first_name , last_name = :last_name , username = :username, email = :email WHERE id = :id");
        $this->db->bind('first_name', $data['first_name']);
        $this->db->bind('last_name', $data['last_name']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $_SESSION['user']['id']);
        $this->db->execute();
    }

    public function getUserByIdJoinFriend(){

    }

}