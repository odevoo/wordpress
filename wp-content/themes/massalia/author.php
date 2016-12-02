<?php get_header(); ?>

<div class="grid grid-2-1 grid-top">
    <div id="contenu">
        <?php if (have_posts()) : ?>
        <section>
            <header>
                <h1>Tous les article(s) de <?php the_author(); ?> </h1>
            </header>
            
            <?php while ( have_posts() ) : the_post(); ?>
            <article class="bloc-lien mb2em clearfix">
                <header>
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                </header>
                <div class="left w50p">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="right w50p excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </article>
            <?php endwhile; ?>
            <?php the_posts_pagination(array('prev_text' => 'Page précédente', 'next_text' => 'Page suivante'));
             ?>
        </section>
        
        
        <?php endif; ?>
        
    </div>
    
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>