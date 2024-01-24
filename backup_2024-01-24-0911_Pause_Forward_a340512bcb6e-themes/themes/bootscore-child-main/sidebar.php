<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.2.3.4
 */

if (!is_active_sidebar('sidebar-1')) {
  return;
}
?>
<div class="col-12 col-xl-4 order-first order-md-last">
  <aside id="secondary" class="widget-area">

<!--    <button class="btn btn-outline-primary w-100 mb-4 d-flex d-md-none justify-content-between align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
      <?php // esc_html_e('Open side menu', 'bootscore'); ?> <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>-->

    <div class="new-custom" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
      <div class="new-custom-body flex-column">
        <?php dynamic_sidebar('sidebar-1'); ?>
      </div>
    </div>

  </aside><!-- #secondary -->
</div>
