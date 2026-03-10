<?php

get_header();

if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <article class="book-single">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>

            <div class="chapters-list">
                <h2>Главы</h2>
                <?php

                $chapters = get_posts([
                    'post_type' => 'chapter',
                    'meta_query' => [
                        [
                            'key' => 'related_book', 
                            'value' => get_the_ID(),
                            'compare' => '='
                        ]
                    ],
                    'orderby' => 'menu_order date',
                    'order' => 'ASC',
                ]);

                if ($chapters):
                    foreach ($chapters as $chapter) {
                        ?>
                        <div class="chapter-item">
                            <h3><a href="<?php echo get_permalink($chapter->ID); ?>"><?php echo $chapter->post_title; ?></a></h3>
                        </div>
                        <?php
                    }
                else:
                    echo '<p>Глав пока нет.</p>';
                endif;
                ?>
            </div>
        </article>
        <?php
    endwhile;
endif;

get_footer();
?>