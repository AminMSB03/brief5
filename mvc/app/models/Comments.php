<?php 
    class Comments extends DB{
    private $table = "Comments";
    private $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
        
    }
    public function insertComment($id_user, $id_post, $comment)
    {
        $sql = "INSERT INTO $this->table (id_user, id_post, comment	) VALUES ('$id_user', '$id_post', '$comment')  ";
        return mysqli_query($this->conn, $sql);
        
    }
    public function getAllComments()
    {
        $sql = "SELECT * FROM $this->table order by id desc";
        $users = mysqli_query($this->conn,$sql); 
        return mysqli_fetch_all($users,MYSQLI_ASSOC);
    }
}