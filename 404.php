<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package JVTravel
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e('Упс! Страница не найдена.', 'jvtravel'); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p><?php esc_html_e('Похоже, по этому адресу ничего не найдено. Попробуйте одну из ссылок ниже или воспользуйтесь поиском.', 'jvtravel'); ?>
			</p>

			<?php
			$image_url = get_theme_mod('no_results_image', '');
			if ($image_url) {
				echo '<img src="' . esc_url($image_url) . '" alt="Ничего не найдено" class="no-results__image" />';
			}
			?>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->
</main><!-- #main -->

<?php
get_footer();
