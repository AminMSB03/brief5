<?php

class DB
{
    public function connect()
    {
        $database = mysqli_connect(HOST,USER,PASS,DBNAME);

        if($database){
            $this->db = $database;
            return $this->db;  
        } 
        else{
            echo "error";
        }
    }
}