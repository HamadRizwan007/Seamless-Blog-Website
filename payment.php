<?php
    include('header.php')
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
                <div class="row">

                    <div class="col-md-4">
                        <p class="select_text">Select Payment Method:</p>

                        <input checked type="radio" class="radio_color" id="debit_radio" name="fav_language"
                            value="debit_radio">
                        <label class="radio_text" for="debit_radio">Debit/ Credit Card</label><br>
                        <input type="radio" class="radio_color" id="paypal_radio" name="fav_language"
                            value="paypal_radio">
                        <label class="radio_text" for="paypal_radio">Paypal</label>
                    </div>


                    <div class="col left_border">
                        <div class="creditcard_form">
                            <form id="payment_form" class="d_form">

                                <label class="form_label" for="lname">Name on card<span
                                        class="red_asterik">*</span></label>
                                <input required class="form_fields" type="text" id="lname" name="lname"
                                    placeholder="Enter Card Name">

                                <label class="form_label" for="lname">Card Number<span
                                        class="red_asterik">*</span></label>
                                <input required class="form_fields" type="text" id="lname" name="lname"
                                    placeholder="XXXX - XXXX - XXXX - XXXX"
                                    pattern="[0-9]{4,}-[0-9]{4,}-[0-9]{4,}-[0-9]{4,}">

                                <table>
                                    <tr>
                                        <td class="first_field_r_spacing">
                                            <label class="form_label" for="fname">CVC<span
                                                    class="red_asterik">*</span></label>
                                            <input required class="form_fields" type="text" id="fname" name="fname"
                                                placeholder="X - X - X" pattern="[0-9]-[0-9]-[0-9]">
                                        </td>
                                        <td class="first_field_l_spacing">
                                            <label class="form_label" for="lname">Expiry Date<span
                                                    class="red_asterik">*</span></label>
                                            <input required class="form_fields" type="date" id="lname" name="lname"
                                                placeholder="Enter your Last Name">
                                        </td>
                                    </tr>
                                </table>
                                <center>
                                    <button class="proceed_btn " type="submit">Submit
                                    </button>
                                </center>
                            </form>

                        </div>


                        <div class="paypal_form">
                            <center>

                                <img class="paypal_img" src="images/paypal.png">
                                <p class="payal_text">Payments accepted with PayPal only.<br>
                                    Proceed to PayPal to make the Payment.</p>
                                <form class="paypal" action="payments.php" method="post" id="paypal_form">
                                    <input type="hidden" name="cmd" value="_xclick" />
                                    <input type="hidden" name="no_note" value="1" />
                                    <input type="hidden" name="lc" value="UK" />
                                    <input type="hidden" name="bn"
                                        value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                    <input type="hidden" name="first_name" value="Customer's First Name" />
                                    <input type="hidden" name="last_name" value="Customer's Last Name" />
                                    <input type="hidden" name="payer_email" value="customer@example.com" />
                                    <input type="hidden" name="item_number" value="123456" />
                                    <input class="paypal_btn" type="submit" name="submit" value="Submit Payment" />
                                </form>
                            </center>
                        </div>
                    </div>




                </div>
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
        $("#payment_form").on("submit", function (e) {
            e.preventDefault();

            location.href = "<?php echo $url?>thank.php";
        });
    });

    $('input[type="radio"]').change(function () {
        var value = $('input[name=fav_language]:checked').val();
        // alert(value);

        creditcard_form = document.querySelector(".creditcard_form");
        paypal_form = document.querySelector(".paypal_form");
        if (value == 'paypal_radio') {
            creditcard_form.style.display = "none";
            paypal_form.style.display = "grid";
        } else {
            creditcard_form.style.display = "grid";
            paypal_form.style.display = "none";
        }
    });
</script>

</html>