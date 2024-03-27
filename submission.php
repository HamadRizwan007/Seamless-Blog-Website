<?php
    include('header.php');

    error_reporting(0);
    if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    //Below is your secret key
    $secret = '6LfTPlUUAAAAANgJTPa67hlDAXu4ppK2FgSbSOO6';
    //get verify response data
    $captchaResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($captchaResponse );
    if ($responseData->success) {
            $check = 1;
    //Registration form submission code
    $name = !empty($_POST['name']) ? $_POST['name'] : "";
    $email = !empty($_POST['email']) ? $_POST['email'] : "";
    $password = !empty($_POST['pwd']) ? $_POST['pwd'] : "";

    $htmlContent = "
    <h1>Registration details</h1>
    <p><b>Name: </b>" . $name . "</p>
    <p><b>Email: </b>" . $email . "</p>
    <p><b>Message: </b>" . $password . "</p>
    ";
    } else {
        $check = 0;

    $errMsg = 'Captcha verification failed, please try again.';
    echo "<script>alert('" . $errMsg . "');</script>";
    }
    } else {
    $errMsg = 'Please click on the reCAPTCHA box.';
    echo "<script>alert('" . $errMsg . "');</script>";
    }
    } else {
    $errMsg = "";
    echo "<script>alert('Please fill data');</script>";
    }
?>

<div class="container">

    <div class="row px-3">
        <div class="col-md-6 m-auto">

            <center>
                <h1 class="head_submission margin_top_heading">Submit your Article</h1>

                <p class="text_after_head_submission">Submit your article and it’ll be published after approvel form
                    admin.</p>
            </center>

            <div class="row d_grid">
                <form id="submission_form" class="d_form">
                    <table>
                        <tr>
                            <td class="first_field_r_spacing">
                                <label class="form_label" for="fname">First
                                    name<span class="red_asterik">*</span></label><br>
                                <input required class="form_fields" type="text" id="fname" name="fname"
                                    placeholder="Enter your First Name">
                            </td>
                            <td class="first_field_l_spacing">
                                <label class="form_label" for="lname">Last name</label><br>
                                <input class="form_fields" type="text" id="lname" name="lname"
                                    placeholder="Enter your Last Name">
                            </td>
                        </tr>
                    </table>

                    <label class="form_label" for="email">Email<span class="red_asterik">*</span></label>
                    <input required class="form_fields" type="email" id="email" name="email"
                        placeholder="Enter your Email Address">

                    <label class="form_label" for="number">Phone Number<span class="red_asterik">*</span></label>
                    <input required class="form_fields" type="number" id="number" name="number"
                        placeholder="Enter your Phone No.">

                    <table>
                        <tr>
                            <div class="row">

                                <div class="col-md-8 first_field_r_spacing"><label class="form_label"
                                        for="instructions">Instructions<span class="form_label_optional">(optional)</span>
                                    </label><br>
                                    <textarea class="form_fields txtarea" type="text" id="instructions" name="instructions"
                                        placeholder="Enter any instructions(optional)"></textarea>
                                </div>
                                <div class="col-md-4 first_field_l_spacing">
                                    <label class="form_label">Attach Files</label><br>
                                    <!-- actual upload which is hidden -->
                                    <input type="file" id="actual-btn" hidden />

                                    <!-- our custom upload button -->
                                    <label for="actual-btn" class="width_available">
                                        <div class="col attach_field">
                                            <img class="upload_icon icon_black" src="images/backup_black.png"
                                                alt="upload icon">
                                            <img class="upload_icon icon_orange" src="images/backup_orange.png"
                                                alt="upload icon">
                                            <p class="sprtd_file_text">Supported File Types</p>
                                            <p class="formats_text"> PDF,DOCX,DOC,TXT</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                        </tr>
                    </table>
                    <center>
                        <div class="g-recaptcha" data-sitekey="6LfTPlUUAAAAAGSUt1_LqpJXQpatx7_BzTDcU9On"></div>
                        <button type="submit" class="proceed_btn">Proceed <span class="arrow_prcd_btn">
                                <img class="arrow_black" src="images/arrow_right_black.png" alt="proceed icon">
                                <img class="arrow_orange" src="images/arrow_right_white.png" alt="proceed icon"></span>
                        </button>
                    </center>
                </form>
            </div>
        </div>

    </div>
</div>

<?php
        include("footer.php");
    ?>

</body>

<script>
    $(document).ready(function () {
        $("#submission_form").on("submit", function (e) {
            e.preventDefault();

            // location.href = "<?php echo $url?>thank.php";
            let myform = document.getElementById("submission_form");
            let fd = new FormData(myform);

            $.ajax({
                    type: "POST",
                    url: "send_email.php",
                    data: fd,
                    processData: false,
                    contentType: false,
                    cache: false,
                })
                .done(function (data) {
                    if (console && console.log) {

                        // var res = $.parseJSON(data);
                        console.log(data);
                        console.log($check);


                    }
                });

        });
    });


    function getFile1() {
        // document.getElementById("myFile").click();
        console.log('File(s) name: ');
        var fullPath;
        fullPath = document.getElementById('myFile').value;


        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
        }

        console.log(fullPath);
    }




    const actualBtn = document.getElementById('actual-btn');

    const onfileChosen_hide = document.querySelector('.sprtd_file_text');
    const fileChosen = document.querySelector('.formats_text');

    actualBtn.addEventListener('change', function () {
        onfileChosen_hide.style.display = "none";
        fileChosen.textContent = this.files[0].name
    })
</script>


</html>