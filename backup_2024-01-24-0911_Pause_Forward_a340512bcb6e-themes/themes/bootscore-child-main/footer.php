<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */
$pf_gen_footer_logo = get_field('pf_gen_footer_logo', 'option');
$pf_footer_first_column_information = get_field('pf_footer_first_column_information', 'option');
$pf_menopause_society_title = get_field('pf_menopause_society_title', 'option');
$pf_menopause_society_logo = get_field('pf_menopause_society_logo', 'option');
$pf_menopause_logo_link = get_field('pf_menopause_logo_link', 'option');
$pf_contact_title = get_field('pf_contact_title', 'option');
$pf_phone_icon = get_field('pf_phone_icon', 'option');
$pf_phone_number = get_field('pf_phone_number', 'option');
$pf_home_icon = get_field('pf_home_icon', 'option');
$pf_address = get_field('pf_address', 'option');
$pf_email_icon = get_field('pf_email_icon', 'option');
$pf_email_address = get_field('pf_email_address', 'option');
$pf_social_title = get_field('pf_social_title', 'option');
$pf_instagram_icon = get_field('pf_instagram_icon', 'option');
$pf_gen_ig_link = get_field('pf_gen_ig_link', 'option');
$pf_facebook_icon = get_field('pf_facebook_icon', 'option');
$pf_gen_fb_link = get_field('pf_gen_fb_link', 'option');
$pf_twitter_icon = get_field('pf_twitter_icon', 'option');
$pf_twitter_link = get_field('pf_twitter_link', 'option');
$pf_youtube_icon = get_field('pf_youtube_icon', 'option');
$pf_youtube_link = get_field('pf_youtube_link', 'option');
$pf_privacy_policy = get_field('pf_privacy_policy', 'option');
$pf_terms_of_use = get_field('pf_terms_of_use', 'option');
$f_one = get_field('pf_footer_first_column_information', 'option');
$f_two = get_field('pf_footer_s_column_information', 'option');
$f_three = get_field('pf_footer_thr_column_information', 'option');
?>
<footer class="pf-mainfooter">
    <div class="<?= bootscore_container_class(); ?>">
        <div class="row">
            <!-- Footer 1 Widget -->
            <div class="col-12 col-md-6 col-lg-3 footer-inner ft-logo">
                <?php if ($pf_gen_footer_logo) { ?>
                    <a href="<?= home_url(); ?>">
                        <img src="<?= $pf_gen_footer_logo['url']; ?>" alt="pauseforward" />
                    </a>
                <?php } ?>
                <?php /* if ($pf_footer_first_column_information) { ?>
                  <p><?= $pf_footer_first_column_information; ?></p>
                  <?php } */ 
                if(!empty($f_one) || empty($f_two) || !empty($f_three)) {
                ?>
                <div class="custom-first-data">
                    <p><?php echo $f_one; ?> </p>
                    <p><?php echo $f_two; ?>   </p>
                    <p> <?php echo $f_three; ?> </p>
                </div>
                <?php }
                ?>
                <p><?php echo $pf_menopause_society_title;?></p>
                <div class="custom-footer-logo">
                    <p>Pauseforward is a member of</p>
                    <?php if ($pf_menopause_society_logo && $pf_menopause_society_title) { ?>
                        <!-- <div class="ft-title">
                          <h5><?= $pf_menopause_society_title; ?></h5>
                        </div> -->
                        <a href="<?= $pf_menopause_logo_link; ?>">
                            <img src="<?= $pf_menopause_society_logo['url']; ?>" alt="Indian Menopause Society" />
                        </a>
                    <?php } ?>
                </div>
            </div>
            <!-- Footer 2 Widget -->
            <div class="col-12 col-md-6 col-lg-2  footer-inner ft-comp">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php endif; ?>
            </div>
            <!-- Footer 3 Widget -->
            <div class="col-12 col-md-6 col-lg-2  footer-inner ft-prog">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php endif; ?>
            </div>
            <!-- Footer 4 Widget -->
            <div class="col-12 col-md-6 col-lg-3  footer-inner ft-contact">
                <?php if ($pf_contact_title) { ?>
                    <div class="ft-title">
                        <h5><?= $pf_contact_title; ?></h5>
                    </div>
                <?php } ?>
                <div class="ct-det">
                    <ul>
                        <?php if ($pf_phone_number && $pf_phone_icon) { ?>
                            <li>
                                <a href="tel:+91<?= $pf_phone_number; ?>">
                                    <div class="contact-icon"><img src="<?= $pf_phone_icon['url']; ?>" alt="phone number"></div>
                                    <span>+91 <?= $pf_phone_number; ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($pf_address && $pf_home_icon) { ?>
                            <li>
                                <div class="contact-icon icon-address"><img src="<?= $pf_home_icon['url']; ?>" alt="address"></div>
                                <span><?= $pf_address; ?></span>
                            </li>
                        <?php } ?>
                        <?php if ($pf_email_icon && $pf_email_address) { ?>
                            <li>
                                <a href="mailto:<?= $pf_email_address; ?>">
                                    <div class="contact-icon"><img src="<?= $pf_email_icon['url']; ?>" alt="Email" width="33"></div>
                                    <span><?= $pf_email_address; ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- Footer 5 Widget -->
            <div class="col-12 col-md-6 col-lg-2  footer-inner ft-social">
                <?php if ($pf_social_title) { ?>
                    <div class="ft-title">
                        <h5><?= $pf_social_title; ?></h5>
                    </div>
                <?php } ?>
                <div class="ft-social-inner">
                    <?php if ($pf_gen_ig_link && $pf_instagram_icon) { ?>
                        <a href="<?= $pf_gen_ig_link; ?>"><img src="<?= $pf_instagram_icon['url']; ?>" alt="instagram"></a>
                    <?php } ?>
                    <?php if ($pf_twitter_link && $pf_twitter_icon) { ?>
                        <a href="<?= $pf_twitter_link; ?>"><img src="<?= $pf_twitter_icon['url']; ?>" alt="twitter"></a>
                    <?php } ?>
                    <?php if ($pf_gen_fb_link && $pf_facebook_icon) { ?>
                        <a href="<?= $pf_gen_fb_link; ?>"><img src="<?= $pf_facebook_icon['url']; ?>" alt="facebook"></a>
                    <?php } ?>
                    <?php if ($pf_youtube_link && $pf_youtube_icon) { ?>
                        <a href="<?= $pf_youtube_link; ?>"><img src="<?= $pf_youtube_icon['url']; ?>" alt="facebook"></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="bottom-footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="f-left">
                    <p>© Copyright 2023 <strong>Pause Forward</strong>. All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="f-right">
                    <p>
                        <?php if ($pf_terms_of_use) { ?>
                            <a href="<?= $pf_terms_of_use; ?>">Terms and Conditions</a>
                        <?php } ?>
                    </p>
                    <p>&</p>
                    <p>
                        <?php if ($pf_privacy_policy) { ?>
                            <a href="<?= $pf_privacy_policy; ?>">Privacy Policy</a>
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- #page -->

<!-- Dr detail page popup start -->
<?php if (is_singular('doctors')) { ?>
    <!-- Modal content start -->
    <div id="booking-consult" class="booking_consult modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <img src="<?= home_url(); ?>/wp-content/uploads/2023/09/working-from-home-laptop-freelance-blogger-entrepreneur-thinking-planning-reading-blog-post-story-vision-smiling-ambitious-motivated-writer-watching-online-webinar-technology-1-scaled.jpg" alt="">
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="close-btn">
                                    <button type="button" class="btn-close" id="cancelbtn" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="booking-content">
                                    <h3 class="title">Select Your Consultation Type</h3>
                                    <!--<p>This appointment is dedicated to addressing the specific health needs of women experiencing menopause, providing personalized guidance, and discussing treatments or lifestyle changes to manage menopausal symptoms effectively.</p>-->
                                    <input type="hidden" id="product-id" name="product-id">
                                    <input type="hidden" id="product-offline-id" name="product-offline-id">
                                    <div class="visit-btn-grp btn-wrapper">
                                        <a class="virtual-success"><button class="btn pfbtn-solid btn-primary primary button red large btn-yes" id="virtual-btn">Book Online Consultation</button></a>
                                        <div class="physical-visit">
                                            <a class="virtual-success"><button class="btn pfbtn-outline btn-primary primary button red large btn-yes" id="virtual-btn-offline">Book Offline Consultation</button></a>

                                            <!--<button class="btn pfbtn-outline btn-default button gray large btn-no" id="virtual-btn">Book Offline Consultation</button>-->
                                            <p>Offline only in Delhi NCR!</p>
                                        </div>
                                    </div>
                                    <div class="dr-add-custom-checkbox">
                                        <input type="checkbox" id="pv-dr-add-custom" name="pv-dradd-custom" value="physicalvisit">
                                        <label for="vehicle1">Please allow our health advisor to call you back and schedule the appointment based on the health expert's availability and your convenience.</label><br>  
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal content end -->





    <!-- Physical msg popup start -->
    <div id="booking-physical-consult" class="booking_physical_consult modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <img src="<?= home_url(); ?>/wp-content/uploads/2023/09/wepik-export-20231127071148e2M4.jpeg" alt="">
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="close-btn">
                                    <button type="button" class="btn-close" id="cancelbtn" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="booking-content">
                                    <h3 class="title">Physical Visit</h3>
                                    <input type="hidden" id="physicall-product-id" name="physicall-product-id">
                                    <p>We only provide service in Delhi NCR!</p>
                                    <div class="dr-add-custom-checkbox">
                                        <input type="checkbox" id="pv-dr-add-custom" name="pv-dradd-custom" value="physicalvisit">
                                        <label for="vehicle1">Physical Visit</label><br>  
                                    </div>
                                    <a class="physical-success"><button class="btn btn-default button gray large btn-no" id="thanks-btn">Close</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Physical msg popup end -->


    <!-- Another Modal content -->
    <!-- <div id="booking-physical-consult" class="booking_physical_consult modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" id="cancelbtn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12 col-xl-6">
                  <img src="<?= home_url(); ?>/wp-content/uploads/2023/09/working-from-home-laptop-freelance-blogger-entrepreneur-thinking-planning-reading-blog-post-story-vision-smiling-ambitious-motivated-writer-watching-online-webinar-technology-1-scaled.jpg" alt="">
                </div>
                <div class="col-12 col-xl-6">
                  <div class="close-btn">
                    <button type="button" class="btn-close" id="cancelbtn" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="booking-content">
                    <h3 class="title">Physically Visit</h3>
                    <input type="hidden" id="physicall-product-id" name="physicall-product-id">
                    <p>We only provide service in Delhi NCR!</p>
                    <a class="physical-success"><button class="btn btn-default button gray large btn-no" id="thanks-btn">Close</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- end of another modal content -->
<?php } ?>
<!-- Dr detail page popup end -->

<div id="spinner-div" class="pt-5">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
<?php wp_footer(); ?>
<script>
    AOS.init({
        easing: 'ease-in-out-sine'
    });
</script>
</body>

</html>