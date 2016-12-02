<a href="<?php echo esc_url(get_permalink()); ?>">
    <header>
        <h3>
        <?php the_title(); ?>
        </h3>
    </header>
    <figure>
        <?php the_post_thumbnail(); ?>
    </figure>
</a>
<div class="excerpt">
    <?php the_excerpt(); ?>
</div>
<footer>
    <p><span class="icon-date" aria-hidden="true"></span>Publié le <time><?php echo get_the_date() ?></time></p>
</footer>