<?php
/* Customize Tab Structure on Woocommerce My Account Page */

function pf_mp_endpoint() {
    add_rewrite_endpoint('my-programs', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('appointment-list', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('my-payment-methods', EP_ROOT | EP_PAGES);
}

function pf_mp_query_vars($vars) {
    $vars[] = 'my-programs';
    $vars[] = 'appointment-list';
    $vars[] = 'my-payment-methods';
    return $vars;
}

function pf_mp_link_my_account($items) {
    unset($items['downloads']);
    unset($items['edit-address']);
    unset($items['customer-logout']);
    unset($items['edit-address']);
    unset($items['my-payment-methods']);
    //$items['edit-address'] = 'My Addresses';
    $items['my-programs'] = 'My Programs';
    $items['appointment-list'] = 'Appointment List';
    //$items['my-payment-methods'] = 'My Payment Methods';
    $items['customer-logout'] = 'Logout';
    return $items;
}

function pf_mp_content() {
    echo do_shortcode('[user_orders_list]');
}

function pf_al_content() {
    echo do_shortcode('[user_orders_al_list]');
}

function pf_mpm_content() {
    echo '<h3>My Payment Method</h3>';
}

/* Default cart redirect to checkout page */

function pf_redirect_to_checkout() {
    global $woocommerce;
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}

/* Exclude Booking Service product from Product Query */

function pf_exclude_booking_category_archive_products($q) {
    $tax_query = (array) $q->get('tax_query');

    $tax_query[] = array(
        'taxonomy' => 'product_cat',
        'field' => 'slug',
        'terms' => array('booking-service', 'doctor-booking'),
        'operator' => 'NOT IN'
    );

    $q->set('tax_query', $tax_query);
}

/* Disabled default Add to cart AJAX */

function register_ajax_cart() {
    
}

/* Redirect Cart page to Checkout */

function pf_redirect_checkout_add_cart() {
    return wc_get_checkout_url();
}

// Remove Booking Service quantity from selected category in cart
function remove_quantity_from_selected_category($quantity, $cart_item_key, $cart_item) {
    $selected_category = array('booking-service', 'doctor-booking'); // Replace with your desired category slug
    $product_id = $cart_item['product_id'];

    // Check if the product is in the selected category
    if (has_term($selected_category, 'product_cat', $product_id)) {
        return sprintf('<strong>%s</strong>', __('', 'woocommerce'));
    }
    return $quantity;
}

// Remove Booking Service quantity from selected category during checkout
function remove_quantity_from_selected_category_checkout($quantity, $cart_item, $cart_item_key) {
    $selected_category = array('booking-service', 'doctor-booking'); // Replace with your desired category slug
    $product_id = $cart_item['product_id'];

    // Check if the product is in the selected category
    if (has_term($selected_category, 'product_cat', $product_id)) {
        return sprintf('<strong>%s</strong>', __('', 'woocommerce'));
    }
    return $quantity;
}

// Filter to limit adding Single Program to the cart
function pf_limit_single_category_product_to_cart($passed, $product_id, $quantity) {
    echo '<pre>';
    print_r($passed);
    print_r($product_id);
    print_r($quantity);
    echo '</pre>';

    if ($passed) {
        // Get the product
        $product = wc_get_product($product_id);

        // Check if the product is in a specific category
        if (has_term('booking-service', 'product_cat', $product_id)) {
            // Check if the category product is already in the cart
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = $cart_item['data'];
                if (has_term('booking-service', 'product_cat', $_product->get_id())) {
                    // Display a notice and prevent adding to the cart
                    //wc_add_notice('Only one program can be added to cart in single Order', 'error' );
                    wp_redirect(home_url('checkout'));
                    return false;
                    exit;
                }
            }
        }
        // Check if the product is in a specific category
        if (has_term('doctor-booking', 'product_cat', $product_id)) {
            // Check if the category product is already in the cart
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = $cart_item['data'];
                if (has_term('doctor-booking', 'product_cat', $_product->get_id())) {
                    // Display a notice and prevent adding to the cart
                    //wc_add_notice('Only one program can be added to cart in single Order', 'error' );
                    wp_redirect(home_url('checkout'));
                    return false;
                    exit;
                }
            }
        }
    }
    echo $passed;
    return $passed;
}

/* cart page forcefully redirect */

function redirect_cart_to_checkout() {
    // if (is_cart()) {
    //     wp_safe_redirect(wc_get_checkout_url());
    //     exit;
    // }
//   if(is_shop()){
//      wp_safe_redirect(home_url());
//      exit;
//   }
//   if(is_product()){
//      wp_safe_redirect(home_url());
//      exit;
//   }
}

function display_user_orders_list() {

    $my_program_columns = apply_filters(
            'woocommerce_my_account_my_orders_columns',
            array(
                'order-number' => esc_html__('Programs', 'woocommerce'),
                'order-date' => esc_html__('Date', 'woocommerce'),
                'order-status' => esc_html__('Status', 'woocommerce'),
                'order-total' => esc_html__('Total', 'woocommerce'),
                'order-actions' => esc_html__('Action', 'woocommerce'),
            )
    );

    echo '<h3>My Programs</h3>';
    ?>
    <table class="shop_table shop_table_responsive my_account_orders">
        <thead>
            <tr>
                <?php foreach ($my_program_columns as $column_id => $column_name) : ?>
                    <th class="<?php echo esc_attr($column_id); ?>"><span class="nobr"><?php echo esc_html($column_name); ?></span></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if user is logged in
            if (is_user_logged_in()) {
                $current_user = wp_get_current_user();
                $user_id = $current_user->ID;
                $category_id = 20;
                $category_slug = 'booking-service';
                $orders_with_category = array();

                // Get orders for the current user
                $customer_orders = wc_get_orders(array(
                    'limit' => wc_get_customer_order_count($user_id),
                    'customer' => $user_id,
                    'status' => array('wc-completed', 'wc-processing'),
                ));

                if ($customer_orders) {

                    foreach ($customer_orders as $order) {
                        $order_id = $order->get_id();
                        $order_date = $order->get_date_created();
                        $order_total = $order->get_formatted_order_total();
                        $order_items = $order->get_items();
                        $order_status = $order->get_status();
                        
//                        echo '<pre>';
//                        print_r($order_items);
                        
                        foreach ($order_items as $item) {
                            $product_id = $item->get_product_id();
                            $product = wc_get_product($product_id);
                            
                            // Get categories for the product
                            $product_categories = $product->get_category_ids();

                            // Check if the product belongs to the specified category
                            if (in_array($category_id, $product_categories)) {
                                $orders_with_category[] = $order_id;
                                break; // Move to the next order once a product in the category is found in this order
                            }
                        }
                        //print_r($orders_with_category);
                        if (in_array($order_id, $orders_with_category)) {
                            ?>
                            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                    <a href="<?= $order->get_view_order_url(); ?>">#<?= $order_id; ?></a>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                    <time datetime="<?= $order_date->date('c'); ?>"><?= wc_format_datetime($order_date); ?></time>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
                                    <?= $order_status; ?>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span><?= $order_total; ?></span>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                    <a href="<?= $order->get_view_order_url(); ?>" class="woocommerce-button button view">View</a>													
                                </td>
                            </tr>
                            <?php
                        }
                    }
                } else {
                    return 'No orders found.';
                }
            } else {
                return 'Please log in to view your orders.';
            }
            ?>
        </tbody>
    </table>
    <?php
}

function display_user_orders_al_list() {

    $my_booking_columns = apply_filters(
            'woocommerce_my_account_my_orders_columns',
            array(
                'order-number' => esc_html__('Appointment', 'woocommerce'),
                'order-date' => esc_html__('Date', 'woocommerce'),
                'order-status' => esc_html__('Status', 'woocommerce'),
                'order-total' => esc_html__('Total', 'woocommerce'),
                'order-actions' => esc_html__('Action', 'woocommerce'),
            )
    );
    echo '<h3>My Appointment List</h3>';
    ?>
    <table class="shop_table shop_table_responsive my_account_orders">
        <thead>
            <tr>
                <?php foreach ($my_booking_columns as $column_id => $column_name) : ?>
                    <th class="<?php echo esc_attr($column_id); ?>"><span class="nobr"><?php echo esc_html($column_name); ?></span></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if user is logged in
            if (is_user_logged_in()) {
                $current_user = wp_get_current_user();
                $user_id = $current_user->ID;
                $category_id = 20;
                $category_slug = 'doctor-booking';
                $orders_with_category = array();

                // Get orders for the current user
                $customer_orders = wc_get_orders(array(
                    'limit' => wc_get_customer_order_count($user_id),
                    'customer' => $user_id,
                    'status' => array('wc-completed', 'wc-processing'),
                ));

                if ($customer_orders) {
                    foreach ($customer_orders as $order) {
                        $order_id = $order->get_id();
                        $order_date = $order->get_date_created();
                        $order_total = $order->get_formatted_order_total();
                        $order_items = $order->get_items();
                        $order_status = $order->get_status();
                        
//                        echo '<pre>';
//                        print_r($order_status);
                        
                        foreach ($order_items as $item) {
                            $product_id = $item->get_product_id();
                            $product = wc_get_product($product_id);

                            // Get categories for the product
                            $product_categories = $product->get_category_ids();
//print_r($product_categories);
                            // Check if the product belongs to the specified category
                            if (in_array($category_id, $product_categories)) {
                                $orders_with_category[] = $order_id;
                                break; // Move to the next order once a product in the category is found in this order
                            }
                        }
                        //print_r($orders_with_category);
                        if (in_array($order_id, $orders_with_category)) {
                            ?>
                            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                    <a href="<?= $order->get_view_order_url(); ?>">#<?= $order_id; ?></a>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                    <time datetime="<?= $order_date->date('c'); ?>"><?= wc_format_datetime($order_date); ?></time>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
                                    <?= $order_status; ?>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span><?= $order_total; ?></span>
                                </td>
                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                    <a href="<?= $order->get_view_order_url(); ?>" class="woocommerce-button button view">View</a>													
                                </td>
                            </tr>
                            <?php
                        }
                    }
                } else {
                    return 'No orders found.';
                }
            } else {
                return 'Please log in to view your orders.';
            }
            ?>
        </tbody>
    </table>
    <?php
}
