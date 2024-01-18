<div class="container">
    <div class="row">
        <?php
        $menopause_care_section_title = get_field('menopause_care_section_title');
        ?>
        <div class="col-md-12">
            <?php if($menopause_care_section_title) {?>
                <h2 class="sec-title title-space"><?= $menopause_care_section_title;?></h2>
            <?php } ?>
        </div>
    </div>
    <div class="choosing-inner">
        <div class="row">
            <div class="care-wrapper care-detail-first">
            <?php if (have_rows('menopause_left_column')) {
                    while (have_rows('menopause_left_column')) {
                        the_row();
                        $mc_icon_image = get_sub_field('icon_image');
                        $mc_inner_title = get_sub_field('inner_title');
                        $mc_inner_description = get_sub_field('inner_description');
                ?>
                <div class="care-inner">
                    <?php if($mc_icon_image) { ?>
                        <img src="<?= $mc_icon_image['url'];?>" alt="menopasue-care">
                    <?php } ?>
                    <?php if($mc_inner_title) { ?>
                        <h3><?= $mc_inner_title; ?></h3>
                    <?php } ?>
                    <?php if($mc_inner_description) { ?>
                        <p><?= $mc_inner_description; ?></p>
                    <?php } ?>
                </div>
            <?php }
            }?>    
            </div>
            <div class="care-img">
                <?php $mc_center_column = get_field('menopause_center_column'); if($mc_center_column) {?>
                    <img src="<?= $mc_center_column['url'];?>" alt="menopasue-care-bg">
                <?php } ?>    
            </div>
            <div class="care-wrapper care-detail-last">
                <?php if (have_rows('menopause_right_column')) {
                        while (have_rows('menopause_right_column')) {
                            the_row();
                            $mcr_icon_image = get_sub_field('icon_image');
                            $mcr_inner_title = get_sub_field('inner_title');
                            $mcr_inner_description = get_sub_field('inner_description');
                    ?>
                    <div class="care-inner">
                        <?php if($mcr_icon_image) { ?>
                            <img src="<?= $mcr_icon_image['url'];?>" alt="menopasue-care">
                        <?php } ?>
                        <?php if($mcr_inner_title) { ?>
                            <h3><?= $mcr_inner_title; ?></h3>
                        <?php } ?>
                        <?php if($mcr_inner_description) { ?>
                            <p><?= $mcr_inner_description; ?></p>
                        <?php } ?>
                    </div>
                <?php }
                }?>    
            </div>
        </div>
    </div>
</div>