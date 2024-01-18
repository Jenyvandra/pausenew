<?php
/* Template Name: Quiz Page */

get_header();
?>
<!-- banner section start -->
<section class="banner-wrapper bg-clr" data-aos="fade-up">
    <?php get_template_part('template-parts/page-banner-sec'); ?>
</section>
<!-- banner section end -->
<section class="quiz-sec pf-space">
    <div class="container">
        <div class="quiz-warpper" data-aos="fade-up">
            <div class="quiz-inner">
                <?php the_content();?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>