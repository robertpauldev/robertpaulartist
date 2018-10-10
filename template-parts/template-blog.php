<?php
/**
 * Template Part: Blog partial
 */

?>

<article class="blog-post">
	<figure class="blog__thumbnail">
		<h3 class="blog__title">
			<a class="blog__link" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?> | <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<img class="blog__thumbnail-media" alt="" src="<?php echo esc_url( get_the_post_thumbnail_url( '', 'preview' ) ); ?>" />
				<span class="blog__title-text"><?php echo esc_html( get_the_title() ); ?></span>
			</a>
		</h3>
		<?php rpa_the_excerpt( 'blog__excerpt' ); ?>
		<time class="blog__date">
			<span class="icon-clock"></span><?php echo esc_html( get_the_date() ); ?>
		</time>
	</figure>
</article>
