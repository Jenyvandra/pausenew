<div class="container">
    <div class="row">
        <?php
        $our_story_title = get_field('our_story_title');
        $our_story_left_side_image = get_field('our_story_left_side_image');
        $our_story_description = get_field('our_story_description');
        $founder_name = get_field('founder_name');
        $founder_linkedin_link = get_field('founder_linkedin_link');
        $founder_associated_society = get_field('founder_associated_society');
        $founder_associated_society_logo = get_field('founder_associated_society_logo');
        $founder_associated_society_link = get_field('founder_associated_society_link');
        ?>
        <div class="col-12 col-xl-5 align-self-center">
            <?php if ($our_story_left_side_image) { ?>
                <img src="<?= $our_story_left_side_image['url']; ?>" alt="Rashi Gandhi" class="story-img">
            <?php } ?>
        </div>
        <div class="col-12 col-xl-7 align-self-center">
            <?php if ($our_story_title) { ?>
                <h2 class="sec-title title-space"><?= $our_story_title; ?></h2>
            <?php } ?>
                <div class="story-inner" style="background-image: url(<?php echo site_url();?>/wp-content/uploads/2023/08/o-letter.png);">
                <?= $our_story_description; ?>
                <div class="story-link">
                    <div class="founder-det">
                        <?php if ($founder_name) { ?>
                            <h3><?= $founder_name; ?></h3>
                        <?php } ?>
                        <div class="pf-profile">
                            <?php if ($founder_linkedin_link) { ?>
                                <a href="<?= $founder_linkedin_link; ?>"><img src="<?= home_url(); ?>/wp-content/uploads/2023/08/logos_linkedin-icon.png" alt="linkedin">
                                    <p><?php _e('Rashi Gandhi','pause');?></p>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="ims-det">
                        <?php if ($founder_associated_society) { ?>
                            <h3><?= $founder_associated_society; ?></h3>
                        <?php } ?>
                        <div class="ims-link">
                            <?php if ($founder_associated_society_link && $founder_associated_society_logo) { ?>
                                <a href="<?= $founder_associated_society_link; ?>"><img src="<?= $founder_associated_society_logo['url']; ?>" alt="Indian Menopause Society">
                                </a>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>