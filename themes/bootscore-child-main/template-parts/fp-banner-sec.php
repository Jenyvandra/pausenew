<div class="container">
    <div class="row">
        <?php
        $banner_right_side_image = get_field('banner_right_side_image');
        $banner_left_title = get_field('banner_left_title');
        $banner_left_subtitle = get_field('banner_left_subtitle');
        $book_virtual_visit_link = get_field('book_virtual_visit_link');
        $free_assessment_link = get_field('free_assessment_link');
        ?>
        <div class="col-12 col-xl-6 align-self-center">
            <?php if ($banner_left_title) { ?>
                <h1 class="banner-title"><?= $banner_left_title; ?></h1>
            <?php } ?>
            <?php if ($banner_left_subtitle) { ?>
                <p class="banner-para"><?= $banner_left_subtitle; ?></p>
            <?php } ?>
            <div class="btn-wrapper">
                <!-- <button class="btn pfbtn-solid">Book Virtual visit <img src="<?= home_url(); ?>/wp-content/uploads/2023/08/right-arrrow.png" alt="right-arrow"></button> -->
                <?php if ($book_virtual_visit_link) { ?>
                    <a href="<?= $book_virtual_visit_link; ?>">
                        <button class="btn pfbtn-solid"><?php _e('Consult Expert','pause');?><i class="fa-solid fa-arrow-right-long"></i></button>
                    </a>
                <?php } ?>
                <?php if ($free_assessment_link) { ?>
                    <a href="<?= $free_assessment_link; ?>">
                        <button class="btn pfbtn-outline">Take Free Assessment</button>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="col-12 col-xl-6 align-self-center">
            <?php if ($banner_right_side_image) { ?>
                <div class="banner-img">
                    <img src="<?= $banner_right_side_image['url']; ?>" alt="homebanner">
                </div>
            <?php } ?>
        </div>
    </div>
</div>