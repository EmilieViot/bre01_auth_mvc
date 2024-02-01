<?php

class Router {
    
    public function __construct()
    {
    }
    
    public function handleRequest(array $get) : void
    {
        
        if (isset($get["route"]) && ($get["route"]==="connexion"))
        {
            $connexionController = new PageController();
            $connexionController -> connexion();
        }
        
        else if (isset($get["route"]) && ($get["route"]==="checkLogin"))
        {
            $loginController = new AuthController();
            $loginController -> checkLogin();
        }
        
        else if (isset($get["route"]) && ($get["route"]==="inscription"))
        {
            $connexionController = new PageController();
            $connexionController -> inscription();
        }
        
        else if (isset($get["route"]) && ($get["route"]==="checkSignin"))
        {
            $signinController = new AuthController();
            $signinController -> checkSignin();
        }
        
        else if (isset($get["route"]) && ($get["route"]==="personalSpace"))
        {
            $signinController = new PageController();
            $signinController -> personalSpace();
        }
        
        else if (isset($get["route"]) && ($get["route"]==="deconnexion"))
        {
            $loginController = new AuthController();
            $loginController -> deconnexion();
        }
        
        else if (!isset($get["route"]))
        {
            $noRouteController = new PageController();
            $noRouteController -> home();
        }
        
        else
        {
            $otherController = new PageController();
            $otherController -> error404();
        }
    }
}