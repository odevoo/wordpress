<?php get_header(); ?>
				<div class="grid grid-2-1 grid-top">
					<div id="contenu">
						<h1>Page non trouvée</h1>
						<p>La page demandée n'existe pas. Pour continuer la navigation, vous pouvez :</p>
						<ul>
							<li>aller à la <a href="<?php echo esc_url(home_url());?>">page d'accueil</a>,</li>
							<?php 
							echo "<pre>";
							print_r($id = get_page_by_title('Plan de site'));
							echo "</pre>";
							$link = get_permalink($id->ID);
							echo "<pre>";
							echo(get_post_status(109));
							echo "</pre>";

						 	?>
							<li>consulter le <a href="<?php echo $link ?>">plan du site</a>,</li>
							
							<li>utiliser le <a href="#recherche">formulaire de recherche</a>.</li>
						</ul>
						<p>En cas de problèmes persistants, n'hésitez pas à nous contacter.
						Vous trouverez nos coordonnées sur la page <a href="<?php echo home_url();?>/contact">contact</a>.</p>
					</div>
					<?php get_sidebar(); ?>
				</div>
<?php get_footer(); ?>