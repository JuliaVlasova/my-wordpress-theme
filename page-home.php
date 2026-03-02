<?php
/**
 * Template Name: Главная страница
 */
get_header();
?>

<main>
	<div class="post-header post-header_main">
		<?php jvtravel_post_thumbnail(); ?>
		<div class="post-header__overlay"></div>

		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			<div class="header__animated-block"></div>
		</header>

		<div class="entry-content">
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
	</div>

	<section class="home-gallery">
		<h2 class="home-gallery__h2">Мои замечательные фотографии</h2>

		<?php echo do_shortcode('[my_gallery id="57" limit="6"]'); ?>
		<a href="/wordpress/?page_id=37">Смотреть все фотографии</a>
	</section>
</main>

<?php
get_footer();
?>