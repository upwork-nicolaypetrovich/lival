<?php 

// start of the session
session_start();


// removes comments from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action('init', 'remove_comment_support', 100);
function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


// registering image dimensions
add_theme_support( 'post-thumbnails' );
add_image_size( 'empresa-icon', 63, 63, true );
add_image_size( 'header-slider', 1920, 1080, true );
add_image_size( 'category-image', 300, 670, true );


// registering styles and scripts
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
	wp_enqueue_style( 'main', get_template_directory_uri().'/css/main.css' );
	wp_enqueue_style( 'fonts', get_template_directory_uri().'/css/fonts.css' );
	wp_enqueue_style( 'bootstrap-grid-min', get_template_directory_uri().'/css/bootstrap-grid.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri().'/css/slick.css' );
	wp_enqueue_style( 'slick-lightbox', get_template_directory_uri().'/css/slick-lightbox.css' );
	wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.css' );
	wp_enqueue_script( 'jquery3',  get_template_directory_uri().'/js/jquery-3.2.1.min.js', array(), '3.2.1', true);
	wp_enqueue_script( 'tether',  get_template_directory_uri().'/js/tether.min.js', array('jquery3'), '1.0.0', true);
	wp_enqueue_script( 'bootstrap-min',  get_template_directory_uri().'/js/bootstrap.min.js', array('jquery3'), '1.0.0', true);
	wp_enqueue_script( 'slick-min',  get_template_directory_uri().'/js/slick.min.js', array('jquery3'), '1.0.0', true);
	wp_enqueue_script( 'slick-lightbox-min',  get_template_directory_uri().'/js/slick-lightbox.min.js', array('jquery3'), '1.0.0', true);
	wp_enqueue_script( 'custom',  get_template_directory_uri().'/js/custom.js', array('jquery3'), '1.0.0', true);
}


// registering navigation
register_nav_menus(array(
	'top'    => 'Top Navigation',
	'bottom' => 'Footer Navigation'
));


// registering translations
pll_register_string( 'Subscribe', 'footer-subscribe', 'Footer' );
pll_register_string( 'Empresa Title', 'empresa-title', 'Empresa' );
pll_register_string( 'Empresa Text', 'empresa-text', 'Empresa' );
pll_register_string( 'Qualidade Title 1', 'qualidade-title1', 'Qualidade' );
pll_register_string( 'Qualidade Title 2', 'qualidade-title2', 'Qualidade' );
pll_register_string( 'Qualidade Text 1', 'qualidade-text1', 'Qualidade' );
pll_register_string( 'Qualidade Text 2', 'qualidade-text2', 'Qualidade' );
pll_register_string( 'Qualidade Text 3', 'qualidade-text3', 'Qualidade' );
pll_register_string( 'Product Text', 'product-text', 'Product' );
pll_register_string( 'Product Link', 'product-link', 'Product' );
pll_register_string( 'Know more', 'empresa-know-more', 'saber mais' );
pll_register_string( 'Contacts placeholder submit', 'contact_submit', 'Submit' );
pll_register_string( 'Contacts placeholder name', 'contact_name', 'Name' );
pll_register_string( 'Contacts placeholder message', 'contact_message', 'Message' );
pll_register_string( 'Contacts placeholder email', 'contact_email', 'Email address' );
pll_register_string( 'Contacts', 'contacts', 'Contacts' );
pll_register_string( 'Contacts morada', 'contacts-morada', 'Contacts' );
pll_register_string( 'Contacts address1', 'contacts-address1', 'Contacts' );
pll_register_string( 'Contacts address2', 'contacts-address2', 'Contacts' );
pll_register_string( 'Contacts empresa', 'contacts-empresa', 'Contacts' );
pll_register_string( 'Contacts departament1', 'contacts-departament1', 'Contacts' );
pll_register_string( 'Contacts departament1 email', 'contacts-departament1-email', 'Contacts' );
pll_register_string( 'Contacts departament1 phone', 'contacts-departament1-phone', 'Contacts' );
pll_register_string( 'Contacts departament2', 'contacts-departament2', 'Contacts' );
pll_register_string( 'Contacts departament2 email', 'contacts-departament2-email', 'Contacts' );
pll_register_string( 'Contacts departament2 phone', 'contacts-departament2-phone', 'Contacts' );
pll_register_string( 'Contacts departament3', 'contacts-departament3', 'Contacts' );
pll_register_string( 'Contacts departament3 email', 'contacts-departament3-email', 'Contacts' );
pll_register_string( 'Contacts departament3 phone', 'contacts-departament3-phone', 'Contacts' );
pll_register_string( 'Contacts social facebook', 'contacts-s1', 'Contacts' );
pll_register_string( 'Contacts social vimeo', 'contacts-s2', 'Contacts' );
pll_register_string( 'Contacts social linkedin', 'contacts-s3', 'Contacts' );
pll_register_string( 'Contacts social twitter', 'contacts-s4', 'Contacts' );
pll_register_string( 'Contacts success #1 text', 'success-t11', 'Contacts' );
pll_register_string( 'Contacts success #1 text', 'success-t12', 'Contacts' );
pll_register_string( 'Contacts success #1 text', 'success-t13', 'Contacts' );
pll_register_string( 'Contacts success #2 text', 'success-t21', 'Contacts' );
pll_register_string( 'Contacts success #2 text', 'success-t22', 'Contacts' );


// pdf upload configuration
function additional_mime_types( $mimes ) {
	$mimes['pdf'] = 'application/pdf';
	return $mimes;
}
add_filter( 'upload_mimes', 'additional_mime_types' );


// form information sending
function send_email_to_admin() {
	if(isset($_POST['test']) && $_POST['test']=='' ){
		//print_r($_POST); die;
		$message = '';
	    if(isset($_POST['name'])) $message .= 'Name: '.$_POST['name']."\n\r";
	    if(isset($_POST['email'])) $message .= 'E-mail: '.$_POST['email']."\n\r";
	    if(isset($_POST['text'])) $message .= 'Text: '.$_POST['text']."\n\r";
	    $headers = 'From: Lival <comercial@lival.pt>' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	    wp_mail( get_option('admin_email'), 'From website Lival', $message, $headers);
	}
    exit();
}
add_action( 'admin_post_nopriv_contact_form', 'send_email_to_admin' );
add_action( 'admin_post_contact_form', 'send_email_to_admin' );


// adding theme customization
add_action('customize_register', function($wp_customize){

	// empresa section
	$wp_customize->add_section(
		'empresa',
		array(
			'title' => 'Empresa',
	   		'description' => 'Empresa images',
	   		'priority' => 1,
	   		)
  	);

	$wp_customize->add_setting( 'empresa1' );
	$wp_customize->add_control( 
	    new WP_Customize_Image_Control(
	        $wp_customize,'empresa1',array(
	            'label' => 'Image 1',
	            'section' => 'empresa',
	            'settings' => 'empresa1'
	        )
	    )
	);

	$wp_customize->add_setting( 'empresa2' );
	$wp_customize->add_control( 
	    new WP_Customize_Image_Control(
	        $wp_customize,'empresa2',array(
	            'label' => 'Image 2',
	            'section' => 'empresa',
	            'settings' => 'empresa2'
	        )
	    )
	);

	$wp_customize->add_setting( 'empresa3' );
	$wp_customize->add_control( 
	    new WP_Customize_Image_Control(
	        $wp_customize,'empresa3',array(
	            'label' => 'Image 3',
	            'section' => 'empresa',
	            'settings' => 'empresa3'
	        )
	    )
	);

	// footer section
	$wp_customize->add_section(
		'footer',
		array(
			'title' => 'Footer',
	   		'description' => 'Footer data',
	   		'priority' => 2,
	   		)
  	);

	$wp_customize->add_setting(
		'copyrights',
  		array('default' => '© 2017 Lival LDA.')
  	);
 	$wp_customize->add_control(
  		'copyrights',
  		array(
   			'label' => 'Copyrights',
   			'section' => 'footer',
   			'type' => 'text',
   		)
  	);

	$wp_customize->add_setting(
		'designed',
  		array('default' => 'Design by <a href="#">perto</a>')
  	);
 	$wp_customize->add_control(
  		'designed',
  		array(
   			'label' => 'Designed',
   			'section' => 'footer',
   			'type' => 'text',
   		)
  	);

});