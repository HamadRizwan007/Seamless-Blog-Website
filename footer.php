<?php

$url = "https://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   
// $parse = parse_url($url);
$url =  trim($url); //https://appsrating.info
// echo ($url);
// $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actual_link;
$currentPage= $_SERVER['SCRIPT_NAME']; //get path like /forth_project/contact_us.php
// echo $currentPage;
// echo $url;
// $currentPage = basename(trim($currentPage)); //get only page name not path like contact_us.php
$url .= "/forth_project/";
// echo ($url);

?>
<!-- Footer -->
<div class="container-fluid px-0">
        <hr class="hr_margin_first">

    </div>

    <div class="container footer_text">
        <div class="row">
            <div class="col-md-4 col_margin_top">
                <span class="head color color_yellow_blog">Blog</span>
                <span class="head color_black_web">-web</span>
                <p class="text_after_head_foot">Lorem ipsum dolor sit amet, consectetur<br> adipiscing elit,
                </p>
            </div>

            <div class="col-md-2 col_margin_right_ft_link col_margin_top">
                <p class="sub_head_foot margin_bottom_foot_subhead">Roadmap</p>
                <p class="my-0"><a href="<?php echo $url;?>index.php" class="footer_links">Home</a></p>
                <p class="my-0"><a href="<?php echo $url;?>category.php" class="footer_links">Categories</a></p>
                <p class="my-0"><a href="<?php echo $url;?>submission.php" class="footer_links">Submit Article</a></p>
                <p class="my-0"><a href="<?php echo $url;?>contact_us.php" class="footer_links">Contact Us</a></p>
            </div>


            <div class="col-md-3 col_margin_right_ft_link follow_us_div col_margin_top">
                <p class="sub_head_foot margin_bottom_foot_subhead">Trending Categories</p>
                <?php
                $args = array(
                    'show_count' => 0,
                );
                    $categories = get_categories($args);
                foreach (array_slice($categories, 0, 4) as $category) {
                    if($category->name != 'Uncategorized')
                        echo '<p class="my-0"><a href="' . $url . 'category.php?cat=' . $category->slug . '" class="footer_links">' . $category->name . '</a></p>';
                }
                ?>
            </div>

            <div class="col-md-3 col_margin_right_ft_link follow_us_div col_margin_top">
                <p class="sub_head_foot margin_bottom_foot_subhead">Follow Us</p>
                <p class="my-0"><a href="" class="footer_links"><u>Twitter</u></a></p>
                <p class="my-0"><a href="" class="footer_links"><u>Instagram</u></a></p>
                <p class="my-0"><a href="" class="footer_links"><u>Facebook</u></a></p>
                <p class="my-0"><a href="" class="footer_links"><u>LinkedIn</u></a></p>
            </div>

            <!-- </div> -->
        </div>
    </div>
    <div class="container-fluid px-0">
        <hr class="hr_margin_sec">

    </div>

    <div class="container">

        <div class="row">
            <span class="col text_end">
                Copyright © 2020-2022 Company
            </span>

            <span class="col text_end text-right">
                All Rights Reserved.
            </span>
        </div>
    </div>