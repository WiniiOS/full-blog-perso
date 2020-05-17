<?php

	$post = get_post();
	#au cas ou on met un id d'article qui n'existe pas
	if ($post==false) {
		header("Location:index.php?page=error");
	}else{
?>

<!--afin de mettre l'image de banniere tout au long,on ferme la div container de l'index qu'on va open apres-->
	</div>

		<div class="parallax-container">
			<div class="parallax">
				<img class="responsive-img" src="img/posts/<?= $post->image ?>" alt="<?= $post->title; ?>">
			</div>
		</div>
		<!-- ajoutons un peu de js pour le parallax -->

	<div class="container">
		<h2><?= $post->title ?></h2>
		<h6>Par <?= $post->name ?> Le <?= date("d/m/Y à H:I",strtotime($post->date_post)); ?></h6>
		<p>
			<?= nl2br($post->content); ?>
		</p>

	<?php
		}
	?>
	<hr>
				<?php  
					if (isset($_POST['submit'])) {
						#trim pour enlever les espaces de debut et de fin
						$name = htmlspecialchars(trim($_POST['name']));
						$email = htmlspecialchars(trim($_POST['email']));
						$comment = htmlspecialchars(trim(nl2br($_POST['comment'])));
						$errors = [];

						if (empty($name) || empty($email) || empty($comment)) {
							
								$errors['empty'] = "Tous les champs n'ont pas ete completes!";

						}else{

							#si l'email est valide,alors
							if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
								$errors['email'] = "L'adresse e-mail n'est pas valide";
							}
						}
						#si errors n'est pas vide
						if (!empty($errors)) {	
						?>
						

						<div class="card-red">
							<div class="card-content white-text">
								<?php
									foreach ($errors as $error) {
										echo $error."<br/>";
									}
								 ?>
							</div>
						</div>
					
						<?php  
						}else{

							#s'il n'ya aucune erreur:
							comment($name,$email,$comment);
							//actualiser la page:il y aura un pb car le header ne fonctionne pas si on a deja affiche du contenu
							// on va donc utiliser une petite astuce js
							?>
							<script>
								window.Location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
							</script>

							<?php
							
						}
						
						
					}

				?>
				<h4>Commentaires:</h4>
				<?php
					$responses = get_comment();
					if ($responses != false) {

						foreach($responses as $response) {
						?>
							<blockquote>
								<strong>
									<?= $response->name ?>(<?php echo date("d/m/Y",strtotime($response->date_comment));?>)
									<p><?= nl2br($response->comment); ?> </p>
								</strong>
							</blockquote>
							<?php

							}
							
						}else{

							echo "<i color='green'>Soyez le premier a laisser un commentaire sur cet article...</i>";
						}
				?>

				<h4>Laisser un commentaire:</h4>
				<form method="post">
					<div class="row">
						<div class="input-field col s12 m6">
							<input type="text" name="name" id="name">
							<label for="name">Nom</label>
						</div>
						<div class="input-field col s12 m6">
							<input type="email" name="email" id="email">
							<label for="email">Adresse e-mail</label>
						</div>
						<div class="input-field col s12 m12">
							<textarea name="comment" id="comment" class="materialize-textarea"></textarea>
							<label for="comment">Commentaire</label>
						</div>
						<div class="col s12">
							<button type="submit" name="submit" class="btn waves-effect">Commenter ce post</button>
						</div>
					</div>
				</form>