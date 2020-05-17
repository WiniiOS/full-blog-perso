<?php

	#une fonction qui affiche la totalite des elements d'un article

	function get_post(){
		global $db;

		$req = $db->query("

			SELECT 	posts.id,
					posts.title,
					posts.image,
					posts.content,
					posts.date_post,
					admins.name
			FROM posts
			JOIN admins
			ON posts.writer=admins.email
			WHERE posts.id ='{$_GET['id']}'
			AND posts.posted = '1'
		");

		#il n'y aura qu'un seul resultat|post qui porte cet id,results ne sera pas un tableau mais un fetchObject

		$result = $req->fetchObject();
		return $result; 

	}


	#insere le commentaire
	function comment($name,$email,$comment){
		global $db;
		$c = array(
			'name'		=> $name,
			'email'		=> $email,
			'comment'	=> $comment,
			'post_id'	=> $_GET['id']
		);
		$sql = "INSERT INTO comments(name,email,comment,post_id,date_comment) VALUES(:name,:email,:comment,:post_id,NOW())";
		$req = $db->prepare($sql);
		$req->execute($c);

	}

	function get_comment(){

		global $db;
		$req = $db->query("SELECT * FROM comments WHERE post_id='{$_GET['id']}' ORDER BY date_comment DESC");
		$results = [];
		while ($rows = $req->fetchObject()) {
		$results[] = $rows;
		}
		return $results;

	}