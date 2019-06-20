<?php
defined( 'ABSPATH' ) or die();

/**
 * Template Name: Shop
 */

get_header();

/** Custom Fields */
$products = rpa_get_products();
?>

<section class="wrap">
	<div class="shop flex js-loading">
		<header class="entry__header">
			<h1 class="entry__title"><?php echo esc_html( get_the_title() ); ?></h1>
		</header>
		<?php if ( false === empty( $products ) ) : ?>
		<div class="shop__products grid">
			<?php foreach ( $products as $product ) : ?>
			<div class="shop__product"><?php echo $product['code']; ?></div>
			<?php endforeach; ?>
		</div>
		<?php else : ?>
		<div class="shop__empty">
			<?php printf( '<h3 class="shop__empty-title">%s</h3>', 'Sorry, no products for sale at the moment. :(' ); ?>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();