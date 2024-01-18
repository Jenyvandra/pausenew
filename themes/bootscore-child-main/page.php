<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
if(!is_cart() && !is_checkout()){
?>
<!-- New banner section start -->
  <?php get_template_part('template-parts/page-banner-sec'); ?>
<!-- New banner section end -->
<?php } ?>
<div id="content" class="site-content pf-space">
    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
    <div id="main" class="site-main <?= bootscore_container_class(); ?>">
    <div class="row">
      <div class="col-12">

        <main id="main" class="site-main">

          <header class="entry-header">
            <?php the_post(); ?>
            <?php bootscore_post_thumbnail(); ?>
          </header>

          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </main>

      </div>
    </div>
  </div>
</div>

<?php
get_footer();
