<article class="list">
	<h3 class="list__title">
		<a title="<?php echo esc_attr( $project->post_title ); ?> | <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="list__link" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
	</h3>
	<time class="list__date">
		<span class="entypo-clock"></span><?php echo esc_html( get_the_date() ); ?>
	</time>
</article>
