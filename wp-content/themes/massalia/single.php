<?php get_header(); ?>
            
    <div class="grid grid-2-1 grid-top">
                    <div id="contenu">
            <?php if (have_posts()) : ?>

            
                <?php while ( have_posts() ) : the_post(); ?>

                <article>
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <p>Publié par <?php  the_author_posts_link(); ?> le <?php the_date() ?> dans la catégorie <?php the_category(' ') ?></p>
                    </header>
                    <?php the_content(); ?>
                </article>

                <?php endwhile; ?>

            <?php endif; ?>
            
                    </div>
            
            <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>