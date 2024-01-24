<?php
/* Template Name: Free Assessment Survey*/
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
<?php
get_footer();
?>