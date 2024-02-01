<?php 

require "AbstractManager.class.php";
require "models/User.class.php";

class UserManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function findAll () : array
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $users_array = [];
        
        foreach($users as $user) {
            $user1 = new User($user["email"], $user["password"]);
            $user1->setId($user["id"]);
            $this->$users_array[]=$user;
        }
        
        return $users_array;   
    }
    
    public function findOne (int $id) : ?User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
      
        if ($user) {
            $user1 = new User($user["email"], $user["password"]);
            $user1->setId($user["id"]);
            
            return $user1;
        }
        return null;
    }
    
    public function create (User $user) : void
    {
        $query = $this->db->prepare('INSERT INTO users (username, email, password, role, created_at) VALUES (:username, :email, :password, :role, :created_at)');
        $parameters = [
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),

        ];
        $query->execute($parameters);
        $user->setId($this->db->lastInsertId());
    }
    
    public function update (User $user) : void
    {
        $query = $this->db->prepare('UPDATE users SET email = :email, password = :password');
        $parameters = [
            'email' => getEmail(),
            'password' => getPassword(),

        ];

        $query->execute($parameters);
    }
    
    public function delete (int $id) : void
    {
        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        
        $query->execute($parameters);
    }
    
    
    public function find(string $email, string $password) : void
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            "email" => $email
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
      
        if ($user) 
        {
            if ($email === $user['email']) 
            {
                if (password_verify($password, $user['password'])) 
                {
                    var_dump($user);
                    $_SESSION['connecter'] = true;
                } 
                else 
                {
                    var_dump($user);
                    $_SESSION['connecter'] = false;
                }
            }
        }
    }
   
        
    public function findEmail (string $email) : ?User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            'email' => $email
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
      
        if ($user) {
            $user1 = new User($user["email"], $user["password"]);
            $user1->setId($user["id"]);
            
            return $user1;
        }
        return null;
    }
}