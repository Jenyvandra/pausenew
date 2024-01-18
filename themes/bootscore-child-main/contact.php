<?php
/* Template Name: Contact */

get_header();
?>
<?php
$cu_custom_title = get_field('cu_custom_title');
$cu_short_description = get_field('cu_short_description');
$cu_contact_email = get_field('cu_contact_email');
$cu_page_banner = get_field('cu_page_banner');
$cu_page_mobile_banner = get_field('cu_page_mobile_banner');
?>
<!-- new banner section start -->
<!-- <section class="banner-wrapper banner-new banner-contact aos-init aos-animate" data-aos="fade-up" >
  <div class="container">
    <div class="row">
      <div class="col-12 col-xl-6 align-self-center">
        <div class="banner-inner">
<?php if ($cu_custom_title) { ?>
                                    <h1 class="banner-title"><?= $cu_custom_title; ?></h1>
<?php } else { ?>
                                    <h1 class="banner-title"><?= get_the_title(); ?></h1>
<?php } ?>
<?php if ($cu_short_description) { ?>
                                    <p class="banner-para"><?= $cu_short_description; ?></p>
<?php } ?>
<?php if ($cu_contact_email) { ?>
                                    <a href="mailto: <?= $cu_contact_email; ?>" class="contact-link"><?= $cu_contact_email; ?></a>
<?php } ?>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- new banner full responsive start -->
<!-- <section class="banner-wrapper banner-new banner-resp banner-contact banner-hide">
<?php if ($cu_page_mobile_banner) { ?>
                            <div class="banner-img-bg">
                                <img src="<?= $cu_page_mobile_banner['url']; ?>" alt="banner-img-bg">
                            </div>
<?php } ?>
  <div class="banner-inner">
<?php if ($cu_custom_title) { ?>
                              <h1 class="banner-title"><?= $cu_custom_title; ?></h1>
<?php } else { ?>
                              <h1 class="banner-title"><?= get_the_title(); ?></h1>
<?php } ?>
<?php if ($cu_short_description) { ?>
                              <p class="banner-para"><?= $cu_short_description; ?></p>
<?php } ?>
<?php if ($cu_contact_email) { ?>
                              <a href="mailto: <?= $cu_contact_email; ?>" class="contact-link"><?= $cu_contact_email; ?></a>
<?php } ?>
  </div>
</section> -->
<!-- new banner full responsive end -->
<section class="contact-wrapper banner-contact">
    <div class="contact-back-banner" style="background-image:url(<?= $cu_page_banner['url']; ?>)">
        <div class="container">
            <div class="contact-page-details">
                <div class="row">
                    <div class="col-12 col-xl-7">
                        <div class="contact-title text-center">
                            <h3><?php echo $cu_short_description; ?></h3>
                            <img src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/email-new.png" alt="Email" width="33"><a href="tel:<?php echo $cu_contact_email; ?>"><h6><?php echo $cu_contact_email; ?></h6></a>
                        </div>
                        <?php get_template_part('template-parts/cp-contact-wrap'); ?>
                    </div>
                    <?php /* if(!empty($cu_page_mobile_banner)) {
                      ?>
                      <div class="col-12 col-xl-5">
                      <div class="banner-new banner-hide">
                      <div class="new-banner-img">
                      <img src="<?php echo $cu_page_mobile_banner['url'];?>" alt="<?php echo $cu_page_mobile_banner['alt'];?>">
                      </div>
                      </div>
                      </div>
                      <?php }
                     */ ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="banner-wrapper banner-new banner-resp banner-contact banner-hide">
    <?php if ($cu_page_mobile_banner) { ?>
        <div class="banner-img-bg">
            <img src="<?= $cu_page_mobile_banner['url']; ?>" alt="<?= $cu_page_mobile_banner['url']; ?>">
        </div>
    <?php } ?>
    <div class=" contact-wrapper banner-inner">
        <div class="contact-page-details">
            <div class="row">
                <div class="col-12 col-xl-7">
                    <div class="contact-title text-center">
                        <h3><?php echo $cu_short_description; ?></h3>
                        <a href="tel:<?php echo $cu_contact_email; ?>"><h6><?php echo $cu_contact_email; ?></h6></a>
                    </div>
                    <?php get_template_part('template-parts/cp-contact-wrap'); ?>
                </div>
            </div>
        </div>
    </div>
</section> 
<?php
get_footer();
