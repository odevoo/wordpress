<?php get_header(); ?>

<div class="grid grid-2-1 grid-top">
    <div id="contenu">
        <h1>Résultat de recherche pour "<?php the_search_query() ?>"</h1>
        <?php if (have_posts()) : ?>
        
        <?php while ( have_posts() ) : the_post(); ?>
        <article>
            <header>
                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            </header>
            <?php the_excerpt(); ?>
        </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(array('prev_text' => 'Page précédente', 'next_text' => 'Page suivante'));
        ?>
        <?php endif; ?>
        
    </div>
    
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>