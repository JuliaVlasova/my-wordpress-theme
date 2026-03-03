<?php
/**
 * Template Name: Главная страница
 */
get_header();
?>

<main class="homepage">
	<div class="post-header post-header_main">
		<div class="homepage__thumbnail"><?php jvtravel_post_thumbnail(); ?></div>
		<div class="post-header__overlay"></div>

		<header class="entry-header">
			<h1><?php echo get_theme_mod('hi_title', 'Приветствую, дорогой друг!'); ?></h1>
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
		<h2 class="main-h2">
			<?php echo get_theme_mod('main_gallery_title', 'Мои замечательные фотографии'); ?>
		</h2>

		<?php echo do_shortcode('[my_gallery id="57" limit="6"]'); ?>
		<a href="/wordpress/?page_id=37" class="view-all-link"><?php echo get_theme_mod('main_gallery_view_all', 'Смотреть все фотографии'); ?></a>
	</section>

	<?php
	// Получаем все категории
	$categories = get_categories([
		'hide_empty' => true,
	]);

	$tabs_data = [];

	foreach ($categories as $cat) {
		$posts = get_posts([
			'numberposts' => 3,
			'category' => $cat->term_id,
			'post_status' => 'publish',
		]);

		$tabs_data[] = [
			'id' => $cat->term_id,
			'name' => $cat->name,
			'posts' => $posts,
		];
	}
	?>

	<section class="tabs-container">
		<h2 class="main-h2">
			<?php echo get_theme_mod('my_notes_title', 'Мои заметки'); ?>
		</h2>
		<!-- Табы -->
		<div class="tabs-nav">
			<?php foreach ($tabs_data as $index => $tab): ?>
				<button class="tab-button <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="<?php echo $tab['id']; ?>">
					<?php echo esc_html($tab['name']); ?>
				</button>
			<?php endforeach; ?>
		</div>

		<!-- Контент табов -->
		<div class="tabs-content">
			<?php foreach ($tabs_data as $index => $tab): ?>
				<div class="tabs-content__item <?php echo $index === 0 ? 'active' : ''; ?>"
					id="tab-<?php echo $tab['id']; ?>">
					<div class="posts-list">
						<?php foreach ($tab['posts'] as $post):
							setup_postdata($post); ?>
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
						<?php endforeach; ?>
					</div>
					<a href="<?php echo get_category_link($tab['id']); ?>" class="view-all-link"><?php echo get_theme_mod('my_notes_view_all', 'Смотреть всё'); ?></a>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
?>