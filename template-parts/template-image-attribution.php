<?php
defined( 'ABSPATH' ) or die();

// Custom Fields
$attribution = get_field( 'image_attribution' );

if ( false === empty( $attribution ) ) :
?>
<div class="attribution"><?php echo wp_kses_post( $attribution ); ?></div>
<?php
endif;