<?php

class Friend_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllFriend(){
        $this->db->query("SELECT friends.id, first_name, last_name, sex, username, img, date FROM friends JOIN user on friends.id_teman = user.id WHERE id_user = :id");
        $this->db->bind('id', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function send(){
        $this->db->query("SELECT friend_request.id, first_name, last_name, sex, username, img, date FROM friend_request JOIN user ON friend_request.id_receiver = user.id WHERE id_sender = :id");
        $this->db->bind('id', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function receive(){
        $this->db->query("SELECT friend_request.id, first_name, last_name, sex, username, img, date FROM friend_request JOIN user ON friend_request.id_sender = user.id WHERE id_receiver = :id");
        $this->db->bind('id', $_SESSION['user']['id']);
        return $this->db->resultSet();
    }

    public function getFriendRequest($id){
        $this->db->query("SELECT * FROM friend_request WHERE id = $id");
        return $this->db->single();
        
    }

    public function setFriend($id_user, $id_teman){
        $this->db->query("INSERT INTO friends VALUES ('', :id_user, :id_teman, now())");
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_teman', $id_teman);
        $this->db->execute();
    }

    public function deleteFriendRequest($id){
        $this->db->query("DELETE FROM friend_request WHERE id = $id");
        $this->db->execute();
    }

    public function getFriend($id){
        $this->db->query("SELECT * FROM friends WHERE id = $id");
        return $this->db->single();
    }

    public function deleteFriend($id_user, $id_teman){
        $this->db->query("DELETE FROM friends WHERE id_teman = $id_teman AND id_user = $id_user");
        $this->db->execute();
    }

    public function searchFriends($keyword){
        $this->db->query("SELECT id, first_name, last_name, sex, username, img FROM user WHERE username LIKE '%$keyword%'");
        // $this->db->bind('keyword', $keyword);
        return $this->db->resultSet();
    }

    public function request($id){
        $this->db->query("SELECT * FROM friend_request WHERE id_receiver= $id AND id_sender = :id_sender");
        $this->db->bind('id_sender', $_SESSION['user']['id']);
        if($data = $this->db->single()){
            return $data;
        }

        $this->db->query("SELECT * FROM friends WHERE id_teman = $id AND id_user = :id_user");
        $this->db->bind('id_user', $_SESSION['user']['id']);
        if($data = $this->db->single()){
            return $data;
        }

        $this->db->query("INSERT INTO friend_request VALUES ('', :id_sender, :id_receiver, now())");
        $this->db->bind("id_sender", $_SESSION['user']['id']);
        $this->db->bind('id_receiver', $id);
        $this->db->execute();
    }

}