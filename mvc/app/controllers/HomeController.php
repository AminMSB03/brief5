<?php

class HomeController{

    public function index(){
        view::load('home');
    }  
    public function login(){
        view::load('login/index');
    }  
    
    
}