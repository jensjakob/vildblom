<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
	<?php wp_head() ?>
</head>
<body>

<div id="flower">
	<img id="logo" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/vildblom-logo.png" width="150" height="100" alt="Vildblom">
	<a id="show-nav" href="#" onClick="document.getElementById('tree').style.display = 'block'; return false;">
		<img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjUiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNSAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTAgMEgyNSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMCAyMSkiIHN0cm9rZT0iYmxhY2siIHN0cm9rZS13aWR0aD0iNSIvPgo8cGF0aCBkPSJNMCAwSDI1IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDEyKSIgc3Ryb2tlPSJibGFjayIgc3Ryb2tlLXdpZHRoPSI1Ii8+CjxwYXRoIGQ9Ik0wIDBIMjUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMykiIHN0cm9rZT0iYmxhY2siIHN0cm9rZS13aWR0aD0iNSIvPgo8L3N2Zz4K">
	</a>
</div>

<div id="nav-items">
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
</div>

<article>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
</article>
	
<div id="window">
	<?php 
	$args = array(
		'post_type' => 'page',
		'orderby' => 'menu_order',
		'order' => 'asc',
		'post_parent' => 0,
		'offset' => 1
	);
	
	$the_query = new WP_Query( $args );
	?>
	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

		<div id="glass" class="id-<?= get_the_ID() ?>">
			<?php if (has_post_thumbnail()): ?>
				<?php if ( !empty( get_the_content() ) ): ?>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('window-preview'); ?></a>
				<?php else: ?>
					<?php the_post_thumbnail('window-preview'); ?>
				<?php endif; ?>
			<?php else: ?>
				<div class="textbox">
					<div>
					<?php if ( !empty( get_the_content() ) ): ?>
						<a href="<?php the_permalink() ?>"><?php echo get_post_meta(get_the_ID(), 'textruta', true); ?></a>
					<?php else: ?>
						<?php echo get_post_meta(get_the_ID(), 'textruta', true); ?>
					<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="text">
				<?php echo get_post_meta(get_the_ID(), 'bildtext', true); ?>
			</div>
		</div>

	<?php
	endwhile;
	wp_reset_postdata();
	?>
</div>

<div id="soil">
	<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/zarina.jpg" alt="Zarina Lindell">
	<div>
		<strong>Vildblom</strong><br>
		Zarina Lindell<br>
		070-757 92 17<br>
		<a href="mailto:vildblom@hotmail.com">vildblom@hotmail.com</a>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>