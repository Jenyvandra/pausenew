<?php
/**
 * The template for displaying doctor archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */
get_header();
?>
<?php
$doctor_custom_title = get_field('doctor_custom_title', 'option');
$doctor_detail_cta = get_field('doctor_detail_cta', 'option');
$doctor_description = get_field('doctor_description', 'option');
$doctor_banner = get_field('doctor_banner', 'option');
$doctor_mobile_banner = get_field('doctor_mobile_banner', 'option');
?>

<!-- new banner full start -->
<section class="banner-wrapper banner-new banner-dr aos-init aos-animate" data-aos="fade-up" style="background-image:url(<?= $doctor_banner['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-5 align-self-center">
                <div class="banner-inner">
                    <?php if ($doctor_custom_title) { ?>
                        <h1 class="banner-title"><?= $doctor_custom_title; ?></h1>
                    <?php } ?>
                    <?php if ($doctor_description) { ?>
                        <p class="banner-para"><?= $doctor_description; ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="btn-wrapper">
                <a href="<?php echo $doctor_detail_cta['url']; ?>#drSpecialist">
                    <button class="btn pfbtn-solid"><?php echo $doctor_detail_cta['title']; ?><img src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/o-letter-white.png" alt="white arrow" class="img-arrow-show">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/o-letter-orange.png" alt="orange arrow" class="img-arrow-hide">
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- new banner full end -->


<!-- new banner full responsive start -->
<section class="banner-wrapper banner-new banner-dr-resp banner-resp banner-hide">
    <?php if ($doctor_mobile_banner) { ?>
        <div class="banner-img-bg">
            <img src="<?= $doctor_mobile_banner['url']; ?>" alt="banner-img-bg">
        </div>
    <?php } ?>
    <div class="banner-inner">
        <?php if ($doctor_custom_title) { ?>
            <h1 class="banner-title"><?= $doctor_custom_title; ?></h1>
        <?php } ?>
        <?php if ($doctor_description) { ?>
            <p class="banner-para"><?= $doctor_description; ?></p>
        <?php } ?>
        <div class="btn-wrapper">
            <a href="<?php echo $doctor_detail_cta['url']; ?>#drSpecialist">
                <button class="btn pfbtn-solid"><?php echo $doctor_detail_cta['title']; ?><img src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/o-letter-white.png" alt="white arrow" class="img-arrow-show">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/o-letter-orange.png" alt="orange arrow" class="img-arrow-hide">
                </button>
            </a>
        </div>
    </div>
</section>
<!-- new banner full responsive end -->

<div id="content" class="site-content">
    <?php bs_after_primary(); ?>

    <div id="main" class="site-main <?= bootscore_container_class(); ?>">
        <?php
        $comprehensive_care = get_field('comprehensive_care', 'option');
        $comprehensive_care_description = get_field('comprehensive_care_description', 'option');
        $experienced_specialists = get_field('experienced_specialists', 'option');
        $experienced_specialists_description = get_field('experienced_specialists_description', 'option');
        $doctor_expect_title = get_field('doctor_expect_title', 'option');
        $doctor_expect_left_content = get_field('doctor_expect_left_content', 'option');
        $doctor_expect_right_image = get_field('doctor_expect_right_image', 'option');
        ?>
        <!-- comprehensive care sec start -->
        <section class="dr-care-wrapper works-wrapper pf-space aos-init aos-animate" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="dr-care-title">
                            <?php if ($comprehensive_care) { ?>
                                <h2 class="sec-title"><?= $comprehensive_care; ?></h2>
                            <?php } ?>
                            <?php if ($comprehensive_care_description) { ?>
                                <p class="sec-para title-space"><?= $comprehensive_care_description; ?></p>
                            <?php } ?>
                        </div>
                        <div class="dr-care-list">
                            <ul>
                                <?php
                                if (have_rows('comprehensive_care_list', 'option')) {
                                    while (have_rows('comprehensive_care_list', 'option')) {
                                        the_row();
                                        $list_image = get_sub_field('list_image');
                                        $list_title = get_sub_field('list_title');
                                        ?>
                                        <li>
                                            <div class="dr-care-wrapper">
                                                <?php if ($list_image) { ?>
                                                    <div class="care-img">
                                                        <img src="<?= $list_image['url']; ?>" alt="Obs/Gyn">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($list_title) { ?>
                                                    <div class="care-title">
                                                        <h4><?= $list_title; ?></h4>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- comprehensive care sec end -->

        <!-- experience sec start -->
        <section class="dr-specialist vision-wrapper pf-btmspace aos-init aos-animate" data-aos="fade-up" id="drSpecialist">
            <div class="container" style="background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2023/08/orange-bg.png);">
                <div class="row">
                    <div class="col-12 col-xl-12 align-self-center">
                        <div class="vision-left">
                            <?php if ($experienced_specialists) { ?>
                                <h2 class="sec-title title-space"><?= $experienced_specialists; ?></h2>
                            <?php } ?>
                            <?php if ($experienced_specialists_description) { ?>
                                <p><?= $experienced_specialists_description; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- experience sec end -->

        <!-- dr list section start -->
        <div class="dr-spcl-list drlist-inner drlist-sec">
            <div class="row">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $dt_title = get_the_title();
                        $dt_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                        $dt_designations = get_field('designations');
                        $long_designations = get_field('long_designations');
                        $dt_years_of_experience = get_field('years_of_experience');
                        $doctor_link = get_permalink();
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <a href="<?= $doctor_link; ?>/#dr-profile">
                                <div class="card" data-aos="fade-up">
                                    <div class="card-top">
                                        <div class="card-img">
                                            <?php if ($dt_image_url) { ?>
                                                <img src="<?= $dt_image_url; ?>" class="img-fluid" alt="<?= $dt_title; ?>">
                                            <?php } ?>
                                        </div>
                                        <div class="card-text">
                                            <?php if ($doctor_link && $dt_title) { ?>
                                                <h4><?= $dt_title; ?></h4>
                                            <?php } ?>
                                            <?php if ($dt_years_of_experience) { ?>
                                                <p><?= $dt_years_of_experience; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-spc">
                                        <?php if ($long_designations) { ?>
                                            <h5><?= $long_designations; ?></h5>
                                        <?php } ?>
                                        <img src="<?= home_url(); ?>/wp-content/uploads/2023/11/o-letter-blue.png" alt="o-letter-blue">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- dr list section end -->

        <!-- what to expect sec start -->
        <section class="dr-expect works-wrapper pf-btmspace aos-init aos-animate" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if ($doctor_expect_title) { ?>
                            <h2 class="sec-title"><?= $doctor_expect_title; ?></h2>
                        <?php } ?>  
                    </div>
                </div>
                <div class="works-inner">
                    <div class="row">
                        <div class="col-12 col-xl-7">
                            <div class="works-listwrapper">
                                <?php if ($doctor_expect_left_content) { ?>
                                    <p class="sec-para title-space"><?= $doctor_expect_left_content; ?></p>
                                <?php } ?>  
                                <div class="expext-list-wrapper">
                                    <div class="expect-inner">
                                        <ul>
                                            <?php
                                            if (have_rows('doctor_expect_left_list', 'option')) {
                                                while (have_rows('doctor_expect_left_list', 'option')) {
                                                    the_row();
                                                    $list_image = get_sub_field('list_image');
                                                    $list_title = get_sub_field('list_title');
                                                    ?>
                                                    <li>
                                                        <div class="dr-care-wrapper">
                                                            <?php if ($list_image) { ?>
                                                                <div class="care-img">
                                                                    <img src="<?= $list_image['url']; ?>" alt="Goal Tracking">
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($list_title) { ?>
                                                                <div class="care-title">
                                                                    <h4><?= $list_title; ?></h4>
                                                                </div>
                                                            <?php } ?>  
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="expect-inner">
                                        <ul>
                                            <?php
                                            if (have_rows('doctor_expect_right_list', 'option')) {
                                                while (have_rows('doctor_expect_right_list', 'option')) {
                                                    the_row();
                                                    $list_image = get_sub_field('list_image');
                                                    $list_title = get_sub_field('list_title');
                                                    ?>
                                                    <li>
                                                        <div class="dr-care-wrapper">
                                                            <?php if ($list_image) { ?>
                                                                <div class="care-img">
                                                                    <img src="<?= $list_image['url']; ?>" alt="Goal Tracking">
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($list_title) { ?>
                                                                <div class="care-title">
                                                                    <h4><?= $list_title; ?></h4>
                                                                </div>
                                                            <?php } ?>  
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php if ($doctor_expect_right_image) { ?>
                            <div class="col-12 col-xl-5">
                                <img src="<?= $doctor_expect_right_image['url']; ?>" alt="What you can expect" class="works-img">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- what to expect sec end -->

        <!-- footer start -->
        <footer class="entry-footer">
            <?php bootscore_pagination(); ?>
        </footer>
        <!-- footer end -->
    </div>
</div>

<?php
get_footer();
