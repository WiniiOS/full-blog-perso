<?php 
    if (admin() != 1) {
        header("Location:index.php?page=dashboard");
    }
?>
<h3>Listing des articles</h3>
<hr/>

<?php
	
	$posts = get_posts();
	foreach($posts as $post) {
?>
	<div class="row">
		<div class="col s12">
			<h3>
				<?= $post->title; ?><?php echo ($post->posted == 0)? "<i title='Article non publié' class='material-icons'>lock</i>" : "" ;?>
			</h3>
			<div class="row">
				<div class="col s12 m6 l8">
					<?= substr(nl2br($post->content), 0,860); ?>...
				</div>
				<div class="col s12 m6 l4">
					<img alt="<?= $post->title;?>" class="materialboxed responsive-img" src="../img/posts/<?= $post->image;?>">
					<br><br>
					<a class="btn light-blue waves-effect waves-light" href="index.php?page=post&id=<?= $post->id; ?>">Lire l'article complet</a>

				</div>
			</div>
		</div>
	</div>		

<?php
}
?>