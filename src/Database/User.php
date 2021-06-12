<?php
namespace App\Database;

use PDO;

class User extends Database {
    public function login(string $email, string $password){
        //$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $query = $this->db->prepare('SELECT * , users.id as uid from `users` WHERE email_address = :email_address');

        $query -> execute([
        ':email_address' => $email]);
        $login = $query->fetch(PDO::FETCH_ASSOC);


        if(password_verify($password, $login['password_hash'] ?? '')){
            //setcookie('type', $login['user_type_id'], time()+(10 * 365 * 24 * 60 * 60));
            $_SESSION['user_information'] = ['first_name' => $login['first_name'],
                                            'last_name' => $login['last_name'],
                                            'email' => $login['email_address'],
                                            'id' => $login['uid']];
            // setcookie('user_information', ['first_name' => $login['first_name'],
            //                                 'last_name' => $login['last_name'],
            //                                 'email' => $login['email_address'],
            //                                 'id' => $login['uid']], time()+(10 * 365 * 24 * 60 * 60));

            //die(var_dump($query->errorInfo()));
             return true;
        }
         else {
              //die(var_dump($query->errorInfo()));
            return false;
        }
    }

    public function signup(string $first_name, string $last_name, string $middle_name = NULL, string $password, string $email){
        //die($first_name . $last_name . $middle_name. $password. $email);
        
        $query = $this->db->prepare('INSERT INTO `users` (first_name, last_name, password_hash, middle_name, email_address) VALUES (:first_name, :last_name, :password_hash, :middle_name, :email_address)');


   
        $query->execute([
            ':first_name'=>$first_name,
            ':last_name'=> $last_name,
            ':password_hash' => $password,
            ':middle_name' => $middle_name,
            ':email_address' => $email,
        ]); 

        
    }

}
