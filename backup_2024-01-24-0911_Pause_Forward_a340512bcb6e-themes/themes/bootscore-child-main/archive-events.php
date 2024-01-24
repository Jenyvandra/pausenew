<?php
get_header();
$events_custom_title = get_field('events_custom_title', 'option');
$events_description = get_field('events_description', 'option');
$events_m_description = get_field('events_m_description', 'option');
$events_banner = get_field('events_banner', 'option');
$events_mobile_banner = get_field('events_mobile_banner', 'option');
?>
<!-- new banner full start -->
<section class="banner-wrapper banner-new banner-blog aos-init aos-animate" data-aos="fade-up" style="background-image:url(<?= $events_banner['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 align-self-center">
                <div class="banner-inner">
                    <?php if ($events_custom_title) { ?>
                        <h1 class="banner-title"><?= $events_custom_title; ?></h1>
                    <?php } ?>
                    <?php if ($events_description) { ?>
                        <p class="banner-para"><?= $events_description; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new banner full end -->
<!-- new banner full responsive start -->
<section class="banner-wrapper banner-new banner-resp banner-blog banner-hide">
    <?php if ($events_mobile_banner) { ?>
        <div class="banner-img-bg">
            <img src="<?= $events_mobile_banner['url']; ?>" alt="banner-img-bg">
        </div>
    <?php } ?>
    <div class="banner-inner">
        <?php if ($events_custom_title) { ?>
            <h1 class="banner-title"><?= $events_custom_title; ?></h1>
        <?php } ?>
        <?php if ($events_description) { ?>
            <p class="banner-para"><?= $events_description; ?></p>
        <?php } ?>
    </div>
</section>
<!-- new banner full responsive end -->
<div id="content" class="site-content pf-space">
    <div id="primary" class="content-area <?= bootscore_container_class(); ?>">
        <?php if (!empty($events_m_description)) {
            ?>
            <p class="sec-para title-space"><?php echo $events_m_description; ?></p>
        <?php } bs_after_primary(); ?>
        <?php
        $current_date = date('Y-m-d');
        $args = array(
            'post_type' => 'events',
            'posts_per_page' => get_option('posts_per_page'),
            'paged' => $paged,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'relation' => 'AND',
                    array(
                        'key' => 'event_start_date', // Upcoming
                        'value' => $current_date,
                        'compare' => '<', // Start date is in the past
                        'type' => 'DATE',
                    ),
                    array(
                        'key' => 'event_end_date', // Replace with your ACF end date field key
                        'value' => $current_date,
                        'compare' => '>=', // End date is today or in the future
                        'type' => 'DATE',
                    ),
                ),
            ),
            'orderby' => 'meta_value',
            'order' => 'ASC', // Change to 'DESC' for descending order
        );
        $te_results = new WP_Query($args);
        $results_count = $te_results->found_posts;
        ?>
        <!----- Today's Event Start --->
        <?php if ($results_count > 0) { ?>
            <div id="today-event" class="row event-list">
                <div class="col-md-12">
                    <h3><?php _e("Today's Events", 'pause'); ?></h3>
                    <?php
                    // Check if there are events
                    if ($te_results->have_posts()) {
                        while ($te_results->have_posts()) {
                            $te_results->the_post();
                            $event_start_date = get_field('event_start_date');
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
                                                        if ('events' === get_post_type()) {
                                                            $categories = get_the_terms(get_the_ID(), 'event_category');
                                                            //echo '<p class="category-badge">';
                                                            $thelist = '';
                                                            $i = 0;
                                                            foreach ($categories as $category) {
                                                                if (0 < $i)
                                                                    $thelist .= ' ';
                                                                $thelist .= '<a href="' . home_url() . '/events" class="badge bg-primary-subtle text-primary-emphasis text-decoration-none">' . $category->name . '</a>';
                                                                $i++;
                                                            }
                                                            //echo $thelist;
                                                            //echo '</p>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php if ('events' === get_post_type()) : ?>
                                                    <p class="meta small mb-2 text-body-tertiary">
                                                        <?php bootscore_author(); ?> |
                                                        <?php if(!empty($event_start_date)){
                                                            echo $event_start_date;
                                                        } ?>
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
            </div>
        <?php } ?>
        <!----- End Of Today's Event--->
        <?php
        $current_date = date('Y-m-d');
        $args = array(
            'post_type' => 'events', // Change 'event' to your custom post type name
            'posts_per_page' => get_option('posts_per_page'), // Retrieve all events
            'paged' => $paged,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'relation' => 'AND',
                    array(
                        'key' => 'event_start_date',
                        'value' => $current_date,
                        'compare' => '>=', // Start date is today or in the future
                        'type' => 'DATE',
                    ),
                    array(
                        'key' => 'event_end_date', // Replace with your ACF end date field key
                        'value' => $current_date,
                        'compare' => '>=', // End date is today or in the future
                        'type' => 'DATE',
                    ),
                ),
            ),
            'orderby' => 'meta_value',
            'order' => 'ASC', // Change to 'DESC' for descending order
        );
        $ue_results = new WP_Query($args);
        $results_count_ue = $ue_results->found_posts;
        ?>
        <!----- Upcoming's Event Start --->
        <?php if ($results_count_ue > 0) { ?>
            <div id="upcoming-event" class="row event-list">
                <h3><?php _e('Upcoming Events', 'pause'); ?></h3>
                <?php
                // Check if there are events
                if ($ue_results->have_posts()) {
                    while ($ue_results->have_posts()) {
                        $ue_results->the_post();
                        $event_start_date = get_field('event_start_date');
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
                                                    if ('events' === get_post_type()) {
                                                        $categories = get_the_terms(get_the_ID(), 'event_category');
                                                        //echo '<p class="category-badge">';
                                                        $thelist = '';
                                                        $i = 0;
                                                        foreach ($categories as $category) {

                                                            if (0 < $i)
                                                                $thelist .= ' ';
                                                            $thelist .= '<a href="' . home_url() . '/events" class="badge bg-primary-subtle text-primary-emphasis text-decoration-none">' . $category->name . '</a>';
                                                            $i++;
                                                        }
                                                        //echo $thelist;
                                                        //echo '</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php if ('events' === get_post_type()) : ?>
                                                <p class="meta small mb-2 text-body-tertiary">
                                                    <?php bootscore_author(); ?> |
                                                   <?php if(!empty($event_start_date)){
                                                            echo $event_start_date;
                                                        } ?>
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
                <?php if ($results_count_ue > get_option('posts_per_page')) { ?>
                    <footer class="entry-footer">
                        <?php bootscore_pagination(); ?>                 
                    </footer>
                <?php } ?>  
            </div>
        <?php } ?>
        <!----- End Of Upcoming's Event--->
        <?php
        $current_date = date('Y-m-d');
        $args = array(
            'post_type' => 'events', // Change 'event' to your custom post type name
            'posts_per_page' => get_option('posts_per_page'), // Retrieve all events
            'paged' => $paged,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'relation' => 'AND',
                    array(
                        'key' => 'event_start_date', // Past Event
                        'value' => $current_date,
                        'compare' => '<', // Start date is in the past
                        'type' => 'DATE',
                    ),
                    array(
                        'key' => 'event_end_date', // Replace with your ACF end date field key
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
        ?>
        <!----- Previous Event Start --->
        <?php if ($results_count_pe > 0) { ?>
            <div id="previous-event" class="row event-list">
                <h3><?php _e('Previous Events', 'pause'); ?></h3>
                <?php
                // Check if there are events
                if ($pe_results->have_posts()) {
                    while ($pe_results->have_posts()) {
                        $pe_results->the_post();
                        $event_start_date = get_field('event_start_date');
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
                                                    if ('events' === get_post_type()) {
                                                        $categories = get_the_terms(get_the_ID(), 'event_category');
                                                        //echo '<p class="category-badge">';
                                                        $thelist = '';
                                                        $i = 0;
                                                        foreach ($categories as $category) {

                                                            if (0 < $i)
                                                                $thelist .= ' ';
                                                            $thelist .= '<a href="' . home_url() . '/events" class="badge bg-primary-subtle text-primary-emphasis text-decoration-none">' . $category->name . '</a>';
                                                            $i++;
                                                        }
                                                        //echo $thelist;
                                                        //echo '</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php if ('events' === get_post_type()) : ?>
                                                <p class="meta small mb-2 text-body-tertiary">
                                                    <?php bootscore_author(); ?> |
                                                    <?php if(!empty($event_start_date)){
                                                            echo $event_start_date;
                                                        } ?>
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
                    echo 'No events found.';
                }
                ?>
                <?php if ($results_count_pe > get_option('posts_per_page')) { ?>
                    <footer class="entry-footer pf-pagination">
                        <?php bootscore_pagination(); ?> 
                    </footer>
                <?php } ?>  
            </div>
        <?php } ?>
        <!----- End Of previous Event--->
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
