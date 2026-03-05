<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package JVTravel
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if (have_posts()): ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf(esc_html__('Результат поиска для: "%s"', 'jvtravel'), '<span>' . get_search_query() . '</span>');
				?>
			</h1>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while (have_posts()):
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part('template-parts/content', 'search');

		endwhile;

		the_posts_navigation();

	else: ?>
		<div class="no-results">
			<div class="no-results__block">
				<h2 class="page-title">Упс! Ничего не найдено</h2>
				<p>Попробуйте изменить поисковый запрос.</p>
				<div class="search-section">
					<?php get_search_form(); ?>
				</div>
			</div>
			<div class="no-results__flex">
				<?php
				$image_url = get_theme_mod('no_results_image', '');
				if ($image_url) {
					echo '<img src="' . esc_url($image_url) . '" alt="Ничего не найдено" class="no-results__image" />';
				}
				?>
			</div>
		</div>

	<?php endif;
	?>

</main><!-- #main -->

<?php

get_footer();
