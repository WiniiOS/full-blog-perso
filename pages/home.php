<h1>Page d'accueil</h1>
<div class="row">
<?php
#recuperation des articles depuis la homefunc
$posts = get_posts();
#parcourir le tableau posts
foreach($posts as $post) {
#gardons le foreach tout en metant l'accueil en forme
	
?>

	<div class="col m6 l6 m12">
		<div class="card">
			<div class="card-content">
				<h5 class="grey-text text-darken-2">
					<?= $post->title; ?>
				</h5>
				<h6 class="grey-text"> Le <?= date("d/m/y à H:I",strtotime($post->date_post));?> par <?= $post->name; ?></h6>	
			</div>
			<div class="card-image waves-effect waves-block waves-light">
				<img src="img/posts/<?= $post->image; ?>" class="activator" alt="<?= $post->title ?>">
			</div>
			<div class="card-content">
				<span class="card-title activator grey-text text-darken-4 ">
					<i class="material-icons right">more_vert</i>
				</span>
				<p>
					<a href="index.php?page=post&id=<?= $post->id; ?>">Voir l'article complet</a>
				</p>
			</div>
			<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">
					<?= $post->title ?><i class="material-icons right">close</i>
				</span>
				<!-- reduction du contenu et demarrage allant du 1er char au 1000eme -->
				<p><?= substr(nl2br($post->content),0,1000); ?>...</p>
			</div>
		</div>	
	</div>

<?php	
}
?>	
</div>
