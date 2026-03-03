<?php
/**
 * Template Name: Заметки
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

    <div class="posts-list">
        <?php
        $all_posts = get_posts([
            'numberposts' => -1, // Все записи
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        ]);

        foreach ($all_posts as $post) {
            setup_postdata($post);
            ?>
            <article class="post-preview">
                <a href="<?php the_permalink(); ?>" class="posts-list__image-wrapper">
                    <?php the_post_thumbnail(); ?>
                </a>

                <div class="posts-list__text-block">
                    <h3 class="posts-list__title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="posts-list__description">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                </div>
            </article>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</main>

<?php
get_footer();
?>