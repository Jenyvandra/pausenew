<?php
/**
 * Template Post Type: videos
 *
 * @version 5.3.1
 */
get_header();
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
                    $video_sub_title = get_field('video_sub_title');
                    $video_sub_title_two = get_field('video_sub_title_two');
                    $video_sub_title_three = get_field('video_sub_title_three');
                    if ($iframe_html != NULL) {
                        ?>
                        <div class="ratio ratio-16x9"><?= $iframe_html; ?></div>
                        <?php
                    } else {
                        bootscore_post_thumbnail();
                    }
                    ?> 
                    <h1><?= get_the_title(); ?></h1>
                    <div class="custom-video-data">
                         <h6><?php echo $video_sub_title; ?> </h6>
                        <div class="dr-desg-detail">
                            <div class="profile-desg">
                                <h5><?php echo $video_sub_title_two; ?></h5>
                            </div>
                            <div class="qualification">
                                <h6><?php echo $video_sub_title_three; ?></h6>
                            </div>
                        </div>
                    </div>
                    <p class="entry-meta">
                        <small class="text-body-tertiary">
                            <?php bootscore_author(); ?> | <?php bootscore_date(); ?>
                        </small>
                    </p>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <?php
                $display_registration_form = get_field('display_registration_form');
                if ($display_registration_form) {
                    ?>
                    <div class="container">
                        <div class="contact-inner aos-init" data-aos="fade-up">
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col-6" style="box-shadow: 0px 0px 4px rgba(0,0,0,0.5);padding:20px;">
                                    <?= do_shortcode('[contact-form-7 id="ed123cf" title="Webinar Registration Form"]'); ?>
                                </div>
                                <div class="col">
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
                                <h2 class="widget-title card-header h5"><?php _e('Subscribe To Get The Latest Updates', 'pause'); ?></h2>			
                                <div class="textwidget"><p class="subscribe-text"><?php _e('Stay informed and inspired.', 'pause'); ?></p>
                                    <?php echo do_shortcode('[mc4wp_form id=413]'); ?>
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
