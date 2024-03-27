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
$currentPage = basename(trim($currentPage)); //get only page name not path like contact_us.php
// $url .= "/forth_project/";
// echo ($url);
require_once 'wordpress/wp-load.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@200;300;400;500;600;700&family=League+Spartan:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <!-- For Home -->
    <?php
if($currentPage == "index.php")
    {

?>

    <link rel='canonical' href='https://appsrating.info/' />


    <!-- Primary Meta Tags -->
    <title>Home - BlogWeb</title>
    <meta name="title" content="BlogWeb">
    <meta name="description" content="Blogger Site">
    <meta name="keywords" content="apk download, apk downloader, android apk download">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://appsrating.info/">
    <meta property="og:title" content="BlogWeb">
    <meta property="og:description" content="Blogger Site">
    <meta property="og:image" content="https://appsrating.info/img/logo.png">
    <meta property="og:keywords" content="apk download, apk downloader, android apk download">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://appsrating.info/">
    <meta property="twitter:title" content="BlogWeb">
    <meta property="twitter:description" content="Blogger Site">
    <meta property="twitter:image" content="https://appsrating.info/img/logo.png">
    <meta property="twitter:keywords" content="apk download, apk downloader, android apk download">
    <?php

}

?>


    <!-- For Category -->
    <?php
if($currentPage == "category.php")
    {

?>
    <title>Categories - BlogWeb</title>

    <?php

}

?>

    <!-- For Single Page -->
    <?php
if($currentPage == "single_page.php")
    {

?>
    <title>Read Blog - BlogWeb</title>

    <?php

}

?>

    <!-- For Home -->
    <?php
if($currentPage == "payment.php")
    {

?>
    <title>Payment Form - BlogWeb</title>

    <?php

}

?>

    <!-- For Home -->
    <?php
if($currentPage == "submission.php")
    {

?>
    <title>Submit your article - BlogWeb</title>
    
    <?php

}

?>

    <!-- For Home -->
    <?php
if($currentPage == "contact_us.php")
    {

?>
    <title>Contact Us - BlogWeb</title>

    <?php

}

?>

    <!-- For Home -->
    <?php
if($currentPage == "thank.php")
    {

?>
    <title>Thankyou - BlogWeb</title>

    <?php

}

?>

</head>

<!-- For Home -->
<?php
if($currentPage == "index.php")
    {
?>

<!-- <body class="bg_home"> -->

<body>
    <div class="container-fluid grey_bg">

        <?php

}

else{
?>

        <body>

                <?php
   

}

?>


                <!-- Navbar -->
                <div class="container">

                    <div class="row margin_top_nav">

                        <div class="col-md-6 text_align_center">
                            <span class="head color color_yellow_blog">Blog</span>
                            <span class="head color_black_web">-web</span>
                        </div>

                        <div class="col-md-6 d-flex text-center">
                            <div class="row width_available">
                                <div class="col-md-2"><a href="<?php echo $url;?>" class="sub_head"> Home</a></div>
                                <div class="col-md-3"><a href="<?php echo $url;?>category.php" class="sub_head">
                                        Categories</a></div>
                                <div class="col-md-4"><a href="<?php echo $url;?>submission.php" class="sub_head"> Submit
                                        Articles</a></div>
                                <div class="col-md-3"><a href="<?php echo $url;?>contact_us.php" class="sub_head"> Contact
                                        Us</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- nav end -->