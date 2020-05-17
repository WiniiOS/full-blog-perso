<?php 
    if(isset($_SESSION['admin'])) {

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

            <h4 class="center-align">Se connecter</h4>
            <!-- validation du formulaire -->
            <?php
            if (isset($_POST['submit'])) {
                $email = htmlspecialchars(trim($_POST['email'])); 
                $token = htmlspecialchars(trim($_POST['token']));
                
                $errors = [];
                if (empty($email) || empty($token)) {
                    $errors['empty'] = "Tous les champs doivent etre completes!";
                }

                if (is_modo($email,$token)==0) {
                    $errors['exist'] = "Ce moderateur n'existe pas!";
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
                    
                    $_SESSION['admin'] = $email;
                    header("Location:index.php?page=password");

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
                        <input type="text" name="token" id="token">
                        <label for="token">Code unique</label>
                    </div>
                    <center>
                            <button type="submit" class="btn waves-light light-blue waves-effect" name="submit">
                                    <i class="material-icons left">perm_identity</i>
                                    Se connecter
                            </button>
                            <br><br>
                            <!-- le index.php est toujours sous entendu -->
                            <a href="?page=login">Déja modérateur</a>
                    </center>
                    
                </div>


            </form>
        </div>
    </div>
</div>