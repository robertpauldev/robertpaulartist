<article class="list">
	<h3 class="list__title">
		<a title="<?php esc_attr_e( $project->post_title ); ?> | <?php esc_attr_e( get_bloginfo( 'name' ) ); ?>" class="list__link" href="<?php esc_url_e( get_the_permalink() ); ?>"><?php esc_html_e( get_the_title() ); ?></a>
	</h3>
	<time class="list__date">
		<span class="entypo-clock"></span><?php esc_html_e( get_the_date() ); ?>
	</time>
</article>
