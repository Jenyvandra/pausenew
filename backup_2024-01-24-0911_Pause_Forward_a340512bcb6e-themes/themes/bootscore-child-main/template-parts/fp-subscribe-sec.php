<?php
    $subscriber_bg_img = get_field('subscriber_section_background_image', 'option');
    $subscriber_title = get_field('subscriber_title', 'option');
    $subscriber_description = get_field('subscriber_description', 'option');
    $subscriber_form_shortcode = get_field('subscriber_form_shortcode', 'option');
?>
<section class="subscribe-wrapper" style="background-image: url(<?= $subscriber_bg_img['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6" data-aos="fade-up">
                <div class="subscribe-inner">
                    <?php if($subscriber_title) { ?>
                        <h3><?= $subscriber_title; ?></h3>
                    <?php } ?>
                    <?php if($subscriber_description) {?>
                        <p><?= $subscriber_description;?></p>
                    <?php } ?>    
                    <?= do_shortcode($subscriber_form_shortcode);?>
                </div>
            </div>
        </div>
    </div>
</section>