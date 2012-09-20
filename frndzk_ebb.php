<?php   
    /* 
    Plugin Name: Frndzk Expandable Bottom Bar
    Plugin URI: http://www.bitto.us
    Description: Frndzk Expandable Bottom Bar plugin adds a dashing sticky expandable botttom bar in your website. you can set the bottom bar contents from widgets area. The bar expands when you moves your mouse on it. Plugin <a href="http://bitto.us/wp/">Demo</a>. plugin developed by <a href="http://bitto.us">Bitto Kazi</a>
    Author: Bitto Kazi
    Version: 1.0 
    Author URI: http://www.bitto.us
    */
function febb_bottom_bk() {
echo '
<div id="stickybar" class="expstickybar">

<a href="#togglebar"><img src="'; echo plugin_dir_url(__FILE__);
echo'open.gif" data-closeimage="'; echo plugin_dir_url(__FILE__);
echo'close.gif" data-openimage="'; echo plugin_dir_url(__FILE__);
echo'open.gif" style="border-width:0; float:right;" /></a>
<div style="text-align:center;padding-top:3px">';

global $wpdb;
$fzkebba = $wpdb->get_results("SELECT option_value FROM $wpdb->options
WHERE option_name = 'frndzk_bottom_bar_text'");
foreach ( $fzkebba as $fzkebbas ) 
{
echo''.$fzkebbas->option_value.'';
}

echo'</div>';


echo'<div style="float:left"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
echo'</div>';

echo'<div style="float:left"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
echo'</div>';

echo'<div style="float:left">';
dynamic_sidebar('frndzk-bottom-bar-left');
echo'</div>';

echo'<div style="float:left"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
echo'</div>';

echo'<div style="float:left"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
echo'</div>';

echo'<div style="float:left">';
dynamic_sidebar('frndzk-bottom-bar-center');
echo'</div>';

echo'<div style="float:left"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
echo'</div>';

echo'<div style="float:left"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
echo'</div>';

echo'<div style="float:left">';
dynamic_sidebar('frndzk-bottom-bar-center-2');
echo'</div>';



echo'<div style="float:right"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
echo'</div>';

echo'<div style="float:right"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
echo'</div>';

echo'<div style="float:right">';
dynamic_sidebar('frndzk-bottom-bar-right');
echo'</div>';


echo'</div>
'; 
}
add_action('wp_footer', 'febb_bottom_bk');








global $wpdb;
$fzkebbaj = $wpdb->get_results("SELECT option_value FROM $wpdb->options
WHERE option_name = 'frndzk_bottom_bar_jquery'");

if ($fzkebbaj) {
foreach ( $fzkebbaj as $fzkebbajs ) 
{
if ( $fzkebbajs->option_value == "yes" ) {

function frndzk_expan_bar_js() {

wp_deregister_script( 'jquery' );
wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
wp_enqueue_script( 'jquery' );


}
add_action('wp_enqueue_scripts', 'frndzk_expan_bar_js');
}
}
}

else {

function frndzk_expan_bar_js() {

wp_deregister_script( 'jquery' );
wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
wp_enqueue_script( 'jquery' );


}
add_action('wp_enqueue_scripts', 'frndzk_expan_bar_js');
}










function frndzk_expan_bar_jsi() {

wp_enqueue_script(
      'custom-script-frndzk-ebb',plugin_dir_url(__FILE__).'bitto.js',
      array('jquery')
   );
wp_register_style( 'frndzk-ebb',plugin_dir_url(__FILE__).'bitto1.css', 
    array(), 
    '20120208', 
    'all' );
wp_enqueue_style( 'frndzk-ebb' );

}
add_action('wp_enqueue_scripts', 'frndzk_expan_bar_jsi');










function fzk_esc() {

register_sidebar(array('name' => 'Frndzk Bottom Bar Left', 'ID' => 'frndzk-bottom-bar-left', 'before_widget' => '<div>',     'after_widget' => '</div></div>',  'before_title' => '<h2>','after_title' => '</h2><div>'));

register_sidebar(array('name' => 'Frndzk Bottom Bar Center', 'ID' => 'frndzk-bottom-bar-center', 'before_widget' => '<div>',     'after_widget' => '</div></div>',  'before_title' => '<h2>','after_title' => '</h2><div>',     ));

register_sidebar(array('name' => 'Frndzk Bottom Bar Center 2', 'ID' => 'frndzk-bottom-bar-center-2', 'before_widget' => '<div>',     'after_widget' => '</div></div>',  'before_title' => '<h2>','after_title' => '</h2><div>'));


register_sidebar(array('name' => 'Frndzk Bottom Bar Right', 'ID' => 'frndzk-bottom-bar-right', 'before_widget' => '<div>',     'after_widget' => '</div></div>',  'before_title' => '<h2>','after_title' => '</h2><div>'));
}

add_action('init','fzk_esc');


function frndzk_bottombar_activate() {

global $wpdb;
$fzkebb = $wpdb->get_results("SELECT * FROM $wpdb->options
WHERE option_name = 'frndzk_bottom_bar_text'");

if (!$fzkebb) {
global $wpdb;
mysql_query("INSERT INTO $wpdb->options VALUES ('','frndzk_bottom_bar_text','Frndzk Expandable Bottom Bar Developed by Bitto Kazi | Copyright &copy; 2012 <a href=\"http://bitto.us\" target=\"_blank\">Bitto Kazi</a>','no')");
mysql_query("INSERT INTO $wpdb->options VALUES ('','frndzk_bottom_bar_jquery','yes','no')");
}

else
{
}

}
register_activation_hook(__FILE__,'frndzk_bottombar_activate');




function frndzkebb_admin() {

echo'
<h1>Frndzk Bottom Bar Settings</h1>';

bitto();

echo'<br><form action="options-general.php?page=Frndzk-Expandable-Bottom-Bar&action=text" method="post"
enctype="multipart/form-data">
<input type="hidden" name="id" value="frndzk_bottom_bar_text">
<label for="file">Enter Bottom bar Text:</label><br>
<textarea name="text" rows="5" cols="30">';

global $wpdb;
$fzkebba = $wpdb->get_results("SELECT option_value FROM $wpdb->options
WHERE option_name = 'frndzk_bottom_bar_text'");
foreach ( $fzkebba as $fzkebbas ) 
{
echo''.$fzkebbas->option_value.'';
}

echo'</textarea><br>
<br>
<input type="submit" name="submit" value="Submit" /></form><br>

To set the expandable bottom bar contents go to <a href="widgets.php">Widgets area</a>

<br><br>

<b>Important: If the bottom bar is showing then everything is ok and dont touch the settings below. else if the bottom bar is not working then turn jquery loading to NO.</b><br><br>
Currently jQuery loading is set to ';

global $wpdb;
$jq = $wpdb->get_results("SELECT option_value FROM $wpdb->options
WHERE option_name = 'frndzk_bottom_bar_jquery'");
foreach ( $jq as $jqs ) 
{
echo '<b>'.$jqs->option_value.'</b>';
}

echo'<br>
Load jquery? &nbsp;  <a href="options-general.php?page=Frndzk-Expandable-Bottom-Bar&action=jqueryyes">Yes</a> &nbsp; &nbsp; 

<a href="options-general.php?page=Frndzk-Expandable-Bottom-Bar&action=jqueryno">No</a>
';



echo '<br><br><br>
This plugin is developed by <a href="http://bitto.us" target="_blank">bitto kazi</a>'; 
}
function frndzkebb_admin_actions() {  
    add_options_page("Frndzk Expandable Bottom Bar", "Frndzk Expandable Bottom Bar", "manage_options","Frndzk-Expandable-Bottom-Bar","frndzkebb_admin");  
}
add_action('admin_menu', 'frndzkebb_admin_actions');

function bitto() {
global $wpdb;
if (isset($_GET['action'])){
if ( $_GET['action'] == "text" ) {
global $wpdb;
$text = stripslashes($_REQUEST['text']);

$text = mysql_real_escape_string($text);
mysql_query("UPDATE $wpdb->options SET option_value = '$text' WHERE option_name = '$_REQUEST[id]'");
echo'Successfully updated bottom bar text';
}


elseif ( $_GET['action'] == "jqueryyes" ) {
global $wpdb;
mysql_query("UPDATE $wpdb->options SET option_value = 'yes' WHERE option_name = 'frndzk_bottom_bar_jquery'");
echo'Successfully updated jquery loading to <big>YES</big>';
}


elseif ( $_GET['action'] == "jqueryno" ) {
global $wpdb;
mysql_query("UPDATE $wpdb->options SET option_value = 'no' WHERE option_name = 'frndzk_bottom_bar_jquery'");
echo'Successfully updated jquery loading to <big>NO</big>';
}


}

}


?>