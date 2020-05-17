<?php
    //check if email is already taken
    function email_taken($email){
        global $db;
        $e = ["email" => $email];
        $sql ="SELECT * FROM admins WHERE email = :email";
        $req = $db->prepare($sql);
        $req->execute($e);
        $free  = $req->rowCount($sql);
        return $free;

    }
    #generer un token aleatoire
    function token($length){
        $chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
        //reduction selon la longeur mise en parametre
        substr($chars,0,$length);
        //shuffle pour melanger les chars,repeat pour avoir autant de chars que l'on veut
        return substr(str_shuffle(str_repeat($chars,$length)),0,$length);
    }

    //add a modo
    function add_modo($name,$email,$role,$token){
        global $db;
        $t = [
            'name'    => $name,
            'email'   => $email,
            'role'    => $role,
            'token'   => $token 
        ];
        $sql = "INSERT INTO admins(name,email,role,token) VALUES(:name, :email, :role, :token)";
        $req = $db->prepare($sql);
        $req->execute($t);

        //envoi d'email

        $to       = $email;
		$subject  = "Modo sur le blog";
		$headers  ='From: XFreelancer.com<support@xfreelance.com>' . "\r\n" .
            	    'MIME-Version: 1.0' . "\r\n" .
            	'Content-Transfert-Encoding:8bits'."\r\n".
            	'Content-type: text/html; charset=utf-8';
		$message  = "
		<html>
		<body>
			<div align='center'>
			<h1>Contact X Developpeur Web</h2>
			<p>
                Voici votre identifiant et code unique a inserer sur <a href=\"http://localhost/blog_2-0/admin/index.php?page=new\">cette page</a>
                '<br/>Identifiant'.$email.'
                <br/>Mot de passe:'.$token.'
                <br/>Vous etes :'.$role.'
			</p>
				<img alt='banniere xfreelance' src='../img/developpeur.png'>
			</div>
		</body>
		</html>";
			if(mail($to, $subject, $message, $headers))
			{
				$errors['success'] = "<span color='green'>**Votre message a bien ete envoye!**</span> ";
			}
			else{
				$errors['echec'] ="<span color='red'>**Echec lors de l'envoi d'e-mail**</span>";
			}

    }

    function get_modos(){

        global $db;
        $req = $db->query("SELECT * FROM admins");
        $results = [];
        while ($rows = $req->fetchObject()) {
            $results[] = $rows;
        }
        return $results; 

    }