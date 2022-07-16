<!DOCTYPE html>
<html lang="en">

<head>
    <title>Greengrocer-system</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="./payment.js"></script>
    <link rel="stylesheet" href="./payment.css">

    <script>
        $(function() {
            $("#nav-placeholder").load("../components/navbar/navbar.html");
            $("#footer-placeholder").load("../components/footer/footer.html");
        });

        function update() {
            let total = document.getElementById("total");
            let totalPayment = localStorage.getItem('totalPayment');
            if (totalPayment != null) {
                total.value = "Pay " + localStorage.getItem('totalPayment') + " $";
            } else {
                total.value = "Pay 0 $";
            }

            // create hidden table, then use "updateStock" function on each row.!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }

        function loadCart() {
            document.getElementById('cart').value = localStorage.getItem('tmpCart');
            localStorage.removeItem('tmpCart');
            localStorage.removeItem('totalPayment');
            document.getElementById('sub').click();
        }
    </script>

    <style>

    </style>
</head>

<body onload="update()">
    <?php
    include "../../phpExecutor.php";

    if (isset($_POST['updateStock'])) {
        foreach (json_decode($_POST['cart']) as $item) {
            updateStock($item[6], (int)$item[0], (float)($item[2] - $item[5]));
            updateTransactions((int)$item[0], $item[1], $item[6], (float)$item[5], (float)($item[3] - $item[4]) * $item[5]);
        }
        header("Refresh:0");
    }

    ?>
    <div id="nav-placeholder"></div>
    <div class="container-fluid" style="position: absolute;height: 100%">
        <div class="row justify-content-center">
            <div class=" col-lg-6 col-md-8">
                <div class="card p-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="heading text-center">Payment</h2>
                        </div>
                    </div>
                    <div class="form-card">
                        <div class="row justify-content-center mb-4 radio-group">

                            <div class="col-sm-3 col-5">
                                <div class='radio mx-auto' data-value="visa"> <img class="fit-image" src="https://i.imgur.com/OdxcctP.jpg" width="105px" height="55px"> </div>
                            </div>
                            <div class="col-sm-3 col-5">
                                <div class='radio mx-auto' data-value="master"> <img class="fit-image" src="https://i.imgur.com/WIAP9Ku.jpg" width="105px" height="55px"> </div>
                            </div>
                            <div class="col-sm-3 col-5">
                                <div class='radio mx-auto' data-value="paypal"> <img class="fit-image" src="https://i.imgur.com/cMk1MtK.jpg" width="105px" height="55px"> </div>
                            </div> <br>
                        </div>
                        <div class="row justify-content-center form-group">
                            <div class="col-12 px-auto">
                                <div class="custom-control custom-radio custom-control-inline"> <input id="customRadioInline1" type="radio" name="customRadioInline1" class="custom-control-input" checked="true"> <label for="customRadioInline1" class="custom-control-label label-radio">Private</label> </div>
                                <div class="custom-control custom-radio custom-control-inline"> <input id="customRadioInline2" type="radio" name="customRadioInline1" class="custom-control-input"> <label for="customRadioInline2" class="custom-control-label label-radio">Business</label> </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" name="Name" placeholder="John Doe"> <label>Name</label> </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" id="cr_no" name="card-no" placeholder="0000 0000 0000 0000" minlength="19" maxlength="19"> <label>Card Number</label> </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group"> <input type="text" id="exp" name="expdate" placeholder="MM/YY" minlength="5" maxlength="5"> <label>Expiry Date</label> </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group"> <input type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3"> <label>CVV</label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form name='updateForm' action='' method='post'>
                            <input id="total" class="btn btn-primary" type="" name="" value="Pay 0 $" onClick="loadCart()" />
                            <input id="cart" class="btn btn-primary" type="" name="cart" value="" hidden />
                            <input id="sub" class="btn btn-primary" type="submit" name="updateStock" value="" hidden />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-placeholder"></div>
</body>

</html>