<?php
#fonction permettant d\'afficher tous les articles recents
function get_posts()
{
    global $db;
    $req = $db->query("

    	SELECT  posts.id,
	    		posts.title,
	    		posts.image,
	    		posts.date_post,
	    		posts.content,
	    		admins.name
	    FROM posts
	    JOIN admins
	    ON posts.writer=admins.email
	    WHERE posted=1
	    ORDER BY date_post DESC
	    LIMIT 0,2

   ");
    #Stockons les resultats dans un tableau
    $results = array();

    while($rows= $req->fetchObject()) {
        $results[] = $rows;
    }
    return $results;

}

