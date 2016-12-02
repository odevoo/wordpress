			<aside id="sidebar" role="complementary">
				<h2>En direct</h2>
				<nav id="acces-direct" role="navigation" aria-label="Menu secondaire">

				<?php  
					wp_nav_menu(array('container' => false, 'menu' => 'sidebar'));
				?>
				</nav>
				<div class="service text-center">
					<a href="portail-famille.html"><img alt="Portail familles" src="<?php echo get_template_directory_uri(); ?>/images/portail-familles.jpg">
						<p class="excerpt">Inscription garderie et restaurant scolaire</p>
					</a>
				</div>
			</aside>