<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */
get_header();
$blog_custom_title = get_field('blog_custom_title', 'option');
$blog_description = get_field('blog_custom_description', 'option');
$blog_banner = get_field('blog_banner', 'option');
$blog_mobile_banner = get_field('blog_mobile_banner', 'option');
?>
<section class="banner-wrapper banner-new banner-blog aos-init aos-animate" data-aos="fade-up" style="background-image:url(<?= $blog_banner['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 align-self-center">
                <div class="banner-inner">
                    <?php if ($blog_custom_title) { ?>
                        <h1 class="banner-title"><?= $blog_custom_title; ?></h1>
                    <?php } ?>
                    <?php if ($blog_description) { ?>
                        <p class="banner-para"><?= $blog_description; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new banner full end -->
<!-- new banner full responsive start -->
<section class="banner-wrapper banner-new banner-resp banner-blog banner-hide">
    <?php if ($blog_mobile_banner) { ?>
        <div class="banner-img-bg">
            <img src="<?= $blog_mobile_banner['url']; ?>" alt="banner-img-bg">
        </div>
    <?php } ?>
    <div class="banner-inner">
        <?php if ($blog_custom_title) { ?>
            <h1 class="banner-title"><?= $blog_custom_title; ?></h1>
        <?php } ?>
        <?php if ($blog_description) { ?>
            <p class="banner-para"><?= $blog_description; ?></p>
        <?php } ?>
    </div>
</section>
<!-- new banner full responsive end -->
<div id="content" class="site-content pf-space">
    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
    <div id="main" class="site-main <?= bootscore_container_class(); ?>">
        <!-- Sticky Post -->
        <?php if (is_sticky() && is_home() && !is_paged()) : ?>
            <div class="row">
                <div class="col">
                    <?php
                    $args = array(
                        'posts_per_page' => 2,
                        'post__in' => get_option('sticky_posts'),
                        'ignore_sticky_posts' => 2
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="card horizontal mb-4">
                                    <div class="row g-0">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="col-lg-6 col-xl-5 col-xxl-4">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium', array('class' => 'card-img-lg-start')); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <?php bootscore_category_badge(); ?>
                                                    </div>
                                                    <div class="col-2 text-end">
                                                        <span class="badge text-bg-danger"><i class="fa-solid fa-star"></i></span>
                                                    </div>
                                                </div>
                                                <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                                                    <?php the_title('<h2 class="blog-post-title h5">', '</h2>'); ?>
                                                </a>
                                                <?php if ('post' === get_post_type()) : ?>
                                                    <p class="meta small mb-2 text-body-tertiary">
                                                        <?php
                                                        bootscore_date();
                                                        bootscore_author();
                                                        bootscore_comments();
                                                        bootscore_edit();
                                                        ?>
                                                    </p>
                                                <?php endif; ?>
                                                <p class="card-text">
                                                    <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                                                        <?= strip_tags(get_the_excerpt()); ?>
                                                    </a>
                                                </p>
                                                <p class="card-text">
                                                    <a class="read-more" href="<?php the_permalink(); ?>">
                                                        <?php _e('Read more »', 'bootscore'); ?>
                                                    </a>
                                                </p>
                                                <?php bootscore_tags(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <!-- col -->
            </div>
            <!-- row -->
        <?php endif; ?>
        <!-- Post List -->
        <div class="row">
            <!-- Grid Layout -->
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    if (is_sticky())
                        continue; //ignore sticky posts
                    ?>
                    <div class="col-md-4">
                        <div class="card horizontal mb-4 blog-card" data-aos="fade-up">
                            <div class="row g-0">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'card-img-lg-start')); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body">
                                    <?php //bootscore_category_badge(); ?>
                                    <?php if ('post' === get_post_type()) : ?>
                                        <p class="meta small mb-2 text-body-tertiary">
                                            <?php bootscore_author(); ?> |
                                            <?php
                                            bootscore_date();
                                            // bootscore_comments();
                                            // bootscore_edit();
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                    <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                                        <?php the_title('<h2 class="blog-post-title h5">', '</h2>'); ?>
                                    </a>
                                    <p class="card-text">
                                        <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                                            <?= strip_tags(get_the_excerpt()); ?>
                                        </a>
                                    </p>
                                    <a class="read-more" href="<?php the_permalink(); ?>">
                                        <?php _e('Read more »', 'bootscore'); ?>
                                    </a>
                                    <?php bootscore_tags(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <footer class="entry-footer pf-pagination">
                <?php bootscore_pagination(); ?>
            </footer>
            <!-- col -->
        </div>
        <!-- row -->
    </div><!-- #main -->
</div><!-- #content -->

<!-- subscribe section start -->
<?php get_template_part('template-parts/fp-subscribe-sec'); ?>
<!-- subscribe section end -->
<!-- subscribe section responsive start -->
<?php $subscriber_section_background_image = get_field('subscriber_section_background_image'); ?>
<section class="subscribe-wrapper subscribe-hide">
    <div class="subscribe-img-bg">
        <img src="<?= home_url(); ?>/wp-content/uploads/2023/09/subscribe-resp-bg.jpg" alt="subscribe-img-bg">
    </div>
    <div class="subscribe-inner">
        <h3>Subscribe To Get The Latest Updates</h3>
        <p>Stay informed and inspired. Subscribe to receive the latest Newsletter.</p>
        <script>
            (function () {
                window.mc4wp = window.mc4wp || {
                    listeners: [],
                    forms: {
                        on: function (evt, cb) {
                            window.mc4wp.listeners.push({
                                event: evt,
                                callback: cb
                            });
                        }
                    }
                }
            })();
        </script><!-- Mailchimp for WordPress v4.9.6 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
        <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-413" method="post" data-id="413" data-name="Subscriber">
            <div class="mc4wp-form-fields">
                <input type="email" name="EMAIL" placeholder="Email address" required="">
                <p>
                    <input type="submit" value="Subscribe">
                </p>
            </div><label style="display: none !important;">Leave this field empty if you're human: <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off"></label><input type="hidden" name="_mc4wp_timestamp" value="1693807529"><input type="hidden" name="_mc4wp_form_id" value="413"><input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1">
            <div class="mc4wp-response"></div>
        </form><!-- / Mailchimp for WordPress Plugin -->
    </div>
</section>
<!-- subscribe section responsive end -->
<!-- footer section start -->
<?php
get_footer();
