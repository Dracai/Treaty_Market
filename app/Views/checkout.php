<!DOCTYPE html>
<html lang="en" style="font-family: 'Open Sans', sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Treaty_Market</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Map-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
</head>

<body style="border-left-width: 1px;font-family: 'Open Sans', sans-serif;">
    <div class="container" style="background: #f1f7fc;padding: 6px;font-family: 'Open Sans', sans-serif;">
        <div class="row" style="margin: 1em 0 ;">
            <div class="col-md-8">
                <h1 style="font-size: 35px;">Getting your Order</h1>
                <hr>
                <h3>Shipping Information</h3>
                <section>
                    <form method="post">
                        <div class="mb-3"></div>
                        <div class="mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6"><label class="form-label">First Name</label><input class="form-control firstName" type="text" id="firstName"><label class="form-label">Address Line 1</label><input class="form-control" type="text"><label class="form-label">City</label><input class="form-control" type="text"><label class="form-label">Telephone</label><input class="form-control" type="text"></div>
                                    <div class="col-md-6"><label class="form-label">Last Name</label><input class="form-control lastName" type="text" id="lastName"><label class="form-label">Address Line 2</label><input class="form-control" type="text"><label class="form-label">Country</label><input class="form-control" type="text"><label class="form-label">Postal Code</label><input class="form-control" type="text"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <hr>
                <h1 style="font-size: 28px;">Payment Information</h1>
                <section>
                    <form method="post">
                        <div class="mb-3"></div>
                        <div class="mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6"><label class="form-label">Card Type</label><select class="form-select">
                                            <option value="" selected="">Select Card Type</option>
                                            <option value="Mastercard">Mastercard</option>
                                            <option value="Visa">Visa</option>
                                        </select><label class="form-label" style="display: block;">Expiry Date</label><select class="form-select" style="width: 100px;display: block;float: left;">
                                            <option value="" selected="">Month</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select><select class="form-select" style="width: 92px; display: inline-block;">
                                            <option value="" selected="">Year</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                        </select>
                                        <div class="form-check" style="margin: 1em 0 0 0;"><label class="form-check-label"><input class="form-check-input" type="checkbox">Save payment information</label></div>
                                    </div>
                                    <div class="col-md-6"><label class="form-label">Card Number</label><input class="form-control" type="text"><label class="form-label">CVV</label><input class="form-control" type="text" style="width: 73px;"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section><button class="btn btn-primary" type="button" style="display: block;float: right;margin: 0 2em 0 0;">Confirm Order</button>
            </div>
            <div class="col-md-4" style="border-left-width: 1px;border-left-style: dotted;background: #f1f7fc;">
                <h1 style="text-align: left;font-size: 35px;">Order Summary</h1>
                <section style="border-width: 1px;border-style: solid;border-right-width: 1px;border-left-width: 1px;background: #ffffff;">
                    <div class="table-responsive" style="background: #ffffff;border-width: 0px;border-style: solid;border-right-width: 0px;border-right-style: solid;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 269.938px;">Product</th>
                                    <th style="width: 45.39060000000001px;">Price</th>
                                    <th style="width: 34.7188px;border-right: 0px solid rgb(0,0,0) ;">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h1 style="font-size: 29px;width: 156px;margin: 0 .5em 1em ;">Total Cost :</h1>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>