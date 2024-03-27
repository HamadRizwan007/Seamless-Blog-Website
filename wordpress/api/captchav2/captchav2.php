<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <form action="" method="post">
        <div class="input-group">
            <input type="text" name="name" value="" placeholder="Your name" required="" />
        </div>
        <div class="input-group">	
            <input type="email" name="email" value="" placeholder="Your email" required="" />
        </div>
        <div class="input-group">
            <textarea name="message" placeholder="Type message..." required="" ></textarea>
        </div>
            
        <!-- Google reCAPTCHA box -->
        <div class="g-recaptcha" data-sitekey="6LcMiMQjAAAAAFCqlS1gG1rXD7RSqdePC9oYeus3"></div>
        
        <!-- Submit button -->
        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>



<script>
    $(document).ready(function () {
        $("form").on("submit", function (e) {
            e.preventDefault();

            // location.href = "<?php echo $url?>thank.php";
            let myform = document.getElementById("submission_form");
            let fd = new FormData(myform);

            $.ajax({
                    type: "POST",
                    url: "captcha_response.php",
                    data: fd,
                    processData: false,
                    contentType: false,
                    cache: false,
                })
                .done(function (data) {
                    if (console && console.log) {

                        // var res = $.parseJSON(data);
                        console.log(data);


                    }
                });

        });
    });

    </script>
</html>