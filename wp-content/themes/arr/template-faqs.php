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
    <header class="page-header">
      <h1 class="page-title"><?php the_title(); ?></h1>
    </header>
    <div class="row">
      <?php the_content(); ?>
      <?php echo get_faq_content( $post->ID ); ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>
