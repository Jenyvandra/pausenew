<div class="container">
    <div class="row">
        <?php
            $specialist_section_title = get_field('specialist_section_title');
            $specialists_description = get_field('specialists_description');
            $selected_specialists = get_field('selected_specialist'); 
        ?>
        <div class="col-12">
            <?php if( $specialist_section_title) { ?>
                <h2 class="sec-title"><?= $specialist_section_title; ?></h2>
            <?php } ?>
            <?php if( $specialists_description) { ?>
            <p class="sec-para title-space"><?= $specialists_description;?></p>
            <?php } ?>
        </div>
    </div>
    <div class="drlist-inner">
        <div class="row">
            <div class="owl-carousel owl-theme">
            <?php $i = 0;
                foreach ($selected_specialists as $specialist) {
                    $active_class = ($i == 0) ? 'active' : '';
                    if ($i == 0) {
                        $interval = '10000';
                    } elseif ($i == 1) {
                        $interval = '2000';
                    } else {
                        $interval = '';
                    }
                    $title = $specialist->post_title;
                    $experinence = get_field('years_of_experience',$specialist->ID );
                    $designations = get_field('designations',$specialist->ID );
                    $image_url = wp_get_attachment_url(get_post_thumbnail_id($specialist->ID)); 
                    ?>
                <a href="<?= get_permalink($specialist->ID);?>">
                <div class="item">
                    <div class="card">
                        <div class="card-top">
                            <div class="card-img">
                                <?php if($image_url) {?>
                                    <img src="<?= $image_url; ?>" class="img-fluid" alt="<?= $title; ?>">
                                <?php } ?>
                            </div>
                            <div class="card-text">
                                <?php if($title) {?>
                                    <h4><?= $title; ?></h4>
                                <?php } ?>    
                                <?php if($experinence) {?>    
                                    <p><?= $experinence; ?></p>
                                <?php } ?>    
                            </div>
                        </div>
                        <div class="card-spc">
                            <?php if($designations) {?>
                                <h5><?= $designations;?></h5>
                            <?php } ?>    
                        </div>
                    </div>
                </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>