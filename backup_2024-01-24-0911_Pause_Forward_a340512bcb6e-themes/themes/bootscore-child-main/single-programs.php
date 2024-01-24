<?php

/**
 * Template Post Type: programs
 * @version 5.3.1
 */
get_header();
?>
<section class="small-banner">
    <div class="container">
        <div class="row">
                <h2><?= get_the_title(); ?></h2>
                <?php the_breadcrumb(); ?>
        </div>
    </div>    
</section>
<section class="prog-detail-wrapper pf-space">
  <div class="container">
    <?php
    $program_title = get_the_title();
    $program_by_doctor = get_field('program_by_doctor');
    $program_duration = get_field('program_duration');
    $program_language = get_field('program_language');
    $program_by_doctor = get_field('program_by_doctor');
    $enroll_amount = get_field('enroll_amount');
    $enroll_now_link = get_field('enroll_now_link');
    $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    $selected_doctors = get_field('selected_doctors');
    $program_details = get_field('program_details');
    $program_enrolled = get_field('program_enrolled');
    ?>
    <div class="row align-items-stretch" data-aos="fade-up">
      <div class="col-12 col-xl-7">
        <div class="prog-detail-img prog-height">
          <?php if ($image_url) { ?>
            <img src="<?= $image_url; ?>" alt="program-<?= $program_title; ?>">
          <?php } ?>
        </div>
      </div>
      <div class="col-12 col-xl-5">
        <div class="prog-detail-content prog-height">
          <h3>&#x20B9; <?= $enroll_amount; ?></h3>
          <div class="prog-detail-inner">
            <div class="prog-basic">
              <?php if ($program_language) { ?>
                <img src="<?= home_url(); ?>/wp-content/uploads/2023/08/Play.png" alt="play">
                <p>Language : <span><?= $program_language; ?></span></p>
              <?php } ?>
            </div>
            <div class="prog-basic">
              <?php if ($program_enrolled) { ?>
                <img src="<?= home_url(); ?>/wp-content/uploads/2023/08/3-User.png" alt="enrolled">
                <p>Enrolled : <span><?= $program_enrolled; ?></span></p>
              <?php } ?>
            </div>
            <div class="prog-basic">
              <?php if ($program_duration) { ?>
                <img src="<?= home_url(); ?>/wp-content/uploads/2023/08/Time-Circle.png" alt="duration">
                <p>Duration : <span><?= $program_duration; ?></span></p>
              <?php } ?>
            </div>
          </div>
          <div class="prog-team">
            <h4>Our Team :</h4>
            <ul class="team-name">
              <?php foreach ($selected_doctors as $selected_doctor) { ?>
                <li><?= $selected_doctor->post_title; ?></li>
              <?php } ?>
            </ul>
          </div>
          <div class="prog-detail-btn">
            <?php if ($enroll_now_link) { ?>
              <a href="<?= $enroll_now_link['url']; ?>" class="add_to_cart_button ajax_add_to_cart"><button class="btn pfbtn-solid">Enroll now</button></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="single-prog-detail" data-aos="fade-up">
        <?php if($program_title) {?>
          <h4><?= $program_title;?></h4>
        <?php } ?>
        <?php if($program_by_doctor) {?>
          <h5>By <span><?= $program_by_doctor->post_title; ?></span></h5>
        <?php } ?>  
        <div class="single-prog-inner">
          <h6>Details</h6>
          <?php if($program_details) {?>
            <p><?= $program_details; ?></p>
          <?php }?>  
        </div>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();