<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
                $hw_section_title = get_field('hw_section_title');
                $hw_section_description = get_field('hw_section_description');
                $hw_left_image = get_field('hw_left_image');
                $hw_right_content = get_field('hw_right_content');
                $hw_assessment_link = get_field('hw_assessment_link');
            ?>
            <?php if($hw_section_title) { ?>
                <h2 class="sec-title"><?= $hw_section_title;?></h2>
            <?php } ?>
            <?php if($hw_section_description) { ?>
                <p class="sec-para title-space"><?= $hw_section_description;?></p>
            <?php } ?>
            
        </div>
    </div>
    <div class="works-inner">
        <div class="row">
            <div class="col-12 col-xl-6">
                <?php if($hw_left_image) {?>
                    <img src="<?= $hw_left_image['url'];?>" alt="how it works" class="works-img">
                <?php } ?>
            </div>
            <div class="col-12 col-xl-6">
                <div class="works-listwrapper">
                    <?= $hw_right_content; ?>
                    <div class="work-btn btn-wrapper">
                        <?php if($hw_assessment_link) { ?>
                            <a href="<?= $hw_assessment_link;?>"><button class="btn pfbtn-solid">Take Free Assessment <i class="fa-solid fa-arrow-right-long"></i></button></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>