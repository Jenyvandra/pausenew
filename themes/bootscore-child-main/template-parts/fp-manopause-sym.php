<div class="container">
    <div class="row">
        <?php
        $symptoms_of_menopause_title = get_field('symptoms_of_menopause_title');
        $symptoms_of_menopause_bottom_title = get_field('symptoms_of_menopause_bottom_title');
        ?>
        <div class="col-12">
            <?php if ($symptoms_of_menopause_title) { ?>
                <h2 class="sec-title title-space"><?= $symptoms_of_menopause_title; ?></h2>
            <?php } ?>
        </div>
    </div>
    <div class="smpt-inner">
        <div class="row">
            <?php if (have_rows('symptoms_of_menopause')) {
                while (have_rows('symptoms_of_menopause')) {
                    the_row();
                    $symptoms_icon = get_sub_field('symptoms_icon');
                    $symptoms_name = get_sub_field('symptoms_name'); ?>
                    <div class="col-12 col-md-3">
                        <div class="symptoms-list">
                            <?php if ($symptoms_icon && $symptoms_name) { ?>
                                <img src="<?= $symptoms_icon['url']; ?>" alt="<?= $symptoms_name; ?>">
                                <span><?= $symptoms_name; ?></span>
                            <?php } ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <div class="col-12">
                <?php if ($symptoms_of_menopause_bottom_title) { ?>
                    <p class="smpt-text"><?= $symptoms_of_menopause_bottom_title; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>