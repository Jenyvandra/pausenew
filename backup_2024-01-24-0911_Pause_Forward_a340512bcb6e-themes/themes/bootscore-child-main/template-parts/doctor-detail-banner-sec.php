<?php
$doctor_detail_custom_title = get_field('doctor_detail_custom_title','option');
$doctor_detail_description = get_field('doctor_detail_description','option');
$doctor_details_banner = get_field('doctor_details_banner','option');
$doctor_details_mobile_banner = get_field('doctor_details_mobile_banner','option');
?>
<!-- new banner start -->
<section class="banner-wrapper banner-new banner-dr-profile" style="background-image:url(<?= $doctor_details_banner['url'];?>);">
  <div class="container">
    <div class="row">
      <div class="col-12 col-xl-6 align-self-center">
        <div class="banner-inner">
            <?php if($doctor_detail_custom_title) {?>
                <h1 class="banner-title"><?= $doctor_detail_custom_title; ?></h1>
            <?php } ?>
            <?php if($doctor_detail_description) {?>
                <p class="banner-para"><?= $doctor_detail_description; ?></p>
            <?php }?>    
        </div>
        <div class="pf-breadcrumb-inner">
          <?php the_breadcrumb(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- new banner end -->


<!-- new resp banner start -->
<section class="banner-wrapper banner-new banner-resp banner-dr-profile banner-hide">
   <?php if($doctor_details_mobile_banner) {?> 
    <div class="banner-img-bg">
        <img src="<?= $doctor_details_mobile_banner['url'];?>" alt="banner-img-bg">
    </div>
  <?php } ?>
  <div class="banner-inner">
    <?php if($doctor_detail_custom_title) {?>
        <h1 class="banner-title"><?= $doctor_detail_custom_title; ?></h1>
    <?php } ?>
    <?php if($doctor_detail_description) {?>
        <p class="banner-para"><?= $doctor_detail_description; ?></p>
    <?php }?>
  </div>
  <div class="pf-breadcrumb-inner">
    <?php the_breadcrumb(); ?>
  </div>
</section>
<!-- new resp banner end -->