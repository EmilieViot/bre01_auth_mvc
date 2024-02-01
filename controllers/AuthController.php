<?php

class AuthController 
{
    
    public function __construct()
    {
    }
    
    public function checkLogin() : void
    {
        $newUserManager = new UserManager();
        
        if (isset($_POST['loginEmail'], $_POST['loginPassword'])) 
        {
            $email = $_POST['loginEmail'];
            $password = $_POST['loginPassword'];
    
            $newUserManager->find($email, $password);
            
            if (isset($_SESSION['connecter']) && ($_SESSION['connecter']=== true)) 
            {
                header('location: https://emilieviot.sites.3wa.io/php/bre01_auth_mvc/index.php?route=personalSpace');
                exit();
            } 
            else if (isset($_SESSION['connecter']) && ($_SESSION['connecter']=== false)) 
            {
                header('location: https://emilieviot.sites.3wa.io/php/bre01_auth_mvc/index.php');
                exit();
            }
            
        }
        
    }
    

    public function checkSignin() 
    {
        $newUserManager = new UserManager();
        
        if (isset($_POST['signinEmail'])) 
        {
            $email = $_POST['signinEmail'];
            
            $user1 = $newUserManager->findEmail($email);
            
            if ($user1)
            {  
                header("Location: https://emilieviot.sites.3wa.io/php/bre01_auth_mvc/index.php");
                exit();
            }
        }
        else 
        {
            $email = $_POST['signinEmail'];
            $user1 = $newUserManager->findEmail($email);
            
            if (isset($_POST['signinPassword']) && isset($_POST['verifPassword']))
            { 
                if ($_POST['signinPassword'] === $_POST['verifPassword'])
                {
                    $newUserManager->create($user1);
                    header('location: https://emilieviot.sites.3wa.io/php/bre01_auth_mvc/index.php');
                    exit();
                }
            }
        }
    }
    
    public function deconnexion() 
    {
        session_start();
        session_destroy();
        header('location: https://emilieviot.sites.3wa.io/php/bre01_auth_mvc/index.php');
    }

}