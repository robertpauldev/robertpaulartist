<?php
defined( 'ABSPATH' ) or die();

/**
 * Template: Footer
 */
?>
		
		</main>
		<?php rpa_inline_style_tag( 'footer' ); ?>
		<footer class="footer">
			<div class="wrap">
				<div class="copyright">
					<?php get_template_part( 'template-parts/template', 'logo' ); ?>
					<span>&copy;<?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
				</div>
				<div class="social">
					<?php
					echo rpa_social( 'facebook' );
					echo rpa_social( 'instagram' );
					?>
				</div>
			</div>
		</footer>
	</body>
	<?php wp_footer(); ?>
</html>
