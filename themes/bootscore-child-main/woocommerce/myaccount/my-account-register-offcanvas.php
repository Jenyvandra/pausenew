<?php



/**

 * Offcanvas Registration  and User Dashboard

 */



if (!defined('ABSPATH')) {

  exit; // Exit if accessed directly.

}



?>



<?php if (is_user_logged_in()) { ?>



  <div class="account-salution">

    <p class="h2">

      <?php esc_html_e('Hello', 'bootscore'); ?> <?php global $current_user;

                                                  wp_get_current_user();

                                                  echo '' . $current_user->display_name . "\n";

                                                  ?>

    </p>

    <p><?php esc_html_e('Here you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.', 'bootscore'); ?></p>

  </div>



  <div class="navigation">

    <nav class="woocommerce-MyAccount-navigation" role="navigation">

      <div class="list-group mb-4">

        <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>

          <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="list-group-item list-group-item-action"><?php echo esc_html($label); ?></a>

        <?php endforeach; ?>

      </div>

    </nav>

  </div>



<?php } else { ?>




      <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>



      </div>



      <div class="register">



        <p class="h2"><?php esc_html_e('If you are a new user, register here', 'woocommerce'); ?></p>



        <div class="card mt-3 mb-4">



          <form method="post" class="card-body" <?php do_action('woocommerce_register_form_tag'); ?>>



            <?php do_action('woocommerce_register_form_start'); ?>



            <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>



              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">

                <label for="reg_username_1"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>

                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username_1" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine                                                                                                                                                                                                                                                               ?>

              </p>



            <?php endif; ?>



            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">

              <label for="reg_email_1"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>

              <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email_1" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine                                                                                                                                                                                                                                                              ?>

            </p>



            <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>



              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-3 position-relative">

                <label for="reg_password_1"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>

                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password_1" autocomplete="new-password" />

                <span class="offcanvas-password show-password-input"></span>  

              </p>



            <?php else : ?>



              <p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>



            <?php endif; ?>



            <?php do_action('woocommerce_register_form'); ?>



            <p class="woocommerce-form-row form-row mb-0">

              <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>

              <button type="submit" class="btn btn-outline-primary woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>

            </p>



            <?php do_action('woocommerce_register_form_end'); ?>



          </form>



        </div>

        <a href="#" class="pf-login-popup" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-user">Already have an account ! Click here to login</a>

      </div>



    </div>

  <?php endif; ?>



  <?php do_action('woocommerce_after_customer_login_form'); ?>



<?php } ?>