<?php
/**
 * Template Post Type: events
 *
 * @version 5.3.1
 */
get_header();
if (class_exists('acf')) {
    $event_dr_image = get_field('event_dr_image');
    $event_dr_name = get_field('event_dr_name');
    $event_dr_designation = get_field('event_dr_designation');
    $event_dr_desc = get_field('event_dr_desc');
    $event_first_content = get_field('event_first_content');
    $event_second_content = get_field('event_second_content');
    $event_third_content = get_field('event_third_content');
    $event_four_title = get_field('event_four_title');
    $event_four_content = get_field('event_four_content');
    $event_start_date = get_field('event_start_date');
    $event_end_date = get_field('event_end_date');
}
?>
<section class="small-banner">
    <div class="container">
        <div class="row">
            <div class="small-banner-inner">
                <?php the_breadcrumb(); ?>    
            </div>          
        </div>
    </div>    
</section>
<div id="content" class="site-content pf-btmspace">
    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
    <div id="main" class="site-main <?= bootscore_container_class(); ?>" data-aos="fade-up">
        <div class="row">
            <div class="col-12 col-xl-8">
                <header class="entry-header">
                    <?php
                    $iframe_html = get_field('iframe_html');
                    if ($iframe_html != NULL) {
                        ?>
                        <div class="ratio ratio-16x9"><?= $iframe_html; ?></div>
                        <?php
                    } else {
                        bootscore_post_thumbnail();
                    }
                    ?>
                    <h1><?= get_the_title(); ?></h1>
                    <p class="entry-meta">
                        <small class="text-body-tertiary">
                            <?php bootscore_author(); ?> | <?php echo $event_start_date; ?>
                        </small>
                    </p>
                </header>
                <div class="profile-detail-wrapper">
                    <?php if (!empty($event_dr_image)) {
                        ?>
                        <div class="profile-box box-left">
                            <img src="<?php echo $event_dr_image['url']; ?>" alt="<?php echo $event_dr_image['alt']; ?>">
                        </div>
                    <?php }
                    ?>
                    <div class="profile-box box-right">
                        <?php if (!empty($event_dr_name)) {
                            ?>
                            <h3><?php echo $event_dr_name; ?></h3>
                        <?php } if (!empty($event_dr_designation) || !empty($event_dr_desc)) { ?>
                            <div class="dr-desg-detail">
                                <div class="profile-desg">
                                    <h5><?php echo $event_dr_designation; ?></h5>
                                </div>
                                <div class="qualification">
                                    <h6><?php echo $event_dr_desc; ?></h6>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="entry-content-data">
                    <?php if (!empty($event_first_content)) {
                        ?>
                        <div class="entry-one">
                            <?php echo $event_first_content; ?>
                        </div>
                    <?php } if (!empty($event_second_content)) {
                        ?>
                        <div class="entry-two">
                            <?php echo $event_second_content; ?>
                        </div>
                    <?php } if (!empty($event_third_content)) {
                        ?>
                        <div class="entry-three">
                            <?php echo $event_third_content; ?>
                        </div>
                    <?php } if (!empty($event_four_title) || !empty($event_four_content)) {
                        ?>
                        <div class="entry-four">
                            <h5><?php echo $event_four_title; ?></h5>
                            <?php echo $event_four_content; ?>
                        </div>
                    <?php } the_content(); ?>
                </div>
                <?php
                $event_registration_form = get_field('event_registration_form');
                if ($event_registration_form) {
                    ?>
                    <div class="container">
                        <div class="contact-inner reg-form aos-init" data-aos="fade-up">
                            <div class="row">
                                <div class="col-12">
                                    <h3><?php _e('Events Registration', 'pause'); ?></h3>
                                    <?= do_shortcode('[contact-form-7 id="8330b5f" title="Event Registration Form"]'); ?>
                                </div>
                            </div>
                        </div>  
                    </div>  
                <?php } ?>
                <footer class="entry-footer clear-both">
                    <div class="mb-4">
                        <?php bootscore_tags(); ?>
                    </div>
                    <!-- Related posts using bS Swiper plugin -->
                    <?php if (function_exists('bootscore_related_posts')) bootscore_related_posts(); ?>
                    <!-- <nav aria-label="bS page navigation">
                      <ul class="pagination justify-content-center">
                        <li class="page-item">
                    <?php previous_post_link('%link'); ?>
                        </li>
                        <li class="page-item">
                    <?php next_post_link('%link'); ?>
                        </li>
                      </ul>
                    </nav> -->
                    <?php comments_template(); ?>
                </footer>
            </div>
            <div class="col-12 col-xl-4 order-first order-md-last">
                <aside id="secondary" class="widget-area">
                    <div class="new-custom" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
                        <div class="new-custom-body flex-column">
                            <section id="text-3" class="widget widget_text card card-body mb-4">
                                <h2 class="widget-title card-header h5"><?php _e('Upcoming Events Registration', 'pause'); ?></h2>			
                                <div class="textwidget"><p class="subscribe-text"><?php _e('Stay informed and inspired.', 'pause'); ?></p>
                                    <?php
                                    $ID = get_the_ID();
                                    $start_e_date = get_field('event_start_date', $ID);
                                     $today_e = date('F j, Y');
                                    if ($today_e >= $start_e_date) {
                                        echo do_shortcode('[contact-form-7 id="3e2b857" title="Upcoming Registration (webinar/events)"]');
                                    }else{
                                        ?>
                                        <h4 class="custom-no-data-found"><?php echo _e('No Upcoming Event.', 'pause'); ?></h4>
                                    <?php } ?>                 
                                </div>
                            </section>
                            <?php
                            $pf_instagram_icon = get_field('pf_instagram_icon', 'option');
                            $pf_gen_ig_link = get_field('pf_gen_ig_link', 'option');
                            $pf_facebook_icon = get_field('pf_facebook_icon', 'option');
                            $pf_gen_fb_link = get_field('pf_gen_fb_link', 'option');
                            $pf_twitter_icon = get_field('pf_twitter_icon', 'option');
                            $pf_twitter_link = get_field('pf_twitter_link', 'option');
                            $pf_youtube_icon = get_field('pf_youtube_icon', 'option');
                            $pf_youtube_link = get_field('pf_youtube_link', 'option');
                            ?>
                            <section id="text-4" class="widget widget_text card card-body mb-4">
                                <h2 class="widget-title card-header h5"><?php _e('Share with others', 'pause'); ?></h2>			
                                <div class="textwidget">
                                    <div class="share-icons ft-social-inner">
                                        <?php if (!empty($pf_gen_ig_link) || !empty($pf_instagram_icon)) {
                                            ?>
                                            <a href="<?php echo $pf_gen_ig_link; ?>"><img decoding="async" src="<?php echo $pf_instagram_icon['url']; ?>" alt="<?php echo $pf_instagram_icon['alt']; ?>"></a><br>
                                        <?php } if (!empty($pf_facebook_icon) || !empty($pf_gen_fb_link)) {
                                            ?>
                                            <a href="<?php echo $pf_gen_fb_link; ?>"><img decoding="async" src="<?php echo $pf_facebook_icon['url']; ?>" alt="<?php echo $pf_facebook_icon['alt']; ?>"></a><br>
                                        <?php } if (!empty($pf_twitter_icon) || !empty($pf_twitter_link)) {
                                            ?>
                                            <a href="<?php echo $pf_twitter_link; ?>"><img decoding="async" src="<?php echo $pf_twitter_icon['url']; ?>" alt="<?php echo $pf_twitter_icon['alt']; ?>"></a><br>
                                        <?php } if (!empty($pf_youtube_icon) || !empty($pf_youtube_link)) {
                                            ?>
                                            <a href="<?php echo $pf_youtube_link; ?>"><img decoding="async" src="<?php echo $pf_youtube_icon['url']; ?>" alt="<?php echo $pf_youtube_icon['alt']; ?>"></a>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </section>      
                        </div>
                    </div>
                </aside><!-- #secondary -->
            </div>
        </div>      
    </div>
</div>
<?php
get_footer();
