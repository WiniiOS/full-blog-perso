<?php 
//contient une fonction pour afficher le post
function get_post(){
    global $db;
    $req = $db->query("
    SELECT 	posts.id,
            posts.title,
            posts.image,
            posts.content,
            posts.date_post,
            posts.posted,
            admins.name
    FROM    posts
    JOIN    admins
    ON      posts.writer = admins.email
    WHERE   posts.id ='{$_GET['id']}'
    ");
    $result = $req->fetchObject();
    return $result;
}

#fonction de setter avec des arguments  
function edit($title,$content,$posted,$id){

    global $db;

    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE posts SET title= :title, content= :content, date_post = NOW(), posted = :posted WHERE id= :id";
    $req = $db->prepare($sql);
    $req->execute($e);
}
