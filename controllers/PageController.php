<?php

class PageController {
    
    public function __construct()
    {
    }
    
    public function connexion() : void
    {
        $route = "connexion";
        require "templates/layout.phtml";
    }
    
    public function inscription() : void
    {
        $route = "inscription";
        require "templates/layout.phtml";
    }
    
    public function personalSpace() : void
    {
        $route = "personalSpace";
        require "templates/layout.phtml";
    }

    public function error404() : void
    {
        $route = "404";
        require "templates/layout.phtml";
    }
    
    public function home() : void
    {
        $route = "home";
        require "templates/layout.phtml";
    }
    
    
}