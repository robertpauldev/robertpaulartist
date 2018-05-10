<?php get_header(); ?>

<section class="wrap">
	<?php while ( have_posts() ) : the_post(); ?>

	<article class="entry">
		<figure class="entry__thumbnail">
			<?php the_post_thumbnail(); ?>
		</figure>
		<div class="entry__cms">
			<?php the_content(); ?>
		</div>
	</article>

	<?php endwhile; ?>
</section>

<?php get_footer();
