<?php
/**
 * Template Name: Галерея
 */
get_header();
?>

<main class="page-articles">
    <h1 class="main-h2"><?php echo the_title(); ?></h1>

    <div class="page__entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'jvtravel'),
                'after' => '</div>',
            )
        );
        ?>
    </div>
    <?php echo do_shortcode('[my_gallery id="57" limit="6"]'); ?>

    <div class="load-more-container">
        <button id="load-more-btn" class="super-orange-button" data-post-id="57" data-offset="6">Загрузить ещё</button>
    </div>

</main>

<?php
get_footer();
?>