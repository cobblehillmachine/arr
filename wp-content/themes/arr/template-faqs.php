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

<div class="services cont center">
  <div class="mid-cont"><br />
    <h4><?php the_title(); ?></h4>
    <h1>Got a Question? </h1>
    <div class="row">
      <?php the_content(); ?>
    </div>
    <?php echo get_faq_questions( $post->ID );?>
  </div>
</div>

<div class="faqs cont">
  <div class="mid-cont">
    <?php echo get_faq_answers( $post->ID ); ?>
  </div>
</div>

<?php get_footer(); ?>
