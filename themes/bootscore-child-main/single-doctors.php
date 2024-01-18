<?php

/**
 * Template Post Type: doctor
 * @version 5.3.1
 */
get_header(); ?>

<!-- New banner section start -->
<?php get_template_part('template-parts/doctor-detail-banner-sec'); ?>
<!-- New banner section end -->

<div id="content" class="site-content">
  <!-- Hook to add something nice -->
  <?php bs_after_primary(); ?>
  <div class="dr-profile-wrapper pf-space" id="dr-profile">
    <div class="<?= bootscore_container_class(); ?>">
      <div class="row">
        <?php
        $dt_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
        $dt_name = get_the_title();
        $dt_link = get_permalink();
        $dt_designations = get_field('designations');
        $dt_educational_qualifications = get_field('educational_qualifications');
        $consulting_duration = get_field('consulting_duration');
        $doctor_onetime_consultation_fees = get_field('doctor_onetime_consultation_fees');
        $dt_doctor_details = get_field('doctor_details');
        $dt_doctor_booking_link = get_field('doctor_booking_link');
        $doctor_booking_link_offline = get_field('doctor_booking_link_offline');
        $display_availability = get_field('display_availability');
        $display_offline = get_field('display_offline');
        ?>
        <div class="dr-profile-inner" data-aos="fade-up">
          <div class="row align-items-stretch">
            <div class="col-12 col-xl-8">
              <div class="profile-detail-wrapper">
                <div class="profile-box box-left">
                  <?php if ($dt_image_url) { ?>
                    <img src="<?= $dt_image_url; ?>" alt="<?= $dt_name; ?>">
                  <?php } ?>
                </div>
                <div class="profile-box box-right">
                  <div class="dr-status">
                    <?php if($display_availability) {?>
                      <div class="badge text-bg-success">
                        <div class="badge-icon"><img src="<?= home_url(); ?>/wp-content/uploads/2023/11/new-zoom.png" alt="zoom"></div>
                        <div class="badge-text">
                          <h5>Available online</h5>
                        </div>
                      </div>
                    <?php }?>
                    <?php if($display_offline) {?>
                      <div class="badge text-bg-secondary">
                        <div class="badge-icon"><img src="<?= home_url(); ?>/wp-content/uploads/2023/11/location.png" alt="zoom"></div>
                        <div class="badge-text">
                          <h5>Delhi/NCR</h5>
                        </div>
                      </div>
                    <?php }?>
                  </div>
                  <?php if ($dt_name) { ?>
                    <h3><?= $dt_name; ?></h3>
                  <?php } ?>

                  <div class="dr-desg-detail">
                    <div class="profile-desg">
                      <?php if($dt_designations) {?>
                        <h5><?= $dt_designations; ?></h5>
                      <?php } ?>
                    </div>
                    <div class="qualification">
                      <?php if($dt_educational_qualifications) {?>
                        <h6>(<?= $dt_educational_qualifications; ?>)</h6>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dr-detail-wrapper">
                <div class="dr-profile-detail" data-aos="fade-up">
                  <div class="dr-profiledetail-inner">
                    <?php if($doctor_onetime_consultation_fees) {?>
                      <h4>Consultation Fee &#x20B9; <?= $doctor_onetime_consultation_fees; ?></h4>
                    <?php } ?>  
                    <?= $dt_doctor_details; ?>
                  </div>
                </div>
                <div class="dr inner-btn">
                  <div class="dt-booking-consult" data-booking-id="<?= $dt_doctor_booking_link->ID; ?>" data-booking-offline-id="<?= $doctor_booking_link_offline->ID; ?>">
                    <button class="btn pfbtn-solid" data-bs-toggle="modal" data-bs-target="#booking-consult">Book a One-Time Consultation</button>
                  </div>
                  <div class="dt-care-plan">
                    <a href="<?= home_url();?>/programs/"><button class="btn pfbtn-outline">Enroll in Comprehensive Care Plan</button></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="dr-enquiry-form">
                <h4>Get a call back from our health expert</h4>
                <?= do_shortcode('[contact-form-7 id="1e55776" title="Doctors Enquiry Form"]'); ?>
                <p class="form-info">Your personal info is safe with us and will not be shared.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
