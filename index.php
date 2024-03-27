<?php
    include('header.php');
?>


    <div class="row">
        <div class="col-md-12 d-block">
            <h1 class="heading margin_top_heading">
                Send in your <span class="color_yellow_head">top-notch<br></span> articles to gain greater <br><span
                    class="underline_head">recognition</span> and <span class="underline_head">credibility</span>.
            </h1>
        </div>

        <div class="col-md-12 text_after_head">
            Send in your best articles to boost your website's visibility, reputation, and traffic.
        </div>

        <div class="col-md-12 d-block">
            <h2 class="h2_cat">Categories</h2>
        </div>

    </div>
    <div class="container">
        <div class="row mt_capsule">
            <?php
                $categories = get_categories();
                foreach($categories as $category) {
                //    echo '<div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
                    if($category->name != 'Uncategorized')
                        echo '<a href="'.$url.'category.php?cat='. $category->slug . '" class="rounded_capsule">'. $category->name . '</a>';
                }
            
                ?>
                
        </div>
    </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-lg-12 mx-0">
            <h2 class="h2_recent">Recent Articles</h2>
        </div>
        <?php
            $args = array(
                'posts_per_page'   => 8,
                'post_type'        => 'post',
                'order'          => 'DESC',
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ){
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    if(get_the_category()[0]->name != 'Uncategorized'){

        ?>

        <div class="col-md-6">
            <span class="text_after_recent_arth2"><?php echo get_the_category()[0]->name ?></span>
            <div class="h3_recent_art"><?php echo get_the_title() ?></div>
            <div class="text_afterh3_recent_arth2"><?php echo strip_sentences(get_the_content()) ?></div>
            <p class="text_afterh3_recent_arth2 h3_recent_art_mrgn_btm"><a href="<?php echo $url;?>single_page.php?slug=<?php echo get_post_field( 'post_name', get_post() ) ?>"
                    class="link">Read Full
                    Article</a></p>
        </div>

        <?php
}
}

}
?>

    </div>


</div>


</div>

<?php
        include("footer.php");
    
        // Function to strip sentences
        function strip_sentences($content)
        {
            $nakedBody = $content;
            $sentences = preg_split('/(\.|\?|\!)(\s)/',$content);
            $sentencesToDisplay = 3; //300 words
        
            if (count($sentences) <= $sentencesToDisplay)
                // $sen = $nakedBody;
                return $nakedBody;
        
            $stopAt = 0;
            foreach ($sentences as $i => $sentence) {
                $stopAt += strlen($sentence);
        
                if ($i >= $sentencesToDisplay - 1)
                    break;
            }
        
            $stopAt += ($sentencesToDisplay * 2);
            
            $sen = trim(substr($nakedBody, 0, $stopAt));
        
        
            return $sen;
            // echo $sen;
        }
    ?>

</body>

</html>