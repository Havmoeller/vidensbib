<?php

/**
 * Shortcodes
 *
 * Setup theme shortcodes
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

/**
 * Initialise Foundation, for WordPress Shortcodes
 */

// Allow shortcodes in widgets

add_filter('widget_text', 'do_shortcode');

/**
 * Grid
 */

// Rows [row][/row]

function foundation_shortcode_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'row', 'foundation_shortcode_row' );

// Columns [column][/column]

function foundation_shortcode_column( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'center' => '',
		'span' => '',
		), $atts ) );

	// Set the 'center' variable
	if ($center == 'true') {
	$center = 'centered';
	}

	return '<div class="' . esc_attr($span) . ' columns ' . esc_attr($center) .'">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'column', 'foundation_shortcode_column' );

/**
 * UI
 */

// Buttons [button][/button]

function foundation_shortcode_button( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'link' => '#',
		'size' => 'medium',
		'type' => '',
		'style' => '',
		'reveal' => ''
		), $atts ) );

		if (!$reveal == null) {
			$reveal_data = 'data-reveal-id=' . $reveal . ' ';
		}

	return '<a ' . $reveal_data . ' href="' . esc_attr($link) . '" class="' . esc_attr($size) . ' ' . esc_attr($style) . ' ' . esc_attr($type) . ' button">' . $content . '</a>';
}

add_shortcode( 'button', 'foundation_shortcode_button' );

// Alerts [alert][/alert]

function foundation_shortcode_alert( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'type' => ''
		), $atts ) );

	return '<div data-alert class="alert-box ' . esc_attr($type) . '">' . do_shortcode($content) . ' <a href="" class="close">&times;</a> </div>';
}

add_shortcode( 'alert', 'foundation_shortcode_alert' );

// Panels [panel][/panel]

function foundation_shortcode_panel( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'type' => '',
		'style' => ''
		), $atts ) );

	return '<div class="panel ' . esc_attr($type) . ' ' . esc_attr($style) . '">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'panel', 'foundation_shortcode_panel' );

/**
 * Elements
 */

// Detection (Show) [show][/show]

function foundation_shortcode_show( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'for' => ''
		), $atts ) );

	return '<div class="show-for-' . esc_attr($for) . '">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'show', 'foundation_shortcode_show' );

// Detection (Hide) [hide][/hide]

function foundation_shortcode_hide( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'for' => ''
		), $atts ) );

	return '<div class="hide-for-' . esc_attr($for) . '">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'hide', 'foundation_shortcode_hide' );

/**
 * Extras
 */

// Reveal [reveal][/reveal]

function foundation_shortcode_reveal( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'name' => '',
		'style' => ''
		), $atts ) );

	return '<div id="' . esc_attr($name) . '" class="reveal-modal ' . esc_attr($style) . '">' . do_shortcode($content) . '</div>';

}

add_shortcode( 'reveal', 'foundation_shortcode_reveal' );

// Sections [sections type="tabs"] [section title="Section Title"]Content[/section] [/sections]

function foundation_shortcode_sections( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'type' => ''
		), $atts ) );

	return '<div class="section-container '. esc_attr($type) . '" data-section="'. esc_attr($type) . '">' . do_shortcode($content) . '</div>';

}

add_shortcode( 'sections', 'foundation_shortcode_sections' );

// Section [section title="Section Title"]Content[/section]

function foundation_shortcode_section( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'title' => ''
		), $atts ) );

	return '<section><p class="title" data-section-title><a href="#">Section 1</a></p><div class="content" data-section-content>' . do_shortcode($content) . '</div></section>';

}

add_shortcode( 'section', 'foundation_shortcode_section' );

// Shortcode for stripping the native gallery

add_shortcode('gallery', 'my_gallery_shortcode');    
function my_gallery_shortcode($attr) {
    $post = get_post();

static $instance = 0;
$instance++;

if ( ! empty( $attr['ids'] ) ) {
    // 'ids' is explicitly ordered, unless you specify otherwise.
    if ( empty( $attr['orderby'] ) )
        $attr['orderby'] = 'post__in';
    $attr['include'] = $attr['ids'];
}

// Allow plugins/themes to override the default gallery template.
$output = apply_filters('post_gallery', '', $attr);
if ( $output != '' )
    return $output;

// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( !$attr['orderby'] )
        unset( $attr['orderby'] );
}

extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => 'li',
    'captiontag' => 'p',
    'size'       => 'full-size',
    'include'    => '',
    'exclude'    => ''
), $attr));

$id = intval($id);
if ( 'RAND' == $order )
    $orderby = 'none';

if ( !empty($include) ) {
    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
        $attachments[$val->ID] = $_attachments[$key];
    }
} elseif ( !empty($exclude) ) {
    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
} else {
    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
}

if ( empty($attachments) )
    return '';

if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment )
        $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    return $output;
}

$itemtag = tag_escape($itemtag);
$captiontag = tag_escape($captiontag);
$icontag = tag_escape($icontag);
$valid_tags = wp_kses_allowed_html( 'post' );
if ( ! isset( $valid_tags[ $itemtag ] ) )
    $itemtag = 'dl';
if ( ! isset( $valid_tags[ $captiontag ] ) )
    $captiontag = 'dd';
if ( ! isset( $valid_tags[ $icontag ] ) )
    $icontag = 'dt';

$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
$float = is_rtl() ? 'right' : 'left';

$selector = "gallery-{$instance}";

$gallery_style = $gallery_div = '';
if ( apply_filters( 'use_default_gallery_style', true ) )
    $gallery_style = "
    <style type='text/css'>

    </style>
    <!-- see gallery_shortcode() in wp-includes/media.php -->"; 
$size_class = sanitize_html_class( $size );
$gallery_div = "<ul id='$selector' class='gallery galleryid-{$id} small-block-grid-2 medium-block-grid-4 large-block-grid-4' data-clearing>";
$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

$i = 0;
foreach ( $attachments as $id => $attachment ) {
    $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

    $output .= "<{$itemtag}>";
    $output .= "$link";
    /*if ( $captiontag && trim($attachment->post_excerpt) ) {
        $output .= "
            <{$captiontag} class='wp-caption-text gallery-caption'>
            " . wptexturize($attachment->post_excerpt) . "
            </{$captiontag}>";
    }*/
    $output .= "</{$itemtag}>";
}

$output .= "
    </ul>\n";

return $output;
}

// YOUTUBE EMBED SHORTCODE

// Creates start tag for youtube embed 
function youtube_start() {
	return '<iframe width="560" height="315" src="//';
}
add_shortcode('youtube_start', 'youtube_start');

//  Creates end tag for youtube embed
function youtube_end() {
	return '" frameborder="0" allowfullscreen></iframe>';
}
add_shortcode('youtube_end', 'youtube_end');

?>