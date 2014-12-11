<?php
/**
* Template Name: Template - FAQS
* Description: Home page Template
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header(); the_post(); ?>

<div id="slider">

  <?php if (has_post_thumbnail( $post->ID ) ):  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
    <div class="slide " style="background-image: url('<?php echo $image[0]; ?>')"></div>
  <?php endif; ?>

  <div class="slider-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/images/tagline-graphic.png" />
  </div>

  <div class="dog-shield">
    <img src="<?php echo get_template_directory_uri(); ?>/images/dog-shield.png" />
  </div>

</div>

<div class="services cont ">

  <div class="mid-cont">
    <h2><?php the_title(); ?></h2>
      <?php $the_query = new WP_Query( 'page_id=25' ); if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <h1><?php echo get_the_content(); ?></h1>
      <?php endwhile; endif; wp_reset_postdata(); ?>
      <div class="row">

      </div>
  </div>

</div>

<?php get_footer(); ?>
