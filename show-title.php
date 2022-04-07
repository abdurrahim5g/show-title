<?php

/**
 * Plugin Name: Show Title & Description
 * Description: Very simple and lite plugin for showing gallery image Title & Description
 * Author: Abdur Rahim
 * Author URI: https://www.upwork.com/freelancers/~01d1b7d030e6a312df
 * Version: 1.0.0
 */

 function plugin_style_script(){
    //  scripts
    wp_enqueue_script("jquery");
    wp_enqueue_script("get-id", plugins_url( 'js/get-id.js', __FILE__ ), array("jquery"));

    // styles
    wp_enqueue_style("basic-style", plugins_url( 'css/basic.css', __FILE__ ));
 }
 add_action("wp_enqueue_scripts", "plugin_style_script");

 
if (isset($_POST['imagesID'])) {
	
	$imagesID = $_POST['imagesID'];
	$imagesClass = $_POST['imagesClass'];

    global $wpdb;
    $prefix = $wpdb->prefix;
    $table = $prefix. "posts";

    for($i = 0; $i < count($imagesID); $i++){ 
        $results = $wpdb->get_results( "SELECT * FROM $table WHERE ID = $imagesID[$i]" ); ?>        
        <script>
            document.querySelector("<?php echo  '.'.$imagesClass[$i]; ?>").parentElement.innerHTML += "<?php foreach($results as $result){echo '<h3>'. $result->post_title.'</h3><p>'.$result->post_content.'</p>';} ?>";
        </script>
<?php }
    die();
}
