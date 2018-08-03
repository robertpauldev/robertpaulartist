<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title><?php echo esc_html( get_bloginfo( 'name' ) ); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" />

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

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="masthead">
			<div class="wrap clearfix">
				<a title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo" href="<?php echo esc_url( home_url() ); ?>"><?php get_template_part( 'template-parts/template', 'logo' ); ?></a>
				<?php rpa_nav( '', 'nav', 'nav-bar' ); ?>
			</div>
		</header>
		<main class="content">
