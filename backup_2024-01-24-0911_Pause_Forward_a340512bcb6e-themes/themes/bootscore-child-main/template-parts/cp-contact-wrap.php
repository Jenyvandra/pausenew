<div class="container">
    <?php
    $cu_section_title = get_field('cu_section_title');
    $cu_section_email = get_field('cu_section_email');
    $cu_form_shortcode = get_field('cu_form_shortcode');
    $cu_form_btm_title = get_field('cu_form_btm_title');
    ?>
    <!-- Section Title -->
    <div class="contact-inner" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <!-- <?php if ($cu_section_title) { ?>
                                        <h2 class="sec-title"><?= $cu_section_title; ?></h2>
                <?php } ?>

                <?php if ($cu_section_email) { ?>
                                        <h3><?= $cu_section_email; ?></h3>
                <?php } ?> -->
                <div class="contact-form-inner">
                    <!--- Section Form --->
                    <?php if (!empty($cu_section_title)) { ?>
                        <h2 class="form-title"><?php echo $cu_section_title; ?></h2>
                    <?php } if ($cu_form_shortcode) { ?>
                        <p><?php echo do_shortcode($cu_form_shortcode); ?></p>
                    <?php } if (!empty($cu_form_btm_title)) { ?>
                        <div class="form-info">
                            <p><?php echo $cu_form_btm_title; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>