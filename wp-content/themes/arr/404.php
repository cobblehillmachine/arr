<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="single-service">
	<div class="mid-cont">
		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
		</header>
		<div class="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
