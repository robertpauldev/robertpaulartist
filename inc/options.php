<?php
defined( 'ABSPATH' ) or die();

/**
 * Sets up the Options page.
 *
 * @return void
 */
function rpa_options_page() {
?>

<div class="options__wrap">
	<header class="options__header">
		<h1>Theme Options</h1>
	</header>
	<form method="post" action="options.php">
		<?php
		settings_fields( 'rpa-options' );
		do_settings_sections( 'rpa-options' );
		submit_button();
		?>
	</form>
</div>

<?php
}

/**
 * Adds the Options page to the admin sidebar.
 *
 * @return void
 */
function rpa_add_options() {
	add_menu_page( 'Theme Options', 'Theme Options', 'manage_options', 'rpa-options', 'rpa_options_page', 'dashicons-layout', 98 );
	add_action( 'admin_init', 'rpa_options_section' );
}
add_action( 'admin_menu', 'rpa_add_options' );

/**
 * Registers the Options settings.
 *
 * @return void
 */
function rpa_options_section() {

	register_setting( 'rpa-options', 'rpa_email', 'esc_attr' );
	register_setting( 'rpa-options', 'rpa_messenger', 'esc_attr' );

	add_settings_section( 'rpa_settings_all', '<span class="dashicons dashicons-admin-generic"></span> All Settings', '', 'rpa-options' );

	// Email
	add_settings_field( 'rpa_email', 'Email', 'rpa_callback_textbox', 'rpa-options', 'rpa_settings_all', [ 'rpa_email' ] );

	// Messenger
	add_settings_field( 'rpa_messenger', 'Messenger', 'rpa_callback_textbox', 'rpa-options', 'rpa_settings_all', [ 'rpa_messenger' ] );
}

/**
 * Displays a textbox in the Options admin.
 *
 * @param array $args The Options arguments.
 * @return void
 */
function rpa_callback_textbox( $args ) {
	echo '<input type="text" id="' . esc_attr( $args[0] ) . '" name="' . esc_attr( $args[0] ) . '" value="' . esc_attr( get_option( $args[0] ) ) . '" />';
}
