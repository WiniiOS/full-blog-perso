<?php
function update_password($password){
    global $db;
    $p = [
        'password' => sha1($password)
    ];
    $sql ="UPDATE admins SET password =:password WHERE email ='{$_SESSION['admin']}'";
    $req = $db->prepare($sql);
    $req->execute($p);


} 


//il est recommandee de mettre les sha1 dans la fonctionnalite