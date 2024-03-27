<?php
include('header.php');

$post_slug = $_GET['slug'];


// $post_slug = 'some-dangers-from-pandemic-fatigue';
    if ( $posts = get_posts( array( 
        'name' => $post_slug, 
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 1
    ) ) ) $found_post = $posts[0];
    
?>

    <div class="container">

        <div class="row">
        <div class="col">

            <h2 class="cat_h2_single margin_top_heading"><?php echo get_the_category($found_post)[0]->name?></h2>
        </div>
        </div>

        <div class="row margin_row_after_cat">
            <div class="col">
                <h2 class="single_date "><?php echo $found_post->post_date ?></h2>
                <!-- <h2 class="single_date ">11 November 2022 / 09:37</h2> -->

            </div>
            <div class="col d-contents">
                <button class="icon_btn link_btn"><img src="images/link.png" alt=""></button>
                <button class="icon_btn share_btn"><img src="images/share.png" alt=""></button>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <h1 class="h1_single"><?php echo $found_post->post_title ?></h1>
        </div>
        </div>  


        <div class="row">

            <!-- Column 1 -->
            <div class="col-md-8">
                <?php
            if(has_post_thumbnail($found_post->ID)){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $found_post->ID ), 'single-post-thumbnail' );
                ?>

                <img class="book_img" src="<?php echo $image[0]; ?>" alt="Book Img">
                <?php
            }
?>
                <p class="head_text_after_img_single">
                    Send in your best articles to boost your website's visibility, reputation, and traffic.
                </p>
                <div class="normal_text">
                    <?php echo ($found_post->post_content) ?>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p class="normal_text">
                            Beyond that, startup years are hard on a founder. The hours worked, the heart and soul
                            consumed, the
                            impossible decisions, the painful people calls. All buried deep down, in service of keeping
                            the
                            company alive.<br><br>
                            All of this accumulates and unless it’s being processed by some high power therapy (which,
                            let’s be
                            honest, for most of us, it isn’t), it’s just pile on and piles up, a toxic carbon compressed
                            under
                            the highest of pressures into a deadly diamond that is what shines when others look at us.s

                        </p>
                    </div>
                    <div class="col-md-6 m-auto"><img class="book_img" src="images/open_book.png" alt="Open Book Img">
                    </div>
                </div>

                <p class="normal_text">
                    But we know the truth. It’s dangerous if not handled correctly. Instead of the being the hardest
                    substance that gives us superhuman strength, it can be the brittle kryptonite that crumbles with the
                    wrong crack and leads to our downfall.
                </p>
            </div>

            <!-- Column 2 -->
            <div class="col-md-4">
                <div class="border_right_col">

                <?php
                        $term_ids = get_terms([
                            'fields' => 'ids',
                            'taxonomy' => 'category',
                            'name' => get_the_category($found_post)[0]->name,
                            'hide_empty' => false,
                        ]);
                        $args = array(
                            'numberposts'   => 3,
                            'category'      => $term_ids
                        );
                        $my_posts = get_posts( $args );
                            if (!empty($my_posts)) {
                ?>

                    <p class="h2_related">Related Articles</p>

                    
                    <?php
                                foreach ($my_posts as $p) {
                                    // if($found_post->ID != $p->ID)
                                    {
                    ?> 

                    <span class="text_after_recent_arth2"><?php echo get_the_category($p)[0]->name?></span>
                    <p class="h3_recent_art"><?php echo $p->post_title?></p>
                    <div class="text_afterh3_recent_arth2"><?php echo strip_sentences($p->post_content) ?></div>
                    <p class="text_afterh3_recent_arth2 h3_recent_art_mrgn_btm"><a href="<?php echo $url;?>single_page.php?slug=<?php echo get_post_field( 'post_name', $p->ID) ?>" class="link">Read Full
                            Article</a></p>
                    <?php
                                    }
                                }
                            }
                            ?>

                </div>
            </div>

        </div>
    </div>



    <?php
        include("footer.php");
    
        function strip_sentences($content)
        {
            $nakedBody = $content;
            $sentences = preg_split('/(\.|\?|\!)(\s)/',$content);
            $sentencesToDisplay = 2; //300 words
        
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