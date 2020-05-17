<?php
#fonction qui upload un post sans image
function post($title,$content,$posted){
    global $db; 

    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'posted'    =>  $posted,
        'writer'    =>  $_SESSION['admin']
    ];
    $sql = "INSERT INTO posts(title,content,writer,date_post,posted) 
            VALUES(:title,:content,:writer,NOW(),:posted)";
    $req = $db->prepare($sql);
    $req->execute($p);
    #recuperer le dernier id mis en base de donnee
    $id = $db->lastInsertId();
    header("Location:index.php?page=post&id=".$id);
}
#fonction qui upload un post avec image
function post_img($tmp_name,$extention)
{
    global $db; 
    $id = $db->lastInsertId();

    $i = [
        'id'  => $id,
        'image' => $id.$extension          
    ];
     //'id'.'.ext' -> '25'.'.jpg' -> 25.jpg
    $sql = "UPDATE posts SET image = :image WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    #emplacement temporaire du fichier et le chemin d'acces a donner
    move_uploaded_file($tmp_name,"../img/posts/".$i['image']);
    header("Location:index.php?page=post&id=".$id);
}



