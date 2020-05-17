<?php
	if (isset($_SESSION['admin'])) {

		header("Location:index.php?page=dashboard");
	}
?>

<div class="row">
    <div class="l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/admin.png" alt="administrateur" width="100%">

                </div>
            </div>
            <h4 class="center-align">Se connecter</h4>
            <!-- validation du formulaire -->
            <?php 

                if (isset($_POST['submit'])) {
                   $email = htmlspecialchars(trim($_POST['email']));
                   #on ne hash pas ici car la char est encore vide mais sha1 donne des results sur des chars vide
                   $password = htmlspecialchars(trim($_POST['password']));
                   $errors = [];

                    if (empty($email || $password)) {
                        $errors['empty'] = 'Tous les champs n\'ont pas ete bien remplis!'; 
                    }else if(is_admin($email,$password) == 0) {
                        #si resultats null,alors:
                        $errors['exist'] = "Cet administrateur n'existe pas!";
                    }
                    #s'il ya des erreurs
                    if (!empty($errors)) {
                    ?>
                        <div class="card red">
                            <div class="card-content white-text">
                                <?php                   
                                    foreach($errors as $error){
                                        echo $error."<br/>";
                                    }
                                
                                ?>
                            </div>
                        </div>

                    <?php
                    }else{

                    	#suite des opperations
                        $_SESSION['admin'] = $email;
                        header('location:index.php?page=dashboard');
                    }

                }

            ?>
            <form method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" name="email" id="email">
                        <label for="email">Adresse e-mail</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="password" id="password">
                        <label for="password">Mot de passe</label>
                    </div>
                    <center>
                            <button type="submit" class="btn waves-light light-blue waves-effect" name="submit">
                                    <i class="material-icons left">perm_identity</i>
                                    Se connecter
                            </button>
                            <br><br>
                            <!-- le index.php est toujours sous entendu -->
                            <a href="?page=new">Nouveau modérateur</a>
                    </center>
                    
                </div>
            </form>
        </div>
    </div>
</div>