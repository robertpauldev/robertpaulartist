<?php
defined( 'ABSPATH' ) or die();

/**
 * Template: Header
 */
?>
<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<?php wp_head(); ?>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0, width=device-width" />

		<!-- Facebook OG Meta -->
		<meta property="og:url" content="<?php rpa_og( 'url' ); ?>" />
		<meta property="og:type" content="<?php rpa_og( 'type' ); ?>" />
		<meta property="og:title" content="<?php rpa_og( 'title' ); ?>" />
		<meta property="og:description" content="<?php rpa_og( 'description' ); ?>" />
		<meta property="og:image" content="<?php rpa_og( 'image' ); ?>" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113917322-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-113917322-1');
		</script>

		<!-- Google Fonts -->
		<link rel="stylesheet" type="text/css" id="rpa-oswald" href="https://fonts.googleapis.com/css2?family=Oswald%3Awght%40200..700&#038;display=swap&#038;ver=5.6.1" media="print" onload='this.media="all"; this.onload=null;' />
	</head>
	<body <?php body_class(); ?>>
		<?php rpa_inline_style_tag( 'masthead' ); ?>
		<header class="masthead">
			<div class="wrap clearfix">
				<h1 class="logo__wrap">
					<a title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo" href="<?php echo esc_url( home_url() ); ?>"><?php get_template_part( 'template-parts/template', 'logo' ); ?></a>
				</h1>
				<?php
				// Navigation styles
				rpa_inline_style_tag( 'navigation' );

				// Navigation
				rpa_nav( '', 'nav', 'nav-bar' );
				?>
			</div>
		</header>
		<main class="content">
			<?php get_template_part( 'template-parts/template', 'promo' ); ?>
