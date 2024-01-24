<div class="container">
    <div class="row">
        <?php
        $menopause_experience_title = get_field('menopause_experience_title');
        $selected_menopause_experiences = get_field('selected_menopause_experiences');
        ?>
        <div class="col-md-12">
            <?php if ($menopause_experience_title) { ?>
                <h2 class="sec-title title-space"><?= $menopause_experience_title; ?></h2>
            <?php } ?>
        </div>
        <div id="carouselExampleDark" class="carousel slide exp-inner" data-bs-ride="true">
            <div class="carousel-inner">
                <?php $i = 0;
                foreach ($selected_menopause_experiences as $menopause_experience) {
                    $active_class = ($i == 0) ? 'active' : '';
                    if ($i == 0) {
                        $interval = '10000';
                    } elseif ($i == 1) {
                        $interval = '2000';
                    } else {
                        $interval = '';
                    }
                    $content = $menopause_experience->post_content;
                    $image_url = wp_get_attachment_url(get_post_thumbnail_id($menopause_experience->ID)); ?>
                    <div class="carousel-item <?= $active_class; ?>" data-bs-interval="<?= $interval; ?>">
                        <div class="exp-inner-det">
                            <div class="lft-sec">
                                <?php if ($image_url) { ?>
                                    <img src="<?= $image_url; ?>" alt="<?= get_the_title(); ?>">
                                <?php } ?>
                            </div>
                            <div class="rgt-sec">
                                <p>
                                    <?= $content; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                } ?>
            </div>
            <div class="pf-carousel-arrows">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="carousel-indicators">
                <?php
                $i = 0;
                foreach ($selected_menopause_experiences as $menopause_experience) {
                    $active_class = ($i == 0) ? 'active' : '';
                ?>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i; ?>" class="<?= $active_class; ?>" aria-label="Slide 1" aria-current="true"></button>
                <?php $i++;
                } ?>
            </div>
        </div>
    </div>
</div>