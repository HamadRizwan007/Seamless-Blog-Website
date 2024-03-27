<?php
    include('header.php');

    if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];

        $catObj = get_category_by_slug($cat); 
        $cat_head = $catObj->name;
    } else {
        $cat_head = 'Categories';
    }
    // $cat_head = 'Categories';
    
?>

<div class="container px-3">
    <div class="row d-block">
        <h1 class="heading margin_top_heading">
            <span class="underline_head"><?php echo $cat_head ?></span>
        </h1>
    </div>

    <?php
                if ($cat_head != 'Categories') {

                    ?>

    <div class="row text_after_head margin_text_aft_h1">

        <?php
                }
                else
                {
            ?>
        <div class="row text_after_head">

            <?php
                }
            ?>
            Send in your best articles to boost your website's visibility, reputation, and traffic.
        </div>

        <div class="row marg_after_recent_art">

            <?php
if ($cat_head != 'Categories') {

    
    $args = array(
        'numberposts' => -1,
        'category_name' => $cat,
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ){
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            
?>

            <div class="col-md-6">
                <span class="text_after_recent_arth2"><?php echo get_the_category()[0]->name ?></span>
                <div class="h3_recent_art"><?php echo get_the_title() ?></div>
                <div class="text_afterh3_recent_arth2"><?php echo strip_sentences(get_the_content()) ?></div>
                <p class="text_afterh3_recent_arth2 h3_recent_art_mrgn_btm"><a
                        href="<?php echo $url;?>single_page.php?slug=<?php echo get_post_field( 'post_name', get_post() ) ?>"
                        class="link">Read Full
                        Article</a></p>

            </div>
            <?php
                    }
                }
            }
            
            else{

            ?>
            <div class="container">
                <div class="row mt_capsule">
                    <?php
                                $categories = get_categories();
                                foreach($categories as $category) {
                                    if($category->name != 'Uncategorized')
                                        echo '<a href="'.$url.'category.php?cat='. $category->slug . '" class="rounded_capsule">'. $category->name . '</a>';

                                }
                            
                                ?>

                </div>
            </div>

            <?php
            }
            ?>


            <?php
                // if ($cat_head != 'Categories') {
                if (false) {

            ?>
            <!-- Pagination -->
            <div class="col-md-12 pagination_div">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link pagination_box" href="#" aria-label="Previous">
                                <span aria-hidden="true">
                                    <</span> <span class="sr-only">Previous
                                </span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link pagination_box_active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link pagination_box" href="#">2</a></li>
                        <li class="page-item"><a class="page-link pagination_box" href="#">3</a></li>
                        <li class="page-item ">
                            <a class="page-link pagination_box" href="#" aria-label="Next">
                                <span aria-hidden="true">></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php
                }
            ?>

        </div>
    </div>
    </div>


    <?php
        include("footer.php");

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