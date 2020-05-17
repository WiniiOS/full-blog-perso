<?php 
    if (admin() != 1) {
        header("Location:index.php?page=dashboard");
    }
?>
<h3>Parameteres</h3>

<div class="row">
    <div class="col m6 s12">
        <h4>Modérateurs</h4>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Fonction</th>
                    <th>Validé</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $modos = get_modos();
                    foreach($modos as $modo){
                    ?>
                <tr>
                    <td><?= $modo->name ?></td>
                    <td><?= $modo->email ?></td>
                    <td><?= $modo->role ?></td>
                    <td> <i class="material-icons"><?php echo(!empty($modo->password))? "verified_user" : "av_timer" ;   ?></i></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>





    </div>

    <!-- 2eme block -->
    <?php
    if(isset($_POST['submit'])){
        $name        = htmlspecialchars(trim($_POST['name']));
        $email       = htmlspecialchars(trim($_POST['email']));
        $email_again = htmlspecialchars(trim($_POST['email_again']));        
        $role        = htmlspecialchars(trim($_POST['role']));
        $errors = [];
        $token = token(30);

        if (empty($name) || empty($email) || empty($email_again)) {
            
            $errors['email'] = "Veuillez remplir tous les champs!";

        }
        if ($email!=$email_again){
            $errors['different'] = "Vos adresses email ne correspondent pas!";

        }

        #verifions si l'email est deja pris
        if (email_taken($email)) {
            $errors['taken'] ="L'adresse e-mail est deja assigne a un moderateur !";
        }

        if (!empty($errors)) {
            ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                        foreach($errors as $error){
                            echo $error."<br/>" ;
                        }
                        ?>
                    </div>
                </div>

            <?php
        }else{
            add_modo($name,$email,$role,$token);
        }
        

    }

    ?>
    <div class="col m6 s12">
        <h4>Ajouter un modo</h4>
        <form method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name">
                    <label for="name">Nom</label> 
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" id="email">
                    <label for="name">Adresse e-mail</label> 
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email_again" id="email_again">
                    <label for="name">Confirmer l'adresse e-mail</label> 
                </div>
                
                <div class="input-field col s12">
                    <select name="role" id="role">
                        <option value="modo">Modérateur</option>
                        <option value="admin">Administrateur</option>
                    </select>
                    <label for="role">Role</label>
                </div>
                
                <div class="col s12">
                    <button type="submit" class="btn" name="submit">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- le die permet de ne pas executer la suite du script --> 