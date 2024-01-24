<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bootscore
 */

get_header();
?>
<!-- banner section start -->
<section class="banner-wrapper bg-clr" data-aos="fade-up">
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-6 align-self-center">
                <h1 class="banner-title">404</h1>
                <p class="banner-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
        <div class="col-12 col-xl-6 align-self-center">
                <div class="banner-img">
                    <img src="<?= home_url(); ?>/wp-content/uploads/2023/08/homebanner-image.png" alt="homebanner">
                </div>
        </div>
    </div>
</div>
</section>
<!-- banner section end -->
  <div id="content" class="site-content <?= bootscore_container_class(); ?> pf-space">
    <div id="primary" class="content-area container">

      <main id="main" class="site-main">

        <section class="error-404 not-found">
          <div class="page-404">
            <!-- Remove this line and place some widgets -->
            <p class="alert alert-info mb-4"><?php esc_html_e('Page not found.', 'bootscore'); ?></p>
            <!-- 404 Widget -->
            <?php if (is_active_sidebar('404-page')) : ?>
              <div><?php dynamic_sidebar('404-page'); ?></div>
            <?php endif; ?>
            <a class="btn btn-outline-primary" href="<?= esc_url(home_url()); ?>" role="button"><?php esc_html_e('Back Home &raquo;', 'bootscore'); ?></a>
          </div>
        </section><!-- .error-404 -->

      </main><!-- #main -->

    </div><!-- #primary -->
  </div><!-- #content -->

<?php
get_footer();
