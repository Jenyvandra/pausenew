<div class="container">
    <div class="row">
        <?php $help_section_title = get_field('help_section_title'); ?>
        <div class="col-12">
            <?php if ($help_section_title) { ?>
                <h2 class="sec-title title-space"><?= $help_section_title; ?></h2>
            <?php } ?>
        </div>
    </div>
    <div class="help-inner-wrapper">
        <?php if (have_rows('help_steps')) {
            while (have_rows('help_steps')) {
                the_row();
                $help_step_title = get_sub_field('help_step_title');
                $help_step_subtitle = get_sub_field('help_step_subtitle');
                $help_step_description = get_sub_field('help_step_description');
                $help_step_image = get_sub_field('help_step_image');
        ?>
                <div class="help-box" data-aos="fade-up">
                    <div class="row">
                        <div class="col-12 col-xl-2 align-self-center">
                            <div class="help-num">
                                <h4>0<?= get_row_index(); ?></h4>
                            </div>
                        </div>
                        <div class="col-12 col-xl-10 align-self-center">
                            <div class="help-detail">
                                <div class="help-txt">
                                    <?php if ($help_step_title) { ?>
                                        <h3><?= $help_step_title; ?></h3>
                                    <?php } ?>
                                    <?php if ($help_step_subtitle) { ?>
                                        <h5><?= $help_step_subtitle; ?></h5>
                                    <?php } ?>
                                    <?php if ($help_step_description) { ?>
                                        <p><?= $help_step_description; ?></p>
                                    <?php } ?>
                                </div>
                                <div class="help-img">
                                    <?php if ($help_step_image) { ?>
                                        <img src="<?= $help_step_image['url']; ?>" alt="help-image">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php  }
        } ?>
    </div>
</div>