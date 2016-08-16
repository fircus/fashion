<?php
/**
 * Adding Admin Menu
 *
 * @package admin-setting
 */

add_action( 'admin_menu', 'bc_random_banner' );

/**
 * Menu and Sub Menu
 */
function bc_random_banner() {
	add_menu_page(
		__( 'Random Banner', 'bc_rb' ),
		'Random Banner',
		'manage_options',
		'bc_random_banner',
		'bc_random_banner_settings',
		''
	);

	add_submenu_page( 'bc_random_banner', __( 'Settings', 'bc_rb' ), 'Settings',
		'manage_options', 'bc_random_banner_option', 'bc_random_banner_option' );

	add_submenu_page( 'bc_random_banner', __( 'Campaign (pro)', 'bc_rb' ), 'Campaign (pro)',
		'manage_options', 'bc_random_banner_campaign', 'bc_random_banner_campaign' );

	add_submenu_page( 'bc_random_banner', __( 'Statistics (pro)', 'bc_rb' ), 'Statistics (pro)',
		'manage_options', 'bc_random_banner_statistics', 'bc_random_banner_statistics' );

	add_submenu_page( 'bc_random_banner', __( 'Support', 'bc_rb' ), 'Support',
		'manage_options', 'bc_random_banner_support', 'bc_random_banner_support' );
}

/**
 * Main Menu Random Banner
 */
function bc_random_banner_settings() {
	$get_all_data = bc_rb_get_all_row();
	echo '<div class="container bc_random_banner" data-display_name="' . bc_rb_get_user_display_name() . '">
<div class="row">
  <div class="col-md-10">
  <div class="pull-right">' . bc_rb_show_payment_details() . '</div>
  <h1>
  <span>Random Banner</span>
  <div class="btn-group">
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">' . esc_html__( 'Add New Ads', 'rb_bc' ) . ' <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li class="add_new_upload" data-item="add_new_upload"><a href="#"><span class="glyphicon glyphicon-picture"></span> ' . esc_html__( 'Image Banner', 'rb_bc' ) . ' </a></li>
                <li class="add_new_script" data-item="add_new_script"><a href="#"><span class="glyphicon glyphicon-align-left"></span> ' . esc_html__( 'Script Banner', 'rb_bc' ) . '</a></li>
                <li class="paypal_donation_button" data-item="add_new_swf"><a href="#"><span class="glyphicon glyphicon-facetime-video"></span> ' . esc_html__( 'SWF Banner', 'rb_bc' ) . ' </a></li>
            </ul>
        </div>
</h1>

</div>
</div>
' . bc_rb_loader();
	if ( isset( $_REQUEST['success'] ) ) {
		echo bc_rb_on_success_payment( $_REQUEST );
	}
	echo '<div class="upload_area col-md-10" data-url="' . admin_url( 'admin-ajax.php?action=bc_rb_save_banner&nonce=' . wp_create_nonce( "bc_rb_nonce" ) ) . '" data-delete="' . admin_url( 'admin-ajax.php?action=bc_rb_delete_banner&nonce=' . wp_create_nonce( "bc_rb_nonce_delete" ) ) . '" data-payment_info="' . get_option( 'bc_rb_payment_info' ) . '" data-donation_later="' . admin_url( 'admin-ajax.php?action=bc_rb_donation_later&nonce=' . wp_create_nonce( "bc_rb_donation_later" ) ) . '">';

	echo loop_data( $get_all_data );

	echo '</div>';
	echo '<div class="col-md-2"><div class="offers_list"> ' . bc_rb_get_offers() . '</div></div>';


	echo '</div>';

}

/**
 * Sub Menu Support
 */
function bc_random_banner_support() {
	echo '<div class="container bc_random_banner" data-display_name="' . bc_rb_get_user_display_name() . '">
' . bc_rb_loader();
	echo '<div class="row">';
	echo '<h2>' . esc_html__( 'Random Banner Support', 'bc_rb' ) . '</h2>';
	if ( isset( $_REQUEST['success'] ) ) {
		echo bc_rb_on_success_payment( $_REQUEST );
	}
	if ( bc_rb_is_paid() ) {
		echo '<div class="col-md-12 bc_rb_transaction_details">
<div class="col-md-5 bg-primary"><h4> ' . esc_html__( 'PayPal Transaction ID', 'bc_rb' ) . ' </h4></div><div class="col-md-5 bg-primary"><h4>' . get_option( 'bc_rb_payment_info' ) . '</h4></div>
</div>';
	} else {
		echo '<div class="col-md-12 bc_rb_transaction_details"><h4> ' . esc_html__( 'Have you paid already? Please login','bc_rb' ) . ' <a href="http://ifecho.com/"> ' . esc_html__( 'here', 'bc_rb' ) . '</a>  ' . esc_html__( 'and download the pro version and update it.', 'bc_rb' ) . '</h4></div>';
		echo '<div class="col-md-12 bc_rb_transaction_details">
<p> ' . esc_html__( 'Sorry you are not subscribed for any plan','bc_rb' ) . '</p>
' . bc_rb_show_payment_details() . '
</div>';
	}
	echo '<div class="col-md-12 bc_rb_transaction_details"><h4> ' . esc_html__( 'Kindly rate our plugin in ', 'bc_rb' ) . ' <a href="https://wordpress.org/support/view/plugin-reviews/random-banner?rate=5#postform">WordPress</a></h4> </div> <div class="col-md-12 bc_rb_support_details"> <h4> ' . esc_html__( 'Please use this page for support -', 'bc_rb' ) . ' <a href="https://buffercode.com/project/random-banner/">Comment</a> | <a href="https://ifecho.com"> ' . esc_html__( 'Chat', 'bc_rb' ) . '</a></h4></div>';
}

/**
 * Settings
 */
function bc_random_banner_option() {

	$options                  = get_random_banner_option_value();
	$category                 = bc_rb_get_all_category();
	$insert_short_code_values = get_option( 'bc_rb_insert_short_code_values', bc_rb_category_default_values() );
	if ( is_string( $insert_short_code_values ) ) {
		$insert_short_code_values = unserialize( $insert_short_code_values );
	}
	$popup = get_popup_option_value();


	$options['disable']           = array_key_exists( 'disable', $options ) ? $options['disable'] : '';
	$options['open']              = array_key_exists( 'open', $options ) ? $options['open'] : '';
	$options['disable_mobile']    = array_key_exists( 'disable_mobile', $options ) ? $options['disable_mobile'] : '';
	$options['user_logged_in']    = array_key_exists( 'user_logged_in', $options ) ? $options['user_logged_in'] : '';
	$popup['enable_popup']        = array_key_exists( 'enable_popup', $popup ) ? $popup['enable_popup'] : '';
	$popup['popup_category_name'] = array_key_exists( 'popup_category_name', $popup ) ? $popup['popup_category_name'] : '';


	echo '<div class="container bc_random_banner" data-display_name="' . bc_rb_get_user_display_name() . '"> ' . bc_rb_loader() . '
   <div class="row">
       <div class="col-md-12">
           <h1>
            ' . esc_html__( 'Random Banner Settings', 'bc_rb' ) . '
           <span class="pull-right">' . bc_rb_show_payment_details() . '</span>
           </h1>
       </div>
   </div>
   <div id="content" class="padding_top_20">
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
       <li class="active"><a href="#category" data-toggle="tab"> ' . esc_html__( 'Category', 'bc_rb' ) . '</a></li>
       <li><a href="#post_page" data-toggle="tab"> ' . esc_html__( 'Insert Banners inside the Post/Page', 'bc_rb' ) . '</a></li>
       <li><a href="#Popup" data-toggle="tab"> ' . esc_html__( 'Popup', 'bc_rb' ) . '</a></li>
       <li><a href="#Others" data-toggle="tab"> ' . esc_html__( 'Others', 'bc_rb' ) . '</a></li>
   </ul>
   <div id="my-tab-content" class="tab-content">
       <div class="tab-pane active" id="category">
          <div class="col-md-6 category"  data-display_name="' . bc_rb_get_user_display_name() . '">
<div class="row">
<h2> ' . esc_html__( 'Add Category', 'bc_rb' ) . ' <button class="btn btn-primary new_category"><span class="glyphicon glyphicon-plus"></span>  ' . esc_html__( 'New Category', 'bc_rb' ) . '</button></h2>
<div class="bg-danger"> ' . esc_html__( 'Note: Please do not use space in the Category Name', 'bc_rb' ) . '</div>
<div class="col-md-12 category_items" data-payment_info="' . get_option( 'bc_rb_payment_info' ) . '" data-donation_later="' . admin_url( 'admin-ajax.php?action=bc_rb_donation_later&nonce=' . wp_create_nonce( "bc_rb_donation_later" ) ) . '" data-save="' . admin_url( 'admin-ajax.php?action=bc_rb_save_category&nonce=' . wp_create_nonce( "bc_rb_save_category" ) ) . '" data-delete="' . admin_url( 'admin-ajax.php?action=bc_rb_delete_category&nonce=' . wp_create_nonce( "bc_rb_delete_category" ) ) . '">

' . bc_rb_loop_category( $category ) . '
</div>
</div>
</div>
       </div>
       <div class="tab-pane" id="post_page">
       <div class="row">
       <div class="col-md-7">
             <form data-save="' . admin_url( 'admin-ajax.php?action=bc_rb_save_insert_post&nonce=' . wp_create_nonce( "bc_rb_save_insert_post" ) ) . '">
             <div class="bc_rb_insert_post_shortcode padding_top_20">

                   <div class="bc_rb_check_insert_post">
                   <h4> ' . esc_html__( 'Enable Banner to all Post and Pages?', 'bc_rb' ) . '</h4>
                    <select name="bc_rb_category_values[enable_insert]" class="form-control bc_rb_enable_insert">' . bc_rb_get_slider_loop( $insert_short_code_values['enable_insert'] ) . '</select>
                   </div>

                   <div class="row bc_rb_enable_insert_post_shortcode hide">
                   <div class="col-md-6">
                       <h4> ' . esc_html__( 'Category Name', 'bc_rb' ) . '</h4>
                       ' . bc_rb_drop_down( 'bc_rb_category_values[category_name]', bc_rb_get_category_by_array(), $insert_short_code_values['category_name'] ) . '

                       <h4> ' . esc_html__( 'Slider', 'bc_rb' ) . ' [Pro Version only]</h4>
                       <select disabled name="bc_rb_category_values[slider]" readonly class="form-control"><option value="No">No</option></select>

                       <h4> ' . esc_html__( 'Autoplay', 'bc_rb' ) . ' [Pro Version only]</h4>
                       <select disabled name="bc_rb_category_values[autoplay]" readonly class="form-control"><option value="True">True</option></select>

                       <h4> ' . esc_html__( 'Delay', 'bc_rb' ) . ' [Pro Version only]</h4>
                       <select disabled name="bc_rb_category_values[delay]" readonly class="form-control"><option value="3000">3000</option></select>
                       </div>
                       <div class="col-md-6">
                       <h4>' . esc_html__( 'Loop', 'bc_rb' ) . '  [Pro Version only]</h4>
                       <select disabled name="bc_rb_category_values[loop]" readonly class="form-control"><option value="True">True</option></select>

                       <h4> ' . esc_html__( 'Banner Location', 'bc_rb' ) . '</h4>
                       ' . bc_rb_drop_down( 'bc_rb_category_values[location]', bc_rb_insert_post_locations(), $insert_short_code_values['location'] ) . '

                       <h4>' . esc_html__( 'Insert in', 'bc_rb' ) . '</h4>
                       ' . bc_rb_drop_down( 'bc_rb_category_values[post_page]', bc_rb_insert_post_page(), $insert_short_code_values['post_page'] ) . '
                       </div>
                   </div>
                   <div class="padding_top_10">
                           <button type="submit" name="bc_rb_category_values_save" class="btn btn-primary bc_rb_category_values_save">
                                ' . esc_html__( 'Save', 'bc_rb' ) . '
                           </button>
                       </div>
             </div>
        </form>
        </div>
         </div>
       </div>
       
       <div class="tab-pane" id="Popup">
        <form data-save="' . admin_url( 'admin-ajax.php?action=bc_rb_save_popup&nonce=' . wp_create_nonce( "bc_rb_save_popup" ) ) . '">
    <div class="row padding_top_20">
    <div class="col-md-3">
             ' . esc_html__( 'Enable Popup?', 'bc_rb' ) . '
        </div>
        <div class="col-md-4">
            <input ' . $popup['enable_popup'] . ' type="checkbox" name="bc_rb_setting_popup[enable_popup]" value="checked" />
        </div>
        </div>
        <div class="row padding_top_20">
        <div class="col-md-3">
           ' . esc_html__( 'Category to show in Popup', 'bc_rb' ) . '
        </div>
        <div class="col-md-4">
            ' . bc_rb_drop_down( 'bc_rb_setting_popup[popup_category_name]', bc_rb_get_category_by_array(), $popup['popup_category_name'] ) . '
        </div>
        
    </div>
    <div class="margin_20 paypal_donation_button">
    <div class="row padding_top_20">
    <div class="col-md-3">
             ' . esc_html__( 'How many times Popup should show per Session?', 'bc_rb' ) . '
        </div>
        <div class="col-md-4">
            <input readonly type="text" value="3" class="paypal_donation_button" />
        </div>
        </div>
        
        
    <div class="row padding_top_20">
    <div class="col-md-3">
             ' . esc_html__( 'Popup should show after', 'bc_rb' ) . '
        </div>
        <div class="col-md-4">
            <input type="text" readonly value="2000"  class="paypal_donation_button"  /> (milliseconds)
        </div>
        </div>
        
        <div class="row padding_top_20">
    <div class="col-md-3">
           ' . esc_html__( 'Popup Loading Animated Style', 'bc_rb' ) . '
        </div>
        <div class="col-md-4">
            ' . bc_rb_drop_down( '', bc_rb_popup_animated_style(), '', 'readonly', 'paypal_donation_button' ) . '
        </div>
        </div>
       
    <div class="row padding_top_20">
    <div class="col-md-3">
             ' . esc_html__( 'Enable Popup Background Transparent', 'bc_rb' ) . '
        </div>
        <div class="col-md-4">
            <input disabled checked type="checkbox" value="" />
        </div>
        </div>
        
        <div class="row padding_top_20">
    <div class="col-md-3">
            ' . esc_html__( 'Popup Background Color', 'bc_rb' ) . '
        </div>
        <div class="col-md-4">
            <input disabled type="color" value="" />
        </div>
        </div>
        
        <div class="row padding_top_20">
            <div class="col-md-3">
                  ' . esc_html__( 'Popup Border Color', 'bc_rb' ) . '
            </div>
        <div class="col-md-4">
        <div class="bc_rb_inline">
        <div>
        ' . bc_rb_drop_down( '', bc_rb_number_1_to_10(), '', 'readonly', 'paypal_donation_button' ) . '
        </div><div>
        ' . bc_rb_drop_down( '', bc_rb_border_styles(), '', 'readonly', 'paypal_donation_button' ) . '
        </div><div>
           <input disabled type="color" value="" />
            </div>
            </div>  
        </div>
        </div>
        </div>
    <div class="padding_top_10">
    <button type="submit" name="bc_rb_popup_save" class="btn btn-primary bc_rb_popup_save"> ' . esc_html__( 'Save', 'bc_rb' ) . '</button>
    </div>
    </form>
        </div>
        
        
       <div class="tab-pane" id="Others">
           <form data-save="' . admin_url( 'admin-ajax.php?action=bc_rb_save_options&nonce=' . wp_create_nonce( "bc_rb_save_options" ) ) . '">
   <div class="row padding_top_20">
       <div class="col-md-6">
           ' . esc_html__( 'Open Ads Link in New Window', 'bc_rb' ) . '
       </div>
       <div class="col-md-4">
           <input ' . $options['open'] . ' type="checkbox" name="bc_rb_setting_options[open]" value="checked" />
       </div>
   </div>
   <div class="row padding_top_20">
        <div class="col-md-6">
             ' . esc_html__( 'Currency Type', 'bc_rb' ) . ' [Pro Version]
        </div>
        <div class="col-md-3">
             ' . bc_rb_drop_down_currency( 'bc_rb_setting_options[currency_type]', bc_rb_currency_lists()) . '
        </div>
    </div>
    
   <div class="row padding_top_20">
       <div class="col-md-6">
             ' . esc_html__( 'Disable Banners to Logged in Users?', 'bc_rb' ) . '
       </div>
       <div class="col-md-4">
           <input ' . $options['user_logged_in'] . ' type="checkbox" name="bc_rb_setting_options[user_logged_in]" value="checked" />
       </div>
   </div>
   
    <div class="row padding_top_20">
        <div class="col-md-6">
            <span class="danger_fonts"> ' . esc_html__( 'Disable Random Banner for Mobile and Tablets?', 'bc_rb' ) . ' [Pro Version]</span><br>
            <i> ' . esc_html__( 'Note: if checked the Random Banner will be disabled in all the location including shortcodes', 'bc_rb' ) . '</i>
        </div>
        <div class="col-md-6">
            <input type="checkbox" disabled/>
        </div>
    </div>
    
    
   <div class="row padding_top_20">
        <div class="col-md-6">
            <span class="danger_fonts"> ' . esc_html__( 'Disable Random Banner in all locations', 'bc_rb' ) . '</span><br>
              <i> ' . esc_html__( 'Note: if checked the Random Banner will be disabled in all the location including shortcodes', 'bc_rb' ) . '</i>
        </div>
        <div class="col-md-6">
            <input ' . $options['disable'] . ' type="checkbox" name="bc_rb_setting_options[disable]" value="checked" />
        </div>
    </div>
    
   <div class="row padding_top_20">
         <div class="col-md-6">
             <button type="submit" name="bc_rb_option_save" class="btn btn-primary bc_rb_option_save">
                ' . esc_html__( 'Save', 'bc_rb' ) . '
             </button>
         </div>
   </div>
   </form>
       </div>
   </div>
   </div>';

}

/**
 * Run Campaign
 */
function bc_random_banner_campaign() {
	$get_banner_data = bc_rb_get_all_row();
	echo '<div class="container">
<div class="row">
  <div class="col-md-12">
  <h1> ' . esc_html__( 'Campaign', 'bc_rb' ) . '
  <span class="pull-right bc_random_banner"  data-display_name="' . bc_rb_get_user_display_name() . '">' . bc_rb_show_payment_details() . '</span></h1>
</div>
<i><b> ' . esc_html__( 'Note:', 'bc_rb' ) . ' </b>  ' . esc_html__( '1. Please use -1 for unlimited Impression/Click/Amount', 'bc_rb' ) . ',  ' . esc_html__( '2. There is no Cost per click for Script and SWF ads', 'bc_rb' ) . '</i>
</div>';
	echo '<div class="bc_random_banner_campaign" data-display_name="' . bc_rb_get_user_display_name() . '" data-url="' . admin_url( 'admin-ajax.php?action=bc_rb_save_campaign&nonce=' . wp_create_nonce( "bc_rb_save_campaign" ) ) . '" >';
	echo bc_rb_loop_campaign_data( $get_banner_data );
	echo '</div></div>';
}

/**
 * Statistics
 */
function bc_random_banner_statistics() {
	echo '<div class="container bc_random_banner" data-display_name="' . bc_rb_get_user_display_name() . '">
' . bc_rb_loader();
	echo '<div class="row">';
	echo '<h2> ' . esc_html__( 'Random Banner Statistics', 'bc_rb' ) . '</h2>';
	if ( isset( $_REQUEST['success'] ) ) {
		echo bc_rb_on_success_payment( $_REQUEST );
	}
	if ( bc_rb_is_paid() ) {
		echo '<div class="col-md-12 bc_rb_transaction_details">
<div class="col-md-5 bg-primary"><h4>PayPal Transaction ID</h4></div><div class="col-md-5 bg-primary"><h4>' . get_option( 'bc_rb_payment_info' ) . '</h4></div>
</div>';
	} else {
		echo '<div class="col-md-12 bc_rb_transaction_details">
<p> ' . esc_html__( 'Sorry you are not subscribed for any plan to view Statistics of banners','bc_rb' ) . '</p>
' . bc_rb_show_payment_details() . '
</div>';
	}
	echo '</div> </div>';
}

/**
 * Disable Random Banner to post and page
 */
function add_custom_meta_box() {
	$postTypes = get_post_types( array(
		'public' => true,
	), 'objects' );
	if ( $postTypes ) {
		foreach ( $postTypes as $postType ) {
			if ( $postType->name == 'attachment' ) {
				continue;
			}
			add_meta_box( "bc_rb_disable_banner", "Disable Random Banner on this " . $postType->name, "bc_rb_disable_random_banner", $postType->name, "normal", "high", null );
		}
	}
}

add_action( "add_meta_boxes", "add_custom_meta_box" );

/**
 * Disable Random Banner Inside the Post | Page
 *
 * @param object $post Banner Details.
 */
function bc_rb_disable_random_banner( $post ) {
	$checked = '';
	$disable = get_post_meta( $post->ID, 'bc_rb_disable_banner', true );
	if ( $disable == 'yes' ) {
		$checked = 'checked';
	}
	wp_nonce_field( 'bc_rb_save_post_meta_nonce', 'bc_rb_save_post_meta_nonce' );
	?>
	<p>
		<label for="bc_rb_disable_banner"><?php _e( 'Disable Random Banner?', 'bc_rb' ); ?></label>
		<input type="checkbox" name="bc_rb_disable_banner" id="bc_rb_disable_banner"
		       value="yes" <?php echo $checked; ?> />
	</p>
	<p class="description">
		<?php _e( 'If you wish to disable random banner on this content, please check this option.', 'bc_rb' ); ?>
	</p>
	<?php
}

/**
 * Show Popup Based on Setting Value
 */
function bc_rb_show_popup() {
	$popup = get_popup_option_value();
	if ( ! isset( $_SESSION['popup_show'] ) ) {
		$_SESSION['popup_show'] = 0;
	}
	if ( $popup['enable_popup'] == 'checked' && $popup['popup_session'] > $_SESSION['popup_show'] ) {
		$_SESSION['popup_show'] += 1;
		$bg_color  = 'transparent';
		$bg_border = 'none';

		echo '<div id="popup" class="bc_rb_hide">
<div class="bc_rb_popup_container animated">
<div class="bc_rb_close"><img src="' . plugins_url( 'assets/images/close.png', BC_RB_PLUGIN ) . '" /></div>
<div class="bc_random_banner_shortcode">
' . do_shortcode( '[bc_random_banner category=' . $popup['popup_category_name'] . ']' ) . '
</div>
</div>
</div>';
		echo "<script>
    jQuery(document).ready(function($) {
        window.setTimeout(function(){
            $('#popup').css({
            'background':'{$bg_color}',
            'border':'{$bg_border}',
            'z-index':999
    });
    
    $('.bc_rb_popup_container').addClass('{$popup["popup_animated_style"]}');
    
    if($('#popup').hasClass('bc_rb_hide')){
        $('#popup').removeClass('bc_rb_hide');
        }
},{$popup['popup_show']});
    });
    
    </script>";
	}
}

add_action( 'wp_footer', 'bc_rb_show_popup' );