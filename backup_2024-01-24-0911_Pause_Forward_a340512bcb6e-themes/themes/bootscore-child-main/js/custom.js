jQuery(function ($) {

    $('.woocommerce-thankyou-order-received').each(function () {
        var originalString = $(this).text();
        var replacedString = originalString.replace('Thank you for shopping with us. Your account has been charged and your transaction is successful. We will be processing your order soon.', 'Congratulations! Your transaction has been successfully processed, and your account has been charged.');
        $(this).text(replacedString);
    });


    $('#booking_date').datepicker({
        dateFormat: "dd-mm-yy", // Set your desired date format here
        minDate: 0
    });

    // Do stuff here
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            560: {
                items: 2
            },
            760: {
                items: 2
            },
            990: {
                items: 3
            },
            1200: {
                items: 4
            },
            1500: {
                items: 4
            }
        }
    });

    //User logged-in check 
    var user_login_check = jQuery('body').hasClass('logged-in');

    //Booking Consult Link
    jQuery("div.dt-booking-consult").on("click", function () {
        jQuery('#booking-consult').show();

        //pass product id in hidden value
        var product_id = jQuery('.dt-booking-consult').attr('data-booking-id');
        var product_offline_id = jQuery('.dt-booking-consult').attr('data-booking-offline-id');
        jQuery('#product-id').val(product_id);
        jQuery('#product-offline-id').val(product_offline_id);


        if (!user_login_check) {
            jQuery('.virtual-success').attr('data-bs-toggle', 'offcanvas');
            jQuery('.virtual-success').attr('data-bs-target', '#offcanvas-user');
            jQuery('.virtual-success').attr('aria-controls', 'offcanvas-user');
            jQuery('#physical-btn').attr('data-bs-toggle', 'offcanvas');
            jQuery('#physical-btn').attr('data-bs-target', '#offcanvas-user');
            jQuery('#physical-btn').attr('aria-controls', 'offcanvas-user');
        }
    });
    jQuery(".booking_consult i#cancelbtn").on("click", function () {
        jQuery('#booking-consult').hide();
    });
    /*
     * online Consult
     */
    jQuery("button#virtual-btn").on("click", function () {
        var origin = window.location.origin;
        var pathname = window.location.pathname;
        var final_url;
        if (pathname.includes("/pause/")) {
            final_url = origin + pathname.substring(0, pathname.indexOf("/pause/") + 7);
            console.log("Origin URL with 'pause' subfolder:" + final_url);
        } else {
            final_url = origin;
            console.log("The URL does not contain the 'pause' subfolder." + final_url);
        }
        //create link for product add to cart
        var id = jQuery('#product-id').val();
        var addtocart = final_url + "?add-to-cart=" + id;
//         console.log(addtocart);
        if (user_login_check) {
            jQuery("#booking-consult").hide();
            jQuery('.virtual-success').attr("href", addtocart);
        } else {
            jQuery("#booking-consult").modal('hide');
        }
    });
    /*
     * offline Consult
     */
    jQuery("button#virtual-btn-offline").on("click", function () {
        var origin = window.location.origin;
        var pathname = window.location.pathname;
        var final_url;
        if (pathname.includes("/pause/")) {
            final_url = origin + pathname.substring(0, pathname.indexOf("/pause/") + 7);
            console.log("Origin URL with 'pause' subfolder:" + final_url);
        } else {
            final_url = origin;
            console.log("The URL does not contain the 'pause' subfolder." + final_url);
        }
        //create link for product add to cart
        var id = jQuery('#product-offline-id').val();
        var addtocart = final_url + "?add-to-cart=" + id;
//        console.log(addtocart);
        if (user_login_check) {
            jQuery("#booking-consult").hide();
            jQuery('.virtual-success').attr("href", addtocart);
        } else {
            jQuery("#booking-consult").modal('hide');
        }
    });



    jQuery(".physical-success").hide();
    jQuery(".booking_physical_consult #cancelbtn,.booking_physical_consult .dr-add-custom-checkbox").on("click", function () {
        jQuery(".physical-success").show();
    });
    jQuery(".booking_physical_consult #cancelbtn,.booking_physical_consult #thanks-btn").on("click", function () {
        jQuery("#booking-physical-consult").hide();
    });
    jQuery("button#physical-btn").on("click", function () {
        //pass product id in hidden value
        var p_product_id = jQuery('#product-id').val();
        jQuery('#physicall-product-id').val(p_product_id);

        //Create link for product add to cart physically
        var addtocart_p = "https://team2.devhostserver.com/pause/?add-to-cart=" + jQuery('#physicall-product-id').val();
//        var addtocart_p_New = "https://team2.devhostserver.com/pause/doctors/dr-shradha-chaudhari/";

        if (user_login_check) {
            jQuery("#booking-consult").hide();
            jQuery("#booking-physical-consult").show();
            jQuery('.physical-success').attr("href", addtocart_p);
        } else {
            jQuery("#booking-consult").modal('hide');
            jQuery("#booking-physical-consult").modal('hide');
        }
    });

    //Dropdown Menu issue
    if (jQuery(window).width() > 769) {
        jQuery('.dropdown').mouseover(function () {
            if (jQuery('.navbar-toggler').is(':hidden')) {
                jQuery(this).addClass('show').attr('aria-expanded', 'true');
                jQuery(this).find('.dropdown-menu').addClass('show');
            }
        }).mouseout(function () {
            if (jQuery('.navbar-toggler').is(':hidden')) {
                jQuery(this).removeClass('show').attr('aria-expanded', 'false');
                jQuery(this).find('.dropdown-menu').removeClass('show');
            }
        });

        // Go to the parent link on click
        jQuery('.dropdown > a').click(function () {
            location.href = this.href;
        });
    }



    //cf7 label and input custom class
    if (jQuery("body").hasClass("page-id-454")) {
        jQuery('.wpcf7-radio input[type="radio"]').addClass('form-check-input');
        jQuery('.wpcf7-radio label').addClass('form-check-label');
    }

});