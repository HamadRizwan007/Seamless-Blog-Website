<?php
    include('header.php')
?>

    <div class="container">

        <div class="row px-3">
            <div class="col-md-6 m-auto">

                <center>
                    <h1 class="head_submission margin_top_heading">Get in touch with us..</h1>

                    <p class="text_after_head_submission">Send us a message and we’ll get back to you shortly..!</p>
                </center>

                <div class="row d_grid">
                    <form id="contact_form" class="d_form">
                        <table>
                            <tr>
                                <td class="first_field_r_spacing">
                                    <label class="form_label" for="fname">First
                                        name<span class="red_asterik">*</span></label>
                                    <input required class="form_fields" type="text" id="fname" name="fname"
                                        placeholder="Enter your First Name">
                                </td>
                                <td class="first_field_l_spacing">
                                    <label class="form_label" for="lname">Last name</label>
                                    <input class="form_fields" type="text" id="lname" name="lname"
                                        placeholder="Enter your Last Name">
                                </td>
                            </tr>
                        </table>

                        <label class="form_label" for="lname">Email<span class="red_asterik">*</span></label>
                        <input required class="form_fields" type="email" id="lname" name="lname"
                            placeholder="Enter your Email Address">

                        <label class="form_label" for="lname">Phone Number</label>
                        <input class="form_fields" type="number" id="lname" name="lname"
                            placeholder="Enter you Phone No.">

                        <label class="form_label" for="lname">Message<span class="red_asterik">*</span></label>
                        <textarea required class="form_fields msg_text_area" type="text" id="lname" name="lname"
                            placeholder="Enter message here"></textarea>

                        <center>
                            <button class="proceed_btn" type="submit">Submit
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

<script type="text/javascript">
        $(document).ready(function () {
            $("#contact_form").on("submit", function (e) {
                e.preventDefault();

                console.log("Button Clicked");
            });
        });
</script>

</html>