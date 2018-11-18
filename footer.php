<?php
/**
 * Template: Footer
 */

?>
		
		</main>
		<footer class="footer">
			<div class="wrap">
				<div class="copyright">&copy;<?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></div>
				<?php
				echo rpa_social( 'facebook' );
				echo rpa_social( 'instagram' );
				?>
			</div>
		</footer>
	</body>
	<?php wp_footer(); ?>
</html>
