<?php

#verifier la presence du modo dans la base de donnee
function is_modo($email,$token){

    global $db;

    $a = [
        'email' => $email,
        'token' => $token
    ];
    $sql = "SELECT * FROM admins WHERE email = :email AND token = :token";
    $req = $db->prepare($sql);
    $req->execute($a);
    return $req->rowCount($sql);

}