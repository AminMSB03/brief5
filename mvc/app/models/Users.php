<?php 
    class Users extends DB{
    private $table = "users";
    public $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM $this->table";
        $users = mysqli_query($this->conn,$sql); 
        return mysqli_fetch_all($users,MYSQLI_ASSOC);
    }
    public function getOneUserId($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $users = mysqli_query($this->conn,$sql); 
        return mysqli_fetch_assoc($users);
    }
    public function getOneUserEmail($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email = '$email'";
        $user = mysqli_query($this->conn,$sql); 
        return mysqli_fetch_assoc($user);
    } 
}