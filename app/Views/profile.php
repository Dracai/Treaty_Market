<body>
    <div class="container" style="padding: 10px;">
    <?php if (session()->get('success')): ?>
    <div class="alert alert-success" role="alert" style="text-align: center;">
      <?= session()->get('success')?>
    </div>
    <?php elseif (session()->get('failed')):?>
    <div class="alert alert-danger" role="alert">
        <?= session()->get('failed')?>
    </div>
    <?php endif; ?>
        <div class="row">
            <div class="col-md-4" style="background: #f1f7fc;border-right: 1px solid rgb(0,0,0);font-family: 'Open Sans', sans-serif;">
                <h1 class="text-center">Wish List</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 266.938px;">Product</th>
                                <th style="width: 84.3906px;">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($wishlist as $item): ?>
                            <tr>
                                <td><?= $item['productDescription'] ?></td>
                                <td><?= $item['productPrice'] ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>/drilldown/<?= $item['productID'] ?>"><button class="btn btn-primary" type="button" style="background: rgb(25,135,84);">Buy</button></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8" style="background: rgb(241,247,252);font-family: 'Open Sans', sans-serif;">
                <section></section>
                <form action="<?php echo base_url(); ?>/profile" method="post">
                    <h1 class="text-center" style="color: #58cb96;border-left-color: var(--bs-body-color);"><?= session()->get('customerName') ?></h1>
                    <div class="mb-3">
                        <div class="container">
                            <h3 style="margin: .5em 0 0 0;color: rgb(88,203,150);">Personal Details</h3>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control firstName" type="text" id="firstName" style="margin: 1em 0;" disabled="" value="<?= session()->get('contactFirstName') ?>"></div>
                                <div class="col-md-6"><input class="form-control lastName" type="text" id="lastName"  style="margin: 1em 0;" disabled="" value="<?= session()->get('contactLastName') ?>"></div>
                            </div>
                        </div>
                        <div class="container">
                            <h3 style="margin: .5em 0 0 0;color: rgb(88,203,150);">Change Password</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" type="password" id="oldPassword" name="oldPassword" style="margin: 1em 0 0 0;" placeholder="Old Password">
                                    <input class="form-control" type="password" id="newPassword" name="newPassword" style="margin: 1em 0;" placeholder="New Password"></div>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" id="conOldPassword" name="conOldPassword" style="margin: 1em 0 0 0;" placeholder="Confirm Old Password">
                                    <input class="form-control" type="password" id="conNewPassword" name="conNewPassword" style="margin: 1em 0;" placeholder="Confirm New Password">
                                    <button class="btn btn-primary" type="submit" id="changePassword" name="changePassword" style="margin: 1em 0 0 14em;font-family: 'Open Sans', sans-serif;background: rgb(25,135,84);">Update Password</button></div>
                                    <?php if(isset($passwordValidation)) :?>
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                <?= $passwordValidation->listErrors() ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="container">
                            <h3 style="margin: .5em 0 0 0;color: rgb(88,203,150);">Address</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control addressOne" type="text" id="addressOne" name="addressOne" style="margin: 1em 0;" placeholder="Address Line 1" value="<?= session()->get('addressLine1')?>">
                                    <input class="form-control city" type="text" id="city" name="city" placeholder="City" value="<?= session()->get('city') ?>">
                                    <input class="form-control country" type="text" id="country" name="country" style="margin: 1em 0 0 0;" placeholder="Country" value="<?= session()->get('country') ?>"></div>
                                <div class="col-md-6">
                                    <input class="form-control addressTwo" type="text" id="addressTwo" name="addressTwo" style="margin: 1em 0;" placeholder="Address Line 2 (Optional)" <?php if(!session()->get('addressLine2') == null): ?> value="<?= session()->get('addressLine2') ?>" <?php endif; ?>>
                                    <input class="form-control postalCode" type="text" id="postalCode" name="postalCode" placeholder="Postal Code" value="<?= session()->get('postalCode') ?>">
                                    <button class="btn btn-primary" type="submit" id="changeAddress" name="changeAddress" style="margin: 1em 0 0 15em;background: rgb(25,135,84);">Update Address</button></div>
                                    <?php if(isset($addressValidation)) :?>
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                <?= $addressValidation->listErrors() ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>