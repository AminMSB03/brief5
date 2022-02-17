<?php

class UserController
{
    public function profileUser(){
        session_start();
        if(isset($_SESSION['id'])){
            $this->profile();
            return;
        }
        if(isset($_POST['submit'])) {
            
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $users = new users();
            $user = $users->getOneUserEmail($email);
            if(!empty($user)){
                if($password==$user['password']){
                    $_SESSION['id'] = $user['id'];
                    $this->profile();
                }elseif($password<>$user['password']){
                    // $error = "<script>alert('The password or the email is not true')</script>";
                    echo '<script>alert("The password or the email is not true")</script>';
                    view::load('login/index'); 
                }
            }else{
                echo '<script>alert("The password or the email is not true")</script>';
                view::load('login/index');
            }
        }else{
            view::load('login/index'); 
        }
        
    }
    public function profile(){
        $id = $_SESSION['id'];
        $db  = new Users();
        $data['user'] =$db-> getOneUserId($id);
        view::load('login/profile',$data);
    }
    public function addPost(){
        session_start();
        $id = $_SESSION['id'];
        $db  = new Users();
        $data['user'] =$db-> getOneUserId($id);
        $posts  = new Product();
        $data['posts'] =$posts-> selectUserPosts($id);
        $comments  = new Comments ();
        $data['comments'] =$comments->getAllComments();

        
        view::load('profile/addPosts',$data);


        
    }
    public function save(){
        if(isset($_POST['add'])){
            $img = htmlspecialchars($_POST['imgScr']);
            $desc = htmlspecialchars($_POST['desc']);
            $id = htmlspecialchars($_POST['idCreator']);
            $db  = new Users();
            $data['user'] =$db-> getOneUserId($id);
            $posts  = new Product();
            $data['posts'] =$posts-> selectUserPosts($id);
            if(!empty($img) && !empty($desc)){
                $db  = new Product();
                $db->insertProduct($id,$img,$desc);
                header('location:http://app.msb/user/addPost');
                // view::load('profile/addPosts',$data);
                return;
            }else{
                echo '<script>alert("Make sure your enter all the infos")</script>';
                view::load('profile/addPosts',$data);
            }
        }
    }
    public function saveComment()
    {
        if(isset($_POST['addComment'])){
            $comment= htmlspecialchars($_POST['comment']);
            $id_user = htmlspecialchars($_POST['userId']);
            $id_post = htmlspecialchars($_POST['postId']);
            if(!empty($comment) && !empty($id_post)){
                $db  = new Comments ();
                $db->insertComment($id_user, $id_post, $comment);
                header('location:http://app.msb/user/addPost');
                // view::load('profile/addPosts',$data);
                return;
            }else{
                echo '<script>alert("Make sure your enter all the infos")</script>';
                view::load('profile/addPosts');
            }

            
        }
    }


    
    public function seePosts(){
        session_start();
        $id = $_SESSION['id'];
        $db  = new Users();
        $data['user'] =$db-> getAllUsers();
        $data['user_now'] =$db-> getOneUserId($id);
        $posts  = new Product();
        $data['posts'] =$posts-> selectAllPosts();
        $comments  = new Comments ();
        $data['comments'] =$comments->getAllComments();
        view::load('profile/seePosts',$data);
    }






    public function logout(){
        session_start();
        if(isset($_SESSION['id'])){
            session_destroy();
        }
        view::load('home');
    } 
}
