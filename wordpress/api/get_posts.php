<?php

require_once '../wp-load.php';

// $posts = $wpdb->get_results("SELECT * FROM wp_posts where post_status = 'publish' ");
// echo 'hello';
// $categories = get_categories();
// foreach($categories as $category) {
//    echo '<div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
// }

// foreach ($posts as $data) {
//     echo $data->post_title.'<br>';
// }

// foreach ($posts as $data) {
//     echo $data->post_content.'<br>';
// }

$args = array(
    'posts_per_page'   => 1,
    'post_type'        => 'post',
    'order'          => 'DESC',
);

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ){
while ( $the_query->have_posts() ) {
    $the_query->the_post();

    //title
    echo "Title: ". get_the_title().'<br>';
    //desp
    echo "Desp: ".get_the_content().'<br>';
    // id
    echo "Id: ".the_ID().'<br>';
    //category
    echo "Category: ".get_the_category()[0]->name.'<br>';
    
    // image
    if(has_post_thumbnail()){
        the_post_thumbnail();
    echo '<br>';
   }
}
}


// For single Page
$found_post = null;

if ( $posts = get_posts( array( 
    'name' => 'some-dangers-from-pandemic-fatigue', 
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 1
) ) ) $found_post = $posts[0];

// Now, we can do something with $found_post
if ( ! is_null( $found_post ) ){
    print_r($found_post);

    echo $found_post->post_date.'<br>';
    echo $found_post->post_title.'<br>';
    echo $found_post->post_content.'<br>';
    echo get_the_category($found_post)[0]->name;
    if(has_post_thumbnail($found_post->ID)){

        echo ('hello');
         $image = wp_get_attachment_image_src( get_post_thumbnail_id( $found_post->ID ), 'single-post-thumbnail' );
           ?> <div id="custom-bg" style="background-image: url('<?php echo $image[0]; ?>')">

            </div>
            <?php
    echo '<br>';
   }
}
