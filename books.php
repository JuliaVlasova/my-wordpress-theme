<?php
/**
 * Template Name: Книги
 */
get_header();

if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <article class="book-single">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>

            <div class="books-grid">
                <?php
                $books = get_posts([
                    'post_type' => 'book',
                    'numberposts' => -1, // Все книги
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                ]);

                if ($books):
                    foreach ($books as $post) {
                        setup_postdata($post);
                        ?>
                        <div class="book-card">
                            <h2><a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a></h2>

                            <?php if (has_post_thumbnail()): ?>
                                <div class="book-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <p class="book-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                else:
                    echo '<p>Книг пока нет.</p>';
                endif;
                ?>
            </div>
        </article>
        <?php
    endwhile;
endif;

get_footer();
?>