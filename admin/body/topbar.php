<nav class="light-green">
    <div class="container">
        <div class="nav-wraper">
			<a href="../index.php?page=home" class="brand-logo">Blog 2.0</a>

			<?php 
				if($page != 'login' && $page != 'new' AND $page != 'password'){
				?>
				<a href="#" data-activates="mobile-menu"  class="button-collapse" ><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li class="<?php echo ($page=='dashboard')?"active" : "" ?>" title="dashboard"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>	
					<?php 
						if(admin() == 1) {
						?>
							<li class="<?php echo ($page=='write')?"active" : "" ?>" title="write"><a href="index.php?page=write"><i class="material-icons">edit</i></a></li>
							<li class="<?php echo ($page=='list')?"active" : "" ?>" title="listing"><a href="index.php?page=list"><i class="material-icons">view_list</i></a></li>
							<li class="<?php echo ($page=='settings')?"active" : "" ?>" ><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li>
						<?php
						}
					?>
					<li ><a href="../index.php?page=home">Quiter</a></li>
					<li ><a href="index.php?page=logout">Déconnexion</a></li>
	        	</ul>

				<ul class="side-nav" id="mobile-menu">
						<li class="<?php echo ($page=='dashboard')?"active" : "" ?>"><a href="index.php?page=dashboard">Tableau de bord</a></li>
						<?php 
							if(admin() == 1) {
						?>
							<li class="<?php echo ($page=='write')?"active" : "" ?>"><a href="index.php?page=write">Publier un article<a></li>
							<li class="<?php echo ($page=='list')?"active" : "" ?>" ><a href="index.php?page=list">Listing des articles</a></li>
							<li class="<?php echo ($page=='settings')?"active" : "" ?>" ><a href="index.php?page=settings">Parameteres</a></li>
						<?php
							}
						?>
						<li ><a href="../index.php?page=home">Quiter</a></li>
						<li ><a href="index.php?page=logout">Déconnexion</a></li>
					
				</ul>
				<?php
			}
			?>
        
        </div>
    </div>
</nav>