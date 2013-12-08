<?php

// Declare WordPress features the theme explicitly supports ////////////////////

add_theme_support( 'post-formats', array( 'image' ) );

add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

// Load localization files /////////////////////////////////////////////////////

load_theme_textdomain('fumseck');

// Register the menus //////////////////////////////////////////////

function fumseck_register_menus() {
	register_nav_menus(
		array(
			'fumseck_top_nav' => __( 'Primary top navigation', 'fumseck' ),
			'fumseck_about_menu' => __( 'Menu for About page set', 'fumseck' )
		)
	);
}

add_action( 'init', 'fumseck_register_menus' );

// Modify the WP query to include custom content types to search results ///////
// and archive pages

function fumseck_add_cpt_search( $query ) {
	if ( ($query->is_search || $query->is_archive) && ! is_admin() )
		$query->set( 'post_type', array( 'post', 'batbelt_project', 'batbelt_event' ) );
	return $query;
}

add_filter( 'pre_get_posts', 'fumseck_add_cpt_search' );

// Exclude image posts from the main blog page /////////////////////////////////

function fumseck_exclude_image_posts( $query ) {
	if ( $query->is_main_query() && $query->is_home() ) {
		$feip_query = array(
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array(
					'post-format-image'
				),
				'operator' => 'NOT IN',
			)
		);
		$query->set( 'tax_query', $feip_query );
	}
}

add_action( 'pre_get_posts', 'fumseck_exclude_image_posts' );

// Return the linked title of a given post object //////////////////////////////

function fumseck_linked_title( $id ) {
	$post_title = get_the_title( $id );
	echo '<a href="' . esc_url( get_permalink( $id ) ) . '" title="' . esc_attr( $post_title, 'fumseck' ) . '">'. $post_title . '</a>' ;
}

// Display the default image for content without a featured image //////////////

function fumseck_default_image( $post_type ) {
	
	if ( ($post_type == 'post') or ($post_type == 'page') ) {
		
		$output = '<img class="img-responsive" width="760" height="247" '
					. 'alt="Vitruve Man" '
					. 'src="' . get_template_directory_uri() . '/images/default-picture-760.jpg' . '"></img>';
		echo $output;
	}
}

// Register Bootstrap's JavaScript /////////////////////////////////////////////

function fumseck_register_bootstrap_js() {
	wp_enqueue_script(
		'bootstrap_js',
		get_stylesheet_directory_uri() . '/3rdparty/bootstrap-3.0.3/dist/js/bootstrap.min.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'fumseck_register_bootstrap_js' );

// Register the widgetized footer //////////////////////////////////////////////

function fumseck_register_footer_sidebars() {
    register_sidebar( array(
        'name' => __( 'Footer (en, default)', 'fumseck' ),
        'id' => 'footer-sidebar-en',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer (fr)', 'fumseck' ),
        'id' => 'footer-sidebar-fr',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'fumseck_register_footer_sidebars' );

// Output the list of languages for each page //////////////////////////////////

function fumseck_list_languages() {
	$languages = icl_get_languages('skip_missing=0');
	$output = '';
	foreach ($languages as $l){
		if ($l['active']) {
			$output .= '<li role="presentation" class="setting-active" title="'
					. esc_attr( sprintf( __('This page is currently shown in %s', 'fumseck'), $l['translated_name']))
					. '"><span class="no-link-menu-item"><i class="fa fa-chevron-right fa-smaller fa-fw"></i> '
					. $l['native_name']
					. '</span></li>'
					. "\n";
		} elseif ($l['missing']) {
			$output .= '<li role="presentation" class="setting-disabled" title="'
					. esc_attr( sprintf( __('This page is not available in %s', 'fumseck'), $l['translated_name']))
					. '"><span class="no-link-menu-item"><i class="fa fa-ban fa-smaller reveal fa-fw"></i> '
					. $l['native_name']
					. '</span></li>'
					. "\n";
		} else {
			$output .= '<li role="presentation" class="setting-inactive" title="'
					. esc_attr( sprintf( __('Show this page in %s', 'fumseck'), $l['translated_name']))
					. '"><a href="'
					. $l['url']
					. '"><i class="fa fa-chevron-right fa-smaller reveal fa-fw"></i> '
					. $l['native_name']
					. '</a></li>'
					. "\n";
		}
	}
	echo $output;
}

// Extracts the geographic coordinates of the photo if they're in the Exif
// metadata and saves them to the database along other metadata ////////////////

//// Helper function: converts a fraction string to a decimal

function fumseck_frac_string_to_dec( $fraction ) {
	list($num, $denum ) = explode( '/', $fraction );
	if ($denum) {
		return ($num / $denum);
	}
}

//// Helper function: converts deg/min/sec geocoord to decimal degrees

function fumseck_geocoord_DMS_to_DegDec($degrees, $minutes, $seconds, $direction) {
	
	if ( $direction == 'W' or $direction == 'S' ) {
		$sign = -1;
	} else {
		$sign = 1;
	}
	
	return ( $sign * ( $degrees +  ( ($minutes * 60 + $seconds) / 3600 ) ) );
	
}

//// Actual geocoord extraction and saving

function fumseck_extract_exif_geocoord($meta, $file) {
		$exif = exif_read_data( $file );
		if ( $exif['GPSLatitude'] and $exif['GPSLatitudeRef'] and $exif['GPSLongitude'] and $exif['GPSLongitudeRef'] ) {
			
			// Save both DMS and DegDec values for easier access later
			
			$meta['latitude_DMS'] = array( 
				'degrees' => fumseck_frac_string_to_dec($exif['GPSLatitude'][0]),
				'minutes' => fumseck_frac_string_to_dec($exif['GPSLatitude'][1]),
				'seconds' => fumseck_frac_string_to_dec($exif['GPSLatitude'][2]),
				'direction' => $exif['GPSLatitudeRef']
			);
			
			//// Harmonize MinDec and DMS and round the seconds
			
			$tmp_minutes = $meta['latitude_DMS']['minutes'];
			$meta['latitude_DMS']['minutes'] = intval($tmp_minutes);
			$meta['latitude_DMS']['seconds'] = intval( $meta['latitude_DMS']['seconds'] + (floatval($tmp_minutes) - intval($tmp_minutes)) * 60);
			
			//// Convert to DegDec
			
			$meta['latitude_DegDec'] = fumseck_geocoord_DMS_to_DegDec( 
				$meta['latitude_DMS']['degrees'],
				$meta['latitude_DMS']['minutes'],
				$meta['latitude_DMS']['seconds'],
				$meta['latitude_DMS']['direction']
			);
			
			// Repeat for longitude
			
			$meta['longitude_DMS'] = array( 
				'degrees' => fumseck_frac_string_to_dec($exif['GPSLongitude'][0]),
				'minutes' => fumseck_frac_string_to_dec($exif['GPSLongitude'][1]),
				'seconds' => fumseck_frac_string_to_dec($exif['GPSLongitude'][2]),
				'direction' => $exif['GPSLongitudeRef']
			);
			
			$tmp_minutes = $meta['longitude_DMS']['minutes'];
			$meta['longitude_DMS']['minutes'] = intval($tmp_minutes);
			$meta['longitude_DMS']['seconds'] = intval( $meta['longitude_DMS']['seconds'] + ( floatval($tmp_minutes) - intval($tmp_minutes)) * 60);
			
			$meta['longitude_DegDec'] = fumseck_geocoord_DMS_to_DegDec( 
				$meta['longitude_DMS']['degrees'],
				$meta['longitude_DMS']['minutes'],
				$meta['longitude_DMS']['seconds'],
				$meta['longitude_DMS']['direction']
			);
		}
	return $meta;
}

add_filter('wp_read_image_metadata', 'fumseck_extract_exif_geocoord', '', 2);

// Displays linked geo coordinates if they exist ///////////////////////////////

function fumseck_display_exif_geocoord($featured_image_exif) {
	
	$exif_latitude = $featured_image_exif['image_meta']['latitude_DegDec'];
	$exif_longitude = $featured_image_exif['image_meta']['longitude_DegDec'];
	
	if ( $exif_latitude && $exif_longitude ) {
		
		$output = sprintf(
				'%d° %d′ %d″ %s, %d° %d′ %d″ %s', 
				$featured_image_exif['image_meta']['latitude_DMS']['degrees'],
				$featured_image_exif['image_meta']['latitude_DMS']['minutes'],
				$featured_image_exif['image_meta']['latitude_DMS']['seconds'],
				$featured_image_exif['image_meta']['latitude_DMS']['direction'],
				$featured_image_exif['image_meta']['longitude_DMS']['degrees'],
				$featured_image_exif['image_meta']['longitude_DMS']['minutes'],
				$featured_image_exif['image_meta']['longitude_DMS']['seconds'],
				$featured_image_exif['image_meta']['longitude_DMS']['direction']
				);
		
		$output = '(<a '
				. 'href="http://www.openstreetmap.org/?mlat=' . $exif_latitude . '&mlon=' . $exif_longitude . '" '
				. 'title="' . __('View this location on OpenStreetMap (opens in another window)', 'fumseck') . '" '
				. 'target="_blank"'
				. '>' . $output . '</a>)';
		
		echo $output;
	}
}

// Temporary workaround so the site name displays correctly ////////////////////

function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'fumseck' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

// Brand the site title in the header //////////////////////////////////////////

function fumseck_brand_site_title() {
	$title = strtolower ( get_bloginfo('name') );
	list($firstname, $lastname ) = explode( ' ', $title );
	$output = '<span class="brand1">' . $firstname . '</span>'
			. '<span class="brand2">' . $lastname . '</span>';
	echo $output;
}


?>