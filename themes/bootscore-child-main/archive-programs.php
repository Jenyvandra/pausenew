<?php
/**
 * The template for displaying programs archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */
get_header();
$program_main_title = get_field('program_main_title', 'option');
$program_title = get_field('program_title', 'option');
$program_description = get_field('program_description', 'option');
$program_cta = get_field('program_cta', 'option');
$program_plan_title = get_field('program_plan_title', 'option');
$program_f_title = get_field('program_f_title', 'option');
$program_f_sub_title = get_field('program_f_sub_title', 'option');
$program_f_btm_title = get_field('program_f_btm_title', 'option');
?>
<!-- new banner start -->
<section class="banner-wrapper banner-prog aos-init aos-animate" data-aos="fade-up" >
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 align-self-center">
                <div class="banner-inner">
                    <?php if (!empty($program_main_title)) {
                        ?>
                        <h1 class="banner-title"><?php echo $program_main_title; ?></h1>
                    <?php } if (!empty($program_title)) { ?>
                        <p class="maq-banner-p"><?php echo $program_title; ?></p>
                    <?php } if (!empty($program_description)) { ?>
                        <p class="banner-para"><?php echo $program_description; ?></p>
                    <?php } ?>
                    <div class="btn-wrapper">
                        <a href="#prog-list-id">
                            <button class="btn pfbtn-solid"><?php _e('Check out our plans', 'pause') ?> <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/o-letter-white.png" alt="white arrow" class="img-arrow-show">
                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/o-letter-orange.png" alt="orange arrow" class="img-arrow-hide">
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 align-self-center">
                <div class="prog-enquiry-form">
                    <?php if (!empty($program_f_title)) {
                        ?>
                        <h4><?php echo $program_f_title; ?></h4>
                    <?php } if (!empty($program_f_sub_title)) {
                        ?>
                        <p class="prog-p"><?php echo $program_f_sub_title; ?></p>
                    <?php }
                    ?>
                    <div class="wpcf7 js" id="wpcf7-f1051-o1" lang="en-US" dir="ltr">
                        <div class="screen-reader-response">
                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="49878db" title="Our Plans Form"]'); ?>
                    </div>
                    <?php if (!empty($program_f_btm_title)) { ?>
                        <p class="form-info"><?php echo $program_f_btm_title; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new baner end -->
<!-- prog list section start -->
<section class="prog-list-wrapper pf-space" id="prog-list-id">
    <div class="container">
        <?php if (!empty($program_plan_title)) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="sec-title title-space"><?php echo $program_plan_title; ?></h2>
                </div>
            </div>
        <?php } ?>
        <div class="row prog-list-inner">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $program_id = get_the_ID();
                    $program_title = get_the_title();
                    $choose_plan_number = get_field('choose_plan_number');
                    $choose_plan_number_title = get_field('choose_plan_number_title');
                    ?>
                    <div class="col-md-4">
                        <div class="card aos-init aos-animate" data-aos="fade-up">
                            <?php if (!empty($choose_plan_number) || !empty($program_title)) {
                                ?>
                                <div class="card-top">
                                    <div class="card-text">
                                        <h3><?php echo $choose_plan_number; ?></h3>
                                        <h4><?php echo $choose_plan_number_title; ?></h4>
                                    </div>
                                </div>
                            <?php } if (!empty($choose_plan_number)) {
                                ?>
                                <a class="card-spc" href="#<?php echo $program_id; ?>">
                                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/o-letter-lightblue.png" alt="o-letter-lightblue" class="arrow-img-show">
                                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/o-letter-white-prog.png" alt="o-letter-lightblue" class="arrow-img-hide">
                                </a>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<!-- prog list section end -->
<!-- 20-11-23 PS-->
<!-- plan 1 section start PS-->
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $program_id = get_the_ID();
        $program_title = get_the_title();
        $program_link = get_permalink(get_the_ID());
        $enroll_now_link = get_field('enroll_now_link');
        $book_a_one_time_link = get_field('book_a_one_time_consultation');
        $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
        $wyce_section_title = get_field('wyce_section_title');
        $wyce_section_description = get_field('wyce_section_description');
        $bs_section_title = get_field('bs_section_title');
        $bs_section_description = get_field('bs_section_description');
        $bs_section_description_amt = get_field('bs_section_description_amt');
        $bs_section_special_package = get_field('bs_section_special_package');
        $bs_section_special_package_amount = get_field('bs_section_special_package_amount');
        $program_experts_available = get_field('program_experts_available');
        $program_experts_main_title = get_field('program_experts_main_title');
        $program_details = get_field('program_details');
        $program_s_details = get_field('program_s_details');
        $program_sub_title = get_field('program_sub_title');
        $dynamic_slug = get_post_field('post_name', get_the_ID());
        $add_class = '';
        $extra_class = '';
        if ($program_id != '289') {
            $add_class = "col-md-6";
            $extra_class = "";
        } else {
            $add_class = "";
            $extra_class = "plan2";
        }
        ?>
        <section class="plansec-wrapper works-wrapper org-sec-spac aos-init aos-animate <?php echo $extra_class; ?>" data-aos="fade-up">
            <div class="container" id="<?php echo $program_id; ?>">
                <div class="row nutrition-section">
                    <?php if (!empty($program_title) || !empty($program_sub_title)) {
                        ?>
                        <div class="col-12">
                            <div class="plansec-title text-center">
                                <h2 class="plan-sect-title"><?php echo $program_title; ?></h2>
                                <p class="plan-sect-subtitle"><?php echo $program_sub_title; ?></p>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="nutrition-inner plan-section">
                        <div class="row  align-items-center">
                            <?php if (!empty($image_url) || !empty($program_title)) {
                                ?>
                                <div class="col-12 col-md-5">
                                    <div class="nutrition-img plan-sec-img">
                                        <img src="<?php echo $image_url; ?>" alt="<?= $program_title; ?>">
                                    </div>
                                </div>
                            <?php } if (!empty($program_details) || !empty($program_s_details)) {
                                ?>
                                <div class="col-12 col-md-7">
                                    <div class="nutrition-details plan-sec-details text-center ">
                                        <?php if (!empty($program_details)) {
                                            ?>
                                            <p><?php echo $program_details; ?></p>
                                        <?php } if (!empty($program_s_details)) {
                                            ?>
                                            <p><?php echo $program_s_details; ?></p>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <div class="common-orange-sec-back spacing">
                        <div class=" common-orange-sec">
                            <div class="row">
                                <div class="col-12 <?php echo $add_class; ?>">
                                    <div class="common-list-org">
                                        <?php if (!empty($wyce_section_title)) {
                                            ?>
                                            <h4><?php echo $wyce_section_title; ?></h4>
                                        <?php } if (!empty($wyce_section_title)) { ?>
                                            <ul>
                                                <?php
                                                foreach ($wyce_section_description as $wsd_key => $wyce_section_description_value) {
                                                    $title = $wyce_section_description_value['title'];
                                                    ?>
                                                    <li><img decoding="async" src="<?php echo site_url(); ?>/wp-content/uploads/2023/11/list-white-arrow.png" alt="pointer"> 
                                                        <span><?php echo $title; ?></span></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php if ($program_experts_available) { ?>
                                    <div class="col-12 <?php echo $add_class; ?>">
                                        <?php
                                        if (have_rows('program_experts_details')) {
                                            while (have_rows('program_experts_details')) {
                                                the_row();
                                                $expert_image = get_sub_field('expert_image');
                                                $expert_title = get_sub_field('expert_title');
                                                $expert_description = get_sub_field('expert_description');
                                                ?>
                                                <div class="common-details-org">
                                                    <h4><?php echo $program_experts_main_title ?></h4>
                                                    <div class="personal-detail d-flex">
                                                        <img src="<?= $expert_image['url']; ?>" alt="<?= $expert_title; ?>">
                                                        <div>
                                                            <h5><?= $expert_title; ?></h5>
                                                            <p><?= $expert_description; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>  
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="common-org-book-packg">
                        <div class="row">
                            <?php if (!empty($bs_section_description) || !empty($bs_section_description_amt) || !empty($book_a_one_time_link)) {
                                ?>
                                <div class="col-12 col-md-6">
                                    <div class="packages-org text-center ">
                                        <?php if (!empty($bs_section_description) || !empty($bs_section_description_amt)) { ?>
                                            <div class="package-details ">
                                                <?php echo $bs_section_description; ?>
                                                <span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $bs_section_description_amt; ?></span>
                                            </div>
                                        <?php } if (!empty($book_a_one_time_link)) {
                                            ?>
                                            <a href="<?php echo $book_a_one_time_link['url']; ?>"><button class="btn pfbtn-solid"><?php echo $book_a_one_time_link['title']; ?></button></a>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            <?php } if (!empty($bs_section_special_package) || !empty($bs_section_special_package_amount) || !empty($enroll_now_link)) { ?>
                                <div class="col-12 col-md-6">
                                    <div class="packages-org text-center ">
                                        <?php if (!empty($bs_section_special_package) || !empty($bs_section_special_package_amount)) { ?>
                                            <div class="package-details ">
                                                <?php echo $bs_section_special_package; ?>
                                                <span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $bs_section_special_package_amount; ?></span>
                                            </div>
                                        <?php } if (!empty($enroll_now_link)) {
                                            ?>
                                            <a href="<?php echo $enroll_now_link['url']; ?>"><button class="btn pfbtn-solid"><?php echo $enroll_now_link['title']; ?></button></a>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
<!-- plan 1 section end -->
<!-- plan 2 section start PS-->
<!-- plan 2 section end -->
<!-- plan 3 section start PS-->
<?php
$wyce_main_title = get_field('wyce_main_title', 'option');
$what_you_can_expect_rep = get_field('what_you_can_expect_rep', 'option');
$comprehensive_title = get_field('comprehensive_title', 'option');
$amount = get_field('amount', 'option');
$enroll_in_plan_cta = get_field('enroll_in_plan_cta', 'option');
?>
<section class="plansec-wrapper works-wrapper org-sec-spac aos-init aos-animate" data-aos="fade-up">
    <div class="container" id="plansec-wrapper-id">
        <div class="row">
            <div class="support-plan">
                <?php if (!empty($wyce_main_title)) {
                    ?>
                    <div class="plansec-title text-center">
                        <h2 class="plan-sect-title"><?php echo $wyce_main_title; ?></h2>
                    </div>   
                    <div class="support-plan-details">
                        <div class="row   align-items-center">
                        <?php } if (!empty($what_you_can_expect_rep)) {
                            ?>
                            <div class="col-12 col-md-8">
                                <div class="expect-cards">
                                    <div class="row ">
                                        <?php
                                        foreach ($what_you_can_expect_rep as $what_you_can_expect_rep_key => $what_you_can_expect_rep_value) {
                                            $icon = $what_you_can_expect_rep_value['icon'];
                                            $title = $what_you_can_expect_rep_value['title'];
                                            $cta = $what_you_can_expect_rep_value['cta'];
                                            ?>
                                            <div class="col-12 col-md-6">
                                                <div class="card aos-init aos-animate" data-aos="fade-up">
                                                    <div class="card-top text-center">
                                                        <?php if (!empty($icon) || !empty($title)) {
                                                            ?>
                                                            <div class="card-text">
                                                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                                <h4><?php echo $title; ?></h4>
                                                            </div>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                    <?php if (!empty($cta)) {
                                                        ?>
                                                        <div class="card-spc"><?php echo $cta['title']; ?></div>
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($comprehensive_title) || !empty($amount) || !empty($enroll_in_plan_cta)) {
                                ?>
                                <div class="col-12 col-md-4">
                                    <div class="comprehensive-card">
                                        <h4><?php echo $comprehensive_title; ?></h4>
                                        <p class="comprehensive_subtitle"><?php _e('A personal wellness assistant will reach out to you to guide and support you for comprehensive menopause care');?></p>
                                        <span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $amount; ?></span>
                                        <a href="<?php echo $enroll_in_plan_cta['url']; ?>"><button class="btn pfbtn-solid CustomBtnSolid"><?php echo $enroll_in_plan_cta['title']; ?></button></a>
                                    </div> 
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- plan 3 section end -->
<?php
get_footer();
