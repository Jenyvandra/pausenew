<div class="container" style="background-image: url('<?php echo site_url();?>/wp-content/uploads/2023/08/orange-bg.png');">
    <div class="row">
        <?php
        $our_vision_title = get_field('our_vision_title');
        $our_vision_description = get_field('our_vision_description');
        $get_started_link = get_field('get_started_link');
        ?>
        <div class="col-12 col-xl-8 align-self-center">
            <div class="vision-left">
                <?php if ($our_vision_title) { ?>
                    <h2 class="sec-title title-space"><?= $our_vision_title; ?></h2>
                <?php } ?>
                <?php if ($our_vision_description) { ?>
                    <p><?= $our_vision_description; ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="col-12 col-xl-4 align-self-center">
            <div class="vision-right">
                <a href="<?= $get_started_link; ?>"><button class="btn pfbtn-white"><?php _e('Get started','pause');?></button></a>
            </div>
        </div>
    </div>
</div>