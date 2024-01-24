<?php
get_header();
$videos_custom_title = get_field('videos_custom_title', 'option');
$videos_description = get_field('videos_description', 'option');
$videos_m_description = get_field('videos_m_description', 'option');
$videos_banner = get_field('videos_banner', 'option');
$videos_mobile_banner = get_field('videos_mobile_banner', 'option');
?>
<!-- new banner full start -->
<section class="banner-wrapper banner-new banner-blog aos-init aos-animate" data-aos="fade-up" style="background-image:url(<?= $videos_banner['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 align-self-center">
                <div class="banner-inner">
                    <?php if ($videos_custom_title) { ?>
                        <h1 class="banner-title"><?= $videos_custom_title; ?></h1>
                    <?php } ?>
                    <?php if ($videos_description) { ?>
                        <p class="banner-para"><?= $videos_description; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new banner full end -->
<!-- new banner full responsive start -->
<section class="banner-wrapper banner-new banner-resp banner-blog banner-hide">
    <?php if ($videos_mobile_banner) { ?>
        <div class="banner-img-bg">
            <img src="<?= $videos_mobile_banner['url']; ?>" alt="banner-img-bg">
        </div>
    <?php } ?>
    <div class="banner-inner">
        <?php if ($videos_custom_title) { ?>
            <h1 class="banner-title"><?= $videos_custom_title; ?></h1>
        <?php } ?>
        <?php if ($videos_description) { ?>
            <p class="banner-para"><?= $videos_description; ?></p>
        <?php } ?>
    </div>
</section>
<!-- new banner full responsive end -->
<div id="content" class="site-content pf-space">
    <div id="primary" class="content-area <?= bootscore_container_class(); ?>">
        <?php bs_after_primary(); ?>
        <div class="row">
            <?php if (!empty($videos_m_description)) {
                ?>
                <p class="sec-para title-space"><?php echo $videos_m_description; ?></p>
                <!-- Grid Layout -->
            <?php } if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-4">
                        <div class="card horizontal blog-card mb-4" data-aos="fade-up">
                            <div class="row g-0">
                                <?php
                                $iframe_html = get_field('iframe_html');
                                if ($iframe_html != NULL) {
                                    ?>
                                    <div class="ratio ratio-16x9"><?= $iframe_html; ?></div>  
                                <?php } else { ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'card-img-lg-start')); ?>
                                    </a>
                                <?php } ?>
                                <div class="col">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <?php
                                                if ('videos' === get_post_type()) {
                                                    $categories = get_the_terms(get_the_ID(), 'video_category');
                                                    //echo '<p class="category-badge">';
                                                    $thelist = '';
                                                    $i = 0;
                                                    foreach ($categories as $category) {
                                                        if (0 < $i)
                                                            $thelist .= ' ';
                                                        $thelist .= '<a href="' . home_url() . '/videos" class="badge bg-primary-subtle text-primary-emphasis text-decoration-none">' . $category->name . '</a>';
                                                        $i++;
                                                    }
                                                    //echo $thelist;
                                                    //echo '</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php if ('videos' === get_post_type()) : ?>
                                            <p class="meta small mb-2 text-body-tertiary">
                                                <?php bootscore_author(); ?> |
                                                <?php bootscore_date(); ?>
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
                                            <?php _e('Watch Now »', 'bootscore'); ?>
                                        </a>
                                        <?php bootscore_tags(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <footer class="entry-footer pf-pagination">
                <?php bootscore_pagination(); ?>
            </footer>
            <!-- </main> -->
        </div> <!-- Grid Layout End -->
    </div>
</div>
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
<?php
get_footer();
