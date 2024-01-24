<?php
/* Template Name: Resources */
get_header();
?>
<!-- banner section start -->
<section class="banner-wrapper bg-clr" data-aos="fade-up">
    <?php get_template_part('template-parts/page-banner-sec'); ?>
</section>
<!-- banner section end -->
<section class="resource-wrapper pf-space">
    <div class="container">
        <div class="row">
            <?php if( have_rows('resources_details') ){
                while( have_rows('resources_details') ) { the_row();
                    $resource_image = get_sub_field('resource_image');
                    $resource_title = get_sub_field('resource_title');
                    $resource_link = get_sub_field('resource_link');?>
            <div class="col-md-3">        
                <a href="<?= $resource_link; ?>">
                    <div class="resources-grid">
                        <?php if($resource_image) {?>
                            <img src="<?= $resource_image['url']; ?>">
                        <?php } ?>
                        <?php if($resource_title) {?>
                            <h3><?= $resource_title; ?></h3>
                        <?php } ?>
                    </div>
                </a>    
            </div>    
            <?php }} ?>
        </div>
    </div>    
</section>
<?php
get_footer();
?>