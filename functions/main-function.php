<?php
	session_start();
	
	$dbhost = 'localhost';
	$dbname = 'appwebbase';
	$dbuser = 'root';
	$dbpwd = '';

	try {

		$db = new PDO("mysql:host=".$dbhost.";dbname=".$dbname,$dbuser,$dbpwd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));

	}catch (Exception $e) {

		die('Une erreur est survenue lors de la connexion a la base de donnee');

	}

	#pour les droits d'acces principaux!
	function admin()
	{	
		//moderateur ou non //soit oui//droit d'access = 1
		if (isset($_SESSION['admin'])) {
			global $db;
			$a = [
				'email'	=> $_SESSION['admin'],
				'role'  => 'admin'
			];

			$sql = "SELECT * FROM admins WHERE email = :email AND role = :role";
			$req = $db->prepare($sql);
			$req->execute($a);
			$exist = $req->rowCount($sql);
			return $exist;

		}else{

			return 0;
		}
		//non //pas de session//pas le droit = 0
	}

#check if password already exist just avoid that everybody change his password freely
//deplacee deouis passwordfunc
function hasnt_password(){

    global $db;
    $sql = "SELECT * FROM admins WHERE email = '{$_SESSION['admin']}'";
    $req = $db->query($sql);
    $req->execute();
    $exist = $req->rowCount($sql);
    return $exist;

}