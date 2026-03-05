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

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $query = new WP_Query([
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3, // Только 3 поста на страницу
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged, // Текущая страница
    ]);

    if ($query->have_posts()):
        ?>
        <div class="posts-list">
            <?php
            while ($query->have_posts()):
                $query->the_post();
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
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
        </div>

        <!-- Пагинация -->
        <div class="pagination">
            <?php
            echo paginate_links([
                'total' => $query->max_num_pages,
                'current' => $paged,
                'format' => '?paged=%#%',
                'prev_text' => '&laquo; Назад',
                'next_text' => 'Вперёд &raquo;',
            ]);
            ?>
        </div>
    <?php else: ?>
        <p>Записей не найдено.</p>
    <?php endif; ?>


</main>

<?php
get_footer();
?>