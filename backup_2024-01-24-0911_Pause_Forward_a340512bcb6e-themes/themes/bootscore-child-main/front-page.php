<!-- header section start -->
<?php
get_header();
?>
<!-- header section end -->

<!-- banner section start -->
<section class="banner-wrapper bg-clr" data-aos="fade-up">
    <?php get_template_part('template-parts/fp-banner-sec'); ?>
</section>
<!-- banner section end -->

<!-- every women section start -->
<section class="exp-wrapper pf-space" data-aos="fade-up">
    <?php get_template_part('template-parts/fp-manopause-exp'); ?>
</section>
<!-- every women section end -->

<!-- menopause symptoms section start -->
<section class="smpt-wrapper pf-btmspace" data-aos="fade-up">
    <?php get_template_part('template-parts/fp-manopause-sym'); ?>
</section>
<!-- menopause symptoms section end -->

<!-- our story section start -->
<section class="story-wrapper pf-btmspace" data-aos="fade-up">
    <?php get_template_part('template-parts/fp-our-story'); ?>
</section>
<!-- our story section end -->

<!-- our vision section start -->
<section class="vision-wrapper pf-btmspace" data-aos="fade-up">
    <?php get_template_part('template-parts/fp-our-vision'); ?>
</section>
<!-- our vision section end -->

<!-- help section start -->
<section class="help-wrapper pf-btmspace">
    <?php get_template_part('template-parts/fp-how-help'); ?>
</section>
<!-- help section end -->

<!-- choosing section start -->
<section class="choosing-wrapper" data-aos="fade-up">
    <?php get_template_part('template-parts/fp-choose-us'); ?>
</section>
<!-- choosing section end -->

<!-- how it works section start -->
<section class="works-wrapper pf-space" data-aos="fade-up">
    <?php get_template_part('template-parts/fp-how-works'); ?>
</section>
<!-- how it works section end -->

<!-- dr-list section start -->
<section class="drlist-wrapper" data-aos="fade-up">
    <?php get_template_part('template-parts/fp-exp-slider-sec'); ?>
</section>
<!-- dr-list section end -->

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
            (function() {
                window.mc4wp = window.mc4wp || {
                    listeners: [],
                    forms: {
                        on: function(evt, cb) {
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
?>
<!-- footer section end -->