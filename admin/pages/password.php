<?php 
if (hasnt_password() == 1) {

    header("Location:index.php?page=dashboard");
}
?>
<div class="row">
    <div class="l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/modo.png" alt="moderateur" width="100%">
                </div>
            </div>

            <h4 class="center-align">Choisir un mot de passe</h4>
            <!-- validation du formulaire -->
            <?php
            if (isset($_POST['submit'])) {
                $password =htmlspecialchars(trim($_POST['password'])); 
                $password_again = htmlspecialchars(trim($_POST['password_again']));
                
                $errors = [];
                if (empty($password) || empty($password_again)) {
                    $errors['empty'] = "Tous les champs n'ont pas été remplis!";
                }

                if ($password != $password_again) {
                    $errors['different'] = "Vos mots de passe ne correspondent pas!";
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
                    #on modifie le password dans les fonctionnalités
                    update_password($password);
                    header("Location:index.php?page=dashboard");
               
                }

            }
            
            ?>
            <form method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="password" id="password">
                        <label for="password">Mot de passe</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="password_again" id="password_again">
                        <label for="password_again">Confirmer le mot de passe</label>
                    </div>
                    <center>
                            <button type="submit" class="btn waves-light light-blue waves-effect" name="submit">
                                    <i class="material-icons left">perm_identity</i>
                                    Se connecter
                            </button>
                    </center>
                    
                </div>
            </form>
        </div>
    </div>
</div>