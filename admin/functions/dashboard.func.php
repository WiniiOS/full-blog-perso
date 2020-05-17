<?php
	#recuperer le nombre d'entree dans les differentes tables
	function inTable($table)
	{
		global $db;
		$req = $db->query("SELECT COUNT(id) FROM $table");
		#un fetch car il va just recuperer un nombre a afficher
		return $nombre = $req->fetch();
	}

	function getColor($table,$colors){

		if(isset($colors[$table])){
			return $colors[$table];
		}else{
			#default color
			return "orange";
		}
	}

	function get_comments(){
		global $db;
		$req = $db->query("
			SELECT  comments.id,
					comments.name,
					comments.email,
					comments.post_id,
					comments.date_comment,
					comments.comment,
					posts.title
			FROM	comments
			JOIN	posts
			ON comments.post_id = posts.id
			WHERE comments.seen = 0
			ORDER BY comments.date_comment ASC
		");
		$results = [];

		while ($rows = $req->fetchObject()) {
			$results[] = $rows;
		}
		return $results;
	}