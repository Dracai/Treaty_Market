<!DOCTYPE html>
<html lang="en">

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

<body>
    <section class="register-photo" style="background: rgb(241, 247, 252);">
        <div class="form-container">
            <form action="<?php echo base_url(); ?>/register" method="post">
                <h2 class="text-center" style="color: rgb(80, 94, 108);"><strong>Create</strong> an account.</h2>
                <?php if (session()->get('banned')): ?>
                    <div class="alert alert-warning" role="alert">
                        <?= session()->get('banned')?>
                    </div>
                <?php endif; ?>
                <div class="mb-3"></div>
                <div class="mb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6"><input class="form-control firstName" name="contactFirstName" type="text" id="contactFirstName" placeholder="First Name" value="<?= set_value('contactFirstName') ?>"></div>
                            <div class="col-md-6"><input class="form-control lastName" name="contactLastName" type="text" id="contactLastName" placeholder="Last Name" value="<?= set_value('contactLastName') ?>"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" style="margin: 1em 0 0 0;"><input class="form-control companyName" name="customerName" type="text" id="customerName" placeholder="Company Name" value="<?= set_value('customerName') ?>">
                            <input class="form-control email" type="text" id="email" name="email" style="margin: 1em 0 ;" placeholder="Email" value="<?= set_value('email') ?>"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6"><input class="form-control password" name="password" type="password" id="password" placeholder="Password">
                                <input class="form-control addressOne" name="addressLine1" type="text" id="addressLine1" style="margin: 1em 0;" placeholder="Address Line 1" value="<?= set_value('addressLine1') ?>">
                                <input class="form-control city" name="city" type="text" id="city" placeholder="City" value="<?= set_value('city') ?>">
                                <input class="form-control country" name="country" type="text" id="country" style="margin: 1em 0 0 0;" placeholder="Country" value="<?= set_value('country') ?>">
                            </div>
                            <div class="col-md-6"><input class="form-control confirmPassword" name="passwordCon" type="password" id="passwordCon" placeholder="Confirm Password">
                                <input class="form-control addressTwo" type="text" id="addressLine2" name="addressLine2" style="margin: 1em 0;" placeholder="Address Line 2 (Optional)" value="<?= set_value('addressLine2') ?>">
                                <input class="form-control postalCode" type="text" id="postalCode" name="postalCode" placeholder="Postal Code" value="<?= set_value('postalCode') ?>">
                                <input class="form-control telephone" type="text" id="phone" name="phone" style="margin: 1em 0;" placeholder="Telephone" value="<?= set_value('phone') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                    <?php if(isset($validation)) :?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" style="background: var(--bs-green);">Sign Up</button></div>
                <a class="already" href="<?php echo base_url(); ?>/login">You already have an account? Login here.</a>
            </form>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>