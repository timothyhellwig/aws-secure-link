 <?php
/*
Plugin Name: AWS Secure Link
Description: Creates secure download links to private files on Amazon AWS. Use via shortcode: [aws_link file="INSERT-FILE-NAME-HERE"]
Version: 1.0
Author: Timothy Hellwig
Author URI: http://timothyhellwig.com
*/

add_action('wp_enqueue_scripts','awssl_load_js');

add_shortcode('aws_link', 'awssl_create_link');

function awssl_load_js() {
    wp_enqueue_script( 'awssl-get-url', plugins_url( '/get-url.js', __FILE__ ));
}

function s3sl_create_link($atts, $content = null){
    extract(shortcode_atts(array(
        "file" => ''
    ), $atts, 'aws_link'));
    return '<a href="#" class="aws-link" name="'.$file.'">'.$file.'</a>';
}
?>
