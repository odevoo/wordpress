<?php/*
Template Name: modele-accueil
*/
?>

<?php get_header(); ?>
			
			<div class="grid grid-2-1 grid-top">
					<div id="contenu">
			<?php 
				$args = array(
					'posts_per_page' => 1,
					'category_name' => 'agenda'
				);
				$loop = new WP_Query($args);
			?>
						<div class="grid grid-2 grid-stretch">
							<section class="rubrique bord-rubrique">
								<header>
									<h2>Agenda</h2>
								</header>
								<?php
								if ($loop->have_posts()) :
									while ($loop->have_posts()) :
										$loop->the_post();
								?>
								<article class="bloc-lien">
									<?php get_template_part('content-accueil') ?>
									<?php
										$category_id = get_cat_ID('Agenda' );
										$category_link = get_category_link( $category_id );
									?>
									<p class="lien-categorie">
										<span class="icon-fleche" aria-hidden="true"></span>
										<a href="<?php echo esc_url( $category_link ); ?>">Tous les événements</a>

									</p>
									
								</article>
							</section>
							<?php 
									endwhile;
								endif;
								wp_reset_postdata();
							
				$args = array(
					'posts_per_page' => 1,
					'category_name' => 'actualites'
				);
				$loop = new WP_Query($args);
			?>
							<section class="rubrique bord-rubrique">
								<header>
									<h2>Actualités</h2>
								</header>
								<?php
								if ($loop->have_posts()) :
									while ($loop->have_posts()) :
										$loop->the_post();
								?>
								<article class="bloc-lien">
									<?php get_template_part('content-accueil') ?>
									<?php
										$category_id = get_cat_ID('Actualités' );
										$category_link = get_category_link( $category_id );
									?>
									<p class="lien-categorie">
										<span class="icon-fleche" aria-hidden="true"></span>
										<a href="<?php echo esc_url( $category_link ); ?>">Toutes les actualités</a>
									</p>
								</article>
							</section>
							<?php 
									endwhile;
								endif;
								wp_reset_postdata();
							?>
						</div>
					</div>
			
			<?php 
					get_sidebar();
			?>
			</div>
<?php get_footer() ?>