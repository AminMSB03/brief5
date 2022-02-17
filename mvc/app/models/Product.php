<?php

class Product extends DB
{
    private $table = "posts";
    private $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
        
    }
    public function getAllProducts()
    {
        $sql = "SELECT * FROM $this->table";
        $users = mysqli_query($this->conn,$sql); 
        return mysqli_fetch_all($users,MYSQLI_ASSOC);
    }
    public function insertProduct($id_creator, $imgSrc, $desc)
    {
        $sql ="INSERT INTO $this->table(id_creator,img_src,description) VALUES ('$id_creator', '$imgSrc', '$desc')";
        return mysqli_query($this->conn, $sql);
    }
    public function selectUserPosts($id){
        $sql = "SELECT * FROM $this->table WHERE id_creator =$id order by id desc";
        $users = mysqli_query($this->conn,$sql); 
        return mysqli_fetch_all($users,MYSQLI_ASSOC);
    }
    public function selectAllPosts(){
        $sql = "SELECT * FROM $this->table order by id desc";
        $users = mysqli_query($this->conn,$sql); 
        return mysqli_fetch_all($users,MYSQLI_ASSOC);
    }
}