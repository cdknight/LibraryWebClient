<?php

class UserUtils {
    private $conn;
    function __construct($conn){
        $this->$conn = $conn;
    }

    function __construct($conn, $id){
        $this->$conn = $conn;
    }

    //user
    public function getUserIdFromName($name){
        $result = $this->$conn->query("SELECT id FROM Users WHERE username=\"".$name."\"");
        while ($row = $result->fetch_assoc()){
            return $row['id'];
        }

    }

    public function getEmailFromUsername($username){
        $result = $this->$conn->query("SELECT * FROM Users");
        while ($row = $result->fetch_assoc()){
            if ($row['username'] == $username){
                return $row['email'];
            }
        }
    }



}