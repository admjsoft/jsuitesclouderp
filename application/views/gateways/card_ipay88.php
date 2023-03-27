<link rel="stylesheet" type="text/css"
      href="<?= assets_url() ?>assets/css/global.css<?= APPVER ?>">
<link rel="stylesheet" type="text/css"
      href="<?= assets_url() ?>assets/css/normalize.css<?= APPVER ?>">


<?php

$rming = $invoice['total'] - $invoice['pamnt'];
if ($itype == 'rinv' && $invoice['status'] == 'due') {
    $rming = $invoice['total'];
}
$surcharge_t = false;

$row = $gateway;

$cid = $row['id'];
$title = $row['name'];
if ($row['surcharge'] > 0) {
    $surcharge_t = true;
    $fee = '( ' . amountExchange($rming, $invoice['multi'], $invoice['loc']) . '+' . amountFormat_s($row['surcharge']) . ' %)';
} else {
    $fee = '';
}
?>
<script src="https://js.stripe.com/v3/"></script>
<?php if ($this->aauth->is_loggedin()) {

    echo '<a class="btn btn-warning  mr-1"
                                                    href = "' . base_url('invoices/view?id=' . $invoice['iid']) . '" role = "button" ><i
                                                        class="fa fa-backward" ></i > </a >';
} ?>
<div class="card">

    <div class="card-header">
        <h1>iPay88 Payment Page</h1>
<?php print_r($invoice);
echo "<br><br><br><br>";print_r($_SESSION);
echo "<br><br><br><br>";print_r($pay_setting);
?>
    </div>

    <div class="card-body">


        <div class="sr-root">
            <div class="sr-main">
                <span id="button-text">Pay With
                                        ipay88</span>
    <FORM method="post" name="ePayment"
    action="https://payment.ipay88.com.my/ePayment/entry.asp">
        <INPUT type="hidden" name="MerchantCode"  value="M00003">
        <INPUT type="hidden" name="PaymentId"     value="">
        <INPUT type="hidden" name="RefNo"         value="<?php echo $pay_setting['prefix'].$invoice['tid']; ?>">
        <INPUT type="hidden" name="Amount"        value="<?php echo $invoice['total']; ?>">
        <INPUT type="hidden" name="Currency"      value="<?php echo $pay_setting['currency']; ?>">
        <INPUT type="text" name="ProdDesc" class="form-control"     value="" placeholder="Description" require="required">
        <INPUT type="hidden" name="UserName"      value="<?php echo $invoice['name']; ?>">
        <INPUT type="hidden" name="UserEmail"     value="<?php echo $invoice['email']; ?>">
        <INPUT type="hidden" name="UserContact"   value="<?php echo $invoice['phone']; ?>">
        <INPUT type="hidden" name="Remark"        value="">
        <INPUT type="hidden" name="Lang"          value="UTF-8">
        <INPUT type="hidden" name="SignatureType" value="SHA256">
        <INPUT type="hidden" name="Signature"
        value="b81af9c4048b0f6c447129f0f5c0eec8d67cbe19eec26f2cdaba5df4f4dc5a28">
        <INPUT type="hidden" name="ResponseURL"
        value="<?php base_url('billing/card'); ?>">
        <INPUT type="hidden" name="BackendURL"
        value="">
        <INPUT type="submit" class="form-control text-white mt-2" style="background-color: orange;" value="Proceed with Payment" name="Submit">
    </FORM>

                <div class="sr-result hidden">
                    <p>Payment completed<br/>
                        <?php

                        echo '<a class="btn btn-info btn-block"
                                                    href = "' . base_url('billing/view?id=' . $invoice['iid']) . '&token=' . $token . '" role = "button" ><i
                                                        class="fa fa-backward" ></i > </a >';
                        ?>
                    </p>
                    <pre>
            <code></code>
          </pre>
                </div>
            </div>
        </div>


    </div>
</div>


<script type="text/javascript">
    // A reference to Stripe.js
    var stripe;

    var orderData = {
        items: [{id: "invoice-payment"}],
        currency: "<?=$row['currency']?>",
        <?=$this->security->get_csrf_token_name(); ?>: '<?=$this->security->get_csrf_hash(); ?>',
        id: '<?=$invoice['iid']?>',
        itype: 'inv',
        gateway: 1,
        amount: '<?php if ($rming > 0) echo numberClean(amountExchange_s($rming, $invoice['multi'], $invoice['loc'])) * 100; else echo '0.00'; ?>',
        token: '<?=$token ?>'
    };

    // Disable the button until we have Stripe set up on the page
    document.querySelector("button").disabled = true;

    fetch("<?=base_url('billing/stripe_api_response') ?>")
        .then(function (result) {
            return result.json();
        })
        .then(function (data) {
            return setupElements(data);
        })
        .then(function ({stripe, card, clientSecret}) {
            document.querySelector("button").disabled = false;

            var form = document.getElementById("payment-form");
            form.addEventListener("submit", function (event) {
                event.preventDefault();
                pay(stripe, card, clientSecret);
            });
        });

    var setupElements = function (data) {
        stripe = Stripe(data.publishableKey);
        /* ------- Set up Stripe Elements to use in checkout form ------- */
        var elements = stripe.elements();
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        var card = elements.create("card", {style: style});
        card.mount("#card-element");

        return {
            stripe: stripe,
            card: card,
            clientSecret: data.clientSecret
        };
    };
/*
    var handleAction = function (clientSecret) {
        stripe.handleCardAction(clientSecret).then(function (data) {
            if (data.error) {
                showError("Your card was not authenticated, please try again");
            } else if (data.paymentIntent.status === "requires_confirmation") {

                var verifyData = {
                    items: [{id: "invoice-payment"}],
                    currency: "<?=$row['currency']?>",
                    <?=$this->security->get_csrf_token_name(); ?>: '<?=$this->security->get_csrf_hash(); ?>',
                    id: '<?=$invoice['iid']?>',
                    itype: 'inv',
                    gateway: 1,
                    amount: '<?php if ($rming > 0) echo numberClean(amountExchange_s($rming, $invoice['multi'], $invoice['loc'])) * 100; else echo '0.00'; ?>',
                    token: '<?=$token ?>',
                    paymentIntentId: data.paymentIntent.id
                };

                jQuery.ajax({
                    url: '<?php echo base_url('billing/process_card') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: verifyData,
                    success: function (data) {
                        if (data.error) {
                            showError(data.error);
                        } else {
                            orderComplete(clientSecret);
                        }
                    },
                    error: function (data) {

                    }

                });



            }
        });
    };
*/
    /*
     * Collect card details and pay for the order
     */
    var pay = function (stripe, card) {
        changeLoadingState(true);

        // Collects card details and creates a PaymentMethod
        stripe
            .createPaymentMethod("card", card)
            .then(function (result) {
                if (result.error) {
                    showError(result.error.message);
                } else {
                    orderData.paymentMethodId = result.paymentMethod.id;
                    return jQuery.ajax({
                        url: '<?php echo base_url('billing/process_card') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: orderData,
                        success: function (data) {
                            if (data.error) {
                                showError(data.error);
                            } else if (data.requiresAction) {
                                // Request authentication
                                handleAction(data.clientSecret);
                            } else {
                                orderComplete(data.clientSecret);
                            }
                        },
                        error: function (data) {
                            showError(data.error);
                        }

                    });

                }
            });
    };

    /* ------- Post-payment helpers ------- */

    /* Shows a success / error message when the payment is complete */
    var orderComplete = function (clientSecret) {
        stripe.retrievePaymentIntent(clientSecret).then(function (result) {
            var paymentIntent = result.paymentIntent;
            var paymentIntentJson = JSON.stringify(paymentIntent, null, 2);

            document.querySelector(".sr-payment-form").classList.add("hidden");
            // document.querySelector("pre").textContent = paymentIntentJson;

            document.querySelector(".sr-result").classList.remove("hidden");
            setTimeout(function () {
                document.querySelector(".sr-result").classList.add("expand");
            }, 200);

            changeLoadingState(false);
        });
    };

    var showError = function (errorMsgText) {
        changeLoadingState(false);
        var errorMsg = document.querySelector(".sr-field-error");
        errorMsg.textContent = errorMsgText;
        setTimeout(function () {
            errorMsg.textContent = "";
        }, 4000);
    };

    // Show a spinner on payment submission
    var changeLoadingState = function (isLoading) {
        if (isLoading) {
            document.querySelector("button").disabled = true;
            document.querySelector("#spinner").classList.remove("hidden");
            document.querySelector("#button-text").classList.add("hidden");
        } else {
            document.querySelector("button").disabled = false;
            document.querySelector("#spinner").classList.add("hidden");
            document.querySelector("#button-text").classList.remove("hidden");
        }
    };

</script>
