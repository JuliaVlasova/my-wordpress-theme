<?php
/**
 * Template Name: Контакты
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
    <?php echo do_shortcode('[contact-form-7 id="fc3cd71" title="Главная форма"]'); ?>
</main>

<?php
get_footer();
?>