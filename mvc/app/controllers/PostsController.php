<?php

class PostsController
{
    public function index(){
        $db = new Product();
        $data['users'] = $db->getAllProducts();
        view::load('posts/index',$data); 
    }
    
}