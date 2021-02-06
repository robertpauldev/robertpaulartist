<?php
defined( 'ABSPATH' ) or die();

/**
 * Template Part: Blog partial
 */
?>

<article class="blog-post">
	<figure class="blog__thumbnail">
		<h2 class="blog__title">
			<a class="blog__link" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?> | <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<img class="blog__thumbnail-media" alt="" src="<?php echo esc_url( get_the_post_thumbnail_url( '', 'preview' ) ); ?>" width="600" height="338" loading="lazy" />
				<span class="blog__title-text"><?php echo esc_html( get_the_title() ); ?></span>
			</a>
		</h2>
		<?php rpa_the_excerpt( 'blog__excerpt' ); ?>
		<time class="blog__date">
			<span class="blog__date-wrap">
				<span class="entry__date-icon"><?php echo file_get_contents( RPA_DIRECTORY_URI . '/assets/images/icons/icon_pencil.svg' ); ?></span>
				<span><?php echo esc_html( get_the_date() ); ?></span>
			</span>
		</time>
	</figure>
</article>
