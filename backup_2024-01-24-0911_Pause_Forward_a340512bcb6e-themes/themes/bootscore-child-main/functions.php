<?php
require_once('include/custom-functions.php');

// Enable WooCommerce customize file if plugin is installed & activate
if (class_exists('WooCommerce')) {
    require_once('include/wc-customize-functions.php');
}

require_once('inc/class-bootstrap-5-navwalker-pf.php');

/* !--------------- Enqueue General style and scripts -------------> */
add_action('wp_enqueue_scripts', 'pf_child_enqueue_styles');

/* !--------------- Enqueue Responsive Style -------------> */
add_action('wp_enqueue_scripts', 'pf_child_responsive_styles', 99);

/* !--------------- Custom Post Type Registration -------------> */
add_action('init', 'pf_doctor_custom_post_type');

/* !--------------- Register Custom Post Taxonomies --------------> */
add_action('init', 'pf_custom_post_type_taxonomies');

/* !--------------- Enabled Theme Setting Options--------------> */
add_action('acf/init', 'pf_acf_option_init');

/* Theme Setting option */

function pf_acf_option_init() {

    // Check function exists.

    if (function_exists('acf_add_options_page')) {

        // Register options page.

        $option_page = acf_add_options_page(array(
            'page_title' => __('Theme General Settings'),
            'menu_title' => __('Theme Settings'),
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

//        $option_page = acf_add_options_page(array(
//            'page_title' => __('Email Settings'),
//            'menu_title' => __('Email Settings'),
//            'menu_slug' => 'email-general-settings',
//            'capability' => 'edit_posts',
//            'redirect' => false
//        ));
    }
}

/* !--------------- Customize Tab Structure on Woocommerce My Account Page --------------> */
add_action('init', 'pf_mp_endpoint');
add_filter('query_vars', 'pf_mp_query_vars', 0);
add_filter('woocommerce_account_menu_items', 'pf_mp_link_my_account');
add_action('woocommerce_account_my-programs_endpoint', 'pf_mp_content');
add_action('woocommerce_account_appointment-list_endpoint', 'pf_al_content');
add_action('woocommerce_account_my-payment-methods_endpoint', 'pf_mpm_content');
add_filter('woocommerce_product_query', 'pf_exclude_booking_category_archive_products');

// Disable AJAX Cart
add_action('after_setup_theme', 'register_ajax_cart');

//after Add to cart redirect to checkout
add_filter('woocommerce_add_to_cart_redirect', 'pf_redirect_checkout_add_cart');
// Remove Booking Service quantity from selected category in cart 
add_filter('woocommerce_cart_item_quantity', 'remove_quantity_from_selected_category', 10, 3);

// Remove Booking Service quantity from selected category during checkout
add_filter('woocommerce_checkout_cart_item_quantity', 'remove_quantity_from_selected_category_checkout', 10, 3);

// Filter to limit adding Single Program to the cart
//add_filter( 'woocommerce_add_to_cart_validation', 'pf_limit_single_category_product_to_cart', 10, 3 );

/* cart page forcefully redirect */
//add_action('template_redirect', 'redirect_cart_to_checkout');

/* !---------------Disabled Gutenberg Editor--------------> */
add_filter('use_block_editor_for_post', '__return_false');

/* Login logo & link Customization */
add_action('login_enqueue_scripts', 'pf_login_logo');
add_filter('login_headerurl', 'pf_login_logo_url');
add_filter('login_headertext', 'pf_login_logo_url_title');

// Search Results only display from default Post
add_action('pre_get_posts', 'pf_custom_search_filter');

// Search Results only display from default Post
function pf_custom_search_filter($query) {
    // Check if this is the main query and a search query
    if ($query->is_main_query() && $query->is_search()) {
        // Modify the post type to your specific post type
        $query->set('post_type', 'post');
    }
}
/*
 * Age Custom Field ADD on checkout page
 */
// Add the custom field to the checkout page
add_action('woocommerce_before_order_notes', 'custom_checkout_age_field');

function custom_checkout_age_field($checkout) {
    echo '<div id="custom_checkout_field">';
    woocommerce_form_field('custom_field_name', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Age'),
        'placeholder'   => __('Enter Your Age'),
        'required' => true,
        ), $checkout->get_value('custom_field_name'));
    echo '</div>';
}

// Save the custom field value to the order meta
add_action('woocommerce_checkout_update_order_meta', 'save_custom_age_checkout_field');

function save_custom_age_checkout_field($order_id) {
    if (!empty($_POST['custom_field_name'])) {
        update_post_meta($order_id, 'Age', sanitize_text_field($_POST['custom_field_name']));
    }
}
// Display the custom field value on the admin order page
add_action('woocommerce_admin_order_data_after_billing_address', 'display_custom_field_admin_order', 10, 1);

function display_custom_field_admin_order($order){
    $custom_field_value = get_post_meta($order->get_id(), 'Age', true);

    echo '<p><strong>'.__('Age of patient').':</strong> ' . $custom_field_value . '</p>';
}
/* Add Booking Time & Date on checkout page */
function enqueue_datepicker() {
    // Enqueue jQuery UI Datepicker
    wp_enqueue_script('jquery-ui-datepicker');
    
    // Enqueue the jQuery UI theme (replace 'smoothness' with your preferred theme)
    wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css');
}

// Hook the function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'enqueue_datepicker');

function pf_custom_booking_date_field($checkout) {
    $specific_category_slug = 'doctor-booking';

    // Get the cart
    $cart = WC()->cart;

    // Initialize a flag to check if the specific category exists in the cart
    $specific_category_exists = false;

    // Loop through cart items to check if the specific category is present
    foreach ($cart->get_cart() as $cart_item) {
        $product = $cart_item['data'];
        if (has_term($specific_category_slug, 'product_cat', $product->get_id())) {
            $specific_category_exists = true;
            break; // Exit the loop if a product from the specific category is found
        }
    }

    // Display a message if the specific category exists in the cart
    if ($specific_category_exists) {
        echo '<div id="custom_booking_date_field">';
        woocommerce_form_field('booking_date', array(
            'type' => 'text',
            'class' => array('form-row-wide'),
            'label' => __('Preferred Appointment date'),
            'placeholder'   => __('dd-mm-yyyy'),
//            'label' => __('Booking Date'),
            'required' => true,
                ), $checkout->get_value('booking_date'));
        /*woocommerce_form_field('booking_time', array(
            'type' => 'time',
            'class' => array('form-row-wide'),
            'label' => __('Preferred Appointment time'),
//            'label' => __('Booking Time'),
            'required' => true,
                ), $checkout->get_value('booking_time'));*/
        echo '</div>';
        ?>
        <script>
            jQuery(document).ready(function ($) {
                // Disable previous dates
                var currentDate = new Date();
                var day = currentDate.getDate();
                var month = currentDate.getMonth() + 1; // Months are zero-based
                var year = currentDate.getFullYear();
                var formattedDate = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

                $('input#booking_date').attr('min', formattedDate);
            });
        </script>
        <?php
    }
}

add_action('woocommerce_before_order_notes', 'pf_custom_booking_date_field');

function pf_custom_save_booking_date_field($order_id) {
    if ($_POST['booking_date']) {
        update_post_meta($order_id, 'Booking Date', sanitize_text_field($_POST['booking_date']));
    }
//    if ($_POST['booking_time']) {
//        update_post_meta($order_id, 'Booking Time', sanitize_text_field($_POST['booking_time']));
//    }
}

add_action('woocommerce_checkout_update_order_meta', 'pf_custom_save_booking_date_field');

function pf_custom_display_booking_date_field($order) {
    echo '<p><strong>Booking Date:</strong> ' . get_post_meta($order->get_id(), 'Booking Date', true) . '</p>';
//    echo '<p><strong>Booking Time:</strong> ' . get_post_meta($order->get_id(), 'Booking Time', true) . '</p>';
}

add_action('woocommerce_admin_order_data_after_billing_address', 'pf_custom_display_booking_date_field', 10, 1);

// Display the custom fields in the order details for admin and customer emails
function pf_custom_display_booking_date_email_data($order, $sent_to_admin, $plain_text) {
    $booking_date = get_post_meta($order->get_id(), 'Booking Date', true);
//    $booking_time = get_post_meta($order->get_id(), 'Booking Time', true);

    // Display in customer email
    if (!$sent_to_admin) {
        echo '<p><strong>Booking Date:</strong> ' . esc_html($booking_date) . '</p>';
//        echo '<p><strong>Booking Time:</strong> ' . esc_html($booking_time) . '</p>';
    }

    // Display in admin email
    if ($sent_to_admin && $plain_text === false) {
        echo '<p><strong>Booking Date:</strong> ' . esc_html($booking_date) . '</p>';
//        echo '<p><strong>Booking Time:</strong> ' . esc_html($booking_time) . '</p>';
    }
}

add_action('woocommerce_email_order_details', 'pf_custom_display_booking_date_email_data', 10, 3);

/* Another Customization */
add_filter('woocommerce_checkout_fields', 'pf_remove_address_fields');

function pf_remove_address_fields($fields) {
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);

    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);

    return $fields;
}

/* Customize Checkout page Additional Information */

function custom_override_checkout_fields($fields) {
    // Change the label and placeholder for the "Order Notes" field
    $fields['order']['order_comments']['label'] = 'Any medical history or information that you would like to share before the appointment';
    $fields['order']['order_comments']['placeholder'] = '';

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

/* Pagination Query Override from parent theme */
if (!function_exists('wpsites_query')) {
    $count = get_option('posts_per_page');

    function wpsites_query($query) {
        if ($query->is_archive() && $query->is_main_query() && !is_admin()) {
            if ('doctors' === $query->query['post_type']) {
                $query->set('posts_per_page', 9);
            } else {
                $query->set('posts_per_page', $count);
            }
        }
    }

    add_action('pre_get_posts', 'wpsites_query');
}

/* Breadcrums Customization */
if (!function_exists('the_breadcrumb')) {

    function the_breadcrumb() {

        if (!is_home()) {
            echo '<nav aria-label="breadcrumb" class="breadcrumb-scroller">';
            echo '<ol class="breadcrumb mb-0">';
            echo '<li class="breadcrumb-item"><a href="' . home_url() . '">' . '<i class="fa-solid fa-house"></i>' . '</a></li>';
            // display parent category names with links
            // if (is_category() || is_single()) {
            //   $cat_IDs = wp_get_post_categories(get_the_ID());
            //   foreach ($cat_IDs as $cat_ID) {
            //     $cat = get_category($cat_ID);
            //     echo '<li class="breadcrumb-item"><a href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a></li>';
            //   }
            // }
            // display current page name
            if (is_page() || is_single()) {
                if (get_post_type() == 'post') {
                    echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('post') . '">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
                } elseif (get_post_type() == 'doctors') {
                    echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('doctors') . '">Team Of Experts</a></li>
                <li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
                } elseif (get_post_type() == 'events') {
                    echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('events') . '">Events</a></li>
                <li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
                } elseif (get_post_type() == 'videos') {
                    echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('videos') . '">Videos</a></li>
                <li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
                } elseif (get_post_type() == 'webinars') {
                    echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('webinars') . '">Webinars</a></li>
                <li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
                } else {
                    echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
                }
            }
            if (is_archive() && get_post_type() == 'doctors') {
                echo '<li class="breadcrumb-item active" aria-current="page">Team Of Experts</li>';
            }
            if (is_archive() && get_post_type() == 'events') {
                echo '<li class="breadcrumb-item active" aria-current="page">' . post_type_archive_title('', false) . '</li>';
            }
            if (is_archive() && get_post_type() == 'videos') {
                echo '<li class="breadcrumb-item active" aria-current="page">' . post_type_archive_title('', false) . '</li>';
            }
            if (is_archive() && get_post_type() == 'webinars') {
                echo '<li class="breadcrumb-item active" aria-current="page">' . post_type_archive_title('', false) . '</li>';
            }
            if (is_archive() && get_post_type() == 'programs') {
                echo '<li class="breadcrumb-item active" aria-current="page">' . post_type_archive_title('', false) . '</li>';
            }
            echo '</ol>';
            echo '</nav>';
        } else {
            echo '<nav aria-label="breadcrumb" class="breadcrumb-scroller mb-4 mt-2 py-2 px-3 bg-body-tertiary rounded">';
            echo '<ol class="breadcrumb mb-0">';
            echo '<li class="breadcrumb-item"><a href="' . home_url() . '">' . '<i class="fa-solid fa-house"></i>' . '</a></li>';
            echo '<li class="breadcrumb-item active" aria-current="page">Blog</li>';
            echo '</ol>';
            echo '</nav>';
        }
    }

    add_filter('breadcrumbs', 'breadcrumbs');
}


//add new column to admin order list
add_filter('manage_edit-events_columns', 'bbloomer_add_new_order_admin_list_column');

function bbloomer_add_new_order_admin_list_column($columns) {
    $columns['start_date'] = 'Start Date';
    $columns['end_date'] = 'End Date';
    return $columns;
}

add_action('manage_events_posts_custom_column', 'bbloomer_add_new_order_admin_list_column_content');

function bbloomer_add_new_order_admin_list_column_content($column) {

    global $post;

    if ('start_date' === $column) {

        $start_date = get_field('event_start_date', $post->ID);
        echo $start_date;
    }
    if ('end_date' === $column) {

        $end_date = get_field('event_end_date', $post->ID);
        echo $end_date;
    }
}

/* Add custom class for Specific Page */

function my_custom_body_class_slug($classes) {

    if (is_page('free-assessment-survey')) {
        $classes[] = 'free-assessment-survey';
    } elseif (is_page('quiz')) {
        $classes[] = 'menopause-awareness-quiz';
    }

    return $classes;
}

add_filter('body_class', 'my_custom_body_class_slug');

add_filter('woocommerce_add_to_cart_validation', 'pf_only_one_in_cart', 9999);

function pf_only_one_in_cart($passed) {
    wc_empty_cart();
    return $passed;
}

/* End Woocommerce Customize File */

/* Modified Author Date */

if (!function_exists('bootscore_date')) {

    function bootscore_date() {

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf(
                $time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date())
        );

        $posted_on = sprintf(
                '%s',
                '<span rel="bookmark">' . $time_string . '</span>'
        );
        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }

}


/* * Modified Author Name */
if (!function_exists('bootscore_author')) {

    function bootscore_author() {
        $author_id = get_post_field('post_author', $post_id); // Replace $post_id with your custom post's ID
        $author_name = get_the_author_meta('display_name', $author_id);
        $byline = sprintf(
                esc_html_x('By %s', 'post author', 'bootscore'),
                '<span class="author vcard"><a class="url fn n">' . $author_name . '</a></span>'
        );
        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }

}


/** Pagination Customization */
if (!function_exists('bootscore_pagination')) {

    function bootscore_pagination($pages = '', $range = 2) {
        $showitems = ($range * 2) + 1;
        global $paged, $wp_query;
        // default page to one if not provided
        if (empty($paged))
            $paged = 1;
        if ($pages == '') {
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        if (1 != $pages) {
            echo '<nav aria-label="Page navigation" role="navigation">';
            echo '<span class="sr-only">' . esc_html__('Page navigation', 'bootscore') . '</span>';
            echo '<ul class="pagination justify-content-center">';
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged - 1) . '">&lsaquo;</a></li>';

            if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
                echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(1) . '" aria-label="' . esc_html__('First Page', 'bootscore') . '">&laquo;</a></li>';
            }

            if ($paged > 1 && $showitems < $pages) {
                echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged - 1) . '" aria-label="' . esc_html__('Previous Page', 'bootscore') . '">&lsaquo;</a></li>';
            }

            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    if ($paged == $i) {
                        echo '<li class="page-item active"><span class="page-link"><span class="sr-only">' . __('Current Page', 'bootscore') . ' </span>' . $i . '</span></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($i) . '"><span class="sr-only">' . __('Page', 'bootscore') . ' </span>' . $i . '</a></li>';
                    }
                }
            }

            if ($paged < $pages && $showitems < $pages) {
                echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(($paged === 0 ? 1 : $paged) + 1) . '" aria-label="' . esc_html__('Next Page', 'bootscore') . '">&rsaquo;</a></li>';
            }

            if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
                echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($pages) . '" aria-label="' . esc_html__('Last Page', 'bootscore') . '">&raquo;</a></li>';
            }
            $disabled = ($showitems == $pages + 1) ? 'disabled' : '';
            echo ' <li class="page-item"><a class="page-link" href="' . get_pagenum_link(($paged === 0 ? 1 : $paged)) . '" disabled="' . $disabled . '">&rsaquo;</a></li>';
            echo '</ul>';
            echo '</nav>';
            // Uncomment this if you want to show [Page 2 of 30]
            // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">' . __('Page', 'bootscore') . '</span> '.$paged.' <span class="text-muted">' . __('of', 'bootscore') . '</span> '.$pages.' ]</div>';
        }
    }

}


/** Add FullName and Phone Number Field in Register */
add_action('woocommerce_register_form_start', 'pf_add_name_and_phone_fields');

function pf_add_name_and_phone_fields() {
    ?>
    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e('Full name', 'woocommerce'); ?> <span class="required">*</span></label>
        <input type="text" class="input-text woocommerce-Input woocommerce-Input--text input-text form-control" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="reg_phone_number"><?php _e('Phone number', 'woocommerce'); ?> <span class="required">*</span></label>
        <input type="tel" class="input-text woocommerce-Input woocommerce-Input--text input-text form-control" name="phone_number" id="reg_phone_number" pattern="[0-9]{10}" value="<?php if (!empty($_POST['phone_number'])) esc_attr_e($_POST['phone_number']); ?>" />
    </p>

    <div class="clear"></div>

    <?php
}

add_filter('woocommerce_registration_errors', 'pf_validate_name_and_phone_fields', 10, 3);

function pf_validate_name_and_phone_fields($errors, $username, $email) {
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
        $errors->add('billing_first_name_error', __('Error: Full name is required!', 'woocommerce'));
    }

    if (isset($_POST['phone_number']) && !preg_match('/^[0-9]{10}$/', $_POST['phone_number'])) {
        $errors->add('phone_number_error', __('Error: Please enter a valid 10-digit phone number.', 'woocommerce'));
    }

    return $errors;
}

add_action('woocommerce_created_customer', 'pf_save_name_and_phone_fields');

function pf_save_name_and_phone_fields($customer_id) {
    if (isset($_POST['billing_first_name'])) {
        update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
        update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
    }

    if (isset($_POST['phone_number']) && preg_match('/^[0-9]{10}$/', $_POST['phone_number'])) {
        update_user_meta($customer_id, 'phone_number', wc_clean($_POST['phone_number']));
    }
}


/*
 * (Start Custom dropdown (checkout page))
 */
// Add a new field to the checkout page
add_action('woocommerce_before_order_notes', 'custom_checkout_field');

function custom_checkout_field($checkout) {
    echo '<div id="custom_checkout_field">';

    woocommerce_form_field('preferred_appointment_time', array(
        'type'    => 'select',
        'class'   => array('form-row-wide'),
        'label'   => __('Preferred Appointment time'),
        'required' => true,
        'options' => array(
            '10am-12pm' => '10am-12pm',
            '2pm-5pm' => '2pm-5pm',
            '6pm-8pm' => '6pm-8pm',
        ),
    ), $checkout->get_value('preferred_appointment_time'));

    echo '</div>';
}

// Save the field value to the order
add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta');

function custom_checkout_field_update_order_meta($order_id) {
    if ($_POST['preferred_appointment_time']) {
        update_post_meta($order_id, 'Preferred Appointment Time', esc_attr($_POST['preferred_appointment_time']));
    }
}
// Display the preferred appointment time on the admin order page
add_action('woocommerce_admin_order_data_after_billing_address', 'display_custom_field_on_admin_order_page', 10, 1);

function display_custom_field_on_admin_order_page($order) {
    $preferred_appointment_time = get_post_meta($order->get_id(), 'Preferred Appointment Time', true);

    if ($preferred_appointment_time) {
        echo '<p><strong>' . __('Preferred Appointment Time') . ':</strong> ' . esc_html($preferred_appointment_time) . '</p>';
    }
}

/*
 * 23-11-2023 (Start Custom Checkbox (checkout page))
 */
// Display the custom checkbox on the checkout page
add_action('woocommerce_before_order_notes', 'custom_checkout_checkbox');
function custom_checkout_checkbox($checkout) {
    echo '<div id="custom_checkout_checkbox">';
    woocommerce_form_field('custom_checkbox', array(
        'type' => 'checkbox',
        'class' => array('input-checkbox'),
        'label' => __('Allow health advisor to call back to confirm appointment date and time.'),
        'required' => true,
            ), $checkout->get_value('custom_checkbox'));
    echo '</div>';
}

// Validate the custom checkbox on form submission
add_action('woocommerce_checkout_process', 'validate_custom_checkbox');
function validate_custom_checkbox() {
    if (empty($_POST['custom_checkbox'])) {
        wc_add_notice(__('You must agree to the allow consultation to call back.'), 'error');
    }
}

// Save the custom checkbox value to the order
add_action('woocommerce_checkout_update_order_meta', 'save_custom_checkbox');
function save_custom_checkbox($order_id) {
    if (isset($_POST['custom_checkbox'])) {
        update_post_meta($order_id, 'Custom Checkbox', 'Yes');
    }
}

add_action('woocommerce_admin_order_data_after_billing_address', 'pf_custom_display_custom_checkbox_field', 10, 1);
function pf_custom_display_custom_checkbox_field($order) {
    echo '<p><strong>Appointment Conformation:</strong> ' . get_post_meta($order->get_id(), 'Custom Checkbox', true) . '</p>';
}

// Display the custom fields in the order details for admin and customer emails
add_action('woocommerce_email_order_details', 'pf_custom_display_custom_checkbox_email_data', 10, 3);
function pf_custom_display_custom_checkbox_email_data($order, $sent_to_admin, $plain_text) {
    $appointment_custom_checkbox = get_post_meta($order->get_id(), 'Custom Checkbox', true);

    // Display in customer email
    if (!$sent_to_admin) {
        echo '<p><strong>Appointment Conformation:</strong> ' . esc_html($appointment_custom_checkbox) . '</p>';
    }

    // Display in admin email
    if ($sent_to_admin && $plain_text === false) {
        echo '<p><strong>Appointment Conformation:</strong> ' . esc_html($appointment_custom_checkbox) . '</p>';
    }
}
add_action('woocommerce_before_order_notes', 'custom_add_info_text');
function custom_add_info_text($checkout) {
    echo '<div id="custom_add_info_text">';
    ?>
    <h3><?php esc_html_e( 'Additionall information', 'woocommerce' ); ?></h3>
    <?php
    echo '</div>';
}
/*
 * File Custom Field ADD on checkout page
 */
add_action('woocommerce_before_order_notes', 'bbloomer_checkout_file_upload');

function bbloomer_checkout_file_upload()
{
    echo '<p class="form-row">
            <label for="appforms">Attach reports if any: (PDF/DOC/Image)<br/>Note: 5 MB limit</label>
            <span class="woocommerce-input-wrapper">
               <label for="appform" id="file-label">
                  <img id="facebook-icon choose-file-text" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/file-atatchment-new.png" />
                  <span id="choose-file-text">Choose file</span>
                  <span id="selected-file-name"></span>
                  <br/><span id="error-limit-msg" style="display: none; color: red;">File size exceeds the limit of 5 megabytes.</span>
               </label>
               <input type="file" id="appform" name="appform" accept=".pdf,.doc,.png,.jpg,.jpeg" style="display: none;" required>
               <input type="hidden" name="appform_field" />
            </span>
        </p>';

    wc_enqueue_js("
      $(document).on('click', '#choose-file-text', function() {
         $('#appform').click();
      });

      $('#appform').change(function() {
         if (this.files.length) {
            const file = this.files[0];
            
            // Check file size
            const maxSize = 5 * 1024 * 1024; // 5 MB
            if (file.size > maxSize) {
                $('#error-limit-msg').show();
               return;
            }

            const formData = new FormData();
            formData.append('appform', file);
            $.ajax({
               url: wc_checkout_params.ajax_url + '?action=appformupload',
               type: 'POST',
               data: formData,
               contentType: false,
               enctype: 'multipart/form-data',
               processData: false,
               success: function(response) {
                  $('#choose-file-text').hide();
                  $('#error-limit-msg').hide();
                  $('#selected-file-name').text(file.name);
                  $('input[name=\"appform_field\"]').val(response);
               }
            });
         }
      });
   ");
}
add_action('wp_ajax_appformupload', 'bbloomer_appformupload');
add_action('wp_ajax_nopriv_appformupload', 'bbloomer_appformupload');

function bbloomer_appformupload()
{
    global $wpdb;
    $uploads_dir = wp_upload_dir();
    if (isset($_FILES['appform'])) {
        if ($upload = wp_upload_bits($_FILES['appform']['name'], null, file_get_contents($_FILES['appform']['tmp_name']))) {
            echo $upload['url'];
        }
    }
    die;
}
//add_action( 'woocommerce_checkout_process', 'bbloomer_validate_new_checkout_field' );
   
function bbloomer_validate_new_checkout_field() {
   if ( empty( $_POST['appform_field'] ) ) {
      wc_add_notice( 'Please upload your Attach reports', 'error' );
   }
}
 
add_action( 'woocommerce_checkout_update_order_meta', 'bbloomer_save_new_checkout_field' );
   
function bbloomer_save_new_checkout_field( $order_id ) { 
   if ( ! empty( $_POST['appform_field'] ) ) {
      update_post_meta( $order_id, '_application', $_POST['appform_field'] );
   }
}
   
add_action( 'woocommerce_admin_order_data_after_billing_address', 'bbloomer_show_new_checkout_field_order', 10, 1 );
    
function bbloomer_show_new_checkout_field_order( $order ) {    
   $order_id = $order->get_id();
   if ( get_post_meta( $order_id, '_application', true ) ) echo '<p><strong>According to the previous medical reports:</strong> <a href="' . get_post_meta( $order_id, '_application', true ) . '" target="_blank">' . get_post_meta( $order_id, '_application', true ) . '</a></p>';
}
  
add_action( 'woocommerce_email_after_order_table', 'bbloomer_show_new_checkout_field_emails', 20, 4 );
   
function bbloomer_show_new_checkout_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
    if ( $sent_to_admin && get_post_meta( $order->get_id(), '_application', true ) ) echo '<p><strong>Application Form:</strong> ' . get_post_meta( $order->get_id(), '_application', true ) . '</p>';
}
/*
 * 23-11-2023 (End Custom Checkbox (checkout page))
 */
/*
 * Add hidden user email field to WooCommerce checkout
 */
add_action('woocommerce_before_order_notes', 'add_hidden_user_email_field', 5);

function add_hidden_user_email_field() {
    $user = wp_get_current_user();
    $user_email = $user->user_email;
    foreach (WC()->cart->get_cart() as $cart_item) {
        $product = $cart_item['data'];
        $product_acf_field_value = get_field('woo_doctors_product_email', $product->get_id());
        $dr_on_off_value = get_field('woo_product_sub_title', $product->get_id());
        $dr_name_of_expert = get_field('woo_product_name_of_expert', $product->get_id());
        echo '<input type="hidden" id="billing_email" name="hidden_user_email" value="' . esc_attr($product_acf_field_value) . '" />';
        echo '<input type="hidden" id="hidden_dr_on_off_value" name="hidden_dr_on_off_value" value="' . esc_attr($dr_on_off_value) . '" />';
        echo '<input type="hidden" id="hidden_name_of_expert" name="hidden_name_of_expert" value="' . esc_attr($dr_name_of_expert) . '" />';
    }
}

// Save the custom email value to the order
add_action('woocommerce_checkout_update_order_meta', 'save_custom_email');
function save_custom_email($order_id) {
    if (isset($_POST['hidden_user_email'])) {
        update_post_meta($order_id, 'consult_doctor',$_POST['hidden_user_email'] );
    }
    if (isset($_POST['hidden_dr_on_off_value'])) {
        update_post_meta($order_id, 'consult_doctor_data',$_POST['hidden_dr_on_off_value'] );
    }
    if (isset($_POST['hidden_name_of_expert'])) {
        update_post_meta($order_id, 'name_of_expert',$_POST['hidden_name_of_expert'] );
    }
}

add_action('woocommerce_admin_order_data_after_billing_address', 'pf_custom_display_custom_emial_field', 10, 1);
function pf_custom_display_custom_emial_field($order) {
    $order_id = method_exists($order, 'get_id') ? $order->get_id() : $order->get_order_number();
echo '<p><strong>Consult Doctors Email:</strong> ' . get_post_meta($order_id, 'consult_doctor', true) . '</p>';
echo '<p><strong>Consult Doctors Onlie /Offline:</strong> ' . get_post_meta($order_id, 'consult_doctor_data', true) . '</p>';
echo '<p><strong>Name of Expert:</strong> ' . get_post_meta($order_id, 'name_of_expert', true) . '</p>';
}

add_action('woocommerce_thankyou', 'custom_email_notification', 10, 1);
function custom_email_notification($order_id) {
    if (!$order_id) {
        return;
    }

    // Get the email from the custom field
    $to = get_post_meta($order_id, 'consult_doctor', true);
    // Fallback email address if the custom field is empty
    if (empty($to)) {
        $to = 'contact@pauseforward.in'; 
    }

    // Get an instance of the WC_Order object
    $order = wc_get_order($order_id);

    // Initialize content variable
    $content = "I appreciate your time and consideration, and I look forward to the opportunity to consult with you. Thank you for your attention to this matter.";

    // Iterating through each order items
    foreach ($order->get_items() as $item_id => $order_item) {
        // Accessing the protected data of the WC_Order_Item_Product object
        $order_item_data = $order_item->get_data();
        // Get the associated WC_Product object
        $product = $order_item->get_product();
        // Accessing the WC_Product object protected data
        $product_data = $product->get_data();

        // You can use $order_item_data and $product_data as needed in your content
        $content = "Consultation With " . $product_data['name'] . "\n I appreciate your time and consideration, and I look forward to the opportunity to consult with you. Thank you for your attention to this matter.";
        
        // Add more details as needed
    }

    $subject = "Consultation Request";

    // Send the email
    wp_mail($to, $subject, $content);
}

/*
 * Redirect to a home page when cart is emptied
 */
add_action("template_redirect", 'redirection_function');

function redirection_function() {
    global $woocommerce;
    if (is_cart() && WC()->cart->cart_contents_count == 0) {
        wp_safe_redirect(get_permalink(get_page_by_title('Home')));
    }
}

/*
 * 05-12-2023
 */
add_shortcode('user_orders_list', 'display_user_orders_list');
add_shortcode('user_orders_al_list', 'display_user_orders_al_list');
/*
 * 12-12-23 (Rename “Place Order” Button checkout page)
 */
add_filter( 'woocommerce_order_button_text', 'bbloomer_rename_place_order_button', 9999 );
  
function bbloomer_rename_place_order_button() {
   return 'Make Payment'; 
}
/*
 * 
 */
add_filter( 'the_title', 'woo_title_order_received', 10, 2 );

function woo_title_order_received( $title, $id ) {
	if ( function_exists( 'is_order_received_page' ) && 
	     is_order_received_page() && get_the_ID() === $id ) {
		$title = "Thank you for your order! :)";
	}
	return $title;
}
/*
 * WooCommerce - Remove subtotal row. (Thank you page)
 */
add_filter( 'woocommerce_get_order_item_totals', 'adjust_woocommerce_get_order_item_totals' );

function adjust_woocommerce_get_order_item_totals( $totals ) {
  unset($totals['cart_subtotal']  );
  return $totals;
}
/*
 * closed the woocommerce plugin update 
 */
add_filter( 'site_transient_update_plugins', 'pf_filter_plugin_updates' ); 
function pf_filter_plugin_updates($value) {
	if (isset($value->response['woocommerce/woocommerce.php'])) {
		unset($value->response['woocommerce/woocommerce.php']);
	}
	return $value;
}
/*
 * Simple Product Message changes: cehckout page 
 */
add_filter( 'wc_add_to_cart_message', 'quadlayers_custom_wc_add_to_cart_message', 10, 2 ); 
 
function quadlayers_custom_wc_add_to_cart_message( $message, $product_id ) { 
    $message = sprintf(esc_html__('Consultation with %s has been added!','tm-organik'), get_the_title( $product_id ) ); 
    return $message; 
}
/*
 * 
 */
function custom_billing_phone_error_message($error_message, $error_key, $error_data) {
    // Check if the error key is related to the billing phone field
    if ($error_key === 'billing_phone' && strpos($error_message, 'Billing Phone') !== false) {
        // Change the validation error message for the billing phone field
        $error_message = __('Custom validation error message for billing phone field', 'your-text-domain');
    }

    return $error_message;
}

add_filter('woocommerce_add_error', 'custom_billing_phone_error_message', 10, 3);
/*
 * 
 */
add_filter( 'woocommerce_checkout_fields' , 'remove_company_name' );

function remove_company_name( $fields ) {
     unset($fields['billing']['billing_company']);
     return $fields;
}
/*
 * 
 */
add_filter( 'woocommerce_registration_redirect', 'custom_redirection_after_registration', 10, 1 );
function custom_redirection_after_registration( $redirection_url ){
    $redirection_url = home_url('/register-thank-you/');
    return $redirection_url; 
}

