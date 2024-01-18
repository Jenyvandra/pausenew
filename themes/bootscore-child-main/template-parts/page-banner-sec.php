<?php
$page_custom_title = get_field('page_custom_title');
$page_short_description = get_field('page_short_description');
$display_more_description = get_field('display_more_description');
$another_short_description = get_field('another_short_description');
$contact_email_display = get_field('contact_email_display');
$contact_email = get_field('contact_email');
$page_banner = get_field('page_banner');
$page_mobile_banner = get_field('page_mobile_banner');
if(is_page('quiz')){
  $id = '/quiz/#qa-form';
  $btn_title = 'Take Menopause Quiz';
  $banner_cls = 'banner-quiz';
  $exta_info = 'Get an instant score on submitting';
}
elseif(is_page('free-assessment-survey')) {
  $id = '/free-assessment-survey/#fas-survey-load';
  $btn_title = 'Take Free Menopause Assessment';
  $banner_cls = 'banner-survey';
}
?>

<?php if(is_page('quiz') || is_page('free-assessment-survey')){ ?>

<!-- new banner full start -->
<section class="banner-wrapper banner-new <?= $banner_cls; ?> aos-init aos-animate" data-aos="fade-up" style="background-image:url(<?= $page_banner['url'];?>)">
  <div class="container">
    <div class="row">
      <div class="col-12 col-xl-6 align-self-center">
        <div class="banner-inner">
          <?php if($page_custom_title){ ?>
            <h1 class="banner-title"><?= $page_custom_title; ?></h1>
          <?php } else { ?>
            <h1 class="banner-title"><?= get_the_title(); ?></h1>
          <?php } ?>
           <?php if($page_short_description){?>
            <p class="banner-para"><?= $page_short_description; ?></p>
          <?php } ?>
          <?php if($exta_info){?>
            <p class="maq-banner-p"><?= $exta_info; ?></p>
          <?php } ?>
          <?php if($display_more_description){?>
            <p class="fas-banner-p"><?= $another_short_description; ?></p>
          <?php } ?>
          <div class="btn-wrapper">
            <a href="<?= home_url();?><?= $id;?>">
              <button class="btn pfbtn-solid"><?= $btn_title; ?> <img src="<?= home_url(); ?>/wp-content/uploads/2023/11/o-letter-white.png" alt="white arrow" class="img-arrow-show">
                <img src="<?= home_url(); ?>/wp-content/uploads/2023/11/o-letter-orange.png" alt="orange arrow" class="img-arrow-hide">
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>  
</section>
<!-- new banner full end -->

<!-- new banner full responsive start -->
<section class="banner-wrapper banner-new banner-resp <?= $banner_cls; ?> banner-hide">
  <?php if($page_mobile_banner){ ?>
    <div class="banner-img-bg">
        <img src="<?= $page_mobile_banner['url']; ?>" alt="banner-img-bg">
    </div>
  <?php } ?>
  <div class="banner-inner">
    <?php if($page_custom_title){ ?>
            <h1 class="banner-title"><?= $page_custom_title; ?></h1>
          <?php } else { ?>
            <h1 class="banner-title"><?= get_the_title(); ?></h1>
          <?php } ?>
           <?php if($page_short_description){?>
            <p class="banner-para"><?= $page_short_description; ?></p>
          <?php } ?>
          <?php if($display_more_description){?>
            <p class="fas-banner-p"><?= $another_short_description; ?></p>
          <?php } ?>
    <div class="btn-wrapper">
      <a href="<?= home_url();?><?= $id;?>">
        <button class="btn pfbtn-solid"><?= $btn_title; ?> <img src="<?= home_url(); ?>/wp-content/uploads/2023/11/o-letter-white.png" alt="white arrow" class="img-arrow-show">
          <img src="<?= home_url(); ?>/wp-content/uploads/2023/11/o-letter-orange.png" alt="orange arrow" class="img-arrow-hide">
        </button>
      </a>
    </div>
  </div>
</section>
<!-- new banner full responsive end -->

<?php  } else { ?>
  <h1><?= get_the_title(); ?>
<?php } ?>  


