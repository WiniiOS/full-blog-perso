<?php
    #verifier que l'admin est un administrateur
    function is_admin($email,$password)
    {
        global $db;
        $a = [
            'email'     => $email,
            'password'  => sha1($password)
        ];
        $sql = "SELECT * FROM admins WHERE email = :email AND password = :password";
        $req = $db->prepare($sql);
        $req->execute($a);
        #compter le nombre de resultats
        $exist = $req->rowCount($sql);
        return $exist;

    }