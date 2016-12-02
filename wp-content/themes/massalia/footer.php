		</main>
		<div id="wrapper-footer" class="center">
			<footer id="footer" class="max-largeur center" role="contentinfo">
				<div class="grid grid-2 grid-center">

							<address class="identite">
								<?php dynamic_sidebar( 'Coordonnées' ); ?> 
							</address>
						<?php 
							wp_nav_menu(array('container' => false, 'menu_class' => 'menu-hz', 'menu' => 'Pied de page'));
						?>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>