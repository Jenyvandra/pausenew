<?php
get_header();
$ID = get_the_ID();
$webinar_custom_title = get_field('webinar_custom_title', 'option');
$webinar_description = get_field('webinar_description', 'option');
$webinar_m_description = get_field('webinar_m_description', 'option');
$webinar_banner = get_field('webinar_banner', 'option');
$webinar_mobile_image = get_field('webinar_mobile_image', 'option');

?>
<!-- new banner full start -->
<section class="banner-wrapper banner-new banner-blog aos-init aos-animate" data-aos="fade-up" style="background-image:url(<?= $webinar_banner['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 align-self-center">
                <div class="banner-inner">
                    <?php if ($webinar_custom_title) { ?>
                        <h1 class="banner-title"><?= $webinar_custom_title; ?></h1>
                    <?php } ?>
                    <?php if ($webinar_description) { ?>
                        <p class="banner-para"><?= $webinar_description; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new banner full end -->
<!-- new banner full responsive start -->
<section class="banner-wrapper banner-new banner-resp banner-blog banner-hide">
    <?php if ($webinar_mobile_image) { ?>
        <div class="banner-img-bg">
            <img src="<?= $webinar_mobile_image['url']; ?>" alt="banner-img-bg">
        </div>
    <?php } ?>
    <div class="banner-inner">
        <?php if ($webinar_custom_title) { ?>
            <h1 class="banner-title"><?= $webinar_custom_title; ?></h1>
        <?php } ?>
        <?php if ($webinar_description) { ?>
            <p class="banner-para"><?= $webinar_description; ?></p>
        <?php } ?>
    </div>
</section>
<!-- new banner full responsive end -->
<div id="content" class="site-content pf-space">
    <div id="primary" class="content-area <?= bootscore_container_class(); ?>">
        <?php bs_after_primary(); ?>
        <?php
        $current_date = date('Y-m-d');
        $args = array(
            'post_type' => 'webinars', // Change 'event' to your custom post type name
            'posts_per_page' => get_option('posts_per_page'), // Retrieve all events
            'paged' => $paged,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'relation' => 'AND',
                    array(
                        'key' => 'webinar_start_date', // Upcoming
                        'value' => $current_date,
                        'compare' => '<', // Start date is in the past
                        'type' => 'DATE',
                    ),
                    array(
                        'key' => 'webinar_end_date', // Replace with your ACF end date field key
                        'value' => $current_date,
                        'compare' => '>=', // End date is today or in the future
                        'type' => 'DATE',
                    ),
                ),
            ),
            'orderby' => 'meta_value',
            'order' => 'ASC', // Change to 'DESC' for descending order
        );
        $tw_results = new WP_Query($args);
        $results_count_tw = $tw_results->found_posts;
        ?>
        <!----- Today's Event Start --->
        <?php if ($results_count_tw > 0) { ?>
            <div id="today-webinar" class="row webinar-list">
                <h3><?php _e("Today's Webinars",'pause');?></h3>
                <?php
                // Check if there are events
                if ($tw_results->have_posts()) {
                    while ($tw_results->have_posts()) {
                        $tw_results->the_post();
                        $webinar_start_date = get_field('webinar_start_date');
                        ?>
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
                                                    if ('webinars' === get_post_type()) {
                                                        $categories = get_the_terms(get_the_ID(), 'webinar_category');
                                                        //echo '<p class="category-badge">';
                                                        $thelist = '';
                                                        $i = 0;
                                                        foreach ($categories as $category) {

                                                            if (0 < $i)
                                                                $thelist .= ' ';
                                                            $thelist .= '<a href="' . home_url() . '/webinars" class="badge bg-primary-subtle text-primary-emphasis text-decoration-none">' . $category->name . '</a>';
                                                            $i++;
                                                        }
                                                        //echo $thelist;
                                                        //echo '</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php if ('webinars' === get_post_type()) : ?>
                                                <p class="meta small mb-2 text-body-tertiary">
                                                    <?php bootscore_author(); ?> |
                                                    <?php echo $webinar_start_date;  ?>
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
                        <?php
                    }
                    wp_reset_postdata(); // Restore original post data
                }
                ?>
                <footer class="entry-footer pf-pagination">
                    <?php //bootscore_pagination(); ?>
                </footer>
            </div>
        <?php } ?>
        <!----- End Of Today's Event--->
        <?php
        $current_date = date('Y-m-d');
        $args = array(
            'post_type' => 'webinars', // Change 'event' to your custom post type name
            'posts_per_page' => get_option('posts_per_page'), // Retrieve all events
            'paged' => $paged,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'relation' => 'AND',
                    array(
                        'key' => 'webinar_start_date',
                        'value' => $current_date,
                        'compare' => '>=', // Start date is today or in the future
                        'type' => 'DATE',
                    ),
                    array(
                        'key' => 'webinar_end_date', // Replace with your ACF end date field key
                        'value' => $current_date,
                        'compare' => '>=', // End date is today or in the future
                        'type' => 'DATE',
                    ),
                ),
            ),
            'orderby' => 'meta_value',
            'order' => 'ASC', // Change to 'DESC' for descending order
        );
        $ee_results = new WP_Query($args);
        $results_count_ee = $ee_results->found_posts;       
        ?>
        <!----- Upcoming's Event Start --->
        <?php if ($results_count_ee > 0) { ?>
            <div id="upcoming-webinar" class="row webinar-list">
                <h3><?php _e("Upcoming Webinars",'pause');?></h3>
                <?php
                // Check if there are events
                if ($ee_results->have_posts()) {
                    while ($ee_results->have_posts()) {
                        $ee_results->the_post();
                        $webinar_start_date = get_field('webinar_start_date');
                        ?>
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
                                                    if ('webinars' === get_post_type()) {
                                                        $categories = get_the_terms(get_the_ID(), 'webinar_category');
                                                        //echo '<p class="category-badge">';
                                                        $thelist = '';
                                                        $i = 0;
                                                        foreach ($categories as $category) {
                                                            if (0 < $i)
                                                                $thelist .= ' ';
                                                            $thelist .= '<a href="' . home_url() . '/webinars" class="badge bg-primary-subtle text-primary-emphasis text-decoration-none">' . $category->name . '</a>';
                                                            $i++;
                                                        }
                                                        //echo $thelist;
                                                        //echo '</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php if ('webinars' === get_post_type()) : ?>
                                                <p class="meta small mb-2 text-body-tertiary">
                                                    <?php bootscore_author(); ?> |
                                                    <?php echo $webinar_start_date;  ?>
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
                        <?php
                    }
                    wp_reset_postdata(); // Restore original post data
                } else {
                    // No events found
                    echo 'No Webinars found.';
                }
                ?>
                <?php if ($results_count_ee > get_option('posts_per_page')) { ?>
                    <footer class="entry-footer pf-pagination">
                        <?php bootscore_pagination(); ?>
                    </footer>
                <?php } ?>  
            </div>
        <?php } ?>  
        <!----- End Of Upcoming's Event--->
        <?php
        $current_date = date('Y-m-d');
        $args = array(
            'post_type' => 'webinars', // Change 'event' to your custom post type name
            'posts_per_page' => get_option('posts_per_page'), // Retrieve all events
            'paged' => $paged,
            'fields' => 'ids',
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'relation' => 'AND',
                    array(
                        'key' => 'webinar_start_date', // Past Event
                        'value' => $current_date,
                        'compare' => '<', // Start date is in the past
                        'type' => 'DATE',
                    ),
                    array(
                        'key' => 'webinar_end_date', // Replace with your ACF end date field key
                        'value' => $current_date,
                        'compare' => '<', // End date is in the past
                        'type' => 'DATE',
                    ),
                ),
            ),
            'orderby' => 'meta_value',
            'order' => 'ASC', // Change to 'DESC' for descending order
        );
        $pe_results = new WP_Query($args);
        $results_count_pe = $pe_results->found_posts;
//        print_r($results_count_ee);
        ?>
        <!----- Previous Webinars Start --->
        <?php if ($results_count_pe > 0) { ?>
            <div id="previous-webinar" class="row webinar-list">
                <?php if (!empty($webinar_m_description)) {
                    ?>
                    <p class="sec-para title-space"><?php echo $webinar_m_description; ?></p>
                <?php } ?>
                <h3><?php _e('Previous Webinars', 'pause'); ?></h3>
                <?php
                // Check if there are events
                if ($pe_results->have_posts()) {
                    while ($pe_results->have_posts()) {
                        $pe_results->the_post();
                        $webinar_start_date = get_field('webinar_start_date');
                        ?>
                        <div class="col-md-4">
                            <div class="card horizontal blog-card mb-4 <?= get_the_ID(); ?>" data-aos="fade-up">
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
                                                    if ('webinars' === get_post_type()) {
                                                        $categories = get_the_terms(get_the_ID(), 'webinar_category');
                                                        //echo '<p class="category-badge">';
                                                        $thelist = '';
                                                        $i = 0;
                                                        foreach ($categories as $category) {

                                                            if (0 < $i)
                                                                $thelist .= ' ';
                                                            $thelist .= '<a href="' . home_url() . '/webinars" class="badge bg-primary-subtle text-primary-emphasis text-decoration-none">' . $category->name . '</a>';
                                                            $i++;
                                                        }
                                                        //echo $thelist;
                                                        //echo '</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php if ('webinars' === get_post_type()) : ?>
                                                <p class="meta small mb-2 text-body-tertiary">
                                                    <?php bootscore_author(); ?> |
                                                    <?php echo $webinar_start_date;  ?>
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
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    // No events found
                    echo 'No Webinars found.';
                }
                ?>
                <?php if ($results_count_pe > get_option('posts_per_page')) { ?>
                    <footer class="entry-footer pf-pagination">
                        <?php bootscore_pagination(); ?>
                    </footer>
                <?php } ?>
            </div>
        <?php } ?>  
        <!----- End Of previous Webinars--->
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