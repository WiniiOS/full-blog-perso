<?php 
    #droit d'access global
    if (admin() != 1) {
        header("Location:index.php?page=dashboard");
    }

    #recuperation des posts depuis la fonction get_post
    $post = get_post();

    #au cas ou on arrive sur une page de post amin non existante
    if($post==false){
        header("Location:index.php?page=error");
    }
?>
<!-- on ferme dabord la classe container de l'index afin d'occuper tout ll'espace -->
</div>

<div class="parallax-container">
    <div class="parallax">
        <img class="responsive-img" src="../img/posts/<?= $post->image; ?>" alt="<?= $post->title; ?>">
    </div>
</div>

<!-- On la re-ouvre sans la refermer(la div container) -->
<div class="container">
    <?php
        if(isset($_POST['submit'])){
            $title = htmlspecialchars(trim($_POST['title']));
            $content = htmlspecialchars(trim($_POST['content']));
            $posted = isset($_POST['public'])? "1" : "0" ;
            $errors = [];
            #$id         = $_GET['id'];
            if (empty($title) || empty($content)) {
                $errors['empty'] = "veuillez remplir tous les champs!";
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
                #inseerer les differentes modifications
                edit($title,$content,$posted,$_GET['id']);
                #redirection impossible en php car on a deja affiche de contenu(meme s'il est preferable un redirect
                #cote serveur),on le fait ici en js
                ?>
                <!-- code js -->
                <script>
                    window.location.replace("index.php?page=post&id=<?= $_GET['id'];?>");
                </script>
                <!-- fin de redirection -->
                <?php
            }

        }

    ?>
    <form method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="title" value="<?= $post->title;?>" id="title"/>
                <label for="title">Titre de l'article</label>
            </div>
            <div class="input-field col s12">
                <textarea name="content" id="content" class="materialize-textarea">
                    <?= $post->content ?>
                </textarea>
                <label for="content">Contenu de l'article</label>
            </div>
            <!-- possibilite de passer un article en public -->
            <div class="col s6">
                <p>Public</p>
                <div class="switch">
                    <label>
                        Non
                        <input type="checkbox" name="public" <?php echo($post->posted ==1)? "checked" : "" ?>>
                        <span class="lever"></span>
                        Oui
                    </label>
                </div>
            </div>
            <div class="col s6 right-align">
                <br/><br/>
                <button type="submit" class="btn" name="submit" >Modifier l'article</button>
            </div>
        </div>
    </form>