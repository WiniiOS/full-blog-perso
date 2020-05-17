<?php 
    if (admin() != 1) {
        header("Location:index.php?page=dashboard");
    }
?>
<h2>Poster un article</h2>
<?php
    #gestion du formulaire

    if(isset($_POST['post'])){

        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        #si jamais on a le public,on doit le mettre en 1 sinon en 0 car il existe sssi il est cochee(on)
        $posted = isset($_POST['public'])? "1" : "0" ;

        $errors = [];

        if (empty($title) || empty($content)) {
            $errors["empty"] = "Veuillez remplir tous les champs !";
        }
        #si le fichier image n'est pas vide,je re cupere son nom
        if (!empty($_FILES['image']['name'])) {
            $file = $_FILES['image']['name'];
            $extensions = ['.png','.jpeg','.jpg','.gif','.PNG','.GIF','.JPEG','.JPG'];
            #recuperer l'extension du fichier
            $extension  = strrchr($file,'.');
            #si l'extension du fichier ne se trouve pas dans le tableau des extensions
            if (!in_array($extension,$extensions)) {
                $errors['image'] = "Cette image n'est pas valide";
            }
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

            #on peut l'uploader
            post($title,$content,$posted);

            if (!empty($_FILES['image']['name'])) {
                post_img($_FILES['image']['tmp_name'],$extension);
            }else{
                #recuperer le dernier id mis en base de donnee
                $id = $db->lastInsertId();
                header("Location:index.php?page=post&id=".$id);

            }

            
        }
    }
?>


<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="input-file col s12">
            <input type="text" name="title" id="title"/>
            <label for="title">Titre de l'article</label>
        </div>
        <div class="input-file col s12">
            <textarea name="content" id="content" class="materialize-textarea"></textarea>
            <label for="content">Contenu de l'article</label>
        </div>
        <div class="col s12">
            <div class="file-field input-field">
                <div class="col btn s2">
                  <span>Image</span>
                  <input type="file" name="image" class="col s12">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate col s10" type="text" placeholder="Upload une image" readonly>
                </div>
            </div>
        </div>
        <div class="col s6">
            <p>Public</p>
            <div class="switch">
                <label>
                    Non 
                    <input  type="checkbox" name="public"/>
                    <span class="lever"></span>
                    Oui
                </label>
            </div>
        </div>
        <div class="col s6 right-align">
            <br/><br/>
            <button type="submit" class="btn" name="post">Publier</button>
        </div>
    </div>
</form>