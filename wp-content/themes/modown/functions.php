<?php 
// Theme by mobantu.com
if ( !defined( 'THEME_DIR' ) ) {
	define( 'THEME_DIR', get_template_directory() );
}
if ( !defined( 'STYLESHEET_DIR' ) ) {
	define( 'STYLESHEET_DIR', get_stylesheet_directory() );
}
if ( !defined( 'THEME_URI' ) ) {
	define( 'THEME_URI', get_template_directory_uri() );
}
if ( !defined( 'STYLESHEET_URI' ) ) {
	define( 'STYLESHEET_URI', get_stylesheet_directory_uri() );
}
define( 'THEME_VER', '7.2' );

require_once THEME_DIR . '/inc/mobantu.php';
require_once THEME_DIR . '/inc/widgets.php';
if(file_exists(STYLESHEET_DIR.'/inc/shortcodes.php')){
	require_once STYLESHEET_DIR . '/inc/shortcodes.php';
}else{
	require_once THEME_DIR . '/inc/shortcodes.php';
}
require_once THEME_DIR . '/inc/metabox.php';
require_once THEME_DIR . '/inc/auth/qq.php';
require_once THEME_DIR . '/inc/auth/weibo.php';
require_once THEME_DIR . '/inc/auth/weixin.php';
require_once THEME_DIR . '/inc/auth/sms.php';
require_once THEME_DIR . '/inc/plugin-activation.php';
require_once THEME_DIR . '/inc/post-type.php';
require_once THEME_DIR . '/inc/ticket.php';
if(file_exists(STYLESHEET_DIR.'/erphpdown/mobantu.php')){
	require_once STYLESHEET_DIR . '/erphpdown/mobantu.php';
}else{
	require_once THEME_DIR . '/erphpdown/mobantu.php';
}

global $post_target;
$post_target = _MBT('post_target')?'_blank':'';

require_once THEME_DIR . '/functions-custom.php';
//你的自定义代码请添加到functions-custom.php里