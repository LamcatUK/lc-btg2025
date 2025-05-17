<?php
/**
 * Block template for LC Teaser.
 *
 * @package lc-btg2025
 */

defined( 'ABSPATH' ) || exit;

$q = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 4,
	)
);

if ( ! $q->have_posts() ) {
	return;
}
?>
<section class="section-teaser">
	<div class="container py-5">
		<h2 class="text--plum text-center" data-aos="fade-up"><?= esc_html( get_field( 'title' ) ); ?></h2>
		<div class="row g-4">
			<?php
			$c = 0;
			while ( $q->have_posts() ) {
				$q->the_post();
				?>
				<div class="col-sm-6 col-lg-3" data-aos="fade" data-aos-delay="<?= esc_attr( $c * 100 ); ?>">
					<a href="<?= esc_url( get_permalink() ); ?>" class="teaser__link">
						<div class="teaser__image">
							<?= wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array( 'class' => 'img-fluid' ) ); ?>
						</div>
						<div class="teaser__content">
							<h3 class="teaser__title"><?= esc_html( get_the_title() ); ?></h3>
							<div class="teaser__subtitle"><?= esc_html( get_field( 'subtitle', get_the_ID() ) ); ?></div>
							<p class="teaser__excerpt"><?= esc_html( get_field( 'excerpt', get_the_ID() ) ); ?></p>
						</div>
					</a>
				</div>
				<?php
				++$c;
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>